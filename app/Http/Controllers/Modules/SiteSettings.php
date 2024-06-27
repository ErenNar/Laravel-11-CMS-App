<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use DashboardFileHelper;
use Illuminate\Http\Request;

class SiteSettings extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {

        if ($req->isMethod('get')) {
            $setting = SiteSetting::where('id', 1)->select('site_name', 'site_descritption', 'site_keywords', 'site_author', 'site_logo', 'site_second_logo', 'site_favicon', 'mail_address', 'mail_password', 'imap_server', 'imap_connection_location', 'imap_password', 'smtp_password', 'addres', 'phone', 'mail', 'fax', 'instagram', 'twitter', 'facebook', 'youtube', 'linkedin', 'pinterest', 'reddit')->first();
            return view('backend.pages.settings.index', compact('setting'));
        }
        if ($req->isMethod('post')) {

            $site_logo = $req->file('site_logo');
            $site_second_logo = $req->file('site_second_logo');
            $site_favicon = $req->file('site_favicon');

            if ($site_logo != null) {
                $uploadImage =  new  DashboardFileHelper();
                $uploadImage->UploadFile($site_logo);
                $logo =  $uploadImage->fileName;
            };
            if ($site_second_logo != null) {
                $uploadImage =  new  DashboardFileHelper();
                $uploadImage->UploadFile($site_second_logo);
                $secondLogo =  $uploadImage->fileName;
            };
            if ($site_favicon != null) {
                $uploadImage =  new  DashboardFileHelper();
                $uploadImage->UploadFile($site_favicon);
                $favicon =  $uploadImage->fileName;
            };


           $site= SiteSetting::where('id', 1)->first();
           SiteSetting::where('id', 1)->update([
                "site_name" => $req->site_name ?? null,
                "site_descritption" => $req->site_descritption  ?? null,
                "site_keywords" => $req->site_keywords ?? null,
                "site_author" => $req->site_author ?? null,
                "site_logo" => $logo ??  $site->site_logo,
                "site_second_logo" => $secondLogo  ?? $site->site_second_logo ,
                "site_favicon" => $favicon ?? $site->site_favicon,
                "mail_address" => $req->mail_address ?? null,
                "mail_password" => $req->mail_password ?? null,
                "imap_server" => $req->imap_server,
                "imap_connection_location" => $req->imap_connection_location ?? null,
                "imap_password" => $req->imap_password ?? null,
                "smtp_password" => $req->smtp_password ?? null,
                "addres" => $req->addres ?? null,
                "phone" => $req->phone ?? null,
                "mail" => $req->mail ?? null,
                "fax" => $req->fax ?? null,
                "instagram" => $req->instagram  ?? null,
                "twitter" => $req->twitter ?? null,
                "facebook" => $req->facebook ?? null,
                "youtube" => $req->youtube ?? null,
                "linkedin" => $req->linkedin ?? null,
                "pinterest" => $req->pinterest ?? null,
                "reddit" => $req->reddit ?? null,
            ]);
            return back()->with('message', 'Updated Successfull');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
