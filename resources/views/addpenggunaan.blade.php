@extends('master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Data Penggunaan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard-admin') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('penggunaan') }}">Penggunaan</a></li>
                    <li class="breadcrumb-item active">Penggunaan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Isi data - data dibawah ini dengan benar</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('postpenggunaan') }}" id="quickForm">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="daya">ID Pelanggan</label>
                  <input type="text" name="id_pelanggan" class="form-control" id="ids" placeholder="Masukkan ID Pelanggan">
                </div>
                <div class="form-group">
                  <label for="harga">Bulan</label>
                  <input type="text" name="bulan" class="form-control" id="bulan" placeholder="Masukkan Bulan">
                </div>
                <div class="form-group">
                    <label for="harga">Tahun</label>
                    <input type="text" name="tahun" class="form-control" id="tahun" placeholder="Masukkan Tahun">
                  </div>
                  <div class="form-group">
                    <label for="harga">Meter Awal</label>
                    <input type="text" name="meter_awal" class="form-control" id="meter_awal" placeholder="Masukkan Meter Awal">
                  </div>
                  <div class="form-group">
                    <label for="harga">Meter Akhir</label>
                    <input type="text" name="meter_akhir" class="form-control" id="meter_akhir" placeholder="Masukkan Meter akhir">
                  </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
          </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection