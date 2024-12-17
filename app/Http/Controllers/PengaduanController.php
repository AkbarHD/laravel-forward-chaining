<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = DB::table('konsultasi')
            ->join('users', 'konsultasi.user_id', '=', 'users.id')
            ->get();
        return view('admin.pengaduan.index', compact('pengaduan'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'keluhan' => 'required|string',
        ]);

        // Logika Forward Chaining
        $keluhan = strtolower($request->input('keluhan'));
        $rekomendasi = $this->forwardChaining($keluhan);

        DB::table('konsultasi')->insert([
            'user_id' => auth()->user()->id,
            'konsultasi' => $keluhan,
            'rekomendasi' => $rekomendasi,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Pengaduan berhasil dikirim.');
    }

    private function forwardChaining($keluhan)
    {
        $keluhan = strtolower($keluhan);

        if (strpos($keluhan, 'daun menguning') !== false) {
            return 'Kemungkinan serangan hama atau kekurangan unsur hara. Solusi:
        1. Periksa kondisi daun lebih lanjut.
        2. Lakukan penyemprotan insektisida dan tambahkan pupuk yang mengandung nitrogen.
        Tetap semangat! Tanaman yang dirawat baik pasti akan kembali sehat.';

        } elseif (strpos($keluhan, 'busuk akar') !== false) {
            return 'Kemungkinan penyakit jamur akibat kelembaban tanah berlebih. Solusi:
        1. Kurangi penyiraman dan pastikan drainase tanah baik.
        2. Aplikasikan fungisida yang sesuai.
        Jangan menyerah! Setiap masalah pasti ada solusinya.';

        } elseif (strpos($keluhan, 'bintik hitam') !== false) {
            return 'Kemungkinan penyakit bercak daun (jamur patogen). Solusi:
        1. Gunakan fungisida yang mengandung mankozeb atau klorotalonil.
        2. Pangkas bagian daun yang terkena agar tidak menyebar.
        Semangat terus! Anda sudah satu langkah lebih dekat menuju tanaman sehat.';

        } elseif (strpos($keluhan, 'ulat') !== false || strpos($keluhan, 'lubang di daun') !== false) {
            return 'Kemungkinan serangan ulat pemakan daun. Solusi:
        1. Lakukan pemantauan rutin pada daun tanaman.
        2. Gunakan insektisida alami atau kimia sesuai dosis.
        Terus pantau tanaman Anda! Keberhasilan hanya tinggal selangkah lagi.';

        } elseif (strpos($keluhan, 'layu') !== false) {
            return 'Kemungkinan penyakit layu bakteri atau kekurangan air. Solusi:
        1. Pastikan penyiraman cukup, namun tidak berlebihan.
        2. Periksa kondisi batang dan pangkal tanaman.
        Tetap semangat! Kualitas perawatan akan memberikan hasil yang terbaik.';

        } elseif (strpos($keluhan, 'bercak putih') !== false) {
            return 'Kemungkinan embun tepung (powdery mildew). Solusi:
        1. Aplikasikan fungisida berbahan aktif sulfur.
        2. Perbaiki sirkulasi udara di area tanaman.
        Jangan berkecil hati, dengan usaha yang konsisten, tanaman Anda akan pulih.';

        } elseif (strpos($keluhan, 'belatung') !== false) {
            return 'Kemungkinan serangan belatung pada umbi. Solusi:
        1. Periksa kondisi tanah dan umbi.
        2. Aplikasikan insektisida pada bagian yang terdampak.
        Ingat, keberhasilan petani adalah hasil dari kerja keras dan perhatian. Semangat!';

        } elseif (strpos($keluhan, 'kutu putih') !== false || strpos($keluhan, 'serangga kecil') !== false) {
            return 'Kemungkinan serangan kutu putih. Solusi:
        1. Bersihkan bagian tanaman yang terinfeksi.
        2. Gunakan pestisida berbahan aktif imidakloprid atau minyak nimba (alami).
        Perjalanan menuju panen yang baik dimulai dari perawatan yang baik. Anda pasti bisa!';

        } else {
            return 'Keluhan belum dapat teridentifikasi. Solusi umum:
        1. Periksa kelembaban tanah, kondisi daun, dan akar.
        2. Konsultasikan dengan ahli pertanian setempat jika gejala berlanjut.
        Jangan khawatir! Setiap masalah memiliki solusi jika Anda terus belajar dan berusaha.';
        }
    }


    public function destroy($id)
    {
        DB::table('konsultasi')->where('id_konsultasi', $id)->delete();
        return redirect()->back()->with('success', 'Pengaduan berhasil dihapus.');
    }

    public function laporan()
    {
        $pengaduan = DB::table('konsultasi')
            ->join('users', 'konsultasi.user_id', '=', 'users.id')
            ->get();

        return view('admin.laporan.index', ['pengaduan' => $pengaduan]);
    }
}
