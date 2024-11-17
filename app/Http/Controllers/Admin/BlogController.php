<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Blog;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $blogs = Blog::with('images')->select('blogs.*');

            return DataTables::of($blogs)
                ->addColumn('image', function ($blog) {
                    return $blog->images->isNotEmpty()
                        ? '<img src="' . asset('storage/' . $blog->images->first()->path) . '" alt="' . $blog->title . '" width="50">'
                        : 'No Image';
                })
                ->addColumn('action', function ($blog) {
                    return '<a href="' . route('admin.blogs.edit', $blog->id) . '" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i></a>
                            <a href="' . route('admin.blogs.destroy', $blog->id) . '" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i></a>';
                })
                ->editColumn('description', function ($blog) {
                    return Str::limit(strip_tags($blog->description), 50); // Strip HTML and limit description length
                })
                ->rawColumns(['image', 'action']) // Allow HTML in these columns
                ->make(true);
        }

        return view('admin.blogs.index');
    }


    public function fontIndex()
    {
        $blogs = Blog::with('images')->get();
        $oneBlog = Blog::with('images')->inRandomOrder()->first();
        return view('front.blogs', compact('blogs', 'oneBlog'));
    }

    public function blogDetials($slug)
    {
        $blogDetails = Blog::where('slug', $slug)->with('images')->first();
        $twoBlogs = Blog::with('images')->inRandomOrder()->take(2)->get();
        return view('front.blog-details', compact('blogDetails', 'twoBlogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content_html' => 'required|string',
        ]);

        $blog = new Blog();
        $blog->name = $request->name;
        $blog->slug = \Str::slug($request->name);
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->content_html = $request->content_html;
        $blog->author = $request->article_author;
        $blog->tagname = $request->tagename;
        $blog->save();

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
            $blog->images()->create(['path' => $imagePath]);
        }

        return redirect()->route('admin.blogs')->with('success', 'Blog created successfully.');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content_html' => 'required|string',
            'image' => 'required',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $blog = Blog::findOrFail($id);
        $blog->name = $request->input('name');
        // $blog->slug = $request->input('name');
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->content_html = $request->input('content_html');
        $blog->tagname = $request->input('tagename');
        $blog->author = $request->input('article_author');
        $blog->save();
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($blog->images->isNotEmpty()) {
                Storage::disk('public')->delete($blog->images->first()->path);
                $blog->images()->delete();
            }

            // Store the new image
            $imagePath = $request->file('image')->store('blogs', 'public');
            $blog->images()->create(['path' => $imagePath]);
        }


        return redirect()->route('admin.blogs')->with('success', 'Blog updated successfully');
    }

    public function destroy(Blog $blog, $id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->images->isNotEmpty()) {
            Storage::disk('public')->delete($blog->images->first()->path);
            $blog->images()->delete();
        }
        $blog->delete();
        return redirect()->route('admin.blogs')->with('success', 'Blog deleted successfully');
    }
}
