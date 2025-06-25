<?php

namespace App\Library\Services\Admin\User;

use Exception;
use App\Models\User;
use App\Library\Enum;
use App\Library\Helper;
use App\Models\Address;
use App\Models\UserVan;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Library\Services\Admin\BaseService;

class EmployeeService extends BaseService
{
    private function filter(array $params)
    {
        $query = User::whereIn('user_type', [Enum::USER_TYPE_ADMIN, Enum::USER_TYPE_EMPLOYEE])
            ->with(['roles', 'territory']);

        if (isset($params['is_deleted']) && $params['is_deleted'] == 1) {
            $query->onlyTrashed();
            $query->whereNotNull('deleted_at');
        } elseif (isset($params['status'])) {
            $query->where('status', $params['status']);
            $query->whereNull('deleted_at');
        }

        return $query->get();
    }

    private function actionHtml($row)
    {
        $actionHtml = '';

        if (Helper::hasAuthRolePermission('user_restore') && $row->deleted_at) {
            $actionHtml .= '<a class="dropdown-item text-secondary" href="javascript:void(0)" onclick="confirmModal(restoreEmployee, ' . $row->id . ', \'Are you sure to restore operation?\')" ><i class="fas fa-trash-restore-alt"></i> Restore</a>';
        } elseif (!$row->deleted_at) {
            if (Helper::hasAuthRolePermission('employee_show')) {
                $actionHtml .= '<a class="dropdown-item text-primary" href="' . route('admin.user.employee.show', $row->id) . '" ><i class="fas fa-eye"></i> View</a>';
            }

            if (Helper::hasAuthRolePermission('employee_update') && $row->user_type != Enum::USER_TYPE_SUPER_ADMIN) {
                $actionHtml .= '<a class="dropdown-item" href="' . route('admin.user.employee.edit', $row->id) . '" ><i class="far fa-edit"></i> Edit</a>';
            }
        }

        return '<div class="action dropdown">
                    <button class="btn btn2-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fas fa-tools"></i> Action
                    </button>
                    <div class="dropdown-menu">
                        ' . $actionHtml . '
                    </div>
                </div>';
    }

    public function dataTable(array $filter_params)
    {
        $data = $this->filter($filter_params);

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($row) {
                $name = $row?->full_name;

                return !Helper::hasAuthRolePermission('employee_show') || $row->deleted_at != null ? $name : '<a href="' . route('admin.user.employee.show', $row->id) . '" class="text-success pr-2">' . $name . '</a>';
            })
            ->addColumn('territory_id', function ($row) {
                $name = $row?->territory?->name ?? null;

                return Helper::hasAuthRolePermission('territory_show') && $row->territory_id ? '<a href="' . route('admin.config.more_settings.territory.show', $row->territory_id) . '" class="text-success pr-2" target="_blank">' . $name . '</a>' : $name;
            })
            ->addColumn('designation', function ($row) {
                return $row->designation ?? 'N/A';
            })
            ->addColumn('action', function ($row) {
                return $this->actionHtml($row);
            })
            ->rawColumns(['name', 'territory_id', 'action'])
            ->make(true);
    }

    public function createEmployee(array $data): bool
    {
        DB::beginTransaction();

        try {
            $data['operator_id'] = auth()->id();

            // User
            $data['status'] = Enum::USER_STATUS_PENDING;
            $data['password'] = bcrypt($data['password']);
            $data['user_type'] = Enum::USER_TYPE_EMPLOYEE;

            if (isset($data['avatar'])) {
                $data['avatar'] = Helper::uploadImage($data['avatar'], Enum::USER_AVATAR_DIR, 200, 200);
            }

            $user = User::create($data);

            // Address
            if (isset($data['street_address']) || isset($data['post_code'])) {
                $address['street_address'] = $data['street_address'];
                $address['post_code'] = $data['post_code'];
                $address['user_id'] = $user->id;
                $address['operator_id'] = auth()->id();

                Address::create($address);
            }

            // Roles
            if (isset($data['role_id'])) {
                $user->roles()->attach($data['role_id']);
            }

            // Vans
            if (!empty($data['van_id'])) {
                foreach ($data['van_id'] as $vanId) {
                    UserVan::create([
                        'user_id' => $user->id,
                        'van_id'  => $vanId,
                    ]);
                }
            }

            DB::commit();

            return $this->handleSuccess('Successfully created');
        } catch (Exception $e) {
            Helper::log($e);
            DB::rollBack();

            return $this->handleException($e);
        }
    }

    public function updateEmployee(User $user, array $data): bool
    {
        DB::beginTransaction();

        try {
            $data['operator_id'] = auth()->id();
            // $data['status'] = Enum::USER_STATUS_PENDING;

            // User
            if (isset($data['avatar'])) {
                deleteFile($user->avatar);
                $data['avatar'] = Helper::uploadImage($data['avatar'], Enum::USER_AVATAR_DIR, 200, 200);
            }

            $user->update($data);

            // Address
            // $address = $user->address;
            if (isset($data['street_address']) || isset($data['post_code'])) {
                $address_data['street_address'] = $data['street_address'];
                $address_data['post_code'] = $data['post_code'];
                $address_data['operator_id'] = auth()->id();

                if ($user->address) {
                    $user->address->update($address_data);
                } else {
                    $address_data['user_id'] = $user->id;
                    Address::create($address_data);
                }
            }

            if (!empty($data['van_id'])) {
                $user->vans()->delete();

                foreach ($data['van_id'] as $vanId) {
                    UserVan::create([
                        'user_id' => $user->id,
                        'van_id'  => $vanId,
                    ]);
                }
            } else {
                $user?->vans()->delete();
            }

            // if (isset($data['role_id'])) {
            //     $user->roles()->sync($data['role_id']);
            // }

            DB::commit();

            return $this->handleSuccess('Successfully updated');
        } catch (Exception $e) {
            Helper::log($e);
            DB::rollBack();

            return $this->handleException($e);
        }
    }

    public function changeUserType(User $user): bool
    {
        DB::beginTransaction();

        try {
            $user->user_type = Enum::USER_TYPE_DRIVER;
            $user->save();

            DB::commit();

            return $this->handleSuccess('Successfully updated');
        } catch (Exception $e) {
            Helper::log($e);
            DB::rollBack();

            return $this->handleException($e);
        }
    }
}
