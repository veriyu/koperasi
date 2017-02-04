@extends('layouts.app')

@section('title',$module.' - '.$title)

@section('content')

          <div class="">

          {{-- HEADER --}}
            <div class="page-title">
              <div class="title_left">
                <h3>Tutup Buku <small></small></h3>
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
              <form action="{{ route('save.tutupbuku') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                <div class="x_panel">
                  <div class="text-center">
                    
                    <h1>Periode {{$Bulan}}</h1>
                    <h3>{{$Tahun}}</h3>
                    <button type="submit" class="btn btn-xs btn-danger">Proses Tutup Buku</button>
                  </div>

                  <div class="x_content">
                    <div class="row">
                      <div class="form-group">
                        <div class=" col-xs-12">
                        {{-- content --}}

                          <table class="table table-bordered" style="width: 100%">
                            <thead>
                              <tr>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">No Akun</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Nama Akun</th>
                                <th colspan="2" class="text-center">Saldo Awal</th>
                                <th colspan="2" class="text-center">Nilai Transaksi</th>
                                <th colspan="2" class="text-center">Saldo Akhir</th>
                              </tr>
                              <tr>
                                <th class="text-center">Nilai D</th>
                                <th class="text-center">Nilai K</th>
                                <th class="text-center">Nilai D</th>
                                <th class="text-center">Nilai K</th>
                                <th class="text-center">Nilai D</th>
                                <th class="text-center">Nilai K</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                              $SaldoAkhir_D = 0;
                              $SaldoAkhir_K = 0;
                            ?>
                              @foreach($SaldoCoa as $coa)
                                @if($coa['SaldoAwal_D'] != 0)
                                <?php
                                  $SaldoAkhir = $coa['SaldoAwal_D'] + ($coa['SaldoBerjalan_D'] - $coa['SaldoBerjalan_K']);
                                ?>
                                @else
                                <?php
                                  $SaldoAkhir = $coa['SaldoAwal_K'] - $coa['SaldoBerjalan_D'] - $coa['SaldoBerjalan_K'];
                                ?>
                                @endif
                                <tr>
                                  <td class="text-right">{{ $coa['NoAkun'] }}</td>
                                  <td>{{ $coa['NamaAkun'] }}</td>
                                  <td class="text-right" >{{ number_format($coa['SaldoAwal_D']) }}</td>
                                  <td class="text-right" >{{ number_format(abs($coa['SaldoAwal_K'])) }}</td>
                                  <td class="text-right" style="color: red">{{ number_format($coa['SaldoBerjalan_D']) }}</td>
                                  <td class="text-right" style="color: red">{{ number_format(abs($coa['SaldoBerjalan_K'])) }}</td>
                                  @if($SaldoAkhir >= 0)
                                    <td class="text-right" style="color: green">{{ number_format($SaldoAkhir) }}</td>
                                    <td class="text-right" style="color: green">0</td>
                                  @else
                                    <td class="text-right" style="color: green">0</td>
                                    <td class="text-right" style="color: green">{{ number_format(abs($SaldoAkhir)) }}</td>
                                  @endif
                                </tr>

                                <input type="hidden" name="Tahun" value="{{ $Tahun }}">
                                <input type="hidden" name="Periode" value="{{ $Periode }}">
                                <input type="hidden" name="SaldoAkhir[{{$coa['NoAkun']}}]" value="{{ $SaldoAkhir }}">
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
              </form>
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
