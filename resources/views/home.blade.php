@extends('layouts.app')

@section('title','Home')

@section('content')

  <div class="row">
    <!-- top tiles -->
    <div class="row tile_count">
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-book"></i>Setoran Masuk</span>
        <div class="count green text-center">{{ $TotalSetoran }}</div>
        <span class="count_bottom">Data Tercatat</span>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Setoran Terbaru</span>
        @if($LastSetoran != NULL)
          <div class="count green "><h4>{{ $LastSetoran->nama_anggota }}</h4></div>
          <span class="count_bottom">{{ $LastSetoran->tanggal }} : {{ $LastSetoran->keterangan }}</span>
        @endif
      </div>

      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-book"></i> Pengeluaran</span>
        <div class="count red text-center">{{ $TotalPengeluaran }}</div>
        <span class="count_bottom">Data Tercatat</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Pengeluaran Terbaru</span>
         @if($LastPengeluaran != NULL)
          <div class="count green ">{{ $LastPengeluaran->nama_anggota }}</div>
          <span class="count_bottom">{{ $LastPengeluaran->tanggal }} : {{ $LastPengeluaran->keterangan }}</span>
        @endif
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">

      </div>
    </div>
    <!-- /top tiles -->
  </div>

  <div class="row top_tiles">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-users"></i></div>
        <div class="count">{{ $TotalAnggota }}</div>
        <br>
        <h3>Total Anggota</h3>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-users"></i></div>
        <div class="count">{{ $AnggotaAktif }}</div>
        <br>
        <h3>Anggota Aktif</h3>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-users"></i></div>
        <div class="count">{{ $AnggotaNonAktif }}</div>
        <br>
        <h3>Anggota Pasif</h3>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-users "></i></div>
        <div class="count">{{ $AnggotaNonAktif }}</div>
        <br>
        <h3>Anggota Non-Aktif</h3>
      </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-comments-o"></i></div>
        <div class="count">179</div>
        <h3>New Sign ups</h3>
        <p>Lorem ipsum psdea itgum rixt.</p>
      </div>
    </div>
   
  </div>
          
@endsection
