<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('backend.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        if ($req->isMethod('get')) {

            return view('backend.pages.users.created');
        };
        if ($req->isMethod('post')) {
            $name = $req->name;
            $email = $req->email;
            $password = $req->password;
            $is_admin = $req->is_admin == 'on' ? "1" : "0";
            $status = $req->status == 'on' ? "1" : "0";

            User::create([
                "name" => $name,
                "email" => $email,
                "password" => $password,
                "is_admin" => $is_admin,
                "status" => $status
            ]);

            return back()->with('message', 'User Created Successfull');
        };
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
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)->first();
        return view('backend.pages.users.editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $name = $req->name;
        $email = $req->email;
        $password = $req->password;
        $is_admin = $req->is_admin == 'on' ? "1" : "0";
        $status = $req->status  == 'on' ? "1" : "0";

        User::where('id', $id)->update([
            "name" => $name,
            "email" => $email,
            "password" => $password,
            "is_admin" => $is_admin,
            "status" => $status
        ]);
        return back()->with('message', 'User Updated Deleted');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return back()->with('message', 'User Deleted Successful');
    }
}
