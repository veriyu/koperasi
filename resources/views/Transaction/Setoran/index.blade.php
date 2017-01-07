@extends('layouts.app')

@section('title',$module.' - '.$title)

@section('content')

          <div class="">

          {{-- HEADER --}}
            <div class="page-title">

            </div>
            {{-- /HEADER --}}
            
            <div class="clearfix"></div>

            {{-- BODY --}}
            <div class="row">
              {{-- <div class="col-md-12"> --}}
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Setoran<small>dana masuk koperasi</small></h2>
                    <div class="pull-right">
                      {{-- <a href="{{ URL::to('tambahModule') }}" class="tips btn btn-xs btn-info" title="Tambah Siswa"><i class="fa fa-plus"></i> Tambah</a> --}}
                      <a href="{{ route('create.setoran') }}" class="tips btn btn-xs btn-info" title="Tambah Siswa"><i class="fa fa-plus"></i> Tambah</a>


                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="row">
                      <div class="form-group">
                        <div class=" col-xs-12">
                        {{-- content --}}
       
                        <table class="table" style="width: 100%">
                          <thead>
                            <th width="20px">No</th>
                            <th width="120px">No Anggota</th>
                            <th width="">Nama Anggota</th>
                            <th>Keterangan</th>
                            <th width="100px"></th>
                          </thead>
                          <tbody>
                            <tr>
                              @foreach($rows as $row)
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->no_anggota }}</td>
                                <td>{{ $row->nama_anggota }}</td>
                                <td>{{ $row->keterangan }}</td>
                                <td>
                                    <a href="{{ route('update.setoran',Encrypter::encryptID($row->id_setoran) ) }}" class="tips btn btn-xs btn-info" title="Edit"><i class="fa fa-folder-open-o"></i></a>
                                    <button value="{{ $row->id_setoran }}" class="tips btn btn-xs btn-danger hapus-siswa" title="Hapus" onclick="validation(this.value)"><i class="fa fa-trash"></i></button>
                                  </td>
                              @endforeach
                            </tr>
                          </tbody>
                        </table>
                        <div class="row"></div>

                        {{-- /content --}}
                        </div>
                      </div>
                    </div>
                    <div class="footer pull-right">
                      {{ $rows->links() }}
                    </div>
                  </div>
                </div>
              {{-- </div> --}}
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

function ModalCreate( url , title)
{
  // alert(url);
  $('#edit-modals-content').html(' ....Loading content , please wait ...');
  $('.editmodals-title').html(title);
  $('#edit-modals-content').load(url,function(){});
  $('#edit-modals').modal('show');  
}

function validation(val){
  event.preventDefault();
  swal(
    {   
      title: "Yakin akan menghapus?",   
      text: "data tidak dapat dikembalikan!",   
      type: "warning",   
      showCancelButton: true,   
      confirmButtonColor: "#DD6B55",   
      confirmButtonText: "Hapus !",   
      cancelButtonText: "Batal",   
      closeOnConfirm: true,   
      closeOnCancel: true 
    }, 

    function(isConfirm){   
      if (isConfirm) {     
        setTimeout(function(){
            $.ajax({
              url: "{{ URL::to('deleteSetoran/?id=') }}"+val,
              method: 'GET',
            });
        swal("Dihapus!", "Data berhasil dihapus.", "success");   
        location.reload();
        },1500);

        
      } 
    }
  );

}


</script>

@endsection
