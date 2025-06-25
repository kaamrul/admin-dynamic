<?php

namespace App\Library\Services\Admin;

use App\Models\Van;
use App\Models\User;
use App\Library\Enum;
use App\Models\Booking;
use App\Models\Purchase;
use Yajra\DataTables\Facades\DataTables;

class ReportService extends BaseService
{
    public function userDataTable($params)
    {
        $query = User::with('member', 'employee', 'operator')
            ->whereNotIn('user_type', [Enum::USER_TYPE_SUPER_ADMIN, Enum::USER_TYPE_ADMIN]);

        if (isset($params['type']) && count($params['type'])) {
            $query->whereIn('user_type', $params['type']);
        }

        if (isset($params['status']) && count($params['status'])) {
            if (count($params['status']) == 1 && in_array(5, $params['status'])) {
                $query->onlyTrashed();
            } elseif (in_array(5, $params['status'])) {
                $query->withTrashed();
                $query->WhereIn('status', $params['status']);
                $query->orWhereNotNull('deleted_at');
            } else {
                $query->whereIn('status', $params['status']);
            }
        }

        if (!isset($params['status'])) {
            $query->withTrashed();
        }

        if (isset($params['fromDate'], $params['toDate']) && $params['fromDate'] && $params['toDate']) {

            $query->whereBetween('created_at', [$params['fromDate'], $params['toDate']]);
        }

        $data = $query;

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('user_name', function ($row) {
                return $row->user_name ?? 'N/A';
            })
            ->addColumn('name', function ($row) {
                return $row->full_name;
            })
            ->addColumn('client_id', function ($row) {

                return $row?->client?->user?->full_name;
            })
            ->addColumn('ethnicity', function ($row) {
                return $row->ethnicity ?? 'N/A';
            })
            ->addColumn('job_title', function ($row) {

                if ($row->isEmployee()) {
                    return $row?->employee?->job_title;
                } else {
                    return $row?->member?->job_title;
                }
            })
            ->addColumn('employment_type', function ($row) {

                if ($row->isEmployee()) {
                    return $row?->employee?->employment_type ?? 'N/A';
                } else {
                    return $row?->member?->employment_type ?? 'N/A';
                }
            })
            ->addColumn('user_type', function ($row) {

                if ($row->isEmployee()) {
                    return Enum::getUserType(Enum::USER_TYPE_EMPLOYEE);
                } else {
                    return Enum::getUserType(Enum::USER_TYPE_CUSTOMER);
                }
            })
            ->addColumn('entitlement_to_work', function ($row) {

                return $row->isEmployee() ? $row->employee?->entitlement_to_work ?? 'N/A' : 'N/A';
            })
            ->addColumn('employee_id', function ($row) {

                return $row->isEmployee() ? $row->employee->id ?? 'N/A' : 'N/A';
            })
            ->addColumn('client_id', function ($row) {

                return $row->isMember() ? $row->member->id ?? 'N/A' : 'N/A';
            })
            ->addColumn('dob', function ($row) {

                return getFormattedDate($row->dob);
            })
            ->addColumn('operator', function ($row) {

                return $row?->operator?->full_name;
            })
            ->editColumn('status', function ($row) {

                return $this->statusHtml($row);
            })
            ->rawColumns(['status'])
            ->make(true);
    }

    private function statusHtml($row)
    {
        $class = [
            Enum::USER_STATUS_PENDING   => 'badge-warning',
            Enum::USER_STATUS_ACTIVE    => 'badge-success',
            Enum::USER_STATUS_SUSPENDED => 'badge-danger',
        ];

        if($row->deleted_at != null) {
            return '<div class="text-capitalize badge badge-danger"> Delete </div>';
        } else {
            return '<div class="text-capitalize badge ' . $class[$row->status] . '">' . Enum::getUserStatus($row->status) . '</div>';
        }
    }
}
