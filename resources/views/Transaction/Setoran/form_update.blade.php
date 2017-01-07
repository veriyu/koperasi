@extends('layouts.app')

@section('content')


    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">

          <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('save.setoran') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="IdSetoran" value="{{ $DataSetoran->id_setoran }}">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Anggota<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {{-- <input type="text"  name="NoAnggota" class="form-control col-md-7 col-xs-12" > --}}
                  <select name="NoAnggota" class="form-control col-md-7 col-xs-12 form-select">
                      <option></option>
                    @foreach($DataAnggota as $anggota)
                      @if($anggota->id_anggota == $DataSetoran->id_anggota)
                        <option value="{{ $anggota->id_anggota }}" selected="true">{{ $anggota->nama_anggota }}</option>
                      @else
                        <option value="{{ $anggota->id_anggota }}">{{ $anggota->nama_anggota }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tanggal Setoran<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text"  name="TanggalSetoran" class="form-control col-md-7 col-xs-12 tanggal" value="{{ $DataSetoran->tanggal_setoran }}">
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Keterangan<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea name="Keterangan" class="form-control col-md-7 col-xs-12">{{ $DataSetoran->keterangan }}</textarea>
                </div>
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
  
$('.form-select').select2({
  placeholder: "Pilih Anggota",
  allowClear: true
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

$(document).ready(function() {
  $('.tanggal').datepicker({
    dateFormat: "yy-mm-dd",
  });

  // $('.select2').select2();
});

</script>

@endsection