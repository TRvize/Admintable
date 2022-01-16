@extends('layouts.master')

@section('content')
<div class="main-content">
        <section class="section">
                            <div class="section-header">
                            <h1>Edit Data</h1>
                    </div>
                         <div class="row">
                            <div class="col-4 col-md-4">
                            <div class="card">
                    <form action="{{ route('data.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                        @method('patch')
                            <div class="card-body">
                            <div class="form-group">
                            <label><b>Nama</b></label>
                            <input name="nama" type="text" value="{{ $data->nama }}" class="form-control" placeholder="Nama">
                    </div>
                            <div class="form-group">
                            <label><b>Pilih Level</b></label>
                            <select name="level" class="custom-select">
                                <option selected="hide">{{ $data->level }}</option>
                                <option value="Admin"><b>Admin</b></option>
                                <option value="Member"><b>Member</b></option>
                            </select>
                    </div>
                            <div class="form-group">
                            <label><b>Email</b></label>
                            <input name="email" type="text" value="{{ $data->email }}" class="form-control" placeholder="Email@gmail.com">
                    </div>
                            <div class="form-group">
                            <label for="exampleFormControlTextarea1"><b>Avatar</b></label>
                            <input type="file" name="avatar" class="form-control"> 
                    </div>
                            <div class="card-footer text-right">
                            <button class="btn btn-success mr-1" type="submit">Simpan</button>
                            <button class="btn btn-danger" type="reset">Reset</button>
                    </div>
                            <div class="section-body">
                    </div>
                    </div>
                    </div>
            </form>
         </section>
</div>
@endsection