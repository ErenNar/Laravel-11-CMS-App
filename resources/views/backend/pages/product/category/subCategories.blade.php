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

                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header">
                                <a class="btn btn-success" href="{{route('createCategories')}}">New Add</a>
                                <a class="btn btn-info" href="{{route('indexCatagory')}}">Turn Back</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Catgory Name</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Events</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($subCategories))
                                                @foreach ($subCategories as $item)
                                                    <tr>
                                                        <td>
                                                            <img width="800" height="400"
                                                                src="{{ asset('/uploads/' . $item->image) }}"
                                                                alt="{{ $item->name }}">
                                                        </td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->status }}</td>
                                                        <td>{{ $item->created_at }}</td>

                                                        <td>
                                                            <a class="btn btn-info"
                                                                href="{{ route('editPages', $item->id) }} rel="noopener
                                                                noreferrer nofollow">
                                                                <i class="mdi mdi-pencil-box-outline"></i>
                                                            </a>
                                                            <a class="btn btn-danger"
                                                                href="{{ route('deletePages', $item->id) }} rel="noopener
                                                                noreferrer nofollow">
                                                                <i class="mdi mdi-delete"></i>
                                                            </a>
                                                            <a class="btn btn-warning"
                                                                href="{{ route('subCategories', $item->id) }}"
                                                                rel="noopener noreferrer nofollow">
                                                                <i class="mdi mdi-plus-circle-outline text-white"></i>
                                                            </a>

                                                        </td>

                                                    </tr>
                                                @endforeach
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
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
