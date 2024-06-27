@extends('frontend.layouts.index')

@section('contents')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">{{ $productDetail->name }}</strong></div>
            </div>
        </div>
    </div>

    <div class="conatiner">
        <div class="row justify-content-center">

            @session('message')
                <div class="col-6">
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                </div>
            @endsession


        </div>
    </div>


    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('/uploads/'. $productDetail->image) }}" alt="{{ $productDetail->name }}" class="img-fluid">
                </div>

                <div class="col-md-6">
                    <form action="{{ route('cartAdd') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{ $productDetail->id }}">
                        <h2 class="text-black">{{ $productDetail->name }}</h2>
                        <p>{{ $productDetail->content }}</p>
                        <p><strong class="text-primary h4">${{ number_format($productDetail->price, 2) }}</strong></p>

                        <div class="mb-1 d-flex">
                            @foreach ($sizeList as $item)
                                <label class="d-flex mr-3 mb-3">
                                    <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input
                                            type="radio" id="size" name="size"
                                            value="{{ $item }}"></span> <span
                                        class="d-inline-block text-black">{{ $item }}</span>
                                </label>
                            @endforeach
                        </div>
                        <div class="mb-5">
                            <div class="input-group mb-3" style="max-width: 120px;">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                </div>
                                <input type="text" class="form-control text-center quantity" name="quantity"
                                    id="quantity" value="1" placeholder="" aria-label="Example text with button addon"
                                    aria-describedby="button-addon1">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="buy-now btn btn-sm btn-primary">Add To Cart</button>


                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Featured Products</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="nonloop-block-3 owl-carousel">
                        @foreach ($sameCatagory as $item)
                            <div class="item">
                                <div class="block-4 text-center">
                                    <figure class="block-4-image">
                                        <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="img-fluid">
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3><a href="#">{{ $item->name }}</a></h3>
                                        <p class="mb-0">{{ $item->short_text }}</p>
                                        <p class="text-primary font-weight-bold">${{ number_format($item->price) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
