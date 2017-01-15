@extends('layouts.app')

@section('content')


    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">

          <div class="x_content">
            <br />
            <form id="FormSetoram" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('save.setoran') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="IdTransaksi" value="NULL">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Anggota<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {{-- <input type="text"  name="NoAnggota" class="form-control col-md-7 col-xs-12" > --}}
                  <select name="NoAnggota" class="form-control col-md-7 col-xs-12 form-select" style="width: 100%" onchange="getDataAnggota(this.value)">
                      <option></option>
                    @foreach($DataAnggota as $anggota)
                      <option value="{{ $anggota->no_anggota }}">{{ $anggota->nama_anggota }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tanggal Setoran<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text"  name="TanggalSetoran" class="form-control col-md-7 col-xs-12 tanggal" >
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> No SUM (Slip Uang Masuk)<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text"  name="NoSum" class="form-control col-md-7 col-xs-12" >
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> No BA (Buku Anggota)<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text"  name="NoBa" class="form-control col-md-7 col-xs-12" id="NoAnggota" readonly="true">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Jumlah Setoran<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text"  name="Jumlah" class="form-control col-md-7 col-xs-12 text-right" readonly="true" id="JumlahKasDebet">
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Keterangan<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea name="Keterangan" class="form-control col-md-7 col-xs-12"></textarea>
                </div>
              </div>

              <div class="divider-dashed"></div>

              <div class="form-group">
                <table class="table table-striped jambo_table ">
                  <thead>
                    <th >Nama Akun</th>
                    <th style="width: 150px">No Akun</th>
                    <th style="width: 200px">Debet</th>
                    <th style="width: 200px">Kredit</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Kas</td>
                      <td>100</td>
                      <input type="hidden" name="Detail[0][NoAkun]" value="100">
                      <td><input id="kasDebet" type="text" name="Detail[0][NilaiD]" class="form-control col-md-7 col-xs-12 text-right kalkulasi"></td>
                      <td><input id="nilaiK0" type="text" name="Detail[0][NilaiK]" class="form-control col-md-7 col-xs-12 text-right kalkulasi" readonly="true"></td>
                    </tr>
                    <tr>
                      <td>Simpanan SS</td>
                      <td>460</td>
                      <input type="hidden" name="Detail[1][NoAkun]" value="460">
                      <td><input type="text" name="Detail[1][NilaiD]" class="form-control col-md-7 col-xs-12 text-right kalkulasi" readonly="true"></td>
                      <td><input id="nilaiK1" type="text" name="Detail[1][NilaiK]" class="form-control col-md-7 col-xs-12 text-right kalkulasi"></td>
                    </tr>
                    <tr>
                      <td>Simpanan Pokok</td>
                      <td>500</td>
                      <input type="hidden" name="Detail[2][NoAkun]" value="500">
                      <td><input type="text" name="Detail[2][NilaiD]" class="form-control col-md-7 col-xs-12 text-right kalkulasi" readonly="true"></td>
                      <td><input id="nilaiK2" type="text" name="Detail[2][NilaiK]" class="form-control col-md-7 col-xs-12 text-right kalkulasi"></td>
                    </tr>
                    <tr>
                      <td>Simpanan Wajib</td>
                      <td>510</td>
                      <input type="hidden" name="Detail[3][NoAkun]" value="510">
                      <td><input type="text" name="Detail[3][NilaiD]" class="form-control col-md-7 col-xs-12 text-right kalkulasi" readonly="true"></td>
                      <td><input id="nilaiK3" type="text" name="Detail[3][NilaiK]" class="form-control col-md-7 col-xs-12 text-right kalkulasi"></td>
                    </tr>
                    <tr>
                      <td>Angsuran</td>
                      <td>520</td>
                      <input type="hidden" name="Detail[4][NoAkun]" value="520">
                      <td><input type="text" name="Detail[4][NilaiD]" class="form-control col-md-7 col-xs-12 text-right kalkulasi" readonly="true"></td>
                      <td><input id="nilaiK4" type="text" name="Detail[4][NilaiK]" class="form-control col-md-7 col-xs-12 text-right kalkulasi"></td>
                    </tr>
                    <tr>
                      <td>Bunga Pinjaman</td>
                      <td>600</td>
                      <input type="hidden" name="Detail[5][NoAkun]" value="600">
                      <td><input type="text" name="Detail[5][NilaiD]" class="form-control col-md-7 col-xs-12 text-right kalkulasi" readonly="true"></td>
                      <td><input id="nilaiK5" type="text" name="Detail[5][NilaiK]" class="form-control col-md-7 col-xs-12 text-right kalkulasi"></td>
                    </tr>
                    <tr>
                      <td>Service Fee</td>
                      <td>603</td>
                      <input type="hidden" name="Detail[6][NoAkun]" value="603">
                      <td><input type="text" name="Detail[6][NilaiD]" class="form-control col-md-7 col-xs-12 text-right kalkulasi" readonly="true"></td>
                      <td><input id="nilaiK6" type="text" name="Detail[6][NilaiK]" class="form-control col-md-7 col-xs-12 text-right kalkulasi"></td>
                    </tr>
                    <tr>
                      <td>Uang Pangkal</td>
                      <td>604</td>
                      <input type="hidden" name="Detail[7][NoAkun]" value="604">
                      <td><input type="text" name="Detail[7][NilaiD]" class="form-control col-md-7 col-xs-12 text-right kalkulasi" readonly="true"></td>
                      <td><input id="nilaiK7" type="text" name="Detail[7][NilaiK]" class="form-control col-md-7 col-xs-12 text-right kalkulasi"></td>
                    </tr>
                    <tr>
                      <td>Pend Lain-lain</td>
                      <td>619</td>
                      <input type="hidden" name="Detail[8][NoAkun]" value="619">
                      <td><input type="text" name="Detail[8][NilaiD]" class="form-control col-md-7 col-xs-12 text-right kalkulasi" readonly="true"></td>
                      <td><input id="nilaiK8" type="text" name="Detail[8][NilaiK]" class="form-control col-md-7 col-xs-12 text-right kalkulasi"></td>
                    </tr>
                    <tr>
                      <td colspan="2" class="text-right">Jumlah</td>
                      <td>
                        <input id="JumlahNilaiD" type="text" name="Detail[9][JumlahNilaiD]" class="form-control col-md-7 col-xs-12 text-right kalkulasi" readonly="true"></td>
                      <td>
                        <input id="JumlahNilaiK" type="text" name="Detail[9][JumlahNilaiK]" class="form-control col-md-7 col-xs-12 text-right kalkulasi" readonly="true"></td>
                    </tr>
                  </tbody>
                </table>

              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                  <button type="submit" class="btn btn-success">Simpan</button>
                  <a href="{{ route('index.setoran') }}" " class="btn btn-primary">Batal</a>

                </div>
              </div>

            </form>
          </div>

        </div>
      </div>
    </div>

<script type="text/javascript">

function getDataAnggota(NoAnggota){

  $.ajax({
        url: '{{ URL::to("dataAnggota/?NoAnggota=") }}'+NoAnggota,
        type: 'GET',
        dataType: 'json',
        success: function(json) {
            // console.log(json.no_anggota);
            $('#NoAnggota').val(json.no_anggota);
        }
    });
}

function hitung(dInput){

    var val0 = 0;
    var val1 = 0;
    var val2 = 0;
    var val3 = 0;
    var val4 = 0;
    var val5 = 0;
    var val6 = 0;
    var val7 = 0;
    var val8 = 0;

    val0 =+ $('#nilaiK0').val();
    val1 =+ $('#nilaiK1').val();
    val2 =+ $('#nilaiK2').val();
    val3 =+ $('#nilaiK3').val();
    val4 =+ $('#nilaiK4').val();
    val5 =+ $('#nilaiK5').val();
    val6 =+ $('#nilaiK6').val();
    val7 =+ $('#nilaiK7').val();
    val8 =+ $('#nilaiK8').val();
    
    kInput = val0 + val1 + val2 + val3 + val4 + val5 + val6 + val7 + val8;
    
    $('#JumlahNilaiD').val(dInput);
    $('#JumlahNilaiK').val(kInput);
}

$(document).ready(function() {
  $('.tanggal').datepicker({
    dateFormat: "yy-mm-dd",
  });

  $('.form-select').select2({
    placeholder: "Pilih Anggota",
    allowClear: true
  });

  $('.kalkulasi').bind('change keydown keyup',function (){
    // var dInput = this.value;
    var dInput = $('#kasDebet').val();
   
    $('#JumlahKasDebet').val(dInput);

    hitung(dInput);
  });

  $( "#FormSetoram" ).submit(function( event ) {
    
    var value1 = $('#JumlahNilaiD').val();
    var value2 = $('#JumlahNilaiK').val();
    
    if(value1 != value2){
      alert('Debet dan Kredit tidak balance');
      event.preventDefault();
    }
    // event.preventDefault();
  });

});

</script>

@endsection