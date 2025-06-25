<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\Services\Admin\ReportService;

class ReportController extends Controller
{
    private $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    public function users(Request $request)
    {
        if ($request->ajax()) {
            $filterParams = $request->only(['type', 'status', 'fromDate', 'toDate']);

            return $this->reportService->userDataTable($filterParams);
        }

        return view('admin.pages.report.user');
    }
}
