@extends('layouts.master')
@section('title')
<title>Siswa - SPP Master</title>
@endsection
@section('content')

<section class="content-header">
  <h1>
    Data Siswa
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
    <li class="active">Data Siswa</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-4">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Input Data Siswa</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form action="{{ route('siswa.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label>NISN</label>
              <input type="text" class="form-control" placeholder="NISN" name="nisn">
            </div>
            <div class="form-group">
              <label>NIS</label>
              <input type="text" class="form-control" placeholder="NIS" name="nis">
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" placeholder="Nama Siswa" name="nama">
            </div>
            <div class="form-group">
              <label>Kelas</label>
              <select class="form-control" name="id_kelas">
                <option value="" disabled="" selected="">-- PILIH KELAS --</option>
                @foreach($kelas as $k)
                <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" name="alamat"></textarea>
            </div>
            <div class="form-group">
              <label>No Telepon</label>
              <input type="text" class="form-control" placeholder="08xxxxxxxxxx" name="no_telp">
            </div>
            <div class="form-group">
              <label>Kode SPP</label>
              <select class="form-control" name="id_spp">
                <option value="" disabled="" selected="">-- PILIH KODE SPP --</option>
                @foreach($spp as $s)
                <option value="{{ $s->id_spp }}">{{ $s->id_spp }}</option>
                @endforeach
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

    <div class="col-xs-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Siswa</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>NISN</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>No. Telp</th>
                <th>Kode SPP</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse($siswa as $s)
              <tr>
                <td>{{ $s->nisn }}</td>
                <td>{{ $s->nis }}</td>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->kelas->nama_kelas }}</td>
                <td>{{ $s->alamat }}</td>
                <td>{{ $s->no_telp }}</td>
                <td>{{ $s->id_spp }}</td>
                <td>
                  <a href="{{ route('siswa.edit', $s->nisn) }}" class="btn btn-warning btn-sm">Edit</a>
                </td>
                <td>
                  <form action="{{ route('siswa.destroy', $s->nisn) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>
                </td>
                @empty
                <td colspan="8" style="text-align: center;">Tidak ada Data</td>
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