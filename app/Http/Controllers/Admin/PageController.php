<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Page;
use Yajra\DataTables\DataTables;

class PageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $pages = Page::query();

            return DataTables::of($pages)
                ->addColumn('action', function ($page) {
                    return '<a href="' . route('admin.page.edit', $page->id) . '" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="' . route('admin.page.destroy', $page->id) . '" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>';
                })
                ->editColumn('status', function ($page) {
                    return $page->status ? 'Active' : 'Inactive';
                })
                ->make(true);
        }

        return view('admin.page.index');
    }


    public function create()
    {
        return view('admin.page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:pages|max:255',
            'status' => 'nullable|boolean',
        ]);

        // Create a new page
        Page::create([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
            'status' => $request->status,
        ]);

        return redirect()->route('admin.pages')->with('success', 'Page created successfully.');
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.page.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        $page = Page::findOrFail($id);
        $page->update([
            'name' => $request->name,
            'status' => $request->status ?? true,
        ]);

        return redirect()->route('admin.pages')->with('success', 'Page updated successfully.');
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect()->route('admin.pages')->with('success', 'Page deleted successfully.');
    }
}
