@extends('layouts.app')

@section('title','Home')

@section('content')

  <div class="row">
    
    <!-- top tiles -->
    <div class="row tile_count">
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Pasien</span>
        <div class="count green ">{{ $TotalPasien }}</div>
        <span class="count_bottom"></span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-book"></i> Total Kegiatan</span>
        <div class="count green ">{{ $TotalKegiatan }}</div>
        <span class="count_bottom">Data Tercatat</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        {{-- <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
        <div class="count">123.50</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> --}}
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Kunjungan Bulan Ini</span>
        <div class="count ">{{ $BulanIni}}</div>
        <span class="count_bottom">pasien</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Kunjungan Bulan Lalu</span>
        <div class="count ">{{ $BulanLalu}}</div>
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
