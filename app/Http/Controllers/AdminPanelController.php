<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPanelController extends Controller
{
    public function DashboardPage()
    {
        $pages = Page::where('SubId' , "0")->get();
        return view('backend.pages.HomePage' , compact('pages'));
    }

    public function LoginPage()
    {
        return view('backend.layouts.login');
    }
    public function LoginPost(Request $req)
    {


        $user = $req->only('name', 'password');
        if (Auth::attempt($user)) {
            return redirect(route('dashboardPage'))->with('message', 'Correct Entry');
        } else {
            return back()->with('message', 'Incorrect entry');
        }
    }

    public function Logout()
    {
        auth()->logout();
        return redirect('/')->with('logout', 'Successfully Completes The Login Process');
    }
}
