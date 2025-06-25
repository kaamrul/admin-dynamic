<?php

namespace App\Library\Services\Admin;

use App\Library\Enum;
use App\Library\Helper;
use App\Models\Page;
use App\Models\User;
use Exception;
use Yajra\DataTables\Facades\DataTables;

class PageService extends BaseService
{
    private function getSwitch($row)
    {
        $is_check = $row->is_active ? "checked" : "";
        $route = "'" . route('admin.page.change_status', $row->id) . "'";

        $isDisable = Helper::hasAuthRolePermission('page_update_status') ? "" : "disabled";

        return '<div class="custom-control custom-switch">
                    <input type="checkbox" ' . $isDisable . '
                        onchange="changePrimary(event, ' . $route . ')"
                        class="custom-control-input"
                        id="primarySwitch_' . $row->id . '" ' . $is_check . ' >
                    <label class="custom-control-label" for="primarySwitch_' . $row->id . '"></label>
                </div>';
    }

    private function getActionHtml($row)
    {
        $actionHtml = '';
        $route = route('admin.page.delete', $row->id);

        if ($row->id) {
            if (Helper::hasAuthRolePermission('page_show')) {
                $actionHtml .= '<a class="dropdown-item text-primary" href="' . route('admin.page.show', $row->id) . '" ><i class="fas fa-eye"></i> View</a>';
            }

            if (Helper::hasAuthRolePermission('page_update')) {
                $actionHtml .= '<a class="dropdown-item" href="' . route('admin.page.update', $row->id) . '" ><i class="far fa-edit"></i> Edit</a>';
            }

            if (Helper::hasAuthRolePermission('page_delete')) {
                $actionHtml .= '<button class="dropdown-item" onclick="confirmFormModal(\'' . $route . '\', \'Confirmation\', \'Are you sure to delete?\');"><i class="fa fa-trash-alt"></i> Delete</button>';
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

    public function dataTable()
    {
        $data = Page::select('*');

        return DataTables::of($data)
            ->addIndexColumn()

            ->addColumn('title', function ($row) {
                $user_role = User::getAuthUserRole();

                return $user_role->hasPermission('page_show') ? '<a href="' . route('admin.page.show', $row->id) . '">' . $row->title . '</a>' : '';
            })

            ->addColumn('is_active', function ($row) {

                return $this->getSwitch($row);
            })

            ->addColumn('action', function ($row) {

                return $this->getActionHtml($row);
            })
            ->rawColumns(['title', 'is_active', 'action'])
            ->make(true);
    }

    public function create(array $data): bool
    {
        try {
            $data['operator_id'] = auth()->id();

            if (isset($data['image'])) {
                $data['image'] = Helper::uploadImage($data['image'], Enum::PAGE_IMAGE, 800, 500);
            }

            $this->data = Page::create($data);

            return $this->handleSuccess('Successfully Created');
        } catch (Exception $e) {
            Helper::log($e);

            return $this->handleException($e);
        }
    }

    public function update(Page $page, array $data): bool
    {
        try {
            $data['created_by'] = User::getAuthUser()->id;

            if (isset($data['image'])) {
                $data['image'] = Helper::uploadImage($data['image'], Enum::PAGE_IMAGE, 800, 500);
            }

            $this->data = $page->update($data);

            return $this->handleSuccess('Successfully Updated');
        } catch (Exception $e) {
            Helper::log($e);

            return $this->handleException($e);
        }
    }
}
