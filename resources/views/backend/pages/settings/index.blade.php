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
                                        <button class="nav-link active" id="site-settings-tab" data-toggle="tab"
                                            data-target="#nav-site" type="button" role="tab" aria-controls="nav-site"
                                            aria-selected="true">Site Setting</button>
                                        <button class="nav-link " id="mail-settings-tab" data-toggle="tab"
                                            data-target="#nav-mail" type="button" role="tab" aria-controls="nav-mail"
                                            aria-selected="true">Mail Setting</button>
                                        <button class="nav-link" id="contact-settings-tab" data-toggle="tab"
                                            data-target="#nav-contact" type="button" role="tab"
                                            aria-controls="nav-contact" aria-selected="true">Contact Setting</button>
                                        <button class="nav-link" id="social-settings-tab" data-toggle="tab"
                                            data-target="#nav-social" type="button" role="tab"
                                            aria-controls="nav-social" aria-selected="true">Social Media Setting</button>
                                    </div>
                                </nav>
                                <form class="forms-sample" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="tab-content" id="nav-tabContent">
                                        <!--Site-->
                                        <div class="tab-pane fade show active" id="nav-site" role="tabpanel"
                                            aria-labelledby="site-settings-tab">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="site_name">Site Name</label>
                                                        <input type="text" class="form-control" id="site_name"
                                                            name="site_name" value="{{ $setting->site_name ?? null }}"
                                                            placeholder="Site Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="site_descritption">Site Descritption</label>
                                                        <input type="text" class="form-control" id="site_descritption"
                                                            name="site_descritption"
                                                            value="{{ $setting->site_descritption ?? null }}"
                                                            placeholder="site descritption">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="site_keywords">Site Keywords</label>
                                                        <input type="text" class="form-control" id="site_keywords"
                                                            name="site_keywords"
                                                            value="{{ $setting->site_keywords ?? null }}"
                                                            placeholder="Site Keywords">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="site_author">Site Author</label>
                                                        <input type="text" class="form-control" id="site_author"
                                                            name="site_author" value="{{ $setting->site_author ?? null }}"
                                                            placeholder="Site Author">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <img width="200" height="100"
                                                        src="{{ $setting->site_logo == null ? 'https://placehold.co/200x100' : asset('/uploads/' . $setting->site_logo) }}"
                                                        alt="">
                                                    <div class="form-group">
                                                        <label for="site_logo">Site Logo</label>
                                                        <input type="file" class="form-control" id="site_logo"
                                                            name="site_logo" placeholder="Site Logo">
                                                    </div>
                                                    <img src="{{ $setting->site_second_logo == null ? 'https://placehold.co/200x100' : asset('/uploads/' . $setting->site_second_logo) }}"
                                                        alt="">
                                                    <div class="form-group">
                                                        <label for="site_second_logo">Site Second Logo</label>
                                                        <input type="file" class="form-control" id="site_second_logo"
                                                            name="site_second_logo" placeholder="Site Second Logo">
                                                    </div>
                                                    <img src="{{ $setting->site_favicon == null ? 'https://placehold.co/200x100' : asset('/uploads/' . $setting->site_favicon) }}"
                                                        alt="">
                                                    <div class="form-group">
                                                        <label for="site_favicon">Site Favicon</label>
                                                        <input type="file" class="form-control" id="site_favicon"
                                                            name="site_favicon" placeholder="Site Favicon">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--mail-->
                                        <div class="tab-pane fade show" id="nav-mail" role="tabpanel"
                                            aria-labelledby="mail-settings-tab">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="mail_address">Mail Address</label>
                                                        <input type="text" class="form-control" id="mail_address"
                                                            name="mail_address"
                                                            value="{{ $setting->mail_address ?? null }}"
                                                            placeholder="Mail Address">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="mail_password">Mail Password</label>
                                                        <input type="password" class="form-control" id="mail_password"
                                                            name="Mail Password"
                                                            value="{{ $setting->mail_password ?? null }}"
                                                            placeholder="Mail Password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="imap_server">IMAP Server</label>
                                                        <input type="text" class="form-control" id="imap_server"
                                                            name="imap_server"
                                                            value="{{ $setting->imap_server ?? null }}"
                                                            placeholder="IMAP Server">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="imap_connection_location">IMAP Connection
                                                            Location</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $setting->imap_connection_location ?? null }}"
                                                            id="imap_connection_location" name="imap_connection_location"
                                                            placeholder="IMAP Connection Location">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="imap_connection_location">IMAP Password</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $setting->imap_connection_location ?? null }}"
                                                            id="imap_connection_location" name="imap_connection_location"
                                                            placeholder="IMAP Password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="smtp_password">Smtp Password</label>
                                                        <input type="text" class="form-control" id="smtp_password"
                                                            value="{{ $setting->smtp_password ?? null }}"
                                                            name="smtp_password" placeholder="Smtp Password">
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <!--contact-->
                                        <div class="tab-pane fade show " id="nav-contact" role="tabpanel"
                                            aria-labelledby="contact-settings-tab">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="addres">Addres</label>
                                                        <input type="text" class="form-control" id="addres"
                                                            value="{{ $setting->addres ?? null }}" name="addres"
                                                            placeholder="Addres">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Phone</label>
                                                        <input type="text" class="form-control" id="phone"
                                                            value="{{ $setting->phone ?? null }}" name="phone"
                                                            placeholder="Phone">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="mail">Mail</label>
                                                        <input type="text" class="form-control" id="mail"
                                                            value="{{ $setting->mail ?? null }}" name="mail"
                                                            placeholder="Mail">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fax">Fax</label>
                                                        <input type="text" class="form-control" id="fax"
                                                            value="{{ $setting->fax ?? null }}" name="fax"
                                                            placeholder="Fax">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!--social-->
                                        <div class="tab-pane fade show " id="nav-social" role="tabpanel"
                                            aria-labelledby="social-settings-tab">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="instagram">Instagram</label>
                                                        <input type="text" class="form-control" id="instagram"
                                                            value="{{ $setting->instagram ?? null }}" name="instagram"
                                                            placeholder="instagram">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="twitter">Twitter</label>
                                                        <input type="text" class="form-control" id="twitter"
                                                            value="{{ $setting->twitter ?? null }}" name="twitter"
                                                            placeholder="Twitter">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="facebook">Facebook</label>
                                                        <input type="text" class="form-control" id="facebook"
                                                            value="{{ $setting->facebook ?? null }}" name="facebook"
                                                            placeholder="Facebook">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="youtube">Youtube</label>
                                                        <input type="text" class="form-control" id="youtube"
                                                            value="{{ $setting->youtube ?? null }}" name="youtube"
                                                            placeholder="Youtube">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="linkedin">Linkedin</label>
                                                        <input type="text" class="form-control" id="linkedin"
                                                            value="{{ $setting->linkedin ?? null }}" name="linkedin"
                                                            placeholder="Linkedin">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pinterest">Pinterest</label>
                                                        <input type="text" class="form-control" id="pinterest"
                                                            value="{{ $setting->pinterest ?? null }}" name="pinterest"
                                                            placeholder="Pinterest">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="reddit">Reddit</label>
                                                        <input type="text" class="form-control" id="reddit"
                                                            value="{{ $setting->reddit ?? null }}" name="reddit"
                                                            placeholder="Reddit">
                                                    </div>
                                                </div>
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
