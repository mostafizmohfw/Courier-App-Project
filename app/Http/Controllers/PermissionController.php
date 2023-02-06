<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        return view('user.permission.index');
    }

    public function create()
    {
        return view('user.permission.create');
    }

    public function edit($id)
    {
        return view('user.permission.edit',[
            'permission_id' => $id
        ]);
    }


    public function show($id)
    {
        return view('user.permission.show',[
            'permission_id' => $id
        ]);
    }
}
