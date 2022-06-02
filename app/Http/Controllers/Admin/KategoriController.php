<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kategori'] = Kategori::all();
        return view('Admin.Kategori.v_kategori',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:kategoris|max:30',
        ]);
        $data = new Kategori();
        $data->name = $request->name;

        $data->save();

        $notification = array(
            'message' => 'Berhasil Menambah Kategori',
            'alert-type' => 'success'
        );
        return redirect()->route('kategori.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = Kategori::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Kategori Di Update ',
            'alert-type' => 'success'
        );

        return redirect()->route('kategori.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Kategori::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Kategori Telah DiHapus',
            'alert-type' => 'warning'
        );
        return redirect()->route('kategori.index')->with($notification);
    }
}
