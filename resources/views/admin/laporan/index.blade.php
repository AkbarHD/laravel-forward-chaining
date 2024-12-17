@extends('admin.layouts.tamplate')

@section('title', 'Laporan Pengaduan')

@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Laporan Pengaduan</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="table-dark">
                                <th class="text-center" style="width: 50px;">No</th>
                                <th>Nama User</th>
                                <th>Keluhan</th>
                                <th>rekomendasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengaduan as $index => $item)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{!! $item->konsultasi !!}</td>
                                    <td>{{ $item->rekomendasi }}</td>
                                    <td>
                                        <form id="delete-form-{{ $item->id_konsultasi }}"
                                            action="{{ route('pengaduan.destroy', $item->id_konsultasi) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm"
                                                onclick="confirmDelete({{ $item->id_konsultasi }})">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">
                                        Tidak ada data pengaduan
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endsection
