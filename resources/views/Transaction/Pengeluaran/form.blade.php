@extends('layouts.app')

@section('content')


    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">

          <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('save.pengeluaran') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="IdPengeluaran" value="NULL">
            <input type="hidden" name="Tipe" value="pengeluaran">

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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Dibayar ke<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text"  name="DibayarKe" class="form-control col-md-7 col-xs-12" >
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> No SUK (Slip Uang Keluar)<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text"  name="NoSuk" class="form-control col-md-7 col-xs-12" >
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
                      <input type="hidden" name="Detail[0][NoAkun]" value="100">
                      <td><input type="text" name="Detail[0][NilaiD]" class="form-control col-md-7 col-xs-12 text-right" readonly="true"></td>
                      <td><input type="text" name="Detail[0][NilaiK]" class="form-control col-md-7 col-xs-12 text-right" ></td>
                    </tr>
                    <tr>
                      <td>Simpanan SS</td>
                      <td>460</td>
                      <input type="hidden" name="Detail[1][NoAkun]" value="460">
                      <td><input type="text" name="Detail[1][NilaiD]" class="form-control col-md-7 col-xs-12 text-right"></td>
                      <td><input type="text" name="Detail[1][NilaiK]" class="form-control col-md-7 col-xs-12 text-right" readonly="true"></td>
                    </tr>
                    <tr>
                      <td>Simpanan Pokok</td>
                      <td>500</td>
                      <input type="hidden" name="Detail[2][NoAkun]" value="500">
                      <td><input type="text" name="Detail[2][NilaiD]" class="form-control col-md-7 col-xs-12 text-right" ></td>
                      <td><input type="text" name="Detail[2][NilaiK]" class="form-control col-md-7 col-xs-12 text-right" readonly="true"></td>
                    </tr>
                    <tr>
                      <td>Simpanan Wajib</td>
                      <td>510</td>
                      <input type="hidden" name="Detail[3][NoAkun]" value="510">
                      <td><input type="text" name="Detail[3][NilaiD]" class="form-control col-md-7 col-xs-12 text-right" ></td>
                      <td><input type="text" name="Detail[3][NilaiK]" class="form-control col-md-7 col-xs-12 text-right" readonly="true"></td>
                    </tr>
                    <tr>
                      <td>Pencairan Pinjaman</td>
                      <td>700</td>
                      <input type="hidden" name="Detail[4][NoAkun]" value="700">
                      <td><input type="text" name="Detail[4][NilaiD]" class="form-control col-md-7 col-xs-12 text-right" ></td>
                      <td><input type="text" name="Detail[4][NilaiK]" class="form-control col-md-7 col-xs-12 text-right" readonly="true"></td>
                    </tr>
                    <tr>
                      <td>Biaya Pendidikan</td>
                      <td>716</td>
                      <input type="hidden" name="Detail[5][NoAkun]" value="716">
                      <td><input type="text" name="Detail[5][NilaiD]" class="form-control col-md-7 col-xs-12 text-right" ></td>
                      <td><input type="text" name="Detail[5][NilaiK]" class="form-control col-md-7 col-xs-12 text-right" readonly="true"></td>
                    </tr>
                    <tr>
                      <td>Lain-lain / biaya umum</td>
                      <td>730</td>
                      <input type="hidden" name="Detail[6][NoAkun]" value="730">
                      <td><input type="text" name="Detail[6][NilaiD]" class="form-control col-md-7 col-xs-12 text-right" ></td>
                      <td><input type="text" name="Detail[6][NilaiK]" class="form-control col-md-7 col-xs-12 text-right" readonly="true"></td>
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