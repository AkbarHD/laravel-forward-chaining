<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function homeadmin()
    {
        $totalUser = DB::table('users')->count();
        $totalPengaduan = DB::table('konsultasi')->where('user_id', auth()->user()->id)->count();
        return view('admin.homeadmin', compact('totalUser', 'totalPengaduan'));
    }
}
