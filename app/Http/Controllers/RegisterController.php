<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register | Perpustakaan Digital'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $username = $request->input('name');
        User::create($validatedData);
        
        return redirect('/login')->with('status', "Helloo <strong>$username</strong>! You Are Successfully Registered!!! Please Login To see the content!!");        

    }
}
