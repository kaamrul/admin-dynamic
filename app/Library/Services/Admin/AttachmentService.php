<?php

namespace App\Library\Services\Admin;

use Exception;
use App\Library\Enum;
use App\Library\Helper;
use App\Models\User;
use App\Models\Attachment;
use Yajra\DataTables\Facades\DataTables;

class AttachmentService extends BaseService
{
    private function actionHtml($row)
    {
        $actionHtml = '';

        if ($row->id) {
            $actionHtml = '
            <a class="dropdown-item" href="' . route('admin.employee.attachment.edit', $row->id) . '" ><i class="far fa-edit"></i> Edit</a>
            <a class="dropdown-item text-danger" href="javascript:void(0)" onclick="confirmFormModal(\'' . route('admin.employee.attachment.delete', $row->id) . '\', \'Confirmation\', \'Are you sure you want to delete this record?\')" ><i class="fas fa-trash-alt"></i> Delete</a>';
        } else {
            $actionHtml = '';
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

    private function actionHtmlForEmployee($row)
    {
        $actionHtml = '';

        if ($row->id) {
            $actionHtml = '
            <a class="dropdown-item" href="' . route('employee.attachment.edit', $row->id) . '" ><i class="far fa-edit"></i> Edit</a>
            <a class="dropdown-item text-danger" href="javascript:void(0)" onclick="confirmFormModal(\'' . route('employee.attachment.delete', $row->id) . '\', \'Confirmation\', \'Are you sure you want to delete this record?\')" ><i class="fas fa-trash-alt"></i> Delete</a>';
        } else {
            $actionHtml = '';
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

    public function dataTable(User $user)
    {
        $data = $user->attachments;

        return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('name', function ($row) {
                    return $row->name;
                })
                ->editColumn('attachment', function ($row) {
                    return '<a target="_blank" href="' . $row->getAttachment() . '">View</a>';
                })
                ->editColumn('operator_id', function ($row) {
                    return $row?->operator?->full_name;
                })
                ->addColumn('action', function ($row) {
                    return $this->actionHtml($row);
                })
                ->rawColumns(['action', 'attachment'])
                ->make(true);
    }

    public function dataTableForEmployee(User $user)
    {
        $data = $user->attachments;

        return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('name', function ($row) {
                    return $row->name;
                })
                ->editColumn('attachment', function ($row) {
                    return '<a target="_blank" href="' . $row->getAttachment() . '">View</a>';
                })
                ->editColumn('operator_id', function ($row) {
                    return $row?->operator?->full_name;
                })
                ->addColumn('action', function ($row) {
                    return $this->actionHtmlForEmployee($row);
                })
                ->rawColumns(['action', 'attachment'])
                ->make(true);
    }

    public function store(array $data, User $user): bool
    {
        try {
            $mimeType = $data['attachment']->getClientOriginalExtension();
            $data['operator_id'] = auth()->id();

            if (isset($data['attachment'])) {
                $data['attachment'] = $this->getAttachment($data['attachment']);
            }

            $attachment = new Attachment();
            $attachment->name = $data['name'];
            $attachment->mime_type = $mimeType;
            $attachment->attachment = $data['attachment'];
            $attachment->operator_id = auth()->id();

            $this->data = $user->attachments()->save($attachment);

            return $this->handleSuccess('Successfully created');
        } catch (Exception $e) {
            Helper::log($e);

            return $this->handleException($e);
        }
    }

    public function update(array $data, $attachment): bool
    {
        try {
            $data['operator_id'] = auth()->id();

            if (isset($data['attachment'])) {
                deleteFile($attachment->attachment);
                $data['attachment'] = $this->getAttachment($data['attachment']);
            }

            $this->data = $attachment->update($data);

            return $this->handleSuccess('Successfully updated');
        } catch (Exception $e) {
            Helper::log($e);

            return $this->handleException($e);
        }
    }

    public static function getAttachment($attachment): string
    {
        $file_extension = $attachment->getClientOriginalExtension();

        if ($file_extension == 'pdf') {
            return Helper::uploadFile($attachment, Enum::ATTACHMENT_FILE_DIR);
        }

        return Helper::uploadImage($attachment, Enum::ATTACHMENT_FILE_DIR);
    }
}
