@extends('layouts.master')
@section('title')
<title>Kelas - SPP Master</title>
@endsection
@section('content')

<section class="content-header">
  <h1>
    Data Kelas
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
    <li class="active">Data Kelas</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Input Data Kelas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form role="form" action="{{ route('kelas.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label>Nama Kelas</label>
              <input type="text" class="form-control" placeholder="Nama Kelas" name="nama_kelas">
            </div>
            <div class="form-group">
              <label>Kompetensi Keahlian</label>
              <input type="text" class="form-control" placeholder="Kompetensi Keahlian" name="kompetensi_keahlian">
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

    <div class="col-xs-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Kelas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="example1" class="table table-striped">
            <thead>
              <tr>
                <th>ID Kelas</th>
                <th>Nama Kelas</th>
                <th>Kompetensi Keahlian</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse($kelas as $k)
              <tr>
                <td>{{ $k->id_kelas }}</td>
                <td>{{ $k->nama_kelas }}</td>
                <td>{{ $k->kompetensi_keahlian }}</td>
                <td>
                  <a href="{{ route('kelas.edit', $k->id_kelas) }}" class="btn btn-warning btn-sm">Edit</a>
                </td>
                <td>
                  <form action="{{ route('kelas.destroy', $k->id_kelas) }}" method="post">
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