@extends('backend.layouts.index')
@section('contents')
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_settings-panel.html -->
        @include('backend.layouts._themeSetting')
        <!-- partial -->
        <!-- partial:../../partials/_sidebar.html -->
        @include('backend.layouts._sidebar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    @session('message')
                        <div class="col-12">
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        </div>
                    @endsession
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">


                            <div class="card-body">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-home-tab" data-toggle="tab"
                                            data-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                            aria-selected="true">Page Setting</button>
                                        <button class="nav-link" id="nav-profile-tab" data-toggle="tab"
                                            data-target="#nav-profile" type="button" role="tab"
                                            aria-controls="nav-profile" aria-selected="false">Seo Setting</button>
                                    </div>
                                </nav>
                                <form class="forms-sample" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                            aria-labelledby="nav-home-tab">
                                            <div class="row ">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputTitle">Page Title</label>
                                                        <input type="text" class="form-control" id="exampleInputTitle"
                                                            name="pageTitle" placeholder="Page Title">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputSubTitle">Page Sub Title</label>
                                                        <input type="text" class="form-control" id="exampleInputSubTitle"
                                                            name="subTitle" placeholder="Page Sub Title">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPageContent">Page Content</label>
                                                        <textarea name="PageContent" id="editor"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <input type="file" class="form-control" id="examplePageImage"
                                                            name="pageImage" placeholder="Choose File">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <label for="" class="my-1">Status</label>
                                                                <label class="switch">
                                                                    <input name="status" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <label for="" class="my-1">Is Menu</label>
                                                                <label class="switch">
                                                                    <input name="isMenu" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="form-group">
                                                        <label>Page Template</label>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                    name="template" id="default" value="default"
                                                                    checked="">
                                                                Default Page
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                    name="template" id="home" value="home"
                                                                    checked="">
                                                                Home Page
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                    name="template" id="about" value="about"
                                                                    checked="">
                                                                About Page
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                    name="template" id="product" value="product"
                                                                    checked="">
                                                                Product Page
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                    name="template" id="blog" value="blog"
                                                                    checked="">
                                                                Blog Page
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                    name="template" id="contact" value="contact"
                                                                    checked="">
                                                                Contact Page
                                                                <i class="input-helper"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <select class="form-control" name="chosePage"
                                                            id="exampleFormControlSelect1">
                                                            <option value="0">Parent Category</option>
                                                            @if (!empty($pages))
                                                                @foreach ($pages as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->subPages->PageTitle ?? ''}} {{$item->PageTitle}}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                            aria-labelledby="nav-profile-tab">
                                            <div class="form-group">
                                                <label for="metaTitle">Meta Title</label>
                                                <input type="text" class="form-control" name="metaTitle"
                                                    id="metaTitle" name="metaTitle" placeholder="Meta Title">
                                            </div>
                                            <div class="form-group">
                                                <label for="metaDescription">Meta Description</label>
                                                <input type="text" class="form-control" name="metaDescription"
                                                    id="metaDescription" placeholder="Meta Description">
                                            </div>
                                            <div class="form-group">
                                                <label for="pageSlug">Page Slug</label>
                                                <input type="text" class="form-control" name="pageSlug"
                                                    id="pageSlug" placeholder="Page Slug">
                                            </div>
                                            <div class="form-group">
                                                <label for="metaKeywords">Meta Keywords</label>
                                                <input type="text" class="form-control" name="metaKeywords"
                                                    id="metaKeywords" placeholder="Meta Keywords">
                                            </div>
                                        </div>

                                       <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        <a href="{{ route('indexPages') }}" class="btn btn-light">Turn Back</a>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            @include('backend.layouts._footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>


@endsection
