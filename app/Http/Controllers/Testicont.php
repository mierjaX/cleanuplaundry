<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class Testicont extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('formtesti',[
            "testimoni" => testimoni::all()
        ]);
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
        $namafile = 'testimoni_'.$request->nama.'.'.$request->image->extension();
        Storage::disk('public')->put($namafile,File::get($request->file('image')));
        Storage::disk('public')->move($namafile,'kumpulan-testimoni/'.$namafile);
        
        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'keterangan' => 'required',
            'image' => 'required'
        ]);
        
        Testimoni::create([
            'nama'=>$request->nama,
            'keterangan'=>$request->keterangan,
            'gambar'=>$namafile
        ]);
        return redirect('/formtesti')->with('success','Testimoni telah ditambahkan');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Testimoni $testimoni
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gambarhapus = Testimoni::where('id',$id)->first()->gambar;
        Storage::disk('public')->delete('kumpulan-testimoni/'.$gambarhapus);
        Testimoni::where('id',$id)->delete();
        return redirect('/dashboard/testi')->with('success','Testimoni telah dihapus');
    }
}
