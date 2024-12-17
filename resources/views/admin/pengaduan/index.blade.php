@extends('admin.layouts.tamplate')

@section('title', 'Form Pengaduan')

@section('css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        body {
            background-color: #f4f7f6;
            font-family: 'Poppins', sans-serif;
        }

        .dashboard-container {
            padding: 40px 0;
        }

        .form-container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .form-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .form-container h2 {
            color: #2c3e50;
            margin-bottom: 25px;
            font-weight: 700;
            position: relative;
            padding-bottom: 10px;
        }

        .form-container h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 60px;
            height: 4px;
            background: linear-gradient(to right, #3498db, #2ecc71);
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .btn-success {
            background: linear-gradient(to right, #2ecc71, #27ae60);
            border: none;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .btn-success:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(39, 174, 96, 0.4);
        }

        .table-container {
            margin-top: 40px;
        }

        .card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            color: white;
            text-align: center;
            padding: 20px;
            font-weight: bold
        }

        .table-hover tbody tr:hover {
            background-color: rgba(52, 152, 219, 0.05);
            transition: background-color 0.3s ease;
        }

        .table thead {
            background: linear-gradient(to right, #3498db, #2980b9);
            color: white;
        }

        .btn-danger {
            background: linear-gradient(to right, #e74c3c, #c0392b);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {

            .form-container,
            .table-container {
                padding: 20px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="dashboard-container py-4">
        <div class="container">
            <!-- Form Pengaduan -->
            <div class="form-container">
                <h2 class="mb-4 text-center">Form Pengaduan Bawang Merah</h2>
                <form action="{{ route('pengaduan.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="keluhan" class="form-label fw-bold">Masukkan Keluhan Gejala Anda</label>
                        <textarea class="form-control" id="keluhan" name="keluhan" rows="4"
                            placeholder="Tuliskan gejala yang Anda alami..." required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-lg px-4">Kirim Pengaduan</button>
                    </div>
                </form>
            </div>

            <!-- Tabel Laporan Pengaduan -->
            <div class="table-container">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Laporan Pengaduan</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px;">No</th>
                                        <th>Nama User</th>
                                        <th>Keluhan</th>
                                        <th width="50%">Rekomendasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pengaduan as $index => $item)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{!! $item->konsultasi !!}</td>
                                            <td>{{ $item->rekomendasi ?? 'Belum ada rekomendasi' }}</td>
                                            <td>
                                                <form id="delete-form-{{ $item->id_konsultasi }}"
                                                    action="{{ route('pengaduan.destroy', $item->id_konsultasi) }}"
                                                    method="POST" style="display: inline;">
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
                                            <td colspan="5" class="text-center text-muted">
                                                <em>Tidak ada data pengaduan</em>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#keluhan').summernote({
                placeholder: 'Tuliskan gejala atau keluhan Anda...',
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });


        });

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
