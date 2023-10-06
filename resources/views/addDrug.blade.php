@extends('navbar')

@section('content')
<br><br>
<h3 style="text-align: center">Form Tambah Data Obat di Apotek Arema</h3>
<div class="card" style="margin: 0 5% auto">
    <div class="card-header">
        <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ url('beranda') }}'">
          Kembali
        </button>
      </div>
      <div class="card-body">
          <form action="{{ url('insert') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
                  <label for="obat" class="col-sm-2 col-form-label">Nama Obat</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" id="obat" name="obat">
                  </div>
              </div>
              <div class="row mb-3">
                  <label for="keterangan" class="col-sm-2 col-form-label">Keterangan Obat</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" id="keterangan" name="keterangan">
                  </div>
              </div>
              <div class="row mb-3">
                  <label for="dosis" class="col-sm-2 col-form-label">Dosis</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" id="dosis" name="dosis">
                  </div>
              </div>
              <div class="row mb-3">
                  <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" id="stok" name="stok">
                  </div>
              </div>
              <div class="row mb-3">
                  <label for="exp" class="col-sm-2 col-form-label">Baik digunakan sebelum</label>
                  <div class="col-sm-4">
                  <input type="date" class="form-control form-control-sm" name="exp" id="exp">
                  </div>
              </div>
              <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-6">
                      <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                  </div>
              </div>
          </form>
      </div>
</div>
@endsection