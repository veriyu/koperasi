@extends('layouts.app')

@section('title',$module.' - '.$title)

@section('content')

          <div class="">

          {{-- HEADER --}}
            <div class="page-title">
              <div class="title_left">
                <h3 class="">Laporan Buku Besar <small></small></h3>
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
                  <div class="collapse-link">
                    <ul class="nav navbar-right">
                      <li><a class="" ><small id="small_text">Buka</small>&nbsp;<i class="fa fa-chevron-down" onclick="ubah()"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                </div>

                {{-- KAS --}}
                @include('Laporan/Bukubesar/kas')

                {{-- SIMPANAN SS --}}
                @include('Laporan/Bukubesar/simpanan_ss')

                {{-- SIMPANAN POKOK --}}
                @include('Laporan/Bukubesar/simpanan_pokok')

                {{-- SIMPANAN WAJIB --}}
                @include('Laporan/Bukubesar/simpanan_wajib')

                {{-- ANGSURAN --}}
                @include('Laporan/Bukubesar/angsuran')

                {{-- BUNGA PINJAMAN --}}
                @include('Laporan/Bukubesar/bunga_pinjaman')

                {{-- SERVICE FEE --}}
                @include('Laporan/Bukubesar/service_fee')

                {{-- UANG PANGKAL --}}
                @include('Laporan/Bukubesar/uang_pangkal')

                {{-- PENDAPATAN LAIN-LAIN --}}
                @include('Laporan/Bukubesar/pendapatan_lain')

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
