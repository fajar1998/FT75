<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\ListFilm;
use Illuminate\Http\Request;

class ListFIlmController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }

    public function index()
    {
      $data['film'] = ListFilm::all();
      return view('Admin.Daftar_Film.view',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['kategori']= Kategori::all();
        return view('Admin.Daftar_Film.create_film',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new ListFilm();
        $data->name = $request->name;
        $data->id_kategori = $request->id_kategori;
        $data->desk = $request->desk;
        $data->status = $request->status;

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/film'), $filename);
            $data['image'] = $filename;
        }
            $data->save();

            $notification = array(
                'message' => 'Berhasil Menambahkan Film',
                'alert-type' => 'success'
            );

            return redirect()->route('listfilm.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['detail'] = ListFilm::find($id);
        $data['kategori'] = Kategori::all();
        return view('Admin.Daftar_Film.show_film',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['filem'] = ListFilm::find($id);
        $data['kategori'] = Kategori::all();
        return view('Admin.Daftar_Film.update_film',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = ListFilm::find($id);
        $data->name = $request->name;
        $data->id_kategori = $request->id_kategori;
        $data->status = $request->status;
        $data->desk = $request->desk;
        $data->rating = $request->rating;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/film/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/film'), $filename);
            $data['image'] = $filename;
        }
            $data->save();

            $notification = array(
                'message' => 'Berhasil Memperbarui Film',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
    }


    public function destroy($id)
    {
        $film = ListFilm::find($id);
        $film->delete();

        $notification = array(
            'message' => 'Film Telah DiHapus',
            'alert-type' => 'warning'
        );
        return redirect()->route('listfilm.index')->with($notification);
    }
    public function Rating($id)
    {
        {
            $data['detail'] = ListFilm::find($id);
            $data['kategori'] = Kategori::all();
            return view('User.rating',$data);
        }
    }

    public function UbahRating(Request $request ,$id)
    {
        $data = ListFilm::find($id);
        $data->rating = $request->rating;

            $data->save();

            $notification = array(
                'message' => 'Berhasil Menambahkan Rating',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
    }
}
