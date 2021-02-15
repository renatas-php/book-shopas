<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // 0 - user, 1 - admin
        if( auth()->user()->role === 0 ) {
            return view('vartotojas.dashboard');
        }
        else {
            return view('admin.dashboard')
            ->with('bookObject', new Book())
            ->with('books', Book::where('approved', 0)->get());
        }
        
    }
    public function edit(User $user) {
        if(auth()->user()->role === 0){
            return view('vartotojas.profilis')->with('user', $user);
        }
        else {
            return view('admin.profilis')->with('user', $user);
        }
    }
    public function store(Request $request) {
        auth()->user()->update([
            'email' => $request->email,
            'years' => $request->years,
            'month' => $request->month,
            'password' => Hash::make($request->password)
        ]);
        
        $user = auth()->user();
        if(auth()->user()->role === 0){
            return view('vartotojas.dashboard')->with('user', $user);
        }
        else {
            return view('admin.dashboard')->with('user', $user);
        }

    }

    public function books() {
        
        return view('vartotojas.knygos')
        ->with('myBooks', Book::where('user_id', auth()->user()->id)->where('approved', false)->get());

    }
}
