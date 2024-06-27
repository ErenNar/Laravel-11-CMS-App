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
                                            aria-selected="true">Category Setting</button>
                                        <button class="nav-link" id="nav-profile-tab" data-toggle="tab"
                                            data-target="#nav-profile" type="button" role="tab"
                                            aria-controls="nav-profile" aria-selected="false">Seo Setting</button>
                                    </div>
                                </nav>
                                <form class="forms-sample" action="{{ route('updateCategories', $categoryId->id) }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                            aria-labelledby="nav-home-tab">
                                            <div class="row ">
                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="exampleInputTitle">Category Name</label>
                                                        <input type="text" class="form-control" id="exampleInputTitle"
                                                            name="name" value="{{ $categoryId->name ?? null }}"
                                                            placeholder="Category Name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPageContent">Category Content</label>
                                                        <input type="text" class="form-control"
                                                            id="exampleInputPageContent" name="content"
                                                            value="{{ $categoryId->content ?? null }}"
                                                            placeholder="Category Content">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <input type="file" class="form-control" id="examplePageImage"
                                                            name="image" placeholder="Choose File">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <label for="" class="my-1">Status</label>
                                                                <label class="switch">
                                                                    <input name="status" type="checkbox"
                                                                        value="{{ $categoryId->status ?? 1 }}">
                                                                    <span class="slider round"></span>
                                                                </label>
                                                            </div>

                                                        </div>


                                                    </div>

                                                    <div class="form-group">
                                                        <select class="form-control" name="child_category"
                                                            id="exampleFormControlSelect1">
                                                            <option value="0">Paren Page</option>
                                                            @if (!empty($categories))
                                                                @foreach ($categories as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->subCatagory->name ?? '' }}
                                                                        {{ $item->name }}
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
                                            <!--
                                                    <div class="form-group">
                                                        <label for="metaTitle">Meta Title</label>
                                                        <input type="text" class="form-control" name="metaTitle"
                                                            id="metaTitle" name="pageContent" placeholder="Meta Title">
                                                    </div>
                                                -->
                                            <!--
                                                    <div class="form-group">
                                                        <label for="metaDescription">Meta Description</label>
                                                        <input type="text" class="form-control" name="metaDescription"
                                                            id="metaDescription" placeholder="Meta Description">
                                                    </div>
                                                -->
                                            <div class="form-group">
                                                <label for="pageSlug">Page Slug</label>
                                                <input type="text" class="form-control" name="pageSlug"
                                                    value="{{ $categoryId->slug ?? null }}" id="pageSlug"
                                                    placeholder="Page Slug">
                                            </div>
                                            <!--
                                                    <div class="form-group">
                                                        <label for="metaKeywords">Meta Keywords</label>
                                                        <input type="text" class="form-control" name="metaKeywords"
                                                            id="metaKeywords" placeholder="Meta Keywords">
                                                    </div>
                                                -->
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        <a href="{{ route('indexCatagory') }}" class="btn btn-light">Turn Back</a>
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
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endsection
