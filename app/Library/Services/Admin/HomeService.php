<?php

namespace App\Library\Services\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Library\Enum;
use App\Models\Ticket;
use App\Models\CatchCard;
use Illuminate\Support\Facades\DB;

class HomeService extends BaseService
{
    public function index($request)
    {
        if (isset($request->last_month)) {
            $from = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();
            $to = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        } elseif ($request->from && $request->to) {
            $from = $request->from;
            $to = $request->to;
        } else {
            $from = Carbon::parse(config('app.system_launch_date'))->format("Y-m-d");
            $to = Carbon::parse()->addDays(1)->format("Y-m-d");
        }

        // $ticket = Ticket::getTicketCounts('', $from, $to);

        // ------------------------------ User Ethnicity Chart ------------------------------------
        $emp_ethnicity = [];
        $mem_ethnicity = [];
        $userEthnicity = $this->getUserEthnicity($emp_ethnicity, $mem_ethnicity);
        $getPaidOrDue = [];
        $paidOrDueFiltered = array_filter($getPaidOrDue);

        $getMemberVsTournament = [
            'Active Membership'        => [],
        ];

        $memberVsTournamentFiltered = array_filter($getMemberVsTournament);

        // $data = [
        //     'employee'                   => $this->getTotalEmployeeByStatus($from, $to),
        //     'member'                     => $this->getTotalUserByStatus(Enum::USER_TYPE_CUSTOMER, $from, $to),
        //     'ticket'                     => $ticket,
        //     'totalTicket'                => array_sum($ticket),
        //     'getMembershipType'          => Member::getMembershipTypeCount($from, $to),
        //     'tournaments'                => Tournament::getTournamentCount($from, $to),
        //     'memberships'                => $getPaidOrDue,
        //     'paidOrDueFiltered'          => $paidOrDueFiltered,
        //     'getMemberVsTournament'      => $getMemberVsTournament,
        //     'memberVsTournamentFiltered' => $memberVsTournamentFiltered,
        //     'individualLeadership'       => $this->individualLeadership(),
        //     'tournamentLeadership'       => $this->tournamentLeadership(),
        //     'ethnicity'                  => $mem_ethnicity,
        //     'getBoats'                   => $getBoats,
        //     'boatsFiltered'              => $boatsFiltered,
        //     'totalMember'                => User::where(['user_type' => Enum::USER_TYPE_CUSTOMER, 'status'                => Enum::USER_STATUS_ACTIVE])->whereBetween('created_at', [$from, $to])->count(),
        //     'date_range'                 => $request->from && $request->to ? Helper::dateRange($request->from, $request->to) : null,
        // ];

        $data = [
            'employee'                   => [],
            'member'                     => [],
            'ticket'                     => [],
            'totalTicket'                => [],
            'getMembershipType'          => [],
            'tournaments'                => [],
            'memberships'                => [],
            'paidOrDueFiltered'          => [],
            'getMemberVsTournament'      => [],
            'memberVsTournamentFiltered' => [],
            'individualLeadership'       => [],
            'tournamentLeadership'       => [],
            'ethnicity'                  => [],
            'getBoats'                   => [],
            'boatsFiltered'              => [],
            'totalMember'                => [],
            'date_range'                 => [],
        ];

        return $data;
    }

    private function getUserEthnicity($emp_ethnicity, $mem_ethnicity)
    {
        return [];

        foreach ($emp_ethnicity as $key => $value) {
            if (array_key_exists($key, $mem_ethnicity)) {
                $mem_ethnicity[$key] += $value;
            } else {
                $mem_ethnicity[$key] = $value;
            }
        }

        return $mem_ethnicity;
    }

    private function getTotalEmployeeByStatus($from, $to)
    {
        return User::select('status', DB::raw('count(*) as total'))
            ->whereNot('id', 1)
            ->whereIn('user_type', [Enum::USER_TYPE_TEACHER, Enum::USER_TYPE_ADMIN])
            ->whereBetween('created_at', [$from, $to])
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();
    }

    private function getTotalUserByStatus($type = '', $from, $to)
    {
        return User::select('status', DB::raw('count(*) as total'))
            ->where('user_type', $type)
            ->whereBetween('created_at', [$from, $to])
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();
    }
}
