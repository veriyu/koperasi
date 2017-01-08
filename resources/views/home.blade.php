@extends('layouts.app')

@section('title','Home')

@section('content')

  <div class="row">
    
    <!-- top tiles -->
    <div class="row tile_count">
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-book"></i> Total Setoran</span>
        <div class="count green text-center">{{ $TotalSetoran }}</div>
        <span class="count_bottom">Data Tercatat</span>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Setoran Terakhir</span>
        <div class="count green ">{{ $LastSetoran->nama_anggota }}</div>
        <span class="count_bottom">{{ $LastSetoran->tanggal_setoran }} : {{ $LastSetoran->keterangan }}</span>
      </div>
      {{-- <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count"> --}}
        {{-- <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
        <div class="count">123.50</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> --}}
      {{-- </div> --}}
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Kunjungan Bulan Ini</span>
        <div class="count "></div>
        <span class="count_bottom">pasien</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Kunjungan Bulan Lalu</span>
        <div class="count "></div>
        <span class="count_bottom"> Pasien</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        {{-- <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
        <div class="count">2,315</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> --}}
      </div>
    </div>
    <!-- /top tiles -->
  </div>
          
@endsection
