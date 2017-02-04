@extends('layouts.app')

@section('title',$module.' - '.$title)

@section('content')

          <div class="">

          {{-- HEADER --}}
            <div class="page-title">
              <div class="title_left">
                <h3 class="">Laporan Buku Besar - {{$JudulBulan}} {{$JudulTahun}}<small></small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                </div>
              </div>
            </div>
            {{-- /HEADER --}}
            
            <div class="clearfix"></div>

            {{-- BODY --}}
            <div class="row">

                  <div class="x_panel">
                    <div class="text-center collapse-link">
                      <small>Tekan Untuk Membuka Menu Pencarian <i class="fa fa-chevron-down"></i></small>
                    </div>
                    <div class="x_content" style="display: none;">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('show.bukubesar') }}" method="GET">
                          
                            <div class="row">
                              <div class="col-md-4">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Bulan</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                  <select name="Bulan" class="form-select" style="width: 100%">
                                    <option>Pilih Bulan</option>
                                    @foreach($Bulan as $key => $value)
                                      <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            
                              <div class="col-md-4">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tahun</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                  <select name="Tahun" class="form-select" style="width: 100%">
                                    <option>Pilih Tahun</option>
                                    @foreach($Tahun as $thn)
                                      <option value="{{$thn}}">{{$thn}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                              </div>
                            
                              <div class="col-md-4">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Akun</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                  <select name="NoAkun[]" class="form-select-tags" multiple="true" style="width: 100%">
                                    <option>Pilih Akun</option>
                                    @foreach($AkunList as $akun)
                                      <option value="{{$akun->no_akun}}">{{$akun->nama_akun}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>

                            </div>
                            <br>
                            <div class="row">
                              <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-xs btn-success">Tampilkan Data</button>
                              </div>
                            </div>
                          
                        </form>
                    </div>
                  </div>
                

                @foreach($DataLaporan as $laporan)
                  <div class="x_panel">
                    <div class="x_content">
                      <div class="row">
                        <div class="form-group">
                          <div class=" col-xs-12">
                            <div class="col-md-10"><h5>{{ $laporan['NamaAkun'] }}</h5></div><div class="col-md-2 text-right">{{ $laporan['NoAkun']}}</div>
                            <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th class="text-center" rowspan="2" style="width: 100px; vertical-align: middle;">Tanggal</th>
                                  <th class="text-center" valign="center" rowspan="2" style="width: 60px; vertical-align: middle;">No SUM</th>
                                  <th class="text-center" valign="center" rowspan="2" style="vertical-align: middle;">Keterangan</th>
                                  <th class="text-center" valign="center" rowspan="2" style="width: 110px; vertical-align: middle;">Debit</th>
                                  <th class="text-center" valign="center" rowspan="2" style="width: 110px; vertical-align: middle;">Kredit</th>
                                  <th class="text-center" valign="center" colspan="2" >Saldo</th>
                                </tr>
                                <tr>
                                  <th class="text-center" style="width: 110px">Debit</th>
                                  <th class="text-center" style="width: 110px">Kredit</th>
                                </tr>
                              </thead>
                              <tbody>
                                
                                  <?php 
                                    $Saldo = 0;
                                  ?>

                                  <tr>
                                    <td colspan="5" class="text-right">Saldo Awal</td>
                                    @if($Saldo >= 0)
                                      <td class="text-right">{{ number_format($Saldo) }}</td>
                                      <td class="text-right">0</td>
                                    @else
                                      <td class="text-right">0</td>
                                      <td class="text-right">{{ number_format(abs($Saldo)) }}</td>
                                    @endif
                                  </tr>
                                  @if(!empty($laporan['Detail']))
                                    @foreach($laporan['Detail'] as $detail)
                                      @if($detail->nilai_d != NULL || $detail->nilai_k != NULL)
                                      <?php
                                        $Saldo = $Saldo + $detail->nilai_d - $detail->nilai_k;
                                      ?>
                                        <tr>
                                          <td>{{ date("d-m-Y",strtotime($detail->tanggal)) }}</td>
                                          <td class="text-right">{{ $detail->no_sum }}</td>
                                          <td>{{ $detail->keterangan }}</td>
                                          <td class="text-right">{{ number_format($detail->nilai_d) }}</td>
                                          <td class="text-right">{{ number_format($detail->nilai_k) }}</td>
                                          @if($Saldo >= 0)
                                            <td class="text-right">{{ number_format($Saldo) }}</td>
                                            <td class="text-right">0</td>
                                          @else
                                            <td class="text-right">0</td>
                                            <td class="text-right">{{ number_format(abs($Saldo)) }}</td>
                                          @endif
                                        </tr>
                                      @endif
                                    @endforeach
                                  @endif
                                  

                              </tbody>
                            </table>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach

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
    allowClear: true
  });

  $('.form-select-tags').select2({
    tags: true,
    allowClear: true
  });
  
});


</script>


@endsection
