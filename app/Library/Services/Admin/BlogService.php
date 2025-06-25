<?php

namespace App\Library\Services\Admin;

use Exception;
use App\Models\Post;
use App\Models\User;
use App\Library\Enum;
use App\Library\Helper;
use Yajra\DataTables\Facades\DataTables;

class BlogService extends BaseService
{
    // For Filtering
    private function filter(array $params, string $type)
    {
        $query = Post::select('*');

        if (isset($params['is_deleted']) && $params['is_deleted'] == 1) {
            $query->onlyTrashed();
        } elseif (isset($params['status'])) {
            $query->where('is_active', $params['status']);
        }

        return $query->get();
    }

    private function getSwitch($row)
    {
        $is_check = $row->is_active ? "checked" : "";
        $route = "'" . route('admin.blog.change_status', $row->id) . "'";

        $isDisable = Helper::hasAuthRolePermission('blog_update_status') ? "" : "disabled" ;

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
        $route = route('admin.blog.delete', $row->id);

        if ($row->id) {
            if (Helper::hasAuthRolePermission('blog_show')) {
                $actionHtml .= '<a class="dropdown-item text-primary" href="' . route('admin.blog.show', $row->id) . '" ><i class="fas fa-eye"></i> View</a>';
            }

            if (Helper::hasAuthRolePermission('blog_update')) {
                $actionHtml .= '<a class="dropdown-item" href="' . route('admin.blog.update', $row->id) . '" ><i class="far fa-edit"></i> Edit</a>';
            }

            if (Helper::hasAuthRolePermission('blog_delete')) {
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

    private function getFeatureSwitch($row)
    {
        $is_check = $row->is_featured ? "checked" : "";
        $route = "'" . route('admin.blog.change_featured', $row->id) . "'";

        return '<div class="custom-control custom-switch">
                    <input type="checkbox"
                        onchange="changePrimary(event, ' . $route . ')"
                        class="custom-control-input"
                        id="primarySwitch_' . $row->id . '2" ' . $is_check . ' >
                    <label class="custom-control-label" for="primarySwitch_' . $row->id . '2"></label>
                </div>';
    }


    public function dataTable(array $params, string $type)
    {
        $data = $this->filter($params, $type);

        return DataTables::of($data)
            ->addIndexColumn()

            ->addColumn('title', function ($row) {
                $user_role = User::getAuthUserRole();

                return $user_role->hasPermission('blog_show') ? '<a href="' . route('admin.blog.show', $row->id) . '">' . $row->title . '</a>' : '';
            })

            ->addColumn('short_description', function ($row) {
                return substr($row->short_description, 0, 50) . '...';
            })
            ->addColumn('is_featured', function ($row) {
                return $this->getFeatureSwitch($row);
            })

            ->addColumn('category', function ($row) {
                return Enum::getPostType($row->post_type);
            })

            ->addColumn('is_active', function ($row) {
                return $this->getSwitch($row);
            })

            ->addColumn('action', function ($row) {
                return $this->getActionHtml($row);
            })
            ->rawColumns(['title', 'short_description', 'is_featured', 'is_active', 'action'])
            ->make(true);
    }

    public function create(array $data): bool
    {
        try {
            $data['operator_id'] = auth()->id();
           // $data['post_type'] = Enum::POST_TYPE_BLOG;
            $data['tags'] = isset($data['tags']) ? json_encode($data['tags']) : null;

            if (isset($data['featured_image'])) {
                $data['featured_image'] = Helper::uploadImage($data['featured_image'], Enum::BLOG_FEATURE_IMAGE, 1000, 500);
            }

            $this->data = Post::create($data);

            return $this->handleSuccess('Successfully Created');
        } catch (Exception $e) {
            Helper::log($e);

            return $this->handleException($e);
        }
    }

    public function update(Post $blog, array $data): bool
    {
        try {
            $data['created_by'] = User::getAuthUser()->id;
            $data['tags'] = isset($data['tags']) ? json_encode($data['tags']) : null;

            if (isset($data['featured_image'])) {
                $data['featured_image'] = Helper::uploadImage($data['featured_image'], Enum::BLOG_FEATURE_IMAGE, 1000, 500);
            }

            $this->data = $blog->update($data);

            return $this->handleSuccess('Successfully updated');
        } catch (Exception $e) {
            Helper::log($e);

            return $this->handleException($e);
        }
    }
}
