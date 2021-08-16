@extends('layouts.layouthomeadmin')

@section('content')
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">New Branch</h1>
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
	        <form class="form-horizontal" action="{{ url('cabang') }}" method="POST">
	            {!! csrf_field() !!}
	            <div class="col-sm-6">
	                <fieldset>
	                <div class="form-group">
	                	<label class="control-label col-sm-5" for="newID">ID: </label>
	                	<div class="col-sm-5">
	                        <label class="control-label" for="newID">{{ $newID+1 }}</label>
	                    </div>
	                </div>
	                <legend>Branch Information</legend>
	                <div class="form-group">
	                    <label class="control-label col-sm-5" for="nama">Nama :</label>
	                    <div class="col-sm-5">
	                        <input type="text" class="form-control" name="nama" id="nama" placeholder="nama cabang" required autofocus>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="control-label col-sm-5" for="alamat" >Alamat :</label>
	                    <div class="col-sm-5">
	                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="cth: JL. Basuki Rahmat 73" required >
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="control-label col-sm-5" for="kecamatan">Kecamatan :</label>
	                    <div class="col-sm-5">
	                        <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" required>
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
	                    <label class="control-label col-sm-5" for="kode_pos">Kode pos :</label>
	                    <div class="col-sm-5">
	                        <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos" required>
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