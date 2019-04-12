<?php

namespace App\Http\Controllers;

use App\Meetup;
use Illuminate\Http\Request;

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
        $meetups = Meetup::all();
        return view('home', compact('meetups'));
    }

    public function saveMeetup(Request $request){
        $meetup = new Meetup();
        $meetup->name = $request->name;
        $meetup->save();
        return redirect()->back();
    }

    public function joinMeetup(Request $request){
        return view('meetup');
    }



}
