@extends('layouts.master')
@section('title')
  <title>Laporan</title>
@endsection

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
@endpush

@section('content')

<section class="content-header">
	<h1>
        Pembayaran
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dasboard</a></li>
      <li class="active">Generate Laporan</li>
    </ol>
</section>
<section class="content">

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Generate Riwayat Pembayaran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable" class="table table-striped" width="100%">
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
                  <td>Rp. {{ $b->jumlah_bayar }}</td>
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

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Generate SPP</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable2" class="table table-striped" width="100%">
                <thead>
                <tr>
                    <th>Nama Siswa</th>
                    <th>Kode SPP</th>
                    <th>NISN</th>
                    <th>Nama SPP</th>
                    <th>Total Tagihan</th>
                    <th>Dibayar</th>
                    <th>Status Bayar</th>
                </tr>
                </thead>
                <tbody>
                @forelse($siswa as $s)
                <?php $total = App\Pembayaran::where('nisn', $s->nisn)->sum(value('jumlah_bayar')); ?>
                <tr>
                    <td>{{ $s->nama }}</td>
                    <td>{{ $s->id_spp }}</td>
                    <td>{{ $s->nisn }}</td>
                    <td>{{ $s->spp->tahun}}</td>
                    <td>RP. {{ $s->spp->nominal }}</td>
                    <td>RP. {{ $total }}</td>
                    <td>       
                      @if($s->spp->nominal > $total)
                        <div class="label label-warning">Belum Lunas</div>
                      @else
                        <div class="label label-success">Lunas</div>
                      @endif
                    </td>
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

@push('scripts')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script type="text/javascript"> 
    $(document).ready(function () {
        $('#datatable').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });

        $('#datatable2').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });

    
</script>

@endpush
