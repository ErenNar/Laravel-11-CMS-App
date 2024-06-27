<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Catagory;
use DashboardFileHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Catagory::with("subCatagory")->get();
        return view('backend.pages.product.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        if ($req->isMethod('get')) {
             $categories= Catagory::with("subCatagory:id,name")->get();
            return view('backend.pages.product.category.create', compact('categories'));
        }

        if ($req->isMethod('post')) {

            $image = $req->file('image');
            $name = $req->name;
            $content = $req->content;
            $child_category = $req->child_category;
            $status = $req->template;
            if (!empty($image)) {
                $uploadImage =  new  DashboardFileHelper();
                $uploadImage->UploadFile($image);
            }
            $slugControl = Str::slug($name , '-');
            Catagory::create([
                "image" => $uploadImage->fileName ?? "",
                "name" => $name ?? null,
                "slug" => $slugControl ,
                "content" => $content ?? null,
                "child_category" => $child_category ?? 0,
                "Status" => $status,
            ]);

            return  back()->with('message', 'Page Create Successfull');
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
    public function show(string $id)
    {
        $subCategories = Catagory::where('child_category', $id)->get();
        return view('backend.pages.product.category.subCategories', compact('subCategories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $req , string $id)
    {

        $categoryId = Catagory::where('id',$id)->first();
        $categories= Catagory::with("subCatagory:id,name")->get();
        return view('backend.pages.product.category.edit',compact('categoryId' ,"categories"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $image = $req->file('image');
        $name = $req->name;
        $content = $req->content;
        $child_category = $req->child_category;
        $status = $req->template;
        if (!empty($image)) {
            $uploadImage =  new  DashboardFileHelper();
            $uploadImage->UploadFile($image);
        }
        $slugControl = Str::slug($name , '-');


        Catagory::where('id',$id)->update([
            "image" => $uploadImage->fileName ?? "",
            "name" => $name ?? null,
            "slug" =>  $slugControl ,
            "content" => $content ?? null,
            "child_category" => $child_category ?? 0,
            "Status" => $status ?? 1,
        ]);

        return back()->with('message', 'Page update Successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Catagory::where('id', $id)->first();
        $category->delete();
        return back()->with('message','Category Deleted Successful');


    }
}
