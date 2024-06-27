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
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>

                                                <th>Name</th>
                                                <th>Content</th>
                                                <th>Link</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                                <th>Events</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($mails))
                                                @foreach ($mails as $item)
                                                    <tr>

                                                        <td>{{ $item->c_fname }}</td>
                                                        <td>{{ $item->c_lname }}</td>
                                                        <td>{{ $item->c_email }}</td>
                                                        <td>{{ $item->c_subject }}</td>
                                                        <td>{{ $item->created_at }}</td>
                                                        <td>
                                                        <a class="btn btn-warning" rel="noopener noreferrer nofollow"
                                                            href="{{ route('detailMail', $item->id) }}">
                                                            <i class="mdi mdi-details text-white"></i>
                                                        </a>
                                                            <a class="btn btn-danger" rel="noopener noreferrer nofollow"
                                                                href="{{ route('deleteMail', $item->id) }}">
                                                                <i class="mdi mdi-delete"></i>
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
