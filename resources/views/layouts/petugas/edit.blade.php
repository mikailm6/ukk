@extends('layouts.master')
@section('title')
  <title>Edit Petugas - SPP Master</title>
@endsection
@section('content')

<section class="content-header">
	<h1>
        Data User
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dasboard</a></li>
      <li><a href="#"> Data User</a></li>
      <li class="active">Edit User</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Data User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="{{ route('petugas.update', $pet->id_petugas) }}">
              	@csrf
                @method('put')
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" placeholder="Username" name="username" value="{{ $pet->username }}">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" placeholder="Please Re Enter Password / Enter New Password" name="password">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" placeholder="Nama" name="nama_petugas" value="{{ $pet->nama_petugas }}">
                </div>
                <div class="form-group">
                  <label>Level</label>
                  <select class="form-control" name="level">
                    <option value="1" {{ $pet->level == 1 ? 'selected' : '' }}>Admin</option>
                    <option value="2" {{ $pet->level == 2 ? 'selected' : '' }}>Petugas</option>
                    <option value="3" {{ $pet->level == 3 ? 'selected' : '' }}>Siswa</option>
                  </select>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
	</div>
</section>

@endsection