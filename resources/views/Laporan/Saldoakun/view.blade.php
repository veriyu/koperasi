@extends('layouts.app')

@section('title',$module.' - '.$title)

@section('content')

          <div class="">

          {{-- HEADER --}}
            <div class="page-title">
              <div class="title_left">
                <h3>Saldo Akun<small></small></h3>
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
              
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                <div class="x_panel">
                  <div class="text-center">
                    
                    <h1>Daftar Saldo Akun</h1>
                    <h3>{{$Tahun}}</h3>

                  </div>

                  <div class="x_content">
                    <div class="row">
                      <div class="form-group">
                        <div class=" col-xs-12">
                        {{-- content --}}

                          <table class="table table-bordered" style="width: 100%">
                            <thead>
                              <tr>
                                <th class="text-center">No Akun</th>
                                <th class="text-center">Nama Akun</th>
                                <th class="text-center">Saldo Awal</th>
                                <th class="text-center">Periode 1</th>
                                <th class="text-center">Periode 2</th>
                                <th class="text-center">Periode 3</th>
                                <th class="text-center">Periode 4</th>
                                <th class="text-center">Periode 5</th>
                                <th class="text-center">Periode 6</th>
                                <th class="text-center">Periode 7</th>
                                <th class="text-center">Periode 8</th>
                                <th class="text-center">Periode 9</th>
                                <th class="text-center">Periode 10</th>
                                <th class="text-center">Periode 11</th>
                                <th class="text-center">Periode 12</th>                              
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($SaldoAkun as $saldo)
                                <tr>
                                  <td class="text-right">{{ $saldo->no_akun }}</td>
                                  <td>{{ $saldo->nama_akun }}</td>
                                  <td class="text-right">{{ number_format($saldo->saldo_awal) }}</td>
                                  <td class="text-right">{{ number_format($saldo->saldo_periode_1) }}</td>
                                  <td class="text-right">{{ number_format($saldo->saldo_periode_2) }}</td>
                                  <td class="text-right">{{ number_format($saldo->saldo_periode_3) }}</td>
                                  <td class="text-right">{{ number_format($saldo->saldo_periode_4) }}</td>
                                  <td class="text-right">{{ number_format($saldo->saldo_periode_5) }}</td>
                                  <td class="text-right">{{ number_format($saldo->saldo_periode_6) }}</td>
                                  <td class="text-right">{{ number_format($saldo->saldo_periode_7) }}</td>
                                  <td class="text-right">{{ number_format($saldo->saldo_periode_8) }}</td>
                                  <td class="text-right">{{ number_format($saldo->saldo_periode_9) }}</td>
                                  <td class="text-right">{{ number_format($saldo->saldo_periode_10) }}</td>
                                  <td class="text-right">{{ number_format($saldo->saldo_periode_11) }}</td>
                                  <td class="text-right">{{ number_format($saldo->saldo_periode_12) }}</td>
                                </tr>

                              @endforeach
                            </tbody>
                          </table>

                        {{-- /content --}}
                        </div>
                      </div>
                    </div>
                    <div class="footer pull-right">

                    </div>
                  </div>
                </div>
              
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



$(document).ready(function() {
  $('.tanggal').datepicker({
    dateFormat: "yy-mm-dd",
  });

$('.form-select').select2({
  // placeholder: "Pilih Tahun",
  allowClear: true
});

$('.form-select-tags').select2({
  tags: true,
  // allowClear: true
});

});



</script>

@endsection
