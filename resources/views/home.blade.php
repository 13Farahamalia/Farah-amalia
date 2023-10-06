@extends('navbar')

@section('content')
<br><br>
<h3 style="text-align: center">Data Obat di Apotek Arema</h3>
<div class="card" style="margin: 0 5% auto">
    <div class="card-header">
      <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ route('addDrug') }}'">
        <i class="fas fa-plus-circle"></i> Tambah Baru
      </button>
    </div>
    <div class="card-body">
      @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
            {{ $message }}
          </div>
      @endif
        <table class="table table-sm table-striped table-bordered">
          @csrf
          @method('PUT')
            <thead>
                <tr style="text-align: center">
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Keterangan Obat</th>
                    <th>Dosis</th>
                    <th>Stok</th>
                    <th>Baik digunakan sebelum</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($drug as $data)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $data->obat }}</td>
                        <td>{{ $data->fungsi }}</td>
                        <td>{{ $data->dosis }}</td>
                        <td>{{ $data->stok }}</td>
                        <td>{{ $data->exp }}</td>
                        <td style="display: flex">
                          <a href="{{ route('edit',$data->id) }}" class="btn btn-sm btn-warning" title="Edit Data">
                            <i class="fas fa-edit"></i>
                          </a><br>
                          <a href="/delete/{{ $data->id }}" onsubmit="destroy()" class="btn btn-sm btn-danger" title="Hapus Data">
                            <i class="fas fa-trash"></i>
                          </a>
                          </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function destroy(){
    Swal.fire({
    title: {{ $message }},
    showDenyButton: true,
    confirmButtonText: 'Iya',
    denyButtonText: `Tidak`,
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire('Data berhasil dihapus!', '', 'success')
      } else if (result.isDenied) {
        Swal.fire('Data tidak jadi dihapus', '', 'info')
      }
    })
  }
</script>
@endsection