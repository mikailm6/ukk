@extends('layouts.master')
@section('title')
<title>SPP - SPP Master</title>
@endsection
@section('content')

<section class="content-header">
  <h1>
    Data Spp
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
    <li class="active">Data Spp</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Input Data Spp</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form role="form" action="{{ route('spp.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label>Nama SPP</label>
              <input type="text" class="form-control" placeholder="Nama SPP" name="tahun">
            </div>
            <div class="form-group">
              <label>Nominal</label>
              <input type="text" class="form-control" placeholder="Nominal" name="nominal">
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
          <h3 class="box-title">Data Spp</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="example1" class="table table-striped">
            <thead>
              <tr>
                <th>ID Spp</th>
                <th>Nama SPP</th>
                <th>Nominal</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse($spp as $s)
              <tr>
                <td>{{ $s->id_spp }}</td>
                <td>{{ $s->tahun }}</td>
                <td>{{ $s->nominal }}</td>
                <td>
                  <a href="{{ route('spp.edit', $s->id_spp) }}" class="btn btn-warning btn-sm">Edit</a>
                </td>
                <td>
                  <form action="{{ route('spp.destroy', $s->id_spp) }}" method="post">
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