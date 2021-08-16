@extends('layouts.layouthomeadmin')

@section('content')
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">Current Branch</h1>
	    </div>
	</div>
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
	<div class="row">
    <div class="box">
        <div class="col-sm-12">
            <!--container isi-->
            <div class="col-sm-12 table-responsive">
                <table class="table table-bordered table-hover table-striped text-center" id="myTable">
                    <thead>
	                    <tr>
	                        <th colspan="10">
	                        Branch
	                        <button class="btn btn-default" style="float: right;" type="button" data-toggle="collapse" data-target="#search">
			                    <i class="fa fa-filter"></i>
			                    Filter
							</button>
	                        <button class="btn btn-default" style="float: right;" type="button">
			                    <i class="fa fa-print"></i>
			                    Print Selected Map
							</button>
	                        </th>
	                    </tr>
	                    <tr id="search" class="collapse">
	                        <th colspan="10">
	                        	<div class="col-lg-12">
	                        		<input id="myInput" onkeyup="myFunction()" type="text" style="background-image: url('https://t1.rbxcdn.com/0a0379e52de5f539b20b1828195ff823');" class="form-control" name="searchAgent" placeholder="Search..." autofocus>
	                    		</div>
	                        </th>
	                    </tr>
                        <tr>
                        	<th style="text-align: center;">No</th>
                            <th style="text-align: center;">ID Branch</th>
                            <th style="text-align: center;">Nama</th>
                            <th style="text-align: center;">Alamat</th>
                            <th style="text-align: center;">Kecamatan</th>
                            <th style="text-align: center;">Kota</th>
                            <th style="text-align: center;">Provinsi</th>
                            <th style="text-align: center;">Kode Pos</th>
                            <th style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $counter=0; ?>
                    	@foreach($cabangs as $cabang)
                    	<form class="form-horizontal" id="formUpdate{{ $cabang->id }}" action="{{ route('cabang.update', $cabang->id) }}" method="POST">
                                                        {{ method_field("PUT") }}
                                                        {!! csrf_field() !!}
                    	<tr>
                    		<td><?php $counter++; echo $counter;?></td>
                    		<td>{{ $cabang->id }}</td>
                    		<td>
                    			<div name="labelNama{{$cabang->id}}" for="nama">{{ $cabang->nama }}</div>
                    			<input type="text" class="form-control" style="width: 7em; display: none;" value="{{ $cabang->nama }}" name="nama{{ $cabang->id }}">
                    		</td>
                    		<td>
                    			<div name="labelAlamat{{$cabang->id}}" for="alamat">{{ $cabang->alamat }}</div>
                    			<input type="text" class="form-control" style="width: 14em; display: none;" value="{{ $cabang->alamat }}" name="alamat{{ $cabang->id }}">
                    		</td>
                    		<td>
                    			<div name="labelKecamatan{{$cabang->id}}" for="kecamatan">{{ $cabang->kecamatan }}</div>
                    			<input type="text" class="form-control" style="width: 9em; display: none;" value="{{ $cabang->kecamatan }}" name="kecamatan{{ $cabang->id }}">
                    			</td>
                    		<td>
                    			<div name="labelKota{{$cabang->id}}" for="kota">{{ $cabang->kota }}</div>
                    			<input type="text" class="form-control" style="width: 7em; display: none;" value="{{ $cabang->kota }}" name="kota{{ $cabang->id }}">
                    		</td>
                    		<td>
                    			<div name="labelProvinsi{{$cabang->id}}" for="provinsi">{{ $cabang->provinsi }}</div>
                    			<input type="text" class="form-control" style="width: 9em; display: none;" value="{{ $cabang->provinsi }}" name="provinsi{{ $cabang->id }}">
                    		</td>
                    		<td>
                    			<div name="labelKodePos{{$cabang->id}}" for="kode_pos">{{ $cabang->kode_pos }}</div>
                    			<input type="text" class="form-control" style="width: 5em; display: none;" value="{{ $cabang->kode_pos }}" name="kode_pos{{ $cabang->id }}">
                    		</td>
                    		<td>
                    			<div class="btn-group">
                    			<button onclick="myButton<?php echo $counter; ?>UpdateFunction()" class="btn btn-default" name="buttonUpdate{{$cabang->id}}" id="buttonUpdate{{$cabang->id}}" type="button">
			                    <i class="fa fa-pencil-square-o"></i>
								</button>
								<button onclick="" class="btn btn-default" name="buttonDelete{{$cabang->id}}" id="buttonDelete{{$cabang->id}}" type="button" data-toggle="modal" data-target="#myModalDelete{{$cabang->id}}">
			                    <i class="fa fa-trash"></i>
								</button>
								<input type="submit" class="btn btn-success btn-md" onclick="update<?php echo $counter; ?>Data()" style="display: none" name="buttonSave{{$cabang->id}}" id="buttonSave{{$cabang->id}}" value="Update">
								</div>
                    		</td>
                    		<script type="text/javascript">
								function myButton<?php echo $counter; ?>UpdateFunction() {
									document.getElementsByName("nama{{ $cabang->id }}")[0].style.display = "initial";
								    document.getElementsByName("alamat{{ $cabang->id }}")[0].style.display = "initial";
								    document.getElementsByName("kecamatan{{ $cabang->id }}")[0].style.display = "initial";
								    document.getElementsByName("kota{{ $cabang->id }}")[0].style.display = "initial";
								    document.getElementsByName("provinsi{{ $cabang->id }}")[0].style.display = "initial";
								    document.getElementsByName("kode_pos{{ $cabang->id }}")[0].style.display = "initial";

								    document.getElementsByName("labelNama{{$cabang->id}}")[0].style.display = "none";
								    document.getElementsByName("labelAlamat{{$cabang->id}}")[0].style.display = "none";
								    document.getElementsByName("labelKecamatan{{$cabang->id}}")[0].style.display = "none";
								    document.getElementsByName("labelKota{{$cabang->id}}")[0].style.display = "none";
								    document.getElementsByName("labelProvinsi{{$cabang->id}}")[0].style.display = "none";
								    document.getElementsByName("labelKodePos{{$cabang->id}}")[0].style.display = "none";

								    var x = document.getElementById("buttonUpdate{{$cabang->id}}");
									        x.style.display = 'none';
								    var y = document.getElementById("buttonDelete{{$cabang->id}}");
									        y.style.display = 'none';
									var z = document.getElementById("buttonSave{{$cabang->id}}");
									        z.style.display = 'block';
									    								    	

								}
								function update<?php echo $counter; ?>Data(){
									/*document.getElementsByName("<?php echo $counter; ?>")[0].disabled = true;
								    document.getElementsByName("<?php echo $counter; ?>")[1].disabled = true;
								    document.getElementsByName("<?php echo $counter; ?>")[2].disabled = true;
								    document.getElementsByName("<?php echo $counter; ?>")[3].disabled = true;
								    document.getElementsByName("<?php echo $counter; ?>")[4].disabled = true;
								    document.getElementsByName("<?php echo $counter; ?>")[5].disabled = true;
									var x = document.getElementById("buttonUpdate{{$cabang->id}}");
									        x.style.display = 'initial';
								    var y = document.getElementById("buttonDelete{{$cabang->id}}");
									        y.style.display = 'initial';
									   
									var z = document.getElementById("buttonSave{{$cabang->id}}");
									        z.style.display = 'none';*/

								}
								function myFunction() {
								  var input, filter, table, tr, td, i,text,text2,text3,text4,text5,text6;
								  input = document.getElementById("myInput");
								  filter = input.value.toUpperCase();
								  table = document.getElementById("myTable");
								  tr = table.getElementsByTagName("tr");

								  for (i = 0; i < tr.length; i++) {
								    td = tr[i].getElementsByTagName("td")[0];
								    text = tr[i].getElementsByTagName("input")[0];
								    text2 = tr[i].getElementsByTagName("input")[1];
								    text3 = tr[i].getElementsByTagName("input")[2];
								    text4 = tr[i].getElementsByTagName("input")[3];
								    text5 = tr[i].getElementsByTagName("input")[4];
								    text6 = tr[i].getElementsByTagName("input")[5];
								    if (td) {
								      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
								        tr[i].style.display = "";
								      }
								      else if (text.value.toUpperCase().indexOf(filter) > -1) {
								        tr[i].style.display = "";
								      }
								      else if (text2.value.toUpperCase().indexOf(filter) > -1) {
								        tr[i].style.display = "";
								      } 
								      else if (text3.value.toUpperCase().indexOf(filter) > -1) {
								        tr[i].style.display = "";
								      } 
								      else if (text4.value.toUpperCase().indexOf(filter) > -1) {
								        tr[i].style.display = "";
								      } 
								      else if (text5.value.toUpperCase().indexOf(filter) > -1) {
								        tr[i].style.display = "";
								      } 
								      else if (text6.value.toUpperCase().indexOf(filter) > -1) {
								        tr[i].style.display = "";
								      }  
								      else {
								        tr[i].style.display = "none";
								      }
								    }								    
								  }

								}
							</script>
									
                    	</tr>
                    	</form>
                    	<!-- Modal -->
                    	<form action="{{ route('cabang.destroy', $cabang->id) }}" id="formDelete{{ $cabang->id}}" name="formDelete{{ $cabang->id}}" method="POST">
                    	{{ method_field("DELETE") }}
						{{ csrf_field() }}
                    	<div class="modal fade" id="myModalDelete{{$cabang->id}}" role="dialog">
						   	<div class="modal-dialog">
						    
						     <!-- Modal content-->
						     	<div class="modal-content">
						       		<div class="modal-header">
								         <button type="button" class="close" data-dismiss="modal">&times;</button>
								         <h4 class="modal-title">Delete Data</h4>
							       	</div>
								<div class="col-sm-12">
				                	<h3 class="page-header" for="newID">
				                		<i class="fa fa-warning"></i>
				                		Anda yakin ingin menghapus cabang ini?
				                	</h3>
			                	</div>
						        <button type="button" style="font-size: 20px;" class="btn btn-default col-sm-offset-4" data-dismiss="modal">Cancel</button>
						        <input type="submit" id="destroy{{ $cabang->id }}" name="destroy{{ $cabang->id }}" style="font-size: 20px; margin-left: 1em" class="btn btn-default" value="Yes">
						        <br>
						      </div>
						      
						   	</div>
						</div>
						</form>
                    	
                    	@endforeach	
                    </tbody>
                </table>
            </div>
        </div>
    </div>
	</div>
	
@endsection