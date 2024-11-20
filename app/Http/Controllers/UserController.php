<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('list');
    }

    public function store(Request $request)
    {

        // $request->validate([
        // ])

        User::create([
            'name' => $request->name,
            'memo' => $request->memo
        ]);

        return $this->index();
    }

    public function index()
    {
        $users = User::orderBy('id', 'asc')->get();
        return view('list', compact('users'));
    }
}
