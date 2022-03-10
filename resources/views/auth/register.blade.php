@extends('auth/template')

@section('content')
<div class="container">
  <div class="row align-items-center justify-content-center">
    <div class="col-md-7">
      <h3>Pendaftaran Akun <strong>MyListrik</strong></h3>
      <p class="mb-4">Lengkapi data di bawah ini</p>
      <form action="{{ route('register') }}" method="post" class="mb-3">
        @csrf
        <div class="form-group first">
            <label for="nama">Nama Anda</label>
            <input type="text" class="form-control" placeholder="Nama Anda" id="nama" name="nama_user">
          </div>
        <div class="form-group first">
          <label for="username">email Anda</label>
          <input type="text" class="form-control" placeholder="email" id="username" name="email">
        </div>
        <div class="form-group last mb-3">
          <label for="password">Password Anda</label>
          <input type="password" class="form-control" placeholder="Your Password" id="password" name="password">
        </div>
        <div class="form-group last mb-3">
            <label for="passwordKonf">Konfirmasi Password Anda</label>
            <input type="password" class="form-control" placeholder="Your Password" id="passwordKonf" name="password_confirmation">
          </div>

        <input type="submit" value="Daftar" class="btn btn-block btn-primary">
      </form>
    </div>
  </div>
</div>    
@endsection