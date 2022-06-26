<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Http\Requests\UpdatePesananRequest;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\ElseIf_;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePesananRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'alamat' => 'required',
            'kontak' => 'required',
            'jenisLayanan' => 'required'
        ]);
        
        Pesanan::create([
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'kontak'=>$request->kontak,
            'jenisLayanan'=>$request->jenisLayanan
        ]);
        return redirect('/#pesan')->with('success','Pesanan sudah dibuat, silahkan menunggu chat dari admin di nomor anda');
    }

    public function adminInput(Request $request)
    {
        
        $search = Pesanan::where('id', $request->id)->first();
        if ($request->berat!=null) {
            $search->berat=$request->berat;
        } 
        if($request->harga!=null) {
            $search->harga=$request->harga;
        }
        if($request->status!=null) {
            $search->status=$request->status;
        }
        $search->save();
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('tables', [
            "pesanan" => Pesanan::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePesananRequest  $request
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePesananRequest $request, Pesanan $pesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gambarhapus = Pesanan::where('id',$id)->first();
        Pesanan::where('id',$id)->delete();
        return redirect('/dashboard/tables')->with('success','pesanan telah dihapus telah dihapus');
    }
}
