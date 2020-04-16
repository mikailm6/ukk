@extends('layouts.master')
@section('title')
  <title>Edit SPP - SPP Master</title>
@endsection
@section('content')

<section class="content-header">
	<h1>
        Data Spp
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dasboard</a></li>
      <li><a href="#">Data Spp</a></li>
      <li class="active">Edit Spp</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Data Spp</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="{{ route('spp.update', $spp->id_spp) }}">
              	@csrf
                @method('put')
                <div class="form-group">
                  <label>Nama SPP</label>
                  <input type="text" class="form-control" placeholder="Nama SPP" name="tahun" value="{{ $spp->tahun }}">
                </div>
                <div class="form-group">
                  <label>Nominal</label>
                  <input type="text" class="form-control" placeholder="Nominal" value="{{ $spp->nominal }}" name="nominal">
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