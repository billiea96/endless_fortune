@extends('layouts.layouthomeadmin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Current Agent</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10">
            <form class="form-horizontal" action="{{ url('karyawan/{$topChartAgent->id}') }}" method="GET">
	            {!! csrf_field() !!}
	                <fieldset>
	                <div class="form-group">
		            	<label class="control-label col-lg-2" for="searchAgent">Total Agent :</label>
		            	<div class="col-lg-2">
	                        <label class="control-label">{{ $totalAgent }}</label>
	                    </div>
			        </div>
	                <div class="form-group">
		            	<label class="control-label col-sm-2" for="searchAgent">Search name :</label>
		            	<div class="col-lg-2">
	                        <input id="myInput" onkeyup="myFunction()"  type="text" class="form-control" name="searchAgent" placeholder="Search agent..." autofocus>
	                    </div>
						<button class="btn btn-default" type="button">
			                    <i class="fa fa-print"></i>
			                    Print Selected Map
						</button>
			        </div>
	                </fieldset>
	    	</form>
		</div>
    </div>

    <div class="row">
        <div class="col-lg-10">
            <form class="form-horizontal" action="{{ url('karyawan/{$topChartAgent->id}') }}" method="GET">
	            {!! csrf_field() !!}
	                <fieldset>
	                <div class="form-group">
		            	<label class="control-label col-sm-2" for="searchAgent">Top Agent :</label>
		            	<div class="col-sm-2">
	                        <input class="btn btn-default btn-md" type="submit" name="simpan" value="Detail">
	                    </div>
		    		</div>
	                </fieldset>
	    	</form>
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
            <div class="col-sm-12 table-responsive" style="overflow-x:auto;">
                <table class="table table-bordered table-hover table-striped text-center" id="myTable">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">No Karyawan</th>
                            <th style="text-align: center;">Nama</th>
                            <th style="text-align: center;">Alamat</th>
                            <th style="text-align: center;">Kota</th>
                            <th style="text-align: center;">Provinsi</th>
                            <th style="text-align: center;">Kontak</th>
                            <th style="text-align: center;">Upline</th>
                            <th style="text-align: center;">Cabang</th>
                            <th style="text-align: center;">Jabatan</th>
                            <th style="text-align: center; width: 10%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $counter=0; ?>
                        @foreach($karyawans as $karyawan)
                        <form class="form-horizontal" id="formUpdate{{ $karyawan->id }}" action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
                                                        {{ method_field("PUT") }}
                                                        {!! csrf_field() !!}
                        <tr>
                            <td><?php $counter++; echo $counter;?></td>
                            <td>{{ $karyawan->no_karyawan }}</td>
                            <td>
                                <div name="labelNama{{$karyawan->id}}" for="nama">{{ $karyawan->nama }}</div>
                                <input type="text" class="form-control" style="width: 10em; display: none;" value="{{ $karyawan->nama }}" name="nama{{ $karyawan->id }}">
                            </td>
                            <td>
                                <div class="control-label" name="labelAlamat{{$karyawan->id}}" for="alamat">{{ $karyawan->alamat }}</div>
                                <input type="text" class="form-control" style="width: 23em; display: none;" value="{{ $karyawan->alamat }}" name="alamat{{ $karyawan->id }}" >
                                </td>
                            <td>
                                <div class="control-label" name="labelKota{{$karyawan->id}}" for="kota">{{ $karyawan->kota }}</div>
                                <input type="text" class="form-control" style="width: 7em; display: none;" value="{{ $karyawan->kota }}" name="kota{{ $karyawan->id }}" >
                                </td>
                            <td>
                                <div class="control-label" name="labelProvinsi{{$karyawan->id}}" for="provinsi">{{ $karyawan->provinsi }}</div>
                                <input type="text" class="form-control" style="width: 8em; display: none;" value="{{ $karyawan->provinsi }}" name="provinsi{{ $karyawan->id }}" >
                            </td>
                            <td>
                                <div class="control-label" name="labelKontak{{$karyawan->id}}" for="kontak">{{ $karyawan->kontak }}</div>
                                <input type="text" class="form-control" style="width: 8.5em; display: none;" value="{{ $karyawan->kontak }}" name="kontak{{ $karyawan->id }}">
                            </td>
                            <td>
                                @if($karyawan->upline_id!=null)
                                {{ $karyawan->upline->nama }}
                                @else
                                    - 
                                @endif
                            </td>
                            <td>
                                <div class="control-label" name="labelCabang{{$karyawan->id}}" for="jabatan">{{ $karyawan->cabang->nama }}</div>
                                <select class="form-control" name="branch{{$karyawan->id}}" style="display: none; width: 10em" id="branch">
                                <option value="{{$karyawan->cabang_id}}">{{ $karyawan->cabang->nama }}</option>
                                @foreach($branchs as $branch)
                                @if($karyawan->cabang_id!=$branch->id)
                                <option value="{{$branch->id}}">{{$branch->nama}}</option>
                                @endif
                                @endforeach
                            </select>
                            </td>
                            <td>
                                <div class="control-label" name="labelJabatan{{$karyawan->id}}" for="jabatan">{{ $karyawan->jabatan->nama }}</div>
                                <select class="form-control" name="jabatan{{$karyawan->id}}" style="display: none; width: 10em;" id="branch">
                                <option value="{{$karyawan->jabatan_id}}">{{ $karyawan->jabatan->nama }}</option>
                                @foreach($jabatans as $jabatan)
                                @if($karyawan->jabatan_id!=$jabatan->id)
                                <option value="{{$jabatan->id}}">{{$jabatan->nama}}</option>
                                @endif
                                @endforeach
                            </td>
                            <td>
                                <div class="btn-group">
                                <button onclick="myButton<?php echo $counter; ?>ViewFunction()" class="btn btn-default" name="buttonView{{$karyawan->id}}" id="buttonView{{$karyawan->id}}" type="button" data-toggle='modal' data-target='#myModalView{{$karyawan->id}}'>
                                <i class="fa fa-address-card-o"></i>
                                </button>
                                <button onclick="myButton<?php echo $counter; ?>UpdateFunction()" class="btn btn-default" name="buttonUpdate{{$karyawan->id}}" id="buttonUpdate{{$karyawan->id}}" type="button">
                                <i class="fa fa-pencil-square-o"></i>
                                </button>
                                <button onclick="" class="btn btn-default" name="buttonDelete{{$karyawan->id}}" id="buttonDelete{{$karyawan->id}}" type="button" data-toggle="modal" data-target="#myModalDelete{{$karyawan->id}}">
                                <i class="fa fa-trash"></i>
                                </button>

                                <input type="submit" class="btn btn-success btn-md" onclick="update<?php echo $counter; ?>Data()" style="display: none" name="buttonSave{{$karyawan->id}}" id="buttonSave{{$karyawan->id}}" value="Update">
                                </div>
                            </td>
                            <script type="text/javascript">
                                function myButton<?php echo $counter; ?>UpdateFunction() {
                                    document.getElementsByName("nama{{ $karyawan->id }}")[0].style.display = 'block';
                                    document.getElementsByName("alamat{{ $karyawan->id }}")[0].style.display = 'block';
                                    document.getElementsByName("kota{{ $karyawan->id }}")[0].style.display = 'block';
                                    document.getElementsByName("provinsi{{ $karyawan->id }}")[0].style.display = 'block';
                                    document.getElementsByName("kontak{{ $karyawan->id }}")[0].style.display = 'block';
                                    document.getElementsByName("branch{{ $karyawan->id }}")[0].style.display = 'block';
                                    document.getElementsByName("jabatan{{ $karyawan->id }}")[0].style.display = 'block';

                                    document.getElementsByName("labelCabang{{ $karyawan->id }}")[0].style.display = 'none';
                                    document.getElementsByName("labelJabatan{{ $karyawan->id }}")[0].style.display = 'none';
                                    document.getElementsByName("labelNama{{ $karyawan->id }}")[0].style.display = 'none';
                                    document.getElementsByName("labelAlamat{{ $karyawan->id }}")[0].style.display = 'none';
                                    document.getElementsByName("labelKota{{ $karyawan->id }}")[0].style.display = 'none';
                                    document.getElementsByName("labelProvinsi{{ $karyawan->id }}")[0].style.display = 'none';
                                    document.getElementsByName("labelKontak{{ $karyawan->id }}")[0].style.display = 'none';

                                    var v = document.getElementById("buttonView{{$karyawan->id}}");
                                            v.style.display = 'none';
                                    var x = document.getElementById("buttonUpdate{{$karyawan->id}}");
                                            x.style.display = 'none';
                                    var y = document.getElementById("buttonDelete{{$karyawan->id}}");
                                            y.style.display = 'none';
                                    var z = document.getElementById("buttonSave{{$karyawan->id}}");
                                            z.style.display = 'initial';
                                                                                

                                }
                                function update<?php echo $counter; ?>Data(){
                                }
                                function myFunction() {
                                  var input, filter, table, tr, td,td2, i,text,text2,text3,text4,text5,text6;
                                  input = document.getElementById("myInput");
                                  filter = input.value.toUpperCase();
                                  table = document.getElementById("myTable");
                                  tr = table.getElementsByTagName("tr");

                                  for (i = 0; i < tr.length; i++) {
                                    td = tr[i].getElementsByTagName("td")[0];
                                    td2 = tr[i].getElementsByTagName("td")[1];
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
                                      else if (td2.innerHTML.toUpperCase().indexOf(filter) > -1) {
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
                        <form action="{{ route('karyawan.destroy', $karyawan->id) }}" id="formDelete{{ $karyawan->id}}" name="formDelete{{ $karyawan->id}}" method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <div class="modal fade" id="myModalDelete{{$karyawan->id}}" role="dialog">
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
                                        Anda yakin ingin menghapus karyawan ini?
                                    </h3>
                                </div>
                                <button type="button" style="font-size: 20px;" class="btn btn-default col-sm-offset-4" data-dismiss="modal">Cancel</button>
                                <input type="submit" id="destroy{{ $karyawan->id }}" name="destroy{{ $karyawan->id }}" style="font-size: 20px; margin-left: 1em" class="btn btn-default" value="Yes">
                                <br>
                              </div>
                              
                            </div>
                        </div>
                        </form>

                        <div class="modal fade" id="myModalView{{$karyawan->id}}" role="dialog">
                            <div class="modal-dialog">
                            
                             <!-- Modal content-->
                             <div class="modal-content">
                                    <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                                         <div class="container-fluid" style="margin-top:20px">
                                            <div class="chart-container{{$karyawan->id}}" id="chart-container"></div>
                                            <div class="home-link">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>



    
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/jakerella/jquery-mockjax/master/dist/jquery.mockjax.min.js"></script>
    <script type="text/javascript" src="{{ asset('dist/ogchart/js/jquery.orgchart.js') }}"></script>
    <script type="text/javascript">

    @foreach($karyawanAll as $karyawan)

    <?php $array=null; ?>
    var datascource{{$karyawan->id}} = {
      'id': {{$karyawan->id}},
      'name': '{{$karyawan->nama}}',
      'title': '{{$karyawan->jabatan->nama}}',
      'relationship': '001',
      'children': 
      [
          @foreach($karyawanAll as $children) @if($children->upline_id==$karyawan->id)
            { 'id': '{{$children->id}}','name': '{{$children->nama}}', 'title': '{{$children->jabatan->nama}}', 'relationship': '111', 'children': 
                [    @foreach($karyawanAll as $gchildren) @if($gchildren->upline_id==$children->id)
                    {
                    'id': '{{$gchildren->id}}','name': '{{$gchildren->nama}}', 'title': '{{$gchildren->jabatan->nama}}', 'relationship': '111', 'children':
                            [@foreach($karyawanAll as $g2children) @if($g2children->upline_id==$gchildren->id)
                                {
                                'id': '{{$g2children->id}}','name': '{{$g2children->nama}}', 'title': '{{$g2children->jabatan->nama}}', 'relationship': '111','children':
                                        [
                                            @foreach($karyawanAll as $g3children) @if($g3children->upline_id==$g2children->id)
                                            {
                                            'id': '{{$g3children->id}}','name': '{{$g3children->nama}}', 'title': '{{$g3children->jabatan->nama}}', 'relationship': '111', 'children':
                                                            [
                                                                @foreach($karyawanAll as $g4children) @if($g4children->upline_id==$g3children->id)
                                                                {
                                                                'id': '{{$g4children->id}}','name': '{{$g4children->nama}}', 'title': '{{$g4children->jabatan->nama}}', 'relationship': '111',
                                                                },
                                                                @endif
                                                                @endforeach
                                                            ]
                                            },
                                            @endif
                                            @endforeach
                                        ]
                                },
                                @endif
                                @endforeach
                            ]
                    },
                    @endif
                    @endforeach
                ]
            },
            @endif
            @endforeach
      ]
    };

    <?php if($array!=null){ ?>
    $.mockjax({
      url: '/orgchart/children/3',
      contentType: 'application/json',
      responseTime: 1000,
      responseText: { 'children': [
        { 'id': '4', 'name': 'Pang Pang', 'title': 'engineer', 'relationship': '110' },
        { 'id': '5', 'name': 'Xiang Xiang', 'title': 'UE engineer', 'relationship': '110'}
      ]}
    });
    <?php } ?>
    /*$.mockjax({
      url: '/orgchart/parent/1',
      contentType: 'application/json',
      responseTime: 1000,
      responseText: { 'id': '6','name': 'Lao Lao', 'title': 'general manager', 'relationship': '001' }
    });*/

    /*$.mockjax({
      url: '/orgchart/siblings/1',
      contentType: 'application/json',
      responseTime: 1000,
      responseText: { 'siblings': [
        { 'id': '7','name': 'Bo Miao', 'title': 'department engineer', 'relationship': '110' },
        { 'id': '8', 'name': 'Yu Jie', 'title': 'department engineer', 'relationship': '110' },
        { 'id': '9', 'name': 'Yu Li', 'title': 'department engineer', 'relationship': '110' },
        { 'id': '10', 'name': 'Hong Miao', 'title': 'department engineer', 'relationship': '110' },
        { 'id': '11', 'name': 'Yu Wei', 'title': 'department engineer', 'relationship': '110' },
        { 'id': '12', 'name': 'Chun Miao', 'title': 'department engineer', 'relationship': '110' },
        { 'id': '13', 'name': 'Yu Tie', 'title': 'department engineer', 'relationship': '110' }
      ]}
    });*/

    /*$.mockjax({
      url: '/orgchart/families/1',
      contentType: 'application/json',
      responseTime: 1000,
      responseText: {
        'id': '6',
        'name': 'Lao Lao',
        'title': 'general manager',
        'relationship': '001',
        'children': [
        { 'id': '7','name': 'Bo Miao', 'title': 'department engineer', 'relationship': '110' },
        { 'id': '8', 'name': 'Yu Jie', 'title': 'department engineer', 'relationship': '110' },
        { 'id': '9', 'name': 'Yu Li', 'title': 'department engineer', 'relationship': '110' },
        { 'id': '10', 'name': 'Hong Miao', 'title': 'department engineer', 'relationship': '110' },
        { 'id': '11', 'name': 'Yu Wei', 'title': 'department engineer', 'relationship': '110' },
        { 'id': '12', 'name': 'Chun Miao', 'title': 'department engineer', 'relationship': '110' },
        { 'id': '13', 'name': 'Yu Tie', 'title': 'department engineer', 'relationship': '110' }
      ]}
    });*/

    

    var ajaxURLs{{$karyawan->id}} = {
      'children': '/orgchart/children/',
      'parent': '/orgchart/parent/',
      'siblings': function(nodeData) {
        return '/orgchart/siblings/' + nodeData.id;
      },
      'families': function(nodeData) {
        return '/orgchart/families/' + nodeData.id;
      }
    };

    
    $('.chart-container{{$karyawan->id}}').orgchart({
      'data' : datascource{{$karyawan->id}},
      'ajaxURL': ajaxURLs{{$karyawan->id}},
      'nodeContent': 'title',
      'nodeId': 'id'
    });
    @endforeach
    </script>
    
    
@endsection