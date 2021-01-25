@extends('adminLayout/index')
@section('content')
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Mata Kuliah</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahdosen"><i
            class="fas fa fa-plus fa-sm text-white-50"></i> &nbsp Tambah Mata Kuliah</a>
</div>

<!-- Modal -->
<form action="/listmatkul/storematkul" method="post">
        @csrf
    <div class="modal fade" id="tambahdosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Tambah Mata Kuliah</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <label>ID Mata Kuliah</label>
              <input type="number" name="matkul_id" id="matkul_id" required="required" class="form-control">
            </div>

            <div class="form-group">
                <label>Nama Mata Kuliah</label>
                <input type="text" name="name" id="name" required="required" class="form-control">
              </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>

</div>
<table class="table table-striped">
    <thead class='bg-primary text-white'>
      <tr>
        <th scope="col" class="text-center">NO.</th>
        <th scope="col" class="text-center">ID</th>
        <th scope="col" class="text-center">MATA KULIAH</th>
        <th colspan="2" width="10%" class="text-center">OPSI</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($matkul as $item)
        <tr>
        <th scope="row" class="text-center" >{{$loop->iteration}}</th>
            <td class="text-center" >{{$item->matkul_id}}</td>
            <td class="text-center">{{$item->name}}</td>
            <td> <a href="#" data-toggle="modal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-target="#editModal_{{$item->id}}">Edit </a>
            <div class="modal fade" id="editModal_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form role="form" method="POST" action="/listmatkul/update/{{$item->slug}}">
                    @method('patch')
                    @csrf
      
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Mata Kuliah</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">                                       
                              <div class="form-group">
                              <label for="exampleInputEmail1">ID Mata Kuliah</label>
                              <input type="Text" class="form-control" id="matkul_id" name="matkul_id" value="{{$item->matkul_id}}">
                            </div>
              
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Mata Kuliah</label>
                                <input type="Text" class="form-control" id="name" name="name" value="{{$item->name}}">
                              </div>

                              <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                    </div>
                </div>
                </form>
            </div>
                          <!-- /.card-body -->
                        
            
    </td>
            <td class="text-center"> <form action="/listmatkul/delete/{{$item->slug}}" method="post">
            @method('delete')
              @csrf
              <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">Delete</button>
              </form> </td>
          </tr>
        @endforeach
    </tbody>
  </table>


<div class="d-flex justify-content-center">
  {!! $matkul->links('pagination') !!}
</div>
@endsection