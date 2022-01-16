@extends('layouts.master')

@section('content')
<div class="main-content">
        <section class="section">
                            <div class="section-header">
                            <h1>Form Tambah Data</h1>
                    </div>
                         <div class="row">
                            <div class="col-4 col-md-4">
                            <div class="card">
                            <div class="card-header">
                                <h4>Tambah Data</h4>
                    </div>
                    <form action="/simpan" method="POST">
                        {{csrf_field()}}
                            <div class="card-body">
                            <div class="form-group">
                            <label>Nama</label>
                            <input name="nama" type="text" class="form-control" placeholder="Nama">
                    </div>
                            <div class="form-group">
                            <label>Pilih Level</label>
                            <select name="level" class="custom-select">
                                <option selected="hide">Pilih Level</option>
                                <option value="Admin">Admin</option>
                                <option value="Member">Member</option>
                            </select>
                    </div>
                            <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="text" class="form-control" placeholder="Email@gmail.com">
                    </div>
                    </div>
                            <div class="card-footer text-right">
                            <button class="btn btn-success mr-1" type="submit">Submit</button>
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