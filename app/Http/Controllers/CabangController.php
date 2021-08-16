<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cabang;
use App\Http\Requests\CabangFormRequest;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $cabangs = Cabang::where('isDelete',0)->get();
        return view('cabang.currentbranch',['cabangs'=>$cabangs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newID = Cabang::count();
        return view('cabang.newbranch',['newID'=>$newID]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CabangFormRequest $request)
    {   $temp = Cabang::where('kode_pos', $request->get('kode_pos'))->first();
        if($temp) {
            return redirect('cabang/create')->with('error', 'Alamat office tidak boleh sama!');
        }
        else{
            $arrData = array(
                    'nama'=>$request->get('nama'),
                    'kota'=>$request->get('kota'),
                    'alamat'=>$request->get('alamat'),
                    'provinsi'=>$request->get('provinsi'),
                    'kecamatan'=>$request->get('kecamatan'), 
                    'kode_pos'=>$request->get('kode_pos'),
                    );
            $cabang = new cabang($arrData);
            $cabang->save();

            return redirect('cabang/create')->with('status', 'Data Cabang baru berhasil tersimpan!');
        }
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
    public function update(CabangFormRequest $request, $id)
    {
        $cabang = Cabang::whereId($id)->firstOrFail();
        $cabang->nama = $request->get('nama'.$id);
        $cabang->kota = $request->get('kota'.$id);
        $cabang->alamat = $request->get('alamat'.$id);
        $cabang->provinsi = $request->get('provinsi'.$id);
        $cabang->kecamatan = $request->get('kecamatan'.$id);
        $cabang->kode_pos = $request->get('kode_pos'.$id);
        $cabang->save();
        return redirect('cabang')->with('status', 'Cabang berhasil terubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cabang = Cabang::whereId($id)->firstOrFail();
        $cabang->isDelete =1;
        $cabang->save();
        return redirect('cabang')->with('status', 'Cabang berhasil Dihapus!');
    }
}
