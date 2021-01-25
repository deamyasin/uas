@extends('adminLayout/index')
@section('content')
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Dosen</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahdosen"><i
            class="fas fa fa-plus fa-sm text-white-50"></i> &nbsp Tambah Dosen</a>
</div>

<!-- Modal -->
<form role="form"  method="POST" action="/listdosen/storedosen">
        @csrf
    <div class="modal fade" id="tambahdosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Tambah Dosen</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <label>NIP</label>
              <input type="number" name="nip" id="nip" required="required" class="form-control datepicker2">
            </div>

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" id="name" required="required" class="form-control datepicker2">
              </div>

            <div class="form-group">
              <label>Mata Kuliah</label>
              <select class="custom-select form-control-border" required="required" name="matkul_id" id="matkul_id">
                <option>- Silahkan Pilih</option>
                @foreach ($matkul as $item)
              <option value="{{$item->matkul_id}}">{{$item->name}}</option>
              @endforeach
            </select>
            </div>

            <div class="form-group">
              <label>Alamat</label>
              <textarea name="alamat"  id="alamat" class="form-control" rows="3"></textarea>
            </div>
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
        <th scope="col" class="text-center">NIP</th>
        <th scope="col" class="text-center">NAMA</th>
        <th scope="col" class="text-center">MATA KULIAH</th>
        <th scope="col" class="text-center">ALAMAT</th>
        <th colspan="2" width="10%" class="text-center">OPSI</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($dosen as $item)
        <tr>
        <th scope="row">{{$loop->iteration}}</th>
            <td class="text-center" >{{$item->nip}}</td>
            <td class="text-center">{{$item->name}}</td>
            <td class="text-center">{{$item->matkul->name}}</td>
            <td class="text-center">{{$item->alamat}}</td>
            <td> <a href="#" data-toggle="modal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-target="#editModal_{{$item->id}}">Edit </a>
            <div class="modal fade" id="editModal_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form role="form" method="POST" action="/listdosen/update/{{$item->slug}}">
                    @method('patch')
                    @csrf
      
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Dosen</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">              
                              <div class="form-group">
                              <label for="exampleInputEmail1">NIP</label>
                              <input type="Text" class="form-control" id="nip" name="nip" value="{{$item->nip}}">
                            </div>
              
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="Text" class="form-control" id="name" name="name" value="{{$item->name}}">
                              </div>

                           <div class="form-group">
                                <label for="exampleSelectBorder">Mata Kuliah</label>
                                <select class="custom-select form-control-border" name="matkul_id" id="matkul_id">
                                    <option>- Pilih Mata Kuliah -</option>   
                                    @foreach ($matkul as $item2)                
                                  <option value="{{$item2->matkul_id}}" {{$item2->matkul_id==$item->matkul_id ? 'selected':''}}> {{$item2->name}}</option>
                                
                                @endforeach
                            </select>
                              </div>

                              <div class="form-group">
                                <label>Alamat</label>
                                <textarea type="text" name="alamat" id="alamat" class="form-control input-lg" rows="3"> {{$item->alamat}} </textarea>
                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" type="submit">Save</button>
                            </div>

                          <!-- /.card-body -->
                          </div>
                          
                        </div>
                    </form>
                    </div>
                    
                </div>
        </div>
    </td>
            <td class="text-center"> <form action="/listdosen/delete/{{$item->slug}}" method="post">
            @method('delete')
              @csrf
              <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">Delete</button>
              </form> </td>
          </tr>
        @endforeach
    </tbody>
  </table>

<div class="d-flex justify-content-center">
  {!! $dosen->links('pagination') !!}
</div>
@endsection