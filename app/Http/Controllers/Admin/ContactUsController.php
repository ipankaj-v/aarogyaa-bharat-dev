<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Page;
use App\Models\Admin\Cms;

class ContactUsController extends Controller
{
    public function index() {
        return view('admin.contact.index');
    }

    public function frontIndex(Request $request) {

        $lastSegment = basename(parse_url($request->url(), PHP_URL_PATH));
        $contactPageData = Page::where('slug', $lastSegment)->with('cms.images')->first();
        $seoMetaTag = $contactPageData->seo_meta_tag;
        $seoMetaTagTitle = $contactPageData->seo_meta_tag_title;
        $pageTitle = $contactPageData->page_title;
        return view('front.contact' , compact('seoMetaTag', 'seoMetaTagTitle', 'contactPageData' , 'pageTitle'));
    }
}
