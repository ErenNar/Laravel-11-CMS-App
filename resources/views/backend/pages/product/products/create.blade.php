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
                                            aria-selected="true">Product Setting</button>
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
                                                        <label for="exampleInputTitle">Product Name</label>
                                                        <input type="text" class="form-control" id="exampleInputTitle"
                                                            name="name" placeholder="Category Name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPageContent">Product Short Text</label>
                                                        <input type="text" class="form-control"
                                                            id="exampleInputPageContent" name="short_text"
                                                            placeholder="Category Content">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPageContent">Product Content</label>
                                                        <textarea name="content" id="editor"></textarea>
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
                                                                    <input name="status" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputPageContent">Product
                                                                    Quantity</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleInputPageContent" name="quantity"
                                                                    placeholder="Category Content">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputPageContent">Product Price</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleInputPageContent" name="price"
                                                                    placeholder="Category Content">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <select class="form-control" name="size"
                                                            id="exampleFormControlSelect1">
                                                            <option value="small">Small</option>
                                                            <option value="medium">Medium</option>
                                                            <option value="large">Large</option>
                                                            <option value="xlarge">X-Large</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select class="form-control" name="color"
                                                            id="exampleFormControlSelect1">
                                                            <option value="black">Black</option>
                                                            <option value="white">White</option>
                                                            <option value="yellow">Yellow</option>
                                                            <option value="blue">Blue</option>
                                                            <option value="red">Red</option>
                                                            <option value="orange">Orange</option>
                                                            <option value="purple">Purple</option>
                                                            <option value="pink">Pink</option>
                                                            <option value="green">Green</option>
                                                            <option value="grey">Grey</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select class="form-control" name="category_id" id="category_id">
                                                            <option value="0">Parent Page</option>
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


                                                            <div class="form-group">
                                                                <label for="metaDescription">Meta Description</label>
                                                                <input type="text" class="form-control" name="metaDescription"
                                                                    id="metaDescription" placeholder="Meta Description">
                                                            </div>
                                                        -->
                                            <div class="form-group">
                                                <label for="pageSlug">Page Slug</label>
                                                <input type="text" class="form-control" name="slug" id="pageSlug"
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
                                        <a href="{{ route('indexProducts') }}" class="btn btn-light">Turn Back</a>
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
