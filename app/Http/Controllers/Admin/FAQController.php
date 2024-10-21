<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\FAQ;
use App\Models\Admin\FAQAnswer;
use Yajra\DataTables\DataTables;

class FAQController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $faqs = FAQ::with('answers')->select('id', 'question'); 

            return DataTables::of($faqs)
                ->addColumn('answers', function ($faq) {
                    return implode(', ', $faq->answers->pluck('answer')->toArray()); 
                })
                ->addColumn('action', function ($faq) {
                    return '<a href="' . route('admin.faqs.edit', $faq->id) . '" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="' . route('admin.faqs.destroy', $faq->id) . '" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </a>';
                })
                ->make(true);
        }

        return view('admin.faq.index');
    }

    public function fontIndex()
    {
        return view('front.faqs');
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:1000',
        ]);

        $faq = FAQ::create([
            'question' => $request->question,
        ]);

        $faq->answers()->create([
            'answer' => $request->answer,
        ]);

        return redirect()->route('admin.faqs')->with('success', 'FAQ created successfully!');
    }

    public function edit($id)
    {
        $faq = FAQ::with('answers')->findOrFail($id);
        // dd($faq->answers);
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq = FAQ::findOrFail($id);

        $faq->update([
            'question' => $request->question,
        ]);

        FAQAnswer::where('faq_id', $faq->id)->update([
            'answer' => $request->answer
        ]);

        return redirect()->route('admin.faqs')->with('success', 'FAQ updated successfully.');
    }

    public function destroy($id)
    {
        $faq = FAQ::findOrFail($id);
        $faq->answers()->delete();
        $faq->delete();

        return redirect()->route('admin.faqs')->with('success', 'FAQ deleted successfully.');
    }
}
