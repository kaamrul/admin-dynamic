<?php

namespace App\Http\Controllers\Public\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Library\Services\Public\MemberService;
use App\Http\Requests\Public\Profile\VerifyRequest;
use App\Http\Requests\Public\Profile\ProfileUpdateRequest;
use App\Http\Requests\Public\Profile\UpdatePasswordRequest;
use App\Http\Requests\Public\Profile\EmergencyContactUpdateRequest;

class ProfileController extends Controller
{
    use ApiResponse;
    private $member_service;

    public function __construct(MemberService $member_service)
    {
        $this->member_service = $member_service;
    }

    public function index()
    {
        return view('public.member_dashboard.profile.index', [
            'user' => User::getAuthUser(),
        ]);
    }

    public function showUpdateForm()
    {
        return view('public.member_dashboard.profile.update', [
            'user' => User::getAuthUser(),
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        abort_unless(User::getAuthUser(), 404);

        $result = $this->member_service->updateMember($request);

        if ($result) {
            $notification = [
                'message'    => 'Successfully updated',
                'alert-type' => 'success'
            ];

            return redirect()->route('member.dashboard.profile.index')->with($notification);
        } else {
            $notification = [
                'message'    => 'Unable to update now',
                'alert-type' => 'error'
            ];

            return back()->withInput(request()->all())->with($notification);
        }
    }

    //==========Password update ===============//
    public function showPasswordUpdateForm()
    {
        return view('public.member_dashboard.profile.update_password', [
            'user' => User::getAuthUser(),
        ]);
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        abort_unless(User::getAuthUser(), 404);

        $result = $this->member_service->updateProfilePassword($request->validated());

        if ($result) {
            $notification = [
                'message'    => 'Successfully Password Updated',
                'alert-type' => 'success'
            ];

            return redirect()->route('member.dashboard.profile.index')->with($notification);
        } else {
            $notification = [
                'message'    => 'Unable to update now',
                'alert-type' => 'error'
            ];

            return back()->withInput(request()->all())->with($notification);
        }
    }

    //===============-- Verify profile --================//
    public function showVerifyForm()
    {
        return view('public.member_dashboard.profile.verify', [
            'user'      => User::getAuthUser(),
            'nominated' => User::getVerifiedNominated(),
            'seconded'  => User::getVerifiedSeconded(),
        ]);
    }

    public function makeVerify(VerifyRequest $request)
    {
        abort_unless(User::getAuthUser(), 404);

        $result = $this->member_service->verifyProfile($request->validated());

        if ($result) {
            $notification = [
                'message'    => 'Verify Request Send!!',
                'alert-type' => 'success'
            ];

            return redirect()->route('member.dashboard.profile.index')->with($notification);
        } else {
            $notification = [
                'message'    => 'Unable to update now',
                'alert-type' => 'error'
            ];

            return back()->withInput(request()->all())->with($notification);
        }
    }

    public function resendVerification($type)
    {
        abort_unless(User::getAuthUser(), 404);

        $result = $this->member_service->resendVerification($type);

        if ($result) {
            $notification = [
                'message'    => 'Verify Request Send!!',
                'alert-type' => 'success'
            ];

            return redirect()->route('member.dashboard.profile.verify')->with($notification);
        } else {
            $notification = [
                'message'    => 'Unable to update now',
                'alert-type' => 'error'
            ];

            return back()->withInput(request()->all())->with($notification);
        }
    }

    public function editVerification($type)
    {
        abort_unless(User::getAuthUser(), 404);

        return view('public.member_dashboard.profile.verify_edit', [
            'type'      => $type,
            'user'      => User::getAuthUser(),
            'nominated' => User::getVerifiedNominated(),
            'seconded'  => User::getVerifiedSeconded(),

        ]);
    }

    public function updateVerification(Request $request, $type)
    {
        abort_unless(User::getAuthUser(), 404);

        $result = $this->member_service->editVerification($request->all(), $type);

        if ($result) {
            $notification = [
                'message'    => 'Verify Request Send!!',
                'alert-type' => 'success'
            ];

            return redirect()->route('member.dashboard.profile.index')->with($notification);
        } else {
            $notification = [
                'message'    => 'Unable to update now',
                'alert-type' => 'error'
            ];

            return back()->withInput(request()->all())->with($notification);
        }
    }

    //==================-- EmergencyContact --==============//
    public function showEmergencyContactForm()
    {
        return view('public.member_dashboard.profile.update_emergency_contact', [
            'emergency_contact' => auth()->user()->emergency,
        ]);
    }

    public function updateEmergencyContact(EmergencyContactUpdateRequest $request)
    {
        abort_unless(User::getAuthUser(), 404);

        $result = $this->member_service->updateEmergencyContact($request->all());

        if ($result) {
            $notification = [
                'message'    => $this->member_service->message,
                'alert-type' => 'success'
            ];

            return redirect()->route('member.dashboard.profile.index')->with($notification);
        } else {
            $notification = [
                'message'    => 'Unable to update now',
                'alert-type' => 'error'
            ];

            return back()->withInput(request()->all())->with($notification);
        }
    }

    public function deleteEmergencyContact()
    {
        $emergency = auth()->user()->emergency;
        abort_unless($emergency, 404);
        deleteFile($emergency->image);
        $result = $emergency->delete();

        if ($result) {
            $notification = [
                'message'    => 'Successfully Deleted !!',
                'alert-type' => 'success'
            ];

            return redirect()->route('member.dashboard.profile.index')->with($notification);
        }

        return back()->with('error', 'Unable to delete now');
    }
}
