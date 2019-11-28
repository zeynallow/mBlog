<?php

namespace App\Http\Controllers;

use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Illuminate\Http\Request;
use App\Page;


class PageController extends Controller
{

  /*
  * Page Show
  */
  public function show($slug){
    //Get Page
    $page = Page::where('slug',$slug)->firstOrFail();

    //Check Page Data
    if(!$page->page_data()[0]){
      abort(404);
    }

    //Meta Tags
    Meta::setTitle($page->page_data()[0]->title)
    ->setDescription(strip_tags($page->page_data()[0]->text));

    $og = new OpenGraphPackage('facebook');
    $og->setType('website')
     ->setSiteName(getSetting('site_name'))
     ->setTitle($page->page_data()[0]->title)
     ->setDescription(strip_tags($page->page_data()[0]->text))
     ->setUrl(url()->current());

    Meta::registerPackage($og);

    return view('mBlog.pages.single',compact('page'));
  }


}
