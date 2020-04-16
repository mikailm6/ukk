@extends('layouts.master')
@section('title')
  <title>Edit Siswa - SPP Master</title>
@endsection
@section('content')

<section class="content-header">
	<h1>
        Data Siswa
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dasboard</a></li>
      <li><a href="#">Data Siswa</a></li>
      <li class="active">Edit Siswa</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Data Siswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="{{ route('siswa.update', $siswa->nisn) }}">
              	@csrf
                @method('put')
                <div class="form-group">
                  <label>NISN</label>
                  <input type="text" class="form-control" placeholder="NISN" name="nisn" value="{{ $siswa->nisn }}">
                </div>
                <div class="form-group">
                  <label>NIS</label>
                  <input type="text" class="form-control" placeholder="NIS" name="nis" value="{{ $siswa->nis }}">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" placeholder="Nama Siswa" name="nama" value="{{ $siswa->nama }}">
                </div>
                <div class="form-group">
                  <label>Kelas</label>
                  <select class="form-control" name="id_kelas">
                    @foreach($kelas as $k)
                    <option value="{{ $k->id_kelas }}" {{ $siswa->id_kelas == $k->id_kelas ? 'selected' : '' }}>{{ $k->nama_kelas }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat">{{ $siswa->alamat }}</textarea>
                </div>
                <div class="form-group">
                  <label>No Telepon</label>
                  <input type="text" class="form-control" placeholder="08xxxxxxxxxx" name="no_telp" value="{{ $siswa->no_telp }}">
                </div>
                <div class="form-group">
                  <label>Kode SPP</label>
                  <select class="form-control" name="id_spp">
                    @foreach($spp as $s)
                    <option value="{{ $s->id_spp }}" {{ $siswa->id_spp == $s->id_spp ? 'selected' : '' }}>{{ $s->id_spp }}</option>
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
	</div>
</section>

@endsection