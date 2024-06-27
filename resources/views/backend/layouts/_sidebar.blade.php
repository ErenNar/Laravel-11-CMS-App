<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#pages" aria-expanded="false" aria-controls="pages">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('indexPages') }}">Page Settings</a>
                    </li>

                    @if (!empty($pages))
                        @foreach ($pages as $item)
                            <li class="nav-item"> <a class="nav-link"
                                    href="{{ route('editPages', $item->id) }}">{{ $item->PageTitle }}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('indexSlider') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">
                    Slider
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#products" aria-expanded="false" aria-controls="products">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="products">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('indexProducts') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('indexCatagory') }}">Categories
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <div class="nav-item">
            <a class="nav-link" href="{{ route('indexMail') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">
                    Contact Form
                </span>
            </a>
        </div>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#setting" aria-expanded="false" aria-controls="setting">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="setting">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('indexSiteSettings') }}">Site Settings</a>
                    </li>

                    <li class="nav-item"> <a class="nav-link" href="{{ route('indexUsers') }}">User Settings</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
