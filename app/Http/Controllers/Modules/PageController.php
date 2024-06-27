<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Page;
use DashboardFileHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::where('SubId', "0")->get();
        return view('backend.pages.views.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        if ($req->isMethod('get')) {
            $pages = Page::with('subPages:id,PageTitle')->get();
            return view('backend.pages.views.create', compact('pages'));
        }
        if ($req->isMethod('post')) {

            $pageTitle = $req->pageTitle;
            $subTitle = $req->subTitle;
            $pageContent = $req->pageContent;
            $status = $req->status == 'on' ? "1" : "0";
            $isMenu = $req->isMenu == 'on' ? "1" : "0";
            $template = $req->template;
            $chosePage = $req->chosePage;
            $metaTitle = $req->metaTitle;
            $metaDescription = $req->metaDescription;
            $metaKeywords = $req->metaKeywords;
            $pageImage = $req->file('pageImage');
            if (!empty($pageImage)) {
                $uploadImage =  new  DashboardFileHelper();
                $uploadImage->UploadFile($pageImage);

            }
            $slugControl = Str::slug($pageTitle , '-');
            Page::create([
                "SubId" => $chosePage ?? 0,
                "PageTitle" => $pageTitle ,
                "PageSubTitle" => $subTitle ?? "",
                "PageContent" => $pageContent ?? null,
                "PageImage" => $uploadImage->fileName ?? null,
                "Status" => $status ?? "0",
                "IsMenu" => $isMenu ?? "0",
                "SelectPage" => $template ?? "default",
                "MetaTitle" => $metaTitle ?? $pageTitle ,
                "Slug" => '/'.$slugControl,
                "MetaDescription" => $metaDescription ?? $pageTitle,
                "MetaKeywords" => $metaKeywords ?? null
            ]);
            return back()->with('message', 'Page Create Successfull');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $req, string $id)
    {
        $pages = Page::where('SubId', $id)->get();
        return view('backend.pages.views.subPages', compact('pages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $req, string $id)
    {
        $pageItem = Page::where('id', $id)->first();
        $pages = Page::all();
        return  view('backend.pages.views.edit', compact('pageItem', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {



        $pageTitle = $req->pageTitle;
        $subTitle = $req->subTitle;
        $pageContent = $req->pageContent;
        $status = $req->status == 'on' ? "1" : "0";
        $isMenu = $req->isMenu == 'on' ? "1" : "0";
        $template = $req->template;
        $chosePage = $req->chosePage;
        $metaTitle = $req->metaTitle;
        $metaDescription = $req->metaDescription;
        $metaKeywords = $req->metaKeywords;
        $pageImage = $req->file('pageImage');

        $uploadImage =  new  DashboardFileHelper();
        $uploadImage->UploadFile($pageImage);

        $slugControl = Str::slug($pageTitle , '-');
        Page::where('id', $id)->update([
            "SubId" => $chosePage ?? 0,
            "PageTitle" => $pageTitle ?? 'undefiend',
            "PageSubTitle" => $subTitle ?? "",
            "PageContent" => $pageContent ?? null,
            "PageImage" => $uploadImage->fileName ?? null,
            "Status" => $status ?? "0",
            "IsMenu" => $isMenu ?? "0",
            "SelectPage" => $template ?? 'default',
            "MetaTitle" => $metaTitle ?? null,
            "Slug" => '/'.$slugControl,
            "MetaDescription" => $metaDescription ?? null,
            "MetaKeywords" => $metaKeywords ?? null
        ]);
        return back()->with('message', 'Page Update Successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $pageId = Page::where('id', $id)->firstOrFail();
        $subId = $pageId->id;
        $subPage = Page::where('SubId', $subId)->first();
        $deleteImage =  new  DashboardFileHelper();
        $deleteImage->DeleteFile($pageId);
        //$deleteImage->DeleteFile($subPage);
        if (!empty($subPage)) {
            $subPage->delete();
            # code...
        }
        $pageId->delete();
        return back()->with('message', 'Page Delete Successfull');
    }
}
