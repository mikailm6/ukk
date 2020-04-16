@extends('layouts.master')
@section('title')
<title>Transaksi - SPP Master</title>
@endsection
@section('content')

<section class="content-header">
  <h1>
    Pembayaran
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
    <li class="active">Tambah Pembayaran</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Input Transaksi Pembayaran</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

          <form role="form" action="{{ route('bayar.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label>Nama Petugas</label>
              <input type="text" readonly="" class="form-control" placeholder="Nama Petugas" name="id_petugas" value="{{ Auth::user()->nama_petugas }}">
            </div>
            <div class="form-group">
              <label>NISN</label>
              <select class="form-control" name="nisn">
                <option value="" selected="" disabled="">-- PILIH NISN --</option>
                @foreach($siswa as $s)
                <option value="{{ $s->nisn }}">{{ $s->nisn }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Tanggal</label>
              <input type="date" class="form-control" name="tgl_bayar">
            </div>
            <div class="form-group">
              <label>Bulan</label>
              <input type="text" class="form-control" placeholder="Bulan" name="bulan_bayar" value="{{ date('M') }}" readonly="">
            </div>
            <div class="form-group">
              <label>Tahun</label>
              <input type="text" class="form-control" placeholder="Tahun" name="tahun_bayar" value="{{ date('Y') }}" readonly="">
            </div>
            <div class="form-group">
              <label>Jumlah Bayar</label>
              <div class="input-group">
                <div class="input-group-addon">Rp.</div>
                <input type="text" class="form-control" placeholder="Jumlah Bayar" name="jumlah_bayar">
              </div>
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