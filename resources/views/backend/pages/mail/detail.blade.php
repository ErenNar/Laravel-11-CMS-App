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
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4>{{ $mail->c_fname }}</h4>
                                <p>{{ $mail->c_lname }}</p>
                                <p>{{ $mail->c_email }}</p>
                                <p>{{ $mail->c_subject }}</p>
                                <p>{{ $mail->c_message }}</p>
                                <p>{{ $mail->ip }}</p>
                                <p>{{ $mail->created_at }}</p>
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
