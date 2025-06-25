<?php

namespace App\Http\Controllers\Admin\Website;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Library\Services\Admin\PageService;
use App\Http\Requests\Admin\Page\PageUpdateRequest;
use App\Http\Requests\Admin\Page\PageCreateRequest;

class PagesController extends Controller
{
    use ApiResponse;

    private $page_service;

    public function __construct(PageService $page_service)
    {
        $this->page_service = $page_service;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->page_service->dataTable();
        }

        return view('admin.pages.website.page.index');
    }

    public function showCreateForm()
    {
        return view('admin.pages.website.page.create');
    }

    public function create(PageCreateRequest $request)
    {
        $result = $this->page_service->create($request->validated());

        if ($result) {
            return redirect()->route('admin.page.index')->with('success', $this->page_service->message);
        }

        return back()->withInput($request->all())->with('error', $this->page_service->message);
    }

    public function show(Page $page)
    {
        abort_unless($page, 404);

        return view('admin.pages.website.page.show', [
            'page' => $page,
        ]);
    }

    public function showUpdateForm(Page $page)
    {
        abort_unless($page, 404);

        return view('admin.pages.website.page.update', [
            'page' => $page,
        ]);
    }

    public function update(Page $page, PageUpdateRequest $request)
    {
        abort_unless($page, 404);

        $result = $this->page_service->update($page, $request->validated());

        if($result) {
            return redirect()->route('admin.page.index')->with('success', $this->page_service->message);
        }

        return back()->withInput(request()->all())->with('error', $this->page_service->message);

    }

    public function delete(Page $page)
    {
        abort_unless($page, 404);
        $page->delete();

        return redirect()->route('admin.page.index')->with('success', __('Successfully Deleted'));
    }

    public function changeStatus(Page $page)
    {
        abort_unless($page, 404);
        $page->is_active = !$page->is_active;
        $page->save();

        if ($page) {
            return back()->with('success', __('Successfully Updated'));
        } else {
            return back()->with('error', 'Unable to create now');
        }
    }

    public function changeFeatured(Page $page)
    {
        $page->is_featured = !$page->is_featured;
        $page->save();

        if ($page) {
            return back()->with('success', __('Successfully updated'));
        } else {
            return back()->with('error', 'Unable to create now');
        }
    }
}
