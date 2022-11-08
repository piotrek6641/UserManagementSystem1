<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class UserController extends Controller
{
    public function Index()
    {
        $users = User::All();
        $users = User::paginate(10);
        return view('dashboard')->with('users', $users);
    }
    public function Search(Request $request)
    {
        if($request->option =="id")
        {
            $users = User::where('id', $request->text)->paginate(10);

            return view('dashboard')->with('users', $users);
        }
        if($request->option == "name") {
            $users = User::where('name', 'LIKE', $request->text . '%')->paginate(10);

            return view('dashboard')->with('users', $users);
        }
        if($request->option=="email")
        {
            $users = User::where('email', 'LIKE', $request->email . '%')->paginate(10);
            return view('dashboard')->with('users', $users);
        }
        else
        {
            return to_route('dashboard');
        }

    }
    public function Filter(Request $request)
    {
        if($request->option =="id")
        {
            $users = User::orderBy('id')->paginate(10);
            return view('dashboard')->with('users', $users);
        }
        if($request->option == "name") {
            $users = User::orderBy('name')->paginate(10);
            return view('dashboard')->with('users', $users);
        }
        if($request->option=="email")
        {
            $users = User::orderBy('email')->paginate(10);
            return view('dashboard')->with('users', $users);
        }
        if($request->option=="updated_at")
        {
            $users = User::orderBy('updated_at', 'desc')->paginate(10);
            return view('dashboard')->with('users', $users);
        }
        else
        {
            return to_route('dashboard');
        }

    }
    public function ban($id)
    {
        $user = User::where('id', $id)->first();
        if($user->isbaned ==0) {
            $user->update([
                'isbaned' => 1
            ]);
            return to_route('dashboard');
        }
        else
        {
            $user->update([
                'isbaned' => 0
            ]);
            return to_route('dashboard');
        }
    }




}
