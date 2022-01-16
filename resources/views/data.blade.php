@extends('layouts.master')

@section('content')
<div class="main-content">
        <section class="section">
            <div class="section-header">
            <h1>Data User</h1>
            <div class="section-header-breadcrumb">
            <a href="/tambah" class="btn btn-icon icon-left btn-success float-right"><i class="far fa-edit"></i>Tambah Data</a>
        </div>
        </div>
        @if(session('message'))    
        <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        {{ session('message') }}
                      </div>
                    </div>
        @endif
            <div class="section-body">
            <div class="row">
            <div class="col-8 col-md-8">
            <div class="card">
                  <div class="card-header">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tbody><tr>
                          <th>NO</th>
                          <th>Nama</th>
                          <th>Level</th>
                          <th>Email</th>
                          <th>Action</th>
                        </tr>
                              @foreach ($data as $no => $data)
                        <tr>
                              <td>{{ $no+1 }}</td>
                              <td><a href="/data/{{$data->id}}/profile">{{ $data->nama }}</td></a>
                              <td>{{ $data->level }}</td>
                              <td>{{ $data->email }}</td>

                              <td>
                              <a href="{{ route('data.edit',$data->id) }}" class="badge badge-primary">Edit</a>
                              <a href="#" data-id="{{ $data->id }}" class="badge badge-danger swal-confirm">
                                <form action="{{ route('data.delete',$data->id) }}" id="delete{{ $data->id }}" method="POST">
                                  @csrf
                                  @method('delete')
                                </form>
                              
                                  Delete
                                </a>
                              </td>
                        </tr>
                              @endforeach
                         </div>
                       </div>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection
@push('page-scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

@push('after-scripts')
    <script>
      $(".swal-confirm").click(function(e) {
        id = e.target.dataset.id;
        swal({
            title: 'Yakin Hapus Data?',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                swal('Data Berhasil Di Hapus!', {
                  icon: 'success',
                });
                $(`#delete${id}`).submit();
          } else {
            
            }
          });
      });
    </script>
@endpush