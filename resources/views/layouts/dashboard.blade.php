@extends('layouts.master')
@section('title')
<title>Dashboard - SPP Master</title>
@endsection
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  </ol>
  <br>
  @if (session('alert'))
  <div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    {{ session('alert') }}
  </div>
  @endif
</section>

<?php
$siswa = App\Siswa::get('nisn')->count();
$kelas = App\Kelas::get('id_kelas')->count();
$user = App\Petugas::get('id_petugas')->count();
$pembayaran = App\Pembayaran::get('id_pembayaran')->count();
?>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{ $siswa }}</h3>

          <p>Jumlah Siswa</p>
        </div>
        <div class="icon">
          <i class="fa fa-user"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{ $kelas }}</h3>

          <p>Jumlah Kelas</p>
        </div>
        <div class="icon">
          <i class="fa fa-flag"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>{{ $user }}</h3>

          <p>Jumlah User</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>{{ $pembayaran }}</h3>

          <p>Jumlah Pembayaran</p>
        </div>
        <div class="icon">
          <i class="fa fa-cart-plus"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
  <!-- Main row -->
  <div class="row">
    <div class="col-xs-12">
      <center>
        <div class="alert alert-info">
          <img src="{{ asset('logo.png') }}" alt="KemDikBud" height="100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <img src="{{ asset('mq.png') }}" alt="MadinatulQuran" height="100px"><br><br>
          <h4>Aplikasi Pembayaran SPP - SPPMaster</h4>
          <p>Aplikasi ini dibuat untuk nilai UKK 2020.</p>
          <p>Semoga aplikasi bisa dinilai setinggi-tinggi nya karena saya sudah mengupayakan yang terbaik untuk aplikasi ini.<sub style="color: #3ac3f9"><small> tapi boong</small></sub> </p>
          <p>Terima kasih. </p>
        </div>
      </center>
    </div>
  </div>
</section>
@endsection