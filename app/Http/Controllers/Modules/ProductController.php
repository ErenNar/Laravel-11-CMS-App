<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Catagory;
use App\Models\Product;
use DashboardFileHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::with("category")->get();
        return view('backend.pages.product.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        if ($req->isMethod('get')) {

            $categories = Catagory::with("subCatagory:id,name")->get();
            return view('backend.pages.product.products.create', compact('categories'));
        }
        if ($req->isMethod('post')) {
            $name  = $req->name;
            $image = $req->file('image');
            $short_text = $req->short_text;
            $content = $req->content;
            $status = $req->status == 'on' ? "1" : "0";
            $quantity = $req->quantity;
            $price = $req->price;
            $size = $req->size;
            $color = $req->color;
            $category_id = $req->category_id;


            if ($req->file('image') != null) {
                $uploadImage =  new  DashboardFileHelper();
                $uploadImage->UploadFile($image);
            };
            $slugControl = Str::slug($name , '-');
            Product::create([
                'name' =>  $name,
                'image' => $uploadImage->fileName ?? null,
                'category_id' =>  $category_id ?? 0,
                'short_text' => $short_text ?? null,
                'price'  => $price ?? null,
                'size' => $size ?? 'small',
                'color' => $color ?? 'black',
                'quantity' => $quantity ?? 1,
                'status' => $status ?? "1",
                "slug" => '/'.$slugControl,
                'content' => $content ?? null,
            ]);

            return back()->with('message', 'Product Create Successfull');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $productID = Product::where('id',$id)->first();
        $categories = Catagory::with("subCatagory:id,name")->get();
        return  view('backend.pages.product.products.edit', compact('productID', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {

        $name  = $req->name;
        $short_text = $req->short_text;
        $content = $req->content;
        $image = $req->file('image');
        $status = $req->status == 'on' ? "1" : "0";
        $quantity = $req->quantity;
        $price = $req->price;
        $size = $req->size;
        $color = $req->color;
        $category_id = $req->category_id;
        $slugControl = Str::slug($name , '-');


        if ($req->file('image') != null) {
            $uploadImage =  new  DashboardFileHelper();
            $uploadImage->UploadFile($image);
        };

        Product::where('id', $id)->update([
            'name' =>  $name,
            'image' => $uploadImage->fileName ?? null,
            'category_id' =>  $category_id ?? 0,
            'short_text' => $short_text ?? null,
            'price'  => $price ?? null,
            'size' => $size ?? 'small',
            'color' => $color ?? 'black',
            'quantity' => $quantity ?? 0,
            'status' => $status ?? "0",
            "slug" => '/'.$slugControl,
            'content' => $content ?? null,
        ]);

        return back()->with('message', 'Page Update Successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productID = Product::where('id', $id)->firstOrFail();
        //$deleteImage =  new  DashboardFileHelper();
        //$deleteImage->DeleteFile($pageId);
        //$deleteImage->DeleteFile($subPage);
        /*
        if (!empty($subPage)) {
            $subPage->delete();
            # code...
        }
        */
        $productID->delete();
        return back()->with('message', 'Page Delete Successfull');
    }
}
