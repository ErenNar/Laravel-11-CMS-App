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
                            <div class="card-header">
                                <a class="btn btn-success" href="{{ route('createUser') }}">New Add</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Is Admin</th>
                                                <th>Events</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($users))
                                                @foreach ($users as $item)
                                                    <tr>
                                                        <td>{{ $item['name'] }}</td>
                                                        <td>{{ $item['is_admin'] }}</td>
                                                        <td>{{ $item['status'] }}</td>
                                                        <td>
                                                            <a class="btn btn-info"
                                                                href="{{ route('editUser', $item->id) }}"
                                                                rel="noopener noreferrer nofollow">
                                                                <i class="mdi mdi-pencil-box-outline"></i>
                                                            </a>
                                                            <a class="btn btn-danger"
                                                                href="{{ route('deleteUser', $item->id) }}"
                                                                rel="noopener noreferrer nofollow">
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
