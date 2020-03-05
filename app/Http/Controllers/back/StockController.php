<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Back\stock;
// use Illuminate\Http\Request;

class StockController extends Controller
{
    private $title = 'stock';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get data
        $data                   = stock::get();

        // title & path
        //  $path                = explode("/", $request->path());
         $title                  = $this->title;
         return view('back.stock.index',compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        echo "ini create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // insert db
         $stock = new stock;
         $stock->barang         = $request->barang;
         $stock->stock          = $request->stok;
         $stock->tgl_kadaluarsa = $request->kadaluarsa;
         $stock->keterangan     = $request->keterangan;

         $stock->save();

         return redirect('stock')->with('success', 'Data Stok Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(stock $stock)
    {
        $data                   = stock::get();

        // title & path
        //  $path                = explode("/", $request->path());
         $title                  = $this->title;
         return view('back.stock.edit',compact('title', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(stock $stock)
    {
        stock::destroy($stock->id);
        return redirect('stock')->with('success', 'Data Berhasil Dihapus');
    }
}
