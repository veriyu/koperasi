@extends('layouts.app')

@section('title',$module.' - '.$title)

@section('content')


    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">

          <div class="x_content">
            <br />
            <form id="FormSetoran" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('save.setoran') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="IdTransaksi" value="{{ $DataSetoran->id_transaksi }}">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Anggota<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {{-- <input type="text"  name="NoAnggota" class="form-control col-md-7 col-xs-12" > --}}
                  <select name="NoAnggota" class="form-control col-md-7 col-xs-12 form-select" onchange="getDataAnggota(this.value)" style="width: 100%">
                      <option></option>
                    @foreach($DataAnggota as $anggota)
                      @if($anggota->no_anggota == $DataSetoran->id_anggota)
                        <option value="{{ $anggota->no_anggota }}" selected="true">{{ $anggota->nama_anggota }}</option>
                      @else
                        <option value="{{ $anggota->no_anggota }}">{{ $anggota->nama_anggota }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tanggal Setoran<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text"  name="TanggalSetoran" class="form-control col-md-7 col-xs-12 tanggal" value="{{ $DataSetoran->tanggal }}">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> No SUM (Slip Uang Masuk)<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text"  name="NoSum" class="form-control col-md-7 col-xs-12" value="{{ $DataSetoran->no_sum }}">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> No BA (Buku Anggota)<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text"  name="NoBa" class="form-control col-md-7 col-xs-12" value="{{ $DataSetoran->no_ba }}" id="NoAnggota" readonly="true">
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Jumlah Setoran<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text"  name="Jumlah" class="form-control col-md-7 col-xs-12 text-right" value="{{ number_format($DataSetoran->jumlah) }}" id="JumlahKasDebet" readonly="true">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Keterangan<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea name="Keterangan" class="form-control col-md-7 col-xs-12">{{ $DataSetoran->keterangan }}</textarea>
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
                    <?php $i = 0; ?>
                    @foreach($DataSetoranDetail as $detail)
                      <tr>
                        <td>{{ $detail->nama_akun }}</td>
                        <td>{{ $detail->no_akun }}
                            <input type="hidden" name="Detail[{{ $i }}][NoAkun]" value="{{ $detail->no_akun }}">
                        </td>
                        <td><input type="text" name="Detail[{{ $i }}][NilaiD]" class="form-control col-md-7 col-xs-12 text-right kalkulasi" value="{{ $detail->nilai_d }}" @if($detail->no_akun != 100 ) readonly="true" @endif @if($i == 0) id="kasDebet" @endif></td>
                        <td><input type="text" name="Detail[{{ $i }}][NilaiK]" class="form-control col-md-7 col-xs-12 text-right kalkulasi" value="{{ $detail->nilai_k }}" @if($detail->no_akun == 100 ) readonly="true" @endif id="nilaiK{{$i}}"></td>
                      </tr>
                    <?php $i++ ?>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="2" class="text-right">Jumlah</td>
                      <td>
                        <input id="JumlahNilaiD" type="text" name="JumlahNilaiD" class="form-control  text-right kalkulasi" readonly="true"></td>
                      <td>
                        <input id="JumlahNilaiK" type="text" name="JumlahNilaiK" class="form-control  text-right kalkulasi" readonly="true"></td>
                    </tr>
                  </tfoot>
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
    console.log(kInput);

    $('#JumlahKasDebet').val(dInput);
    $('#JumlahNilaiD').val(dInput);
    $('#JumlahNilaiK').val(kInput);
}

$(document).ready(function() {

  // kalkulasi saat form dibuka
  var dInput = $('#kasDebet').val();
  hitung(dInput);

  $('.tanggal').datepicker({
    dateFormat: "yy-mm-dd",
  });

  $('.form-select').select2({
    placeholder: "Pilih Anggota",
    allowClear: true
  });

  // kalkulasi saat nilai di input
  $('.kalkulasi').bind('change keydown keyup',function (){
    var dInput = $('#kasDebet').val();
    
   
    

    hitung(dInput);
  });

  $( "#FormSetoran" ).submit(function( event ) {
    
    var value1 = $('#JumlahNilaiD').val();
    var value2 = $('#JumlahNilaiK').val();
    
    if(value1 != value2){
      swal({
        title : "Peringatan",
        text  : "Nilai Debet dan Kredit tidak balance",
        type  : "warning",
      });
      event.preventDefault();
    }
    // event.preventDefault();
  });

});

</script>

@endsection