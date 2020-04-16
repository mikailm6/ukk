@extends('layouts.master')
@section('title')
  <title>Cari SPP - SPP Master</title>
@endsection
@section('content')

<section class="content-header">
	<h1>
        Pembayaran
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Cari</li>
    </ol>
</section>
<section class="content">
	<div class="row">
    <div class="col-xs-6">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Cari NISN</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="search" action="{{ route('bayar.cari') }}" method="post">
                @csrf
                <div class="form-group">
                  <label>NISN :</label>
                  <input type="text" class="form-control" placeholder="Masukkan NISN" name="cari">
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" >Submit</button>
              </div>
            </form>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
  </div>
</section>

@endsection

