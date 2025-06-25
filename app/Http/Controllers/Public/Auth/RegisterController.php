<?php

namespace App\Http\Controllers\Public\Auth;

use App\Events\Member\NewMemberCreatedEvent;
use Throwable;
use App\Models\Club;
use App\Models\User;
use App\Library\Enum;
use App\Models\Member;
use App\Library\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Events\Member\VerifyMemberEvent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Symfony\Component\HttpKernel\Log\Logger;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/member/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (request()->isMethod('post') && (request()->query('from') && request()->query('from') == 'checkout')) {
            $this->redirectTo = '/checkout';
        }

        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $clubs = Club::orderBy('name')->get();

        return view('public.auth.register', compact('clubs'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $nominee1 = null;
        $nominee2 = null;

        $data = $request->all();

        if (isset($data['user_type']) && $data['user_type'] === 'member') {
            if (isset($data['nominee1']) && $data['nominee1']) {
                $nominee1 = $this->getNominee($data, 'nominee1');
            }

            if (isset($data['nominee2']) && $data['nominee2']) {
                $nominee2 = $this->getNominee($data, 'nominee2');
            }

            if (empty($nominee1)) {
                return back()->with('error', 'Invalid 1st nominee');
            }

            if (empty($nominee2)) {
                return back()->with('error', 'Invalid 2nd nominee');
            }
        }

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email'      => ['required', 'string', 'email', 'max:255'],
            'password'   => ['required', 'string', 'min:8', 'confirmed'],
            'phone'      => ['required', 'string', 'min:8', 'max:20'],
            'avatar'     => ['nullable', 'file', 'max:1024', 'mimes:jpeg,jpg,png,gif'],
            'dob'        => ['required', 'date'],
            'user_type'  => ['required'],
            'club_id'    => ['required_if:user_type,affiliated-club-member'],
            'club_member_id' => ['required_if:user_type,affiliated-club-member'],
            'nominee1'   => ['required_if:user_type,member'],
            'nominee2'   => ['required_if:user_type,member'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        DB::beginTransaction();

        try {
            if (isset($data['avatar'])) {
                $data['avatar'] = Helper::uploadImage($data['avatar'], Enum::MEMBER_PROFILE_IMAGE_DIR, 300, 300);
            }

            $age_group = Helper::ageGroup($data['dob']);

            $user = User::create([
                'first_name' => $data['first_name'],
                'last_name'  => $data['last_name'],
                'email'      => $data['email'],
                'user_name'  => Helper::userName($data['first_name'], 'member'),
                'dob'        => $data['dob'],
                'phone'      => $data['country_code'] . '-' . preg_replace('/[^0-9]/', '', $data['phone']),
                'avatar'     => isset($data['avatar']) && isset($data['avatar']) ? $data['avatar'] : null,
                'user_type'  => $data['user_type'],
                'password'   => Hash::make($data['password']),
                'status'     => Enum::USER_STATUS_ACTIVE,
            ]);

            event(new NewMemberCreatedEvent($user, $data['password']));

            $nominee1 = null;
            $nominee2 = null;
            $club_id = null;
            $club_member_id = null;

            if (isset($data['user_type']) && $data['user_type'] == 'affiliated-club-member') {
                $club_id = $data['club_id'];
                $club_member_id = $data['club_member_id'];
            } elseif (isset($data['user_type']) && $data['user_type'] === 'member') {
                if (isset($data['nominee1']) && $data['nominee1']) {
                    $nominee1 = $this->getNominee($data, 'nominee1');
                }

                if (isset($data['nominee2']) && $data['nominee2']) {
                    $nominee2 = $this->getNominee($data, 'nominee2');
                }
            }

            $member = $user->member()->save(new Member([
                'age_group' => $age_group,
                'operator_id' => $user->id,
                'nominated_by' => $nominee1?->id,
                'seconded_by' => $nominee2?->id,
                'club_id' => $club_id,
                'club_member_id' => $club_member_id,
            ]));

            DB::commit();

            if ($user->user_type == 'member') {
                if ($nominee1) {
                    event(new VerifyMemberEvent($member, 1));
                }

                if ($nominee2) {
                    event(new VerifyMemberEvent($member, 2));
                }
            }

            return $user;
        } catch (Throwable $e) {
            DB::rollBack();

            Log::error($e->getMessage());
        }
    }

    private function getNominee($data, $key)
    {
        if (isset($data[$key]) && $data[$key]) {
            $userName = explode('-', $data[$key]);

            if (count(($userName)) > 1) {

                return User::find(trim($userName[1]))->first();
            }
        }

        return null;
    }
}
