<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use App\Library\Enum;
use App\Library\Helper;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\Client\CreateRequest;
use App\Http\Requests\Admin\User\Client\UpdateRequest;
use App\Library\Services\Admin\User\ClientService;

class ClientController extends Controller
{
    use ApiResponse;

    private $client_service;

    public function __construct(ClientService $client_service)
    {
        $this->client_service = $client_service;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $filter_request = $request->only(['status', 'is_deleted']);

            return $this->client_service->dataTable($filter_request);
        }

        return view('admin.pages.user.client.index');
    }

    public function show(User $user)
    {
        abort_unless($user, 404);

        return view('admin.pages.user.client.show', compact('user'));
    }

    public function showCreateForm()
    {
        return view('admin.pages.user.client.create', [
            'countries'     => Helper::getCountries(),
            'genders'       => getDropdown(Enum::CONFIG_DROPDOWN_GENDER),
        ]);
    }

    public function create(CreateRequest $request)
    {
        $result = $this->client_service->createMember($request->validated());

        if ($result) {
            return redirect()->route('admin.user.member.index')->with('success', $this->client_service->message);
        }

        return back()->withInput(request()->all())->with('error', $this->client_service->message);
    }

    public function showUpdateForm(User $user)
    {
        abort_unless($user, 404);

        return view('admin.pages.user.client.edit', [
            'user'          => $user,
            'countries'     => Helper::getCountries(),
            'genders'       => getDropdown(Enum::CONFIG_DROPDOWN_GENDER),
        ]);
    }

    public function update(User $user, UpdateRequest $request)
    {
        abort_unless($user, 404);
        $result = $this->client_service->updateMember($user, $request->validated());

        if ($result) {
            return redirect()->route('admin.user.member.index')->with('success', $this->client_service->message);
        }

        return back()->withInput(request()->all())->with('error', $this->client_service->message);
    }
}
