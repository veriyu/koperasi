@extends('layouts.app')

@section('title',$module.' - '.$title)

@section('content')


    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">

          <div class="x_content">
            
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('save.akun') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="IdAkun" value="NULL">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Akun<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text"  name="NoAkun" class="form-control col-md-7 col-xs-12" >
                </div>
                @if (count($errors) > 0)
                  <label class="label label-danger">{{ $errors->first('NoAkun') }}</label>
                @endif
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Akun<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text"  name="NamaAkun" class="form-control col-md-7 col-xs-12" >
                </div>
                @if (count($errors) > 0)
                  <label class="label label-danger">{{ $errors->first('NamaAkun') }}</label>
                @endif
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Akun<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text"  name="KategoriAkun" class="form-control col-md-7 col-xs-12" >
                </div>
                @if (count($errors) > 0)
                  <label class="label label-danger">{{ $errors->first('KategoriAkun') }}</label>
                @endif
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                  <button type="submit" class="btn btn-success">Simpan</button>
                  <a href="{{ route('index.akun') }}" " class="btn btn-primary">Batal</a>

                </div>
              </div>

            </form>
          </div>

        </div>
      </div>
    </div>

<script type="text/javascript">

</script>

@endsection