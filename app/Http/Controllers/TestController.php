<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() {
        $users = User::all();

        return view('test', compact('users'));
    }

    public function store() {

        User::create([
            'name' => 'Ilija',
            'email' => Str::random(10) . '@gmail.com',
            'password' => 'ilija123'
        ]);

        return to_route('index');
    }

    public function delete() {
        User::find(11)->delete();

        return to_route('index');
    }

    public function update() {
        $user = User::find(12);
    
        $user->update(['email' => 'updilija009@gmail.com']);

        return to_route('index');
    }
}
