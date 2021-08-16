<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Http\Requests;


use App\Karyawan;
use App\Cabang;
use App\Jabatan;
use App\Http\Requests\KaryawanFormRequest;
use DB;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawans = Karyawan::where('isDelete', 0)->get();
        $karyawanAll = Karyawan::all();
        $topChartAgent = Karyawan::first();
        $branchs = Cabang::where('isDelete',0)->get();
        $jabatans =Jabatan::all();
        $totalAgent = Karyawan::where('isDelete',0)->count();
        return view('agent.currentagent',['karyawans'=>$karyawans,'topChartAgent'=>$topChartAgent,'totalAgent'=>$totalAgent,'branchs'=>$branchs,'jabatans'=>$jabatans,'karyawanAll'=>$karyawanAll]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawans = Karyawan::where('isDelete', 0)
               ->get();
        $branchs = Cabang::where('isDelete',0)->get();
        $newID = Karyawan::count();
        return view('agent.newagent',['karyawans'=>$karyawans,'branchs'=>$branchs,'newID'=>$newID]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KaryawanFormRequest $request)
    {
        $temp = Karyawan::where('no_karyawan', $request->get('no_karyawan'))->first();
        if($temp) {
            return redirect('karyawan/create')->with('error', 'No Karyawan sudah terdaftar!');
        } else {
            $arrData = array(
                'no_karyawan'=>$request->get('no_karyawan'),
                'nama'=>$request->get('name'),
                'alamat'=>$request->get('alamat'),
                'kota'=>$request->get('kota'), 
                'provinsi'=>$request->get('provinsi'), 
                'kontak'=>$request->get('kontak'),
                'gender'=>$request->get('gender'),
                'tgl_lahir'=>$request->get('tgl_lahir'),
                'join_date'=>$request->get('join_date'),
                'jabatan_id'=>3,
                'cabang_id'=>$request->get('branch'),
                'upline_id'=>$request->get('upline'),
                );
            $karyawan = new Karyawan($arrData);
            $karyawan->save();

            return redirect('karyawan/create')->with('status', 'Data karyawan berhasil tersimpan!');
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
    public function update(KaryawanFormRequest $request, $id)
    {   
        $jabatan = Jabatan::whereId($request->get('jabatan'.$id))->firstOrFail();
        $karyawan = Karyawan::whereId($id)->firstOrFail();
        if($karyawan->jabatan_id != $request->get('jabatan'.$id)){
            if($request->get('jabatan'.$id)!=3){
                $temp =  DB::table('karyawans')->where([
                                                    ['cabang_id', '=', $request->get('branch'.$id)],
                                                    ['jabatan_id', '=', $request->get('jabatan'.$id)],
                                                    ])->get();
                if($temp)
                    return redirect('karyawan')->with('error', 'Jabatan '.$jabatan->nama.' sudah ada pada cabang ini!');
                else{                    
                    $karyawan->nama = $request->get('nama'.$id);
                    $karyawan->alamat = $request->get('alamat'.$id);
                    $karyawan->kota = $request->get('kota'.$id);
                    $karyawan->provinsi = $request->get('provinsi'.$id);
                    $karyawan->kontak = $request->get('kontak'.$id);
                    $karyawan->jabatan_id = $request->get('jabatan'.$id);
                    $karyawan->cabang_id = $request->get('branch'.$id);
                    $karyawan->promotion_date = date("Y-m-d");
                    $karyawan->save();
                    return redirect('karyawan')->with('status', 'Agent berhasil terubah dan menjadi '.$jabatan->nama.'!');
                }
            }
            else{
                $karyawan->nama = $request->get('nama'.$id);
                $karyawan->alamat = $request->get('alamat'.$id);
                $karyawan->kota = $request->get('kota'.$id);
                $karyawan->provinsi = $request->get('provinsi'.$id);
                $karyawan->kontak = $request->get('kontak'.$id);
                $karyawan->jabatan_id = $request->get('jabatan'.$id);
                $karyawan->cabang_id = $request->get('branch'.$id);
                $karyawan->promotion_date = null;
                $karyawan->save();
                return redirect('karyawan')->with('status', 'Agent berhasil terubah dan turun jabatan menjadi '.$jabatan->nama.' biasa!');
            }
        }
        else{
            $karyawan->nama = $request->get('nama'.$id);
            $karyawan->alamat = $request->get('alamat'.$id);
            $karyawan->kota = $request->get('kota'.$id);
            $karyawan->provinsi = $request->get('provinsi'.$id);
            $karyawan->kontak = $request->get('kontak'.$id);
            $karyawan->cabang_id = $request->get('branch'.$id);
            $karyawan->save();
            return redirect('karyawan')->with('status', 'Agent berhasil terubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = Karyawan::whereId($id)->firstOrFail();
        $karyawan->isDelete =1;
        $karyawan->save();
        return redirect('karyawan')->with('status', 'Agent berhasil Dihapus!');
    }
}
