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
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Slider Settings</h4>
                                <form class="forms-sample" action="{{ route('createPages') }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="form-group">

                                        <input type="file" class="form-control" id="exampleInputName" name="image"
                                            placeholder="Choose File">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Name</label>
                                        <input type="text" class="form-control" id="exampleInputName" name="name"
                                            placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputContent">Content</label>
                                        <input type="text" class="form-control" id="exampleInputContent"
                                            name="content" placeholder="Content">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputlink">Link</label>
                                        <input type="text" class="form-control" id="exampleInputlink" name="link"
                                            placeholder="Link">
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <a href="{{ route('indexSlider') }}" class="btn btn-light">Turn Back</a>

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
