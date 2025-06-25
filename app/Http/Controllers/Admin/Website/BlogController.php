<?php

namespace App\Http\Controllers\Admin\Website;

use App\Models\Post;
use App\Library\Enum;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Library\Services\Admin\BlogService;
use App\Http\Requests\Admin\Blog\CreateRequest;
use App\Http\Requests\Admin\Blog\UpdateRequest;

class BlogController extends Controller
{
    use ApiResponse;

    private $blog_service;

    public function __construct(BlogService $blog_service)
    {
        $this->blog_service = $blog_service;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->blog_service->dataTable($request->only(['status', 'is_deleted']), Enum::POST_TYPE_BLOG);
        }

        return view('admin.pages.website.blog.index');
    }

    public function showCreateForm()
    {
        return view('admin.pages.website.blog.create', [
            'categories' => getDropdown(Enum::CONFIG_DROPDOWN_BLOG_CATEGORY),
            'tags'       => getDropdown(Enum::CONFIG_DROPDOWN_BLOG_TAG),
        ]);
    }

    public function create(CreateRequest $request)
    {
        $result = $this->blog_service->create($request->validated());

        if ($result) {
            return redirect()->route('admin.blog.index')->with('success', $this->blog_service->message);
        }

        return back()->withInput($request->all())->with('error', $this->blog_service->message);
    }

    public function show(Post $blog)
    {
        abort_unless($blog, 404);

        return view('admin.pages.website.blog.show', [
            'blog' => $blog,
        ]);
    }

    public function showUpdateForm(Post $blog)
    {
        abort_unless($blog, 404);

        return view('admin.pages.website.blog.update', [
            'blog'       => $blog,
            'categories' => getDropdown(Enum::CONFIG_DROPDOWN_BLOG_CATEGORY),
            'tags'       => getDropdown(Enum::CONFIG_DROPDOWN_BLOG_TAG),
        ]);
    }

    public function update(Post $blog, UpdateRequest $request)
    {
        abort_unless($blog, 404);

        $result = $this->blog_service->update($blog, $request->validated());

        if($result) {
            return redirect()->route('admin.blog.index')->with('success', $this->blog_service->message);
        }

        return back()->withInput(request()->all())->with('error', $this->blog_service->message);

    }

    public function delete(Post $blog)
    {
        abort_unless($blog, 404);
        $blog->delete();

        return redirect()->route('admin.blog.index')->with('success', __('Successfully Deleted'));
    }

    public function changeStatus(Post $blog)
    {
        abort_unless($blog, 404);
        $blog->is_active = !$blog->is_active;
        $blog->save();

        if ($blog) {
            return back()->with('success', __('Successfully updated'));
        } else {
            return back()->with('error', 'Unable to create now');
        }
    }

    public function changeFeatured(Post $blog)
    {
        $blog->is_featured = !$blog->is_featured;
        $blog->save();

        if ($blog) {
            return back()->with('success', __('Successfully updated'));
        } else {
            return back()->with('error', 'Unable to create now');
        }
    }
}
