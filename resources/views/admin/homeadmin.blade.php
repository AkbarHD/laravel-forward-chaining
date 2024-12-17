@extends('admin.layouts.tamplate')

@section('title', 'Dashboard')

@section('css')
    <style>
        /* Google Fonts Import */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');

        body {
            background-color: #f4f6f9;
            font-family: 'Inter', sans-serif;
        }

        .dashboard-container {
            padding: 40px 0;
        }

        .welcome-section {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            border-radius: 15px;
            color: white;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .welcome-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(-45deg);
        }

        .welcome-section h2 {
            font-weight: 700;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
        }

        .welcome-section .user-name {
            font-weight: 600;
            color: #f0f4ff;
        }

        .quick-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            display: flex;
            align-items: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
        }

        .stat-card-icon {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            border-radius: 50%;
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            font-size: 28px;
        }

        .stat-card-content h3 {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .stat-card-content p {
            color: #7f8c8d;
            margin-bottom: 0;
        }

        @media (max-width: 768px) {
            .quick-stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection

@section('content')
    <div class="dashboard-container py-4">
        <div class="container">
            <div class="welcome-section">
                <h2>Halo, selamat datang <span class="user-name">{{ Auth::user()->name }}</span>!</h2>
                <p>Selamat datang di dashboard sistem manajemen Anda. Berikut adalah ringkasan aktivitas hari ini.</p>
            </div>

            <div class="quick-stats">
                <div class="stat-card">
                    <div class="stat-card-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3>{{ $totalUser ?? 0 }}</h3>
                        <p>Total Pengguna</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-card-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="stat-card-content">
                        <h3>{{ $totalPengaduan ?? 0 }}</h3>
                        <p>Total Pengaduan</p>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        // Optional: Tambahkan interaksi atau animasi JavaScript di sini
    </script>
@endsection
