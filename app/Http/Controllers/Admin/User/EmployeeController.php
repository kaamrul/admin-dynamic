<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Van;
use App\Models\Role;
use App\Models\User;
use App\Library\Enum;
use App\Models\Territory;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Employee\CreateRequest;
use App\Http\Requests\Admin\Employee\UpdateRequest;
use App\Library\Services\Admin\User\EmployeeService;

class EmployeeController extends Controller
{
    use ApiResponse;

    private $employee_service;

    public function __construct(EmployeeService $employee_service)
    {
        $this->employee_service = $employee_service;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $filter_request = $request->only(['status', 'is_deleted']);

            return $this->employee_service->dataTable($filter_request);
        }

        return view('admin.pages.user.employee.index');
    }

    public function show(User $user)
    { 
        abort_unless($user, 404);

        $user->load('roles', 'address', 'territory');

        return view('admin.pages.user.employee.show', [
            'user'  => $user,
            'roles' => Role::getWithoutSupperAdmin(),
        ]);
    }

    public function create()
    {
        return view('admin.pages.user.employee.create', [
            'roles'           => Role::getWithoutSupperAdmin(),
            'genders'         => getDropdown(Enum::CONFIG_DROPDOWN_GENDER),
            'designations'    => getDropdown(Enum::CONFIG_DROPDOWN_DESIGNATION),
            'territories'     => Territory::active()->get(),
            'vans'            => Van::get(),
        ]);
    }

    public function store(CreateRequest $request)
    {
        $result = $this->employee_service->createEmployee($request->validated());

        if ($result) {
            return redirect()->route('admin.user.employee.index', $this->employee_service->data)->with('success', $this->employee_service->message);
        }

        return back()->withInput($request->all())->with('error', $this->employee_service->message);
    }

    public function edit(User $user)
    {
        abort_unless($user, 404);

        return view('admin.pages.user.employee.update', [
            'user'            => $user->load('address'),
            'roles'           => Role::getWithoutSupperAdmin(),
            'genders'         => getDropdown(Enum::CONFIG_DROPDOWN_GENDER),
            'designations'    => getDropdown(Enum::CONFIG_DROPDOWN_DESIGNATION),
            'territories'     => Territory::active()->get(),
            'vans'            => Van::get(),
        ]);
    }

    public function update(UpdateRequest $request, User $user)
    {
        abort_unless($user, 404);

        $result = $this->employee_service->updateEmployee($user, $request->validated());

        if ($result) {
            return redirect()->route('admin.user.employee.index')->with('success', $this->employee_service->message);
        }

        return back()->withInput($request->all())->with('error', $this->employee_service->message);
    }

    public function details(User $user)
    { 
        abort_unless($user, 404);

        $user->load('address', 'territory', 'vans.van');

        return view('admin.pages.user.employee.partials.details.details', [
            'user'  => $user,
        ]);
    }

    public function security(User $user)
    { 
        abort_unless($user, 404);

        return view('admin.pages.user.employee.partials.details.security', [
            'user'  => $user,
            'roles' => Role::getWithoutSupperAdmin(),
        ]);
    }

    public function securityUpdate(User $user, Request $request)
    {
        abort_unless($user, 404);

        $this->validate($request, [
            'role_id' => ['nullable', 'array'],
        ]);

        $data = $request->only(['role_id']);

        if (isset($data['role_id'])) {
            $user->roles()->sync($data['role_id']);
        }

        return redirect(route('admin.user.employee.security', $user->id))->with('success', 'Successfully Updated');
    }

    public function changeUserType(User $user, Request $request)
    {
        abort_unless($user, 404);

        $result = $this->employee_service->changeUserType($user);

        if ($result) {
            return redirect()->route('admin.user.driver.details', $user->id)->with('success', $this->employee_service->message);
        }

        return back()->withInput($request->all())->with('error', $this->employee_service->message);
    }
}
