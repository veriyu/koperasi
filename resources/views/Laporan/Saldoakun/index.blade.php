@extends('layouts.app')

@section('title',$module.' - '.$title)

@section('content')

          <div class="">

          {{-- HEADER --}}
            <div class="page-title">
              <div class="title_left">
                <h3>Laporan Saldo Akun<small></small></h3>
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
                <div class="x_panel">
                  <div class="x_title">
                    {{-- <h2>Data Kujungan Pasien<small>example</small></h2> --}}
                    <div class="pull-right">



                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="row">
                      <div class="form-group">
                        <div class=" col-xs-12">
                        {{-- content --}}

                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('show.saldoakun') }}" method="GET">
                          
                        <div class="form-group">
                          
                          <div class="row">

                          <div class="row">
                            <div class="col-md-4 text-right">
                              <label class="control-label">Tahun</label>
                            </div>
                            <div class="col-md-4">
                              <select name="Tahun" class="form-select" style="width: 100%">
                                <option>Pilih Tahun</option>
                                @foreach($Tahun as $thn)
                                  <option value="{{$thn}}">{{$thn}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="col-md-4">
                            </div>
                          </div>
                          <div class="clearfix" style="min-height: 10px"></div>

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
