<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\ListFilm;
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
        $flm= ListFilm::where('status','1')->get();
        $csf= ListFilm::where('status','3')->get();
        $filem= ListFilm::all();
        $hit_film= ListFilm::count();
        $hit_kat= Kategori::count();
        return view('Admin.home',compact('flm','csf','filem','hit_film','hit_kat'));
    }
}
