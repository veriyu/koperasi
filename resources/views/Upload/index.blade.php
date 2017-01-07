@extends('layouts.app')

@section('title',$module.' - '.$title)

@section('content')

          <div class="">

          {{-- HEADER --}}
            <div class="page-title">
              <div class="title_left">
                <h3>Unggah Data<small></small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  {{-- <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div> --}}
                </div>
              </div>
            </div>
            {{-- /HEADER --}}
            
            <div class="clearfix"></div>

            {{-- BODY --}}
            <div class="row">
              {{-- <div class="col-md-12"> --}}
                <div class="x_panel">
                  <div class="x_title">
                    {{-- <h2>Title 2<small>example</small></h2> --}}
                    <div class="pull-right">
                      {{-- <a href="{{ URL::to('tambah_kegiatan') }}" class="tips btn btn-xs btn-info" title="Tambah Siswa"><i class="fa fa-plus"></i> Tambah</a> --}}


                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="row">
                      <div class="form-group">
                        <div class=" col-xs-12">
                        {{-- content --}}
                        
                        <form action="{{ URL::to('upload_file') }}" method="post" enctype="multipart/form-data"> 
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <table class="table table-striped">
                                
                                <tr>
                                    <td width="300px">Nama Tabel</td>
                                    <td width="100px">
                                      {{-- <input type="text" name="Table" class="form-control" placeholder="Kegiatan"> --}}
                                      <select name="Table" class="form-select"  style="width: 100%">
                                        <option value=""> ... </option>
                                        @foreach($tableName as $table)
                                          <option value="{{ $table->Tables_in_poliklinik }}">{{ $table->Tables_in_poliklinik }}</option>
                                        @endforeach
                                      </select>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>File 1</td>
                                    <td><input type="file" class="file" name="FileUpload1"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>File 2</td>
                                    <td><input type="file" name="FileUpload2"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td> <button type="submit" class="btn btn-success">Unggah</button></td>
                                    <td></td>
                                </tr>
                                
                            </table>
                        </form>
                    
                        {{-- /content --}}
                        </div>
                      </div>
                    </div>
                    <div class="footer pull-right">
                      {{-- {{ $rows->links() }} --}}
                    </div>
                  </div>
                </div>
              {{-- </div> --}}
            </div>
          </div>
          {{-- /BODY --}}



<script type="text/javascript">

$(document).ready(function() {
  $('.tanggal').datepicker({
    dateFormat: "yy-mm-dd",
  });

  $('.form-select').select2({
    allowClear: true
  });

});


</script>

@endsection
