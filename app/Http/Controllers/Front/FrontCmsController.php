<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Page;
use App\Models\Admin\Cms;

class FrontCmsController extends Controller
{
    public function AboutUs(Request $request)
    {
        $lastSegment = basename(parse_url($request->url(), PHP_URL_PATH));
        $page = Page::where('slug', $lastSegment)->with('cms.images')->first();
        if (!$page || !$page->cms) {
            abort(404); // or redirect or show a custom message
        }
        $seoMetaTag = $page->seo_meta_tag;
        $seoMetaTagTitle = $page->seo_meta_tag_title;
        $pageTitle = $page->page_title;
        return view('front.about-us', compact('page', 'seoMetaTag','seoMetaTagTitle' , 'pageTitle'));
    }

    public function TermsAndConditions(Request $request)
    {
        $lastSegment = basename(parse_url($request->url(), PHP_URL_PATH));
        $page = Page::where('slug', $lastSegment)->with('cms.images')->first();
        $seoMetaTag = $page->seo_meta_tag;
        $seoMetaTagTitle = $page->seo_meta_tag_title;
        $pageTitle = $page->page_title;
        if (!$page || !$page->cms) {
            abort(404); // or redirect or show a custom message
        }
        return view('front.terms-conditions', compact('page','seoMetaTag', 'seoMetaTagTitle'));
    }

}
