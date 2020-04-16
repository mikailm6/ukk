@extends('layouts.master')
@section('title')
<title>Petugas - SPP Master</title>
@endsection
@section('content')

<section class="content-header">
  <h1>
    Data User
  </h1>
  <br>
  @if (session('success'))
  <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    {{ session('success') }}
  </div>
  @endif
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dasboard</a></li>
    <li class="active">Data User</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Input Data User</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form role="form" action="{{ route('petugas.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" placeholder="Username" name="username">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <div class="form-group">
              <label>Nama<sup>*Panggilan</sup></label>
              <input type="text" class="form-control" placeholder="Nama" name="nama_petugas">
            </div>
            <div class="form-group">
              <label>Level</label>
              <select class="form-control" name="level">
                <option value="1">Admin</option>
                <option value="2">Petugas</option>
                <option value="3">Siswa</option>
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

  <div class="row">
    <div class="col-xs-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data User Petugas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="example1" class="table table-striped">
            <thead>
              <tr>
                <th>Username</th>
                <th>Nama Petugas</th>
                <th>Level</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse($pet as $p)
              <tr>
                <td>{{ $p->username }}</td>
                <td>{{ $p->nama_petugas }}</td>
                @if($p->level == 1)
                <td>Admin</td>
                @elseif($p->level == 2)
                <td>Petugas</td>
                @endif
                <td>
                  <a href="{{ route('petugas.edit', $p->id_petugas) }}" class="btn btn-warning btn-sm">Edit</a>
                </td>
                <td>
                  <form action="{{ route('petugas.destroy', $p->id_petugas) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>
                </td>
                @empty
                <td colspan="4" style="text-align: center;">Tidak ada Data</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <div class="col-xs-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data User Siswa</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="example1" class="table table-striped">
            <thead>
              <tr>
                <th>Username</th>
                <th>Nama</th>
                <th>Level</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse($pet2 as $p2)
              <tr>
                <td>{{ $p2->username }}</td>
                <td>{{ $p2->nama_petugas }}</td>
                <td>Siswa</td>
                <td>
                  <a href="{{ route('petugas.edit', $p2->id_petugas) }}" class="btn btn-warning btn-sm">Edit</a>
                </td>
                <td>
                  <form action="{{ route('petugas.destroy', $p2->id_petugas) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>
                </td>
                @empty
                <td colspan="4" style="text-align: center;">Tidak ada Data</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
</section>

@endsection