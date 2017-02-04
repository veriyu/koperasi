@extends('layouts.app')

@section('title',$module.' - '.$title)

@section('content')

          <div class="">

          {{-- HEADER --}}
            <div class="page-title">

            </div>
            {{-- /HEADER --}}
            
            <div class="clearfix"></div>

            {{-- BODY --}}
            <div class="row">
              {{-- <div class="col-md-12"> --}}
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Upload<small>module upload ke database</small></h2>
                    <div class="pull-right">



                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="row">
                      <div class="form-group">
                        <div class=" col-xs-12">
                        {{-- content --}}
                        <form action="{{ route('data.upload') }}" method="post" enctype="multipart/form-data"> 
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <table class="table" style="width: 100%">
                                
                                <tr>
                                    <td width="300px">Nama Tabel</td>
                                    <td width="100px">
                                      {{-- <input type="text" name="Table" class="form-control" placeholder="Kegiatan"> --}}
                                      <select name="Table" class="form-select"  style="width: 100%">
                                        <option value=""> ... </option>
                                        @foreach($tableName as $table)
                                          @if($table->Tables_in_koperasi == 'anggota' | $table->Tables_in_koperasi == 'akun')
                                          <option value="{{ $table->Tables_in_koperasi }}">{{ $table->Tables_in_koperasi }}</option>
                                          @endif
                                        @endforeach
                                      </select>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>File</td>
                                    <td><input type="file" class="file" name="FileUpload1"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td> <button type="submit" class="btn btn-success">Unggah</button></td>
                                    <td></td>
                                </tr>
                                
                            </table>
                        </form>
                        
                        <div class="row"></div>

                        {{-- /content --}}
                        </div>
                      </div>
                    </div>
                    <div class="footer pull-right">

                    </div>
                  </div>
                </div>
              {{-- </div> --}}
            </div>
          </div>
          {{-- /BODY --}}



          <div class="modal fade" id="edit-modals" tabindex="-1" role="dialog">
            <div class="modal-dialog" style="width: 80%">
              <div class="modal-content">
                <div class="modal-header bg-default">

                  <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="editmodals-title">Modal title</h4>
                </div>
                <div class="modal-body" id="edit-modals-content">

                </div>
  
            </div>
          </div>


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
