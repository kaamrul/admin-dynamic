<?php

namespace App\Http\Controllers\Admin\Support;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Http\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Library\Services\Admin\Support\ContactUsService;

class ContactUsController extends Controller
{
    use ApiResponse;
    private $contact_us_service;

    public function __construct(ContactUsService $contact_us_service)
    {
        $this->contact_us_service = $contact_us_service;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->contact_us_service->dataTable();
        }

        return view('admin.pages.support.contact_us.index');
    }

    public function destroy(ContactMessage $contact_message, Request $request)
    {
        $page = $request->input('page', 1);

        abort_unless($contact_message, 404);

        if ($contact_message->delete()) {
            return redirect()->route('admin.support.contact_us.index', ['page' => $page])->with('success', 'Deleted Successfully');
        }

        return redirect()->route('admin.support.contact_us.index', ['page' => $page])->with('error', 'Unable to delete now');
    }

    public function changeRepliedStatus(Request $request, ContactMessage $contact_message)
    {
        $page = $request->input('page', 1);

        abort_unless($contact_message, 404);
        $result = $this->contact_us_service->changeStatus($contact_message);

        if ($result) {
            return redirect()->route('admin.support.contact_us.index', ['page' => $page])->with('success', $this->contact_us_service->message);
        }

        return back()->withInput($request->all())->with('error', $this->contact_us_service->message);
    }

    public function getMessage(ContactMessage $contact_message)
    {
        return $contact_message;
    }

}
