@extends('layouts.master')
@section('title')
  <title>Hasil Pencarian - SPP Master</title>
@endsection
@section('content')

<section class="content-header">
	<h1>
        Pembayaran
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dasboard</a></li>
      <li class="active">Cari</li>
      <li class="active">Hasil Cari</li>
    </ol>
</section>
<section class="content">

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Siswa</h3>
        </div>
        <div class="box-body">
          <table class="table">
            <thead>
            </thead>
            <tbody>
              @forelse($siswa as $s)
              <tr>
                <td>NISN </td>
                <td>: {{ $s->nisn }}</td>
              </tr>
              <tr>
                <td>NIS </td>
                <td>: {{ $s->nis }}</td>
              </tr>
              <tr>
                <td>Nama Siswa </td>
                <td>: {{ $s->nama }}</td>
              </tr>
              <tr>
                <td>Kelas </td>
                <td>: {{ $s->kelas->nama_kelas }}</td>
              </tr>
              <tr>
                <td>Alamat </td>
                <td>: {{ $s->alamat }}</td>
              </tr>
              <tr>
                <td>No. Telepon </td>
                <td>: {{ $s->no_telp }}</td>
              </tr>
              @empty
              <tr><td style="text-align:center;">Tidak Ada Data NISN</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="box-footer">
          
        </div>
      </div>
    </div> 
  </div>

	<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Tagihan SPP</h3>
        </div>
        <div class="box-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>ID SPP</th>
                <th>Nama SPP</th>
                <th>Total Tagihan</th>
                <th>Dibayar</th>
                <th>Status Bayar</th>
              </tr>
            </thead>
            <tbody>
              @forelse($siswa as $s)
              <tr>
                <td>{{ $s->id_spp }}</td>
                <td>{{ $s->spp->tahun}}</td>
                <td>{{ $s->spp->nominal }}</td>
                <td>{{ $total }}</td>
                <td>       
                  @if($s->spp->nominal > $total)
                    <div class="label label-warning">Belum Lunas</div>
                  @else
                    <div class="label label-success">Lunas</div>
                  @endif
                </td>
                @empty
                <td colspan="5" style="text-align: center;">Tidak Ada Data</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="box-footer">
          
        </div>
      </div>
    </div> 
  </div>

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Riwayat Pembayaran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped">
                <thead>
                <tr>
                  <th>ID Pembayaran</th>
                  <th>NISN</th>
                  <th>Nama Siswa</th>
                  <th>Nama Petugas</th>
                  <th>Tanggal Bayar</th>
                  <th>Bulan Bayar</th>
                  <th>Tahun Bayar</th>
                  <th>ID SPP</th>
                  <th>Jumlah Bayar</th>
                </tr>
                </thead>
                <tbody>
                @forelse($bayar as $b)
                <tr>
                  <td>{{ $b->id_pembayaran }}</td>
                  <td>{{ $b->nisn }}</td>
                  <td>{{ $b->siswa->nama }}</td>
                  <td>{{ $b->petugas->nama_petugas }}</td>
                  <td>{{ $b->tgl_bayar }}</td>
                  <td>{{ $b->bulan_bayar }}</td>
                  <td>{{ $b->tahun_bayar }}</td>
                  <td>{{ $b->id_spp }}</td>
                  <td>{{ $b->jumlah_bayar }}</td>
                  @empty
                  <td colspan="9" style="text-align: center;">Tidak ada Data</td>
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
