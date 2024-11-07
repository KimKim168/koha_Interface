<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Controllers\Admin\CategoryController;

use App\Models\Page;
use App\Models\Category;
use App\Models\Heading;
use App\Models\Gallery;
use App\Models\Contact;
use App\Models\Slide;
use App\Models\Video;
use App\Models\Image;
use App\Models\Audio;
use App\Models\Article;
use App\Models\news;
use App\Models\Menu;
use App\Models\WebsiteInfo;
use Image as ImageCompress;

use DB;
use Illuminate\Support\Facades\Schema;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->categoryId;
        $pageId = $request->pageId;

        $categories = Category::all();
        $pages = Page::where('parent_id',null)->where('category_id',$categoryId)->with('pages')->get();

        $categorySelected = $categoryId ? Category::findOrFail($categoryId) : Category::first();

        if($pageId){
            $page = Page::findOrFail($pageId);
        }else {
            $page = Page::where('category_id', $categoryId)->first();
        }

        return view('client.index', [

            'categories'=>$categories,
            'pages'=>$pages,
            'page' => $page,
            'categorySelected' => $categorySelected,
        ]);
    }



    public function contact()
    {
        // $contactInfo = Contact::first();

        $informations = Contact::all();

        $contactUs = Gallery::where('position', 'contact_us_banner')->first();

        return view('client.contact_us', [
            'informations'=>$informations,
            'contactUs'=>$contactUs,
        ]);
    }


    public function customer_joinded(){
        return view('client.customer_joinded');
    }

    public function news(Request $request)
    {
        $search = $request->search;

        $newsPages = News::orderBy('id', 'DESC')->when($search, function($q) use($search){
            $q->where('name', 'LIKE', '%'.$search.'%')
                ->where('description', 'LIKE', '%'.$search.'%');
        })->get();

        $ourBlogHeading = Heading::where('position', 'our_blog')->first();

        return view('client.news', compact(
            'newsPages',
            'ourBlogHeading',
        ));
    }


}