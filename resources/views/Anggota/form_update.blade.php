@extends('layouts.app')

@section('content')


    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">

          <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('save.anggota') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="IdAnggota" value="{{ $DataAnggota->id_anggota }}">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Anggota<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text"  name="NoAnggota" class="form-control col-md-7 col-xs-12" value="{{ $DataAnggota->no_anggota }}">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Anggota<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text"  name="NamaAnggota" class="form-control col-md-7 col-xs-12" value="{{ $DataAnggota->nama_anggota}}">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Anggota Penjamin<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="NoAnggotaPenjamin" class="form-control col-md-7 col-xs-12 form-select" style="width: 100%" >
                      <option></option>
                    @foreach($Anggota as $anggota)
                      <option value="{{ $anggota->no_anggota }}" @if($anggota->no_anggota == $DataAnggota->no_anggota_penjamin) selected="true" @endif>{{ $anggota->nama_anggota }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status Keanggotaan<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div id="Status" class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default" data-toggle-class="btn-default" data-toggle-passive-class="btn-default" id="StatusAktif">
                      <input type="radio" name="Status" value="1" id="radioVal1" data-parsley-multiple="Status" @if($DataAnggota->status == 1) checked="true"@endif> Aktif
                    </label>
                    <label class="btn btn-default" data-toggle-class="btn-default" data-toggle-passive-class="btn-default" id="StatusPasif">
                      <input type="radio" name="Status" value="2" id="radioVal3" data-parsley-multiple="Status" @if($DataAnggota->status == 2) checked="true" @endif> Pasif
                    </label>
                    <label class="btn btn-default" data-toggle-class="btn-default" data-toggle-passive-class="btn-default" id="StatusNonAktif">
                      <input type="radio" name="Status" value="0" id="radioVal2" data-parsley-multiple="Status" @if($DataAnggota->status == 0) checked="true" @endif> Non-Aktif
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea name="Alamat" class="form-control col-md-7 col-xs-12">{{ $DataAnggota->alamat }}</textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Telpon<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text"  name="NoTelpon" class="form-control col-md-7 col-xs-12" value="{{ $DataAnggota->no_telpon }}">
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                  <button type="submit" class="btn btn-success">Simpan</button>
                  <a href="{{ route('index.anggota') }}" " class="btn btn-primary">Batal</a>

                </div>
              </div>

            </form>
          </div>

        </div>
      </div>
    </div>

<script type="text/javascript">
  
$('.form-select').select2({
});
    
$('#sel').select2({
  placeholder: " Select",
  allowClear: true,
  ajax:{
    url       : "select",
    type      : "get", // metode post masih ada error pada token (token mismatch)
    dataType  : "json",
    delay     : 250,
    data      : function(params){
      return{
        search: params.term
      }
    },
    processResults: function(data){
      return{
        results: $.map(data.items,function(val,id){
          console.log(val);
          return {id:id, text:val};
        })
      }
    }
  }

});

function checkStat(){
  
  var Stat1 = $('#radioVal1').prop( "checked" );;
  var Stat2 = $('#radioVal2').prop( "checked" );;
  var Stat3 = $('#radioVal3').prop( "checked" );;

  if(Stat1 == true){

    $('#StatusNonAktif').removeClass('active');
    $('#StatusPasif').removeClass('active');
    $('#StatusAktif').addClass('active');

  }else if(Stat2 == true){

    $('#StatusAktif').removeClass('active');
    $('#StatusPasif').removeClass('active');
    $('#StatusNonAktif').addClass('active');

  }else if(Stat3 == true){

    $('#StatusAktif').removeClass('active');
    $('#StatusNonAktif').removeClass('active');
    $('#StatusPasif').addClass('active');

  }
}

$(document).ready(function() {
  $('.tanggal').datepicker({
    dateFormat: "yy-mm-dd",
  });
  
  // checking status keanggotaan
  checkStat();
  
});

</script>

@endsection