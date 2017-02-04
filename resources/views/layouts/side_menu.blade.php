<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            @if(Session::get('user_group') == 'admin' || Session::get('user_group') == 'super admin')
            <li><a href="{{URL::to('/home')}}"><i class="fa fa-home"></i> Beranda </a>
            {{-- <li>{{  Session::get('user_group')  }}</li> --}}
                {{-- <ul class="nav child_menu">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a href="index2.html">Dashboard2</a></li>
                    <li><a href="index3.html">Dashboard3</a></li>
                </ul> --}}
            </li>
            @endif
            
            {{-- MODULE SUPER ADMIN --}}
            @if(Session::get('user_group') == 'super admin')
            <li><a><i class="fa fa-cogs "></i>Administrator <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ URL::to('upload') }}"><i class="fa fa-upload"></i>Upload</a></li>
                    <li><a href="{{ URL::to('user') }}"><i class="fa fa-user"></i>User </a></li>
                    {{-- <li><a href="{{ URL::to('pasien') }}">Pasien</a></li> --}}
                    {{-- <li><a href="{{ URL::to('obat') }}">Data Obat</a></li> --}}
                    {{-- <li><a> <span class="fa fa-chevron-down"></span>Laporan</a> --}}
                        {{-- <ul class="nav child_menu"> --}}
                            {{-- <li class="sub_menu"> --}}
                                {{-- <a href="{{ URL::to('laporan_poliklinik_kegiatan') }}">Laporan Kegiatan</a> --}}
                            {{-- </li> --}}
                        {{-- </ul> --}}
                    {{-- </li> --}}
                </ul>
            </li>
            @endif
            {{-- MODULE SUPER ADMIN --}}

            {{-- MODULE ANGGOTA --}}
            <li>
                <a href="{{ URL::to('anggota') }}"><i class="fa fa-users"></i>Anggota </a>
            </li>
            {{-- /MODULE ANGGOTA --}}

            {{-- MODULE ANGGOTA --}}
            <li>
                <a href="{{ URL::to('akun') }}"><i class="fa fa-list-ol"></i>Akun </a>
            </li>
            {{-- /MODULE ANGGOTA --}}

            {{-- MODULE SETORAN --}}
            <li>
                <a href="{{ URL::to('setoran') }}"><i class="fa fa-sign-in"></i>Setoran </span></a>
            </li>
            {{-- /MODULE SETORAN --}}

            {{-- MODULE PINJAMAN --}}
            <li>
                <a href="{{ URL::to('pinjaman') }}"><i class="fa fa-sign-out"></i>Pinjaman </span></a>
            </li>
            {{-- /MODULE PINJAMAN --}}

            {{-- MODULE TUTUP BUKU --}}
            <li>
                <a href="{{ URL::to('tutupbuku') }}"><i class="fa fa-edit"></i>Tutup Buku </span></a>
            </li>
            {{-- /MODULE TUTUP BUKU --}}

            {{-- MODULE LAPORAN --}}
            <li><a><i class="fa fa-line-chart"></i>Laporan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ URL::to('jurnal') }}"><i class="fa fa-book"></i>Jurnal</a></li>
                    <li><a href="{{ URL::to('bukubesar') }}"><i class="fa fa-book"></i>Buku Besar</a></li>
                    <li><a href="{{ URL::to('saldoakun') }}"><i class="fa fa-book"></i>Saldo Akun</a></li>
                    {{-- <li><a href="{{ URL::to('pasien') }}">Pasien</a></li> --}}
                    {{-- <li><a href="{{ URL::to('obat') }}">Data Obat</a></li> --}}
                    {{-- <li><a> <span class="fa fa-chevron-down"></span>Laporan</a> --}}
                        {{-- <ul class="nav child_menu"> --}}
                            {{-- <li class="sub_menu"> --}}
                                {{-- <a href="{{ URL::to('laporan_poliklinik_kegiatan') }}">Laporan Kegiatan</a> --}}
                            {{-- </li> --}}
                        {{-- </ul> --}}
                    {{-- </li> --}}
                </ul>
            </li>
            {{-- MODULE LAPORAN --}}
        </ul>
    </div>
    
    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="row" >
      <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a> -->

    </div>
    <!-- /menu footer buttons -->
   
</div>