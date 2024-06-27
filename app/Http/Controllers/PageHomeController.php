<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Models\Catagory;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;


class PageHomeController extends Controller
{
    public function HomePage()
    {

        $home = Page::where('SelectPage', 'home')->get();
        $slider = Slider::all();
        $menuCategory = Catagory::where('status', "0")->get();
        $parenCategory = Catagory::where('child_category', "0")->get();
        return view('frontend.pages.index_template', compact('slider', 'parenCategory', 'menuCategory'));
    }

    public function AboutPage()
    {
        $about = Page::where('SelectPage', 'about')->get();
        return view('frontend.pages.about_template', compact('about'));
    }

    public function ProductsPage(Request $req, $catagory, $slug = null)
    {

        $catagory = request()->segment(1) ?? null;

        $size = $req->size ?? null;
        $color = $req->color ?? null;
        $startPrice = $req->start_price ?? null;
        $endPrice = $req->end_price ?? null;
        $short = $req->short ?? 'asc';
        $order = $req->order ?? 'id';

        $allProducts = Product::where('status', "1")->select(['id', 'image', 'name', 'slug', 'size', 'color', 'price', 'category_id'])->where(function ($query) use ($size, $color) {
            if (!empty($size)) {
                $query->where('size', $size);
            }
            if (!empty($color)) {
                $query->where('color', $color);
            }
            if (!empty($startPrice) and !empty($endPrice)) {
                $query->whereBetween('price', [$startPrice, $endPrice]);
            }
            return $query;
        })->with('category:id,name,slug')->whereHas('category', function ($q) use ($slug) {
            if (!empty($slug)) {
                $q->where('slug', $slug);
            }
            return $q;
        });

        $parentCatogry = Catagory::where('status', 1)->where("child_category", "0")->withCount("items")->get();
        $minprice = $allProducts->min('price');
        $maxprice = $allProducts->max('price');
        $sizeList = Product::where('status', "0")->groupBy('size')->pluck('size')->toArray();
        $colorList = Product::where('status', "0")->groupBy('color')->pluck('color')->toArray();
        $allProducts =  $allProducts->orderBy($order, $short)->paginate(10)->withQueryString();

        return view('frontend.pages.products_template', compact('allProducts', 'parentCatogry', 'minprice', 'maxprice', 'sizeList', 'colorList'));
    }

    public function SingleProductsPage($slug)
    {
        $sizeList = Product::where('status', "0")->groupBy('size')->pluck('size')->toArray();
        $productDetail = Product::whereSlug($slug)->firstOrFail();
        $id = $productDetail->category_id;
        $sameCatagory = Product::where('category_id', '=!', $id)
            ->where('status', 1)
            ->orderBy("id", "asc")
            ->limit(10)
            ->get();
        return view('frontend.pages.product_single_template', compact('productDetail', 'sameCatagory', 'sizeList'));
    }
    public function ContactPage()
    {
        return view('frontend.pages.contact_template');
    }
    public function ContactMailPost(ContactFormRequest $req)
    {

        $validated = $req->validated();
        $newRecord = [
            'c_fname' => $req->c_fname,
            'c_lname' => $req->c_lname,
            'c_email' => $req->c_email,
            'c_subject' => $req->c_subject,
            'c_message' => $req->c_message,
            'status' => "0",
            'ip' => request()->ip()
        ];
        $record = Contact::create($newRecord);
        if ($record) {
            return back()->with('message-success', 'Message Has Been Successfull');
        }
    }

    public function CartIndexPage()
    {
        $cart = session('cart', []);
        $totalPrice = 0;

        foreach ($cart as $key) {
            $totalPrice  += $key["price"] * $key["quantity"];
        }
        return view('frontend.pages.cart_template', compact('cart', 'totalPrice'));
    }
    public function CartAdd(Request  $req)
    {
        $id = $req->id;
        $quantity = $req->quantity ?? 1;
        $findProduct = Product::where('id', $id)->first();
        if ($quantity > $findProduct->quantity) {
            return back()->with('message', 'The product could not be added to the cart because it is out of stock.');
        } else {
            $cart = session('cart', []);
            if (array_key_exists($id, $cart)) {
                $cart[$id] +=  $quantity;
            } else {
                $cart[$id] = [
                    'id' => $findProduct["id"],
                    'image' => $findProduct["image"],
                    'name' => $findProduct["name"],
                    'price' => $findProduct["price"],
                    'quantity' => $findProduct["quantity"],
                    'size' => $findProduct["size"],
                    'slug' => $findProduct["slug"]
                ];
            };
            session(['cart' => $cart]);
            return back()->with('message', 'The product has been successfully added to the cart.');
        }
    }


    public function CartRemove(Request  $req)
    {

        $id = $req->id;
        $cart = session('cart', []);
        if (array_key_exists($id, $cart)) {
            unset($cart[$id]);
        }
        session(['cart' => $cart]);
        return back()->with('message', 'The product has been successfully deleted from the cart.');
    }
    public function CartUpdate(Request $req)
    {
        $findProduct = Product::where('id', $req->id)->get();

        return $req;
    }
}
