@extends('layouts.layouthomeadmin')

@section('content')
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">New Agent</h1>
	    </div>
	</div>
	<div class="row">
		<div class="col-sm-12">
	    	@if(session('status'))
	        <div id="success">
	            <div class="alert alert-success">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <strong>{{ session('status') }}</strong>
	            </div>
	        </div>
	        @endif
	        @if(session('error'))
	        <div id="success">
	            <div class="alert alert-danger">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <strong>{{ session('error') }}</strong>
	            </div>
	        </div>
	        @endif
	        <form class="form-horizontal" action="{{ url('karyawan') }}" method="POST">
	            {!! csrf_field() !!}
	            <div class="col-sm-offset-10 col-sm-1"></div><br>
	            <div class="col-sm-6">
	                <fieldset>
	                <div class="form-group">
	                	<label class="control-label col-sm-5" for="username">ID : </label>
	                	<div class="col-sm-5">
	                        <label class="control-label" for="username">{{$newID+1}} </label>
	                    </div>
	                </div>
	                <legend>Agent Information</legend>
	                <div class="form-group">
	                    <label class="control-label col-sm-5" for="no_karyawan" >No Karyawan :</label>
	                    <div class="col-sm-5">
	                        <input type="text" class="form-control" name="no_karyawan" id="no_karyawan" placeholder="no karyawan" required autofocus>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="control-label col-sm-5" for="name">Nama :</label>
	                    <div class="col-sm-5">
	                        <input type="text" class="form-control" name="name" id="name" placeholder="agent name" required>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="control-label col-sm-5" for="gender">Gender :</label>
	                    <div class="col-sm-5">
	                        <label class="radio-inline">
                                        <input type="radio" name="gender" value="Pria" checked>Male
                                </label>
                                <label class="radio-inline">
                                        <input type="radio" name="gender" value="Wanita">Female
                                </label>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="control-label col-sm-5" for="alamat">Alamat :</label>
	                    <div class="col-sm-5">
	                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Cth : JL. Basuki Rahmat no. 10" required>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="control-label col-sm-5" for="kota">Kota :</label>
	                    <div class="col-sm-5">
	                        <input type="text" class="form-control" name="kota" id="kota" placeholder="kota" required>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="control-label col-sm-5" for="provinsi">Provinsi :</label>
	                    <div class="col-sm-5">
	                        <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="provinsi" required>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="control-label col-sm-5" for="tgl_lahir">Date of Birth :</label>
	                    <div class="col-sm-5">
	                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="tanggal lahir" required>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="control-label col-sm-5" for="kontak">Phone number :</label>
	                    <div class="col-sm-5">
	                        <input type="text" class="form-control" name="kontak" id="kontak" placeholder="kontak" required>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="control-label col-sm-5" for="join_date">Join Date :</label>
	                    <div class="col-sm-5">
	                        <input type="date" class="form-control" name="join_date" id="join_date" placeholder="join_date lahir" min=”2017-01-01” required>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="control-label col-sm-5" for="upline">Upline :</label>
	                    <div class="col-sm-5">
	                        <select class="form-control" name="upline" id="upline">
							    <option value="">[Pilih Upline]</option>
							    @foreach($karyawans as $karyawan)
							    <option value="{{$karyawan->id}}">[{{$karyawan->no_karyawan}}] - {{$karyawan->nama}}</option>
							    @endforeach
						  	</select>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="control-label col-sm-5" for="branch">Branch :</label>
	                    <div class="col-sm-5">
	                        <select class="form-control" name="branch" id="branch">
							    <option value="">[Pilih Cabang]</option>
							    @foreach($branchs as $branch)
							    <option value="{{$branch->id}}">{{$branch->nama}}</option>
							    @endforeach
						  	</select>
	                    </div>
	                </div>
	                </fieldset>
	            </div>
	            <div class="col-sm-12">
	                <div class="col-sm-offset-4 col-sm-1">
	                    <input class="btn btn-success btn-md" type="submit" name="simpan" value="Simpan">
	                </div>
	            </div>
	    	</form>
	    </div>
	</div>
@endsection