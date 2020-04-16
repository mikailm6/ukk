@extends('layouts.master')
@section('title')
  <title>Edit Kelas - SPP Master</title>
@endsection
@section('content')

<section class="content-header">
	<h1>
        Data Kelas
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dasboard</a></li>
      <li><a href="#">Data Kelas</a></li>
      <li class="active">Edit Kelas</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Data Kelas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="{{ route('kelas.update', $kelas->id_kelas) }}">
              	@csrf
                @method('put')
                <div class="form-group">
                  <label>Nama Kelas</label>
                  <input type="text" class="form-control" placeholder="Nama Kelas" name="nama_kelas" value="{{ $kelas->nama_kelas }}">
                </div>
                <div class="form-group">
                  <label>Kompetensi Keahlian</label>
                  <input type="text" class="form-control" placeholder="Kompetensi Keahlian" value="{{ $kelas->kompetensi_keahlian }}" name="kompetensi_keahlian">
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