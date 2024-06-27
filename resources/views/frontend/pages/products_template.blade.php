@extends('frontend.layouts.index')

@section('contents')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Shop</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">

            <div class="row mb-5">
                <div class="col-md-9 order-2">

                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="float-md-left mb-4">
                                <h2 class="text-black h5">Shop All</h2>
                            </div>
                            <div class="d-flex">
                                <div class="dropdown mr-1 ml-md-auto">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                        id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Latest
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                        @if (!empty($parentCatogry) && $parentCatogry->count() > 0)
                                            @foreach ($parentCatogry as $item)
                                                @if ($item->child_category == 0)
                                                    <a class="dropdown-item"
                                                        href="{{ $item->slug }}">{{ $item->name }}</a>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                        id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">

                                        <a class="dropdown-item" href="#" data-order="a_z_order">Name, A to Z</a>
                                        <a class="dropdown-item" href="#" data-order="z_a_order">Name, Z to A</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" data-order="price_min_order">Price, low to
                                            high</a>
                                        <a class="dropdown-item" href="#" data-order="price_max_order">Price, high to
                                            low</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <!-- product start -->
                        @foreach ($allProducts as $item)
                            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                <div class="block-4 text-center border">
                                    <figure class="block-4-image">
                                        <a href="/product/{{ $item->slug }}"><img src="{{ asset('/uploads/'. $item->image) }}"
                                                alt="{{ $item->name }}" class="img-fluid"></a>
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3><a href="{{ $item->slug }}">{{ $item->name }}</a></h3>
                                        <p class="mb-0">{{ $item->short_text }}</p>
                                        <p class="text-primary font-weight-bold">${{ number_format($item->price, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <!-- product end -->
                    </div>
                    <!-- pagination start -->


                    <div class="row justify-content-center" data-aos="fade-up">

                        <div class="col-md-auto text-center">
                            {{ $allProducts->withQueryString()->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                    <!-- pagination end -->
                </div>
                <!-- filter start -->
                <div class="col-md-3 order-1 mb-5 mb-md-0">
                    <div class="border p-4 rounded mb-4">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
                        <ul class="list-unstyled mb-0">
                            @if (!empty($parentCatogry) && $parentCatogry->count() > 0)
                                @foreach ($parentCatogry as $item)
                                    @if ($item->child_category == 0)
                                        <li class="mb-1"><a href="/products/{{$item->slug}}"
                                                class="d-flex"><span>{{ $item->name }}</span> <span
                                                    class="text-black ml-auto">{{ $item->items_count }}</span></a></li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="border p-4 rounded mb-4">
                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                            <div id="slider-range" class="border-primary"></div>
                            <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white">
                        </div>

                        <div class="mb-4">

                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>
                            @if (!empty($sizeList))
                                @foreach ($sizeList as $item)
                                    <label for="{{ $item }}" class="d-flex">
                                        <input type="checkbox" id="{{ $item }}" class="mr-2 mt-1">
                                        <span class="text-black">
                                            {{ $item }}
                                        </span>
                                    </label>
                                @endforeach
                            @endif
                        </div>

                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>
                            @if (!empty($colorList))
                                @foreach ($colorList as $item)
                            <a href="{{$item}}" class="d-flex color-item align-items-center">
                                <span class="{{ $item }} color d-inline-block rounded-circle mr-2"></span> <span
                                    class="text-black">{{$item}}</span>
                            </a>
                            @endforeach
                            @endif
                        </div>

                    </div>
                </div>
                <!-- filter end -->
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="site-section site-blocks-2">
                        <div class="row justify-content-center text-center mb-5">
                            <div class="col-md-7 site-section-heading pt-4">
                                <h2>Categories</h2>
                            </div>
                        </div>
                        <div class="row">
                            <!-- catagory start -->
                            @if (!empty($parentCatogry) && $parentCatogry->count() > 0)
                                @foreach ($parentCatogry as $item)
                                    @if ($item->child_category == 0)
                                        <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade"
                                            data-aos-delay="">
                                            <a class="block-2-item" href="{{ $item->slug }}">
                                                <figure class="image">
                                                    <img src="{{ asset('/uploads/'.$item->image) }}" alt="{{ $item->name }}"
                                                        class="img-fluid">
                                                </figure>
                                                <div class="text">
                                                    <span class="text-uppercase">Collections</span>
                                                    <h3>{{ $item->name }}</h3>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            @endif


                            <!-- catagory end -->
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('customjs')
    <script>
        let minprice = {{ $minprice }}
        let maxprice = {{ $maxprice }}
    </script>
@endsection
