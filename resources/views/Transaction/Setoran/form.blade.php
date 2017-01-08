@extends('layouts.app')

@section('content')


    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">

          <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('save.setoran') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="IdSetoran" value="NULL">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Anggota<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {{-- <input type="text"  name="NoAnggota" class="form-control col-md-7 col-xs-12" > --}}
                  <select name="NoAnggota" class="form-control col-md-7 col-xs-12 form-select" style="width: 100%">
                      <option></option>
                    @foreach($DataAnggota as $anggota)
                      <option value="{{ $anggota->id_anggota }}">{{ $anggota->nama_anggota }}</option>
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
                  <input type="text"  name="NoBa" class="form-control col-md-7 col-xs-12" >
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Jumlah Setoran<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text"  name="Jumlah" class="form-control col-md-7 col-xs-12 text-right" >
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
                      <input type="hidden" name="Detail[NoAkun]" value="100">
                      <td><input type="text" name="Detail[NilaiD]" class="form-control col-md-7 col-xs-12 text-right"></td>
                      <td><input type="text" name="Detail[NilaiK]" class="form-control col-md-7 col-xs-12 text-right" readonly="true"></td>
                    </tr>
                    <tr>
                      <td>Simpanan SS</td>
                      <td>460</td>
                      <input type="hidden" name="Detail[NoAkun]" value="460">
                      <td><input type="text" name="Detail[NilaiD]" class="form-control col-md-7 col-xs-12 text-right" readonly="true"></td>
                      <td><input type="text" name="Detail[NilaiK]" class="form-control col-md-7 col-xs-12 text-right"></td>
                    </tr>
                    <tr>
                      <td>Simpanan Pokok</td>
                      <td>500</td>
                      <input type="hidden" name="Detail[NoAkun]" value="500">
                      <td><input type="text" name="Detail[NilaiD]" class="form-control col-md-7 col-xs-12 text-right" readonly="true"></td>
                      <td><input type="text" name="Detail[NilaiK]" class="form-control col-md-7 col-xs-12 text-right"></td>
                    </tr>
                    <tr>
                      <td>Simpanan Wajib</td>
                      <td>510</td>
                      <input type="hidden" name="Detail[NoAkun]" value="510">
                      <td><input type="text" name="Detail[NilaiD]" class="form-control col-md-7 col-xs-12 text-right" readonly="true"></td>
                      <td><input type="text" name="Detail[NilaiK]" class="form-control col-md-7 col-xs-12 text-right"></td>
                    </tr>
                    <tr>
                      <td>Angsuran</td>
                      <td>520</td>
                      <input type="hidden" name="Detail[NoAkun]" value="520">
                      <td><input type="text" name="Detail[NilaiD]" class="form-control col-md-7 col-xs-12 text-right" readonly="true"></td>
                      <td><input type="text" name="Detail[NilaiK]" class="form-control col-md-7 col-xs-12 text-right"></td>
                    </tr>
                    <tr>
                      <td>Bunga Pinjaman</td>
                      <td>600</td>
                      <input type="hidden" name="Detail[NoAkun]" value="600">
                      <td><input type="text" name="Detail[NilaiD]" class="form-control col-md-7 col-xs-12 text-right" readonly="true"></td>
                      <td><input type="text" name="Detail[NilaiK]" class="form-control col-md-7 col-xs-12 text-right"></td>
                    </tr>
                    <tr>
                      <td>Service Fee</td>
                      <td>603</td>
                      <input type="hidden" name="Detail[NoAkun]" value="603">
                      <td><input type="text" name="Detail[NilaiD]" class="form-control col-md-7 col-xs-12 text-right" readonly="true"></td>
                      <td><input type="text" name="Detail[NilaiK]" class="form-control col-md-7 col-xs-12 text-right"></td>
                    </tr>
                    <tr>
                      <td>Uang Pangkal</td>
                      <td>604</td>
                      <input type="hidden" name="Detail[NoAkun]" value="604">
                      <td><input type="text" name="Detail[NilaiD]" class="form-control col-md-7 col-xs-12 text-right" readonly="true"></td>
                      <td><input type="text" name="Detail[NilaiK]" class="form-control col-md-7 col-xs-12 text-right"></td>
                    </tr>
                    <tr>
                      <td>Pend Lain-lain</td>
                      <td>619</td>
                      <input type="hidden" name="Detail[NoAkun]" value="619">
                      <td><input type="text" name="Detail[NilaiD]" class="form-control col-md-7 col-xs-12 text-right" readonly="true"></td>
                      <td><input type="text" name="Detail[NilaiK]" class="form-control col-md-7 col-xs-12 text-right"></td>
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