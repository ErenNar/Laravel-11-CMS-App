<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Slider;

use DashboardFileHelper;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = Slider::all();
        return  view('backend.pages.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        if ($req->isMethod('get')) {

            return view('backend.pages.slider.create');
        }
        if ($req->isMethod('post')) {
            $image =  $req->file('image');
            $uploadImage =  new  DashboardFileHelper();
            $uploadImage->UploadFile($image);
            $name =   $req->name;
            $content =  $req->content;
            $link =  $req->link;
            Slider::create([
                "image" => $uploadImage->fileName,
                "name" => $name ?? null,
                "content" => $content ?? null,
                "link" => $link ?? null
            ]);

            return  back()->with('message', 'Create Successfull');
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

        $sliderItem = Slider::where('id', $id)->get();
        return  view('backend.pages.slider.edit', compact('sliderItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $req, string $id)
    {

        $defaultImage = Slider::where('id', $id)->first();
        if ($req->file('image') != null) {
            $image =  $req->file('image');
            $uploadImage =  new  DashboardFileHelper();
            $uploadImage->UploadFile($image);
        }
        $name =   $req->name;
        $content =  $req->content;
        $link =  $req->link;
        Slider::where('id', $id)->update([
            "image" => $fileName ?? $defaultImage["image"],
            "name" => $name ?? null,
            "content" => $content ?? null,
            "link" => $link ?? null
        ]);

        return back()->with('message', 'Updated Successfull');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $sliderItem = Slider::where('id', $id)->firstOrFail();
        $deleteImage =  new  DashboardFileHelper();
        $deleteImage->DeleteFile($sliderItem);
        $sliderItem->delete();
        return  redirect(route('indexPages'))->with('message', 'Deleted Successfull');;
    }
}
