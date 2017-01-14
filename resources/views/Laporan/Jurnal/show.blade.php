@extends('layouts.app')

@section('title',$module.' - '.$title)

@section('content')

          <div class="">

          {{-- HEADER --}}
            <div class="page-title">
              <div class="title_left">
                <h3 class="">Laporan Jurnal <small></small></h3>
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
                <div class="x_panel">
                  <div class="x_title">
                    {{-- <h3><small>Pencarian</small></h3> --}}
                    <ul class="nav navbar-right">
                      <li><a class="collapse-link" ><small id="small_text">Buka</small>&nbsp;<i class="fa fa-chevron-down" onclick="ubah()"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  {{-- FILTER --}}
                  <div class="x_content" style="display: none;" >
                    <div class="row">
                      <div class="form-group">
                        <div class=" col-xs-12">
                        {{-- content header--}}
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('show.jurnal') }}" method="GET">
                          
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-4 text-right">
                              <label class="control-label ">Tanggal Awal</label>
                            </div>
                            <div class="col-md-4">
                              <input type="text" name="TanggalAwal" class="form-control tanggal">
                              <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <div class="col-md-4">
                            </div>
                          </div>
                          <div class="clearfix" style="min-height: 10px"></div>
                          <div class="row">
                            <div class="col-md-4 text-right">
                              <label class="control-label">Tanggal Akhir</label>
                            </div>
                            <div class="col-md-4">
                              <input type="text" name="TanggalAkhir" class="form-control tanggal">
                              <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <div class="col-md-4">
                            </div>
                          </div>
                          
                          <div class="ln_solid"></div>

                          <div class="row">
                            <div class="col-md-4 text-right">
                            </div>
                            <div class="col-md-4">
                              <button type="submit" class="btn btn-success">Tampilkan Data</button>
                  
                            </div>
                            <div class="col-md-4">
                            </div>
                          </div>

                        </div>
                        
                        </form>
                        
                        {{-- /content header--}}
                        </div>
                      </div>
                    </div>
                    <div class="footer pull-right">

                    </div>
                  </div>
                </div>
                {{-- FILTER --}}

                {{-- TITLE --}}
                {{-- <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      <div class="form-group">
                        <div class=" col-xs-12 text-center">
                        <font size="7" align="center">DATA PASIEN POLIKLINIK</font>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> --}}
                {{-- TITLE --}}

                {{-- REPORT --}}
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      <div class="form-group">
                        <div class=" col-xs-12">
                          <table class="table jambo_table">
                            <thead>
                              <tr>
                                <th>Tanggal</th>
                                <th>Nama Anggota</th>
                                <th>Keterangan</th>
                                <th>Nama Akun</th>
                                <th>No Akun</th>
                                <th>Nilai D</th>
                                <th>Nilai K</th>
                              </tr>
                            </thead>
                            <tbody>
                                @if(empty($DataLaporan))
                                  <tr>
                                    <td colspan="7" class="text-center" style="color: red;">Tidak Ada Data Untuk Tanggal {{ $awal }} s/d {{ $akhir }}</td>
                                  </tr>
                                @endif
                                @foreach($DataLaporan as $header)
                                  <tr>
                                    <td>{{ $header['Tanggal'] }}</td>
                                    <td>{{ $header['Nama'] }}</td>
                                    <td>{{ $header['Keterangan'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                  @foreach($header['Detail'] as $detail)
                                    @if($detail->nilai_d >0 | $detail->nilai_k >0)
                                    <tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td class="text-right">{{ $detail->no_akun }}</td>
                                      <td class="text-right">{{ number_format($detail->nilai_d) }}</td>
                                      <td class="text-right">{{ number_format($detail->nilai_k) }}</td>
                                    </tr>
                                    @endif
                                  @endforeach
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
             
                {{-- /REPORT --}}

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

<script>

function ubah(){
  
  var Text = $('#small_text').text();
  // console.log(Text);
  if(Text == 'Buka'){

    $('#small_text').text('Tutup');
  }else{
    $('#small_text').text('Buka');
  }
   
  
}
$(document).ready(function() {
  $('.tanggal').datepicker({
    dateFormat: "yy-mm-dd",
  });

  
});


</script>

@endsection
