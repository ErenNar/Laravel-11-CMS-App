<header class="site-navbar" role="banner">
    <div class="site-navbar-top">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                    <form action="" class="site-block-top-search">
                        <span class="icon icon-search2"></span>
                        <input type="text" class="form-control border-0" placeholder="Search">
                    </form>
                </div>

                <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                    <div class="site-logo">
                        <a href="/" class="js-logo-clone">{{ config('app.name') }}</a>
                    </div>
                </div>

                <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                    <div class="site-top-icons">
                        <ul>
                            <li><a href="#"><span class="icon icon-person"></span></a></li>
                            <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                            <li>
                                <a href="{{route('CartIndex')}}" class="site-cart">
                                    <span class="icon icon-shopping_cart"></span>
                                    <span class="count">{{session()->get('cart') ? count(session('cart')) : 0}}</span>
                                </a>
                            </li>
                            <li class="d-inline-block d-md-none ml-md-0">
                                <a href="" class="site-menu-toggle js-menu-toggle">
                                    <span class="icon-menu"></span>
                            </a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
            <ul class="site-menu js-clone-nav d-none d-md-block">
                <li class="has-children active">
                    <a href="{{ route('indexTemplate') }}">Home</a>
                    <!--
            <ul class="dropdown">
              <li><a href="#">Menu One</a></li>
              <li><a href="#">Menu Two</a></li>
              <li><a href="#">Menu Three</a></li>
              <li class="has-children">
                <a href="#">Sub Menu</a>
                <ul class="dropdown">
                  <li><a href="#">Menu One</a></li>
                  <li><a href="#">Menu Two</a></li>
                  <li><a href="#">Menu Three</a></li>
                </ul>
              </li>
            </ul>
        -->
                </li>
                <li class="has-children">
                    <a href="{{ route('about') }}">About</a>
                    <!--
            <ul class="dropdown">
              <li><a href="#">Menu One</a></li>
              <li><a href="#">Menu Two</a></li>
              <li><a href="#">Menu Three</a></li>
            </ul>
                         -->
                </li>
                <li class="has-children"><a href="{{ route('products') }}">Shop</a>
                    <ul class="dropdown">
                        @if (!empty($menuCategory) && $menuCategory->count() > 0)
                            @foreach ($menuCategory as $category)
                                @if ($category->child_category == 0)
                                    <li class="has-children">
                                        <a href="{{$category->slug}}">{{ $category->name }} </a>
                                        <ul class="dropdown">
                                            @foreach ($menuCategory as $subitems)
                                                @if ($subitems->child_category == $category->id)
                                                    <li><a href="{{$category->slug}}/{{$subitems->slug}}">{{ $subitems->name }}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                        @endif

                    </ul>
                </li>


                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>
    </nav>
</header>

