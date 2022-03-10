@extends('master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Data Tarif</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard-admin') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('tarif') }}">Tarif</a></li>
                    <li class="breadcrumb-item active">Tarif</li>
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
            <form method="PUT" action="{{ route('updatetarif') }}" id="quickForm">
              @csrf
              <div class="card-body">
                  <input type="hidden" value={{$tarif->id}} name="id">
                <div class="form-group">
                  <label for="daya">Daya</label>
                  <input type="text" name="daya" class="form-control" id="daya" placeholder="Masukkan Daya Listrik"value={{$tarif->daya}}>
                </div>
                <div class="form-group">
                  <label for="harga">Tarif Per Kwh</label>
                  <input type="text" name="tarifperkwh" class="form-control" id="harga" placeholder="Masukkan Tarif Daya"value={{$tarif->tarifperkwh}}>
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