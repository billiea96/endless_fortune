@extends('layouts.layouthomeadmin')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Closing
        </h1>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <form class="form-horizontal" action="{{ url('closing') }}" method="POST">
            {!! csrf_field() !!}
    <div class="col-sm-12" id="defaultShow">
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
        
            
            <fieldset>
            <div class="col-sm-6">
                <fieldset>
                <legend>Data Closing</legend>
                <div class="form-group">
                    <label class="control-label col-sm-5" for="username">ID :</label>
                    <div class="col-sm-5">
                        <label class="control-label" id="idHistori" for="newID">{{ $newID }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-5" for="date">Date :</label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="date" id="date" placeholder="date" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-5" for="komisi">Comission :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" onchange="hitungKomisi(this.value)" name="komisi" id="komisi" placeholder="Rp." required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-5" for="tipe">Type :</label>
                    <div class="col-sm-5">
                        <label class="radio-inline">
                            <input type="radio" onclick="normalClosing()" name="tipe" id="rdoNormalClosing" value="normal closing" checked>Normal Closing
                        </label>
                        <label class="radio-inline">
                            <input type="radio" onclick="leasing()" name="tipe" id="rdoLeasing" value="leasing">Leasing
                        </label>
                    </div>
                </div>
                </fieldset>
            </div>
            <div class="col-sm-6">
                <fieldset>
                <legend>Addition Data</legend>
                <div class="form-group">
                    <label class="control-label col-sm-5" for="idAgent">ID Agent :</label>
                    <div class="col-sm-5">
                        <label class="control-label" id="idAgent">-</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-5" for="namaAgent">Nama Agent:</label>
                    <div class="col-sm-5">
                        <select class="form-control" name="namaAgent" onchange="showID(this.value)" id="upline">
                            <option value="">[Nama Agent]</option>
                            @foreach($karyawans as $karyawan)
                            <option value="{{$karyawan->id}}">[{{$karyawan->no_karyawan}}] - {{$karyawan->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-join">
                    <i class="fa fa-plus"></i>
                    </button>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-5" for="totalUnit">Total unit:</label>
                    <div class="col-sm-5">
                        <input type="number" step="1" class="form-control" name="totalUnit" id="totalUnit" placeholder="1" value="1" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-5" for="totalKomisi">Total Commission:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="totalKomisi" id="totalKomisi" placeholder="Rp." required disabled>
                    </div>
                </div>
                </fieldset>
                </div>
                <div class="col-sm-11" style="text-align: center;  margin-left: 3em;">
                    <button onclick="showLaporan()" class="btn btn-circle" type="button" style="width: 3em;height: 3em;">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                </div>
            </div>    
   
    
        <div class="col-sm-12" id="laporan" style="display: none;">
            <fieldset>
                <div class="col-sm-11" style="text-align: center;  margin-left: 3em;">
                    <button onclick="closeLaporan()" class="btn btn-circle" type="button" style="width: 3em;height: 3em;">
                        <i class="fa fa-chevron-up"></i>
                    </button>
                </div>
                <h3 class="col-sm-12" style="text-align: center; margin-bottom: 1em; text-decoration: underline;">Report</h3>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="no_karyawan" style="text-align: right; margin: 0.5em 0;">ID :</label>
                    <div class="col-sm-1">
                        <p class="control-label" style="margin: 0.5em 0; text-align: left;" id="laporanID" >1</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="no_karyawan" style="text-align: right; margin: 0.5em 0;">Date :</label>
                    <div class="col-sm-2">
                        <p class="control-label" style="margin: 0.5em 0;text-align: left;" id="laporanDate">1</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="no_karyawan" style="text-align: right; margin: 0.5em 0;">Commission :</label>
                    <div class="col-sm-3">
                        <p class="control-label" style="margin: 0.5em 0;text-align: left;padding-left: 0;padding-right: 0;" id="laporanKomisi" >1</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="no_karyawan" style="text-align: right; margin: 0.5em 0;">Type :</label>
                    <div class="col-sm-3">
                        <p class="control-label" style="margin: 0.5em 0;text-align: left;padding-left: 0;padding-right: 0;" id="laporanTipe" >1</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="no_karyawan" style="text-align: right; margin: 0.5em 0;">Agent :</label>
                    <div class="col-sm-3">
                        <p class="control-label" style="margin: 0.5em 0;text-align: left;padding-left: 0;padding-right: 0;" name="laporanAgent" >1</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="no_karyawan" style="text-align: right; margin: 0.5em 0;">Total Unit :</label>
                    <div class="col-sm-3">
                        <p class="control-label" style="margin: 0.5em 0;text-align: left;padding-left: 0;padding-right: 0;" id="laporanUnit" >1</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="no_karyawan" style="text-align: right; margin: 0.5em 0;">Total Commission :</label>
                    <div class="col-sm-4">
                        <p class="control-label" style="margin: 0.5em 0;text-align: left;padding-left: 0;padding-right: 0;" id="laporanTotalKomisi" >1</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="no_karyawan" style="text-align: right; margin: 0.5em 0;">Passive Income :</label>
                    <div class="col-sm-1">
                        <label class="control-label col-sm-5" style="margin: 0.5em 0;" name="laporanAgent" >1</label>
                    </div>
                    <div class="col-sm-5">
                        <label class="control-label col-sm-5" style="margin: 0.5em 0;" name="branch" >1</label>
                    </div>
                </div>
                
                    <!-- div 1st upline -->
                    <div class="form-group" style="">
                        <div class="col-sm-4" style="margin: 0.5em 1.5em;"></div>
                        <p class="col-sm-offset-4" style="padding:0; text-decoration: underline;"><strong>1. Upline 1st</strong></p>
                        <div class="col-sm-4" style="margin: 0.5em 2.1em;"></div>

                        <div class="col-sm-3" style="padding:0;">
                            <p style="margin: 0; padding: 0;text-align: left;" id="uplineFirst"><strong>Kevin Andryano(123dssdfs)</strong></p>
                        </div>
                        <div class="col-sm-2">
                            <p style="margin: 0; padding: 0;text-align: left;" name="branch"><strong>branch</strong></p>
                        </div>
                        <div class="col-sm-4" style="margin: 0.5em 2.1em;"></div>
                        <div class="col-sm-3" style="padding:0;">
                            <p style="margin: 0; padding: 0;text-align: left;" id="komisiUplineFirst"><strong>Rp.</strong></p>
                        </div>
                    </div>
                        
                    
                    <!-- div 2nd upline -->
                    <div class="form-group">
                        <div class="col-sm-4" style="margin: 0.5em 1.5em;"></div>
                        <p class="col-sm-offset-4" style="padding:0; text-decoration: underline;"><strong>2. Upline 2nd</strong></p>
                        <div class="col-sm-4" style="margin: 0.5em 2.1em;"></div>

                        <div class="col-sm-3" style="padding:0;">
                            <p style="margin: 0; padding: 0;text-align: left;" id="uplineSecond"><strong>Kevin Andryano(123dssdfs)</strong></p>
                        </div>
                        <div class="col-sm-2">
                            <p style="margin: 0; padding: 0;text-align: left;" name="branch"><strong>branch</strong></p>
                        </div>
                        <div class="col-sm-4" style="margin: 0.5em 2.1em;"></div>
                        <div class="col-sm-3" style="padding:0;">
                            <p style="margin: 0; padding: 0;text-align: left;" id="komisiUplineSecond"><strong>Rp.</strong></p>
                        </div>
                    </div>
                    
                    <!-- div 3rd upline -->
                    <div class="form-group">
                        <div class="col-sm-4" style="margin: 0.5em 1.5em;"></div>
                        <p class="col-sm-offset-4" style="padding:0; text-decoration: underline;"><strong>3. Upline 3rd</strong></p>
                        <div class="col-sm-4" style="margin: 0.5em 2.1em;"></div>

                        <div class="col-sm-3" style="padding:0;">
                            <p style="margin: 0; padding: 0;text-align: left;" id="uplineThird"><strong>Kevin Andryano(123dssdfs)</strong></p>
                        </div>
                        <div class="col-sm-2">
                            <p style="margin: 0; padding: 0;text-align: left;" name="branch"><strong>branch</strong></p>
                        </div>
                        <div class="col-sm-4" style="margin: 0.5em 2.1em;"></div>
                        <div class="col-sm-3" style="padding:0;">
                            <p style="margin: 0; padding: 0;text-align: left;" id="komisiThird"><strong>Rp.</strong></p>
                        </div>
                    </div>
                    
                    <!-- div principal -->
                    <div class="form-group">
                        <div class="col-sm-4" style="margin: 0.5em 1.5em;"></div>
                        <p class="col-sm-offset-4" style="padding:0; text-decoration: underline;"><strong>4. Principal</strong></p>
                        <div class="col-sm-4" style="margin: 0.5em 2.1em;"></div>

                        <div class="col-sm-3" style="padding:0;">
                            <p style="margin: 0; padding: 0;text-align: left;" id="principal"><strong>Kevin Andryano(123dssdfs)</strong></p>
                        </div>
                        <div class="col-sm-2">
                            <p style="margin: 0; padding: 0;text-align: left;" name="branch"><strong>branch</strong></p>
                        </div>
                        <div class="col-sm-4" style="margin: 0.5em 2.1em;"></div>
                        <div class="col-sm-3" style="padding:0;">
                            <p style="margin: 0; padding: 0;text-align: left;" id="komisiPrincipal"><strong>Rp.</strong></p>
                        </div>
                    </div>
                    
                    <!-- div Vice Principal -->
                    <div class="form-group">
                        <div class="col-sm-4" style="margin: 0.5em 1.5em;"></div>
                        <p class="col-sm-offset-4" style="padding:0; text-decoration: underline;"><strong>5. Vice Principal</strong></p>
                        <div class="col-sm-4" style="margin: 0.5em 2.1em;"></div>

                        <div class="col-sm-3" style="padding:0;">
                            <p style="margin: 0; padding: 0;text-align: left;" id="vicePrincipal"><strong>Kevin Andryano(123dssdfs)</strong></p>
                        </div>
                        <div class="col-sm-2">
                            <p style="margin: 0; padding: 0;text-align: left;" name="branch"><strong>branch</strong></p>
                        </div>
                        <div class="col-sm-4" style="margin: 0.5em 2.1em;"></div>
                        <div class="col-sm-3" style="padding:0;">
                            <p style="margin: 0; padding: 0;text-align: left;" id="komisiVicePrincipal"><strong>Rp.</strong></p>
                        </div>
                    </div>
            </fieldset>
            <div class="col-sm-12" style="margin: 2em;">
                <div class="col-sm-offset-5">
                    <input class="btn btn-success btn-md" style="width: 10em;" type="submit" name="simpan" value="Simpan">
                </div>
            </div>
        </div>
    </form>
    </div>

<!-- Modal -->
<div class="modal fade" id="modal-join" role="dialog">
    <div class="modal-dialog" style="width: 70em;">
    
      <!-- Modal content-->
      <div class="modal-content" >
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Join Closing</h4>
          </div>
          <div class="container-fluid">
              <select class="col-lg-6 form-control" style="margin: 0.2em; width: 64em;" name="namaAgent" onchange="showID(this.value)" id="agentJoin">
                <option value="">[Nama Agent]</option>
                @foreach($karyawans as $karyawan)
                <option value="{{$karyawan->id}}">[{{$karyawan->no_karyawan}}] - {{$karyawan->nama}}</option>
                @endforeach
            </select>
              <?php $counter=1; ?>
              <button class="btn btn-default" type="button" id="buttonTambahJoin1" onclick="tambahAgentJoin1()" style="margin: 0.2em;">
                <i class="fa fa-plus"></i>
            </button>
              <button class="btn btn-default" type="button" id="buttonTambahJoin2" onclick="tambahAgentJoin2()" style="margin: 0.2em; display: none;">
                <i class="fa fa-plus"></i>
            </button>
              <button class="btn btn-default" type="button" id="buttonTambahJoin3" onclick="tambahAgentJoin3()" style="margin: 0.2em; display: none;">
                <i class="fa fa-plus"></i>
            </button>
              <button class="btn btn-default" type="button" id="buttonTambahJoin4" onclick="tambahAgentJoin4()" style="margin: 0.2em; display: none;">
                <i class="fa fa-plus"></i>
            </button>
          </div>
          <div class="table-responsive" style="margin: 1em 3em;">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ID</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Branch</th>
                            <th style="text-align: center; width: 7em;">Unit</th>
                            <th style="text-align: center;">Commision</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=1;$i<=4;$i++){ ?>
                        <tr id="row<?php echo $i ?>" style="">
                            <td id="no<?php echo $i ?>"></td>
                            <td id="nama<?php echo $i ?>"></td>
                            <td id="branch<?php echo $i ?>"></td>
                            <td id="unit<?php echo $i ?>" style="width:7em;">
                                <select class="col-lg-6 form-control" style="" name="unitJoin" onchange="showID(this.value)" id="agentJoin">
                                    <option value="0.5">1/2</option>
                                    <option value="0">0</option>
                                    <option value="0.25">1/4</option>
                                    <option value="0.75">3/4</option>
                                    <option value="1">1</option>
                                </select>
                            </td>
                            <td id="commision<?php echo $i ?>"></td>
                            <td>
                                <div class="btn-group">
                                    <button onclick="deleteJoinAgent()" class="btn btn-default" name="btnDelete1" id="btnDelete1<?php echo $i ?>" type="button">
                                        <i class="fa fa-trash-o"></i>
                                </button>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              <div style="width: 10em; text-align: right; display: inline-block;">
                <label class="control-label" for="totalUnit">Total unit :</label><br>
                <label class="control-label" for="totalUnit">Total Commision :</label>
              </div>
              <div style="width: 20em; text-align: left; display: inline-block;">
                <label class="control-label" for="totalUnit" id="totalUnitJoin"></label><br>
                <label class="control-label" for="totalUnit" id="totalKomisiJoin"></label>
              </div>
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
      
    </div>
  </div>
<script type="text/javascript">
    function showLaporan() {
        document.getElementById("defaultShow").style.display = "none";
        document.getElementById("laporan").style.display = "block";
        document.getElementById("laporan").style.border = "2px double black";
        
        var id,date,komisi,tipe,agent,totalUnit,totalKomisi,branch1,branch2,branch3,branchPrincipal,branchVicePrincipal,upline1,upline2,upline3,principal,vicePrincipal,pasif1,pasif2,pasif3,pasif4,pasif5;
        
        id = document.getElementById("idHistori").innerHTML;
        document.getElementById("laporanID").innerHTML = id;
        
        date = document.getElementsByName("date")[0].value;
        document.getElementById("laporanDate").innerHTML = date;
        
        komisi = document.getElementsByName("komisi")[0].value;
        document.getElementById("laporanKomisi").innerHTML=komisi;
        
        tipe = document.getElementsByName("tipe")[0].value;
        document.getElementById("laporanTipe").innerHTML=tipe;
        
        agent = document.getElementsByName("namaAgent")[0].value;
        document.getElementsByName("laporanAgent")[0].innerHTML=agent;
        document.getElementsByName("laporanAgent")[1].innerHTML=agent;
        
    }
    function closeLaporan(){
        document.getElementById("defaultShow").style.display = "initial";
        document.getElementById("laporan").style.display = "none";
    }
    function hitungKomisi(val){
        var hasil = val-(val*0.1);
        var number_string = val.toString(),
	sisa 	= number_string.length % 3,
	rupiah 	= number_string.substr(0, sisa),
	ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
		
        if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
        }
        document.getElementById("komisi").value = 'Rp. '+rupiah;
        number_string = hasil.toString(),
	sisa 	= number_string.length % 3,
	rupiah 	= number_string.substr(0, sisa),
	ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
		
        if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
        }
        
        
        document.getElementById("totalKomisi").value = 'Rp. '+rupiah;
    }
    function showID(val){
        document.getElementById("idAgent").innerHTML = val;
    }
    function tambahAgentJoin1(){
        document.getElementById("row<?php echo $counter ?>").style.display = "block";         
        document.getElementById("buttonTambahJoin1").style.display = "none";
        document.getElementById("buttonTambahJoin2").style.display = "block";
        <?php $counter++; ?>
    }
    function tambahAgentJoin2(){
        document.getElementById("row<?php echo $counter ?>").style.display = "block";
        document.getElementById("buttonTambahJoin2").style.display = "none";
        document.getElementById("buttonTambahJoin3").style.display = "block";
        <?php $counter++; ?>
    }
    function tambahAgentJoin3(){
        document.getElementById("row<?php echo $counter ?>").style.display = "block";
        document.getElementById("buttonTambahJoin3").style.display = "none";
        document.getElementById("buttonTambahJoin4").style.display = "block";
        <?php $counter++; ?>
    }
    function tambahAgentJoin4(){
        document.getElementById("row<?php echo $counter ?>").style.display = "block";         
        document.getElementById("agentJoin").disabled = "true";
        <?php $counter++; ?>
    }
    
    function normalClosing(){
        document.getElementById("totalUnit").disabled = false;
        document.getElementById("totalUnit").value = "1";
    }
    function leasing(){
        document.getElementById("totalUnit").disabled = true;
        document.getElementById("totalUnit").value = "0";
    }
</script>
@endsection