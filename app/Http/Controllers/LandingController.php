<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing');
    }

    // public function siswa()
    // {
    //     return view('siswa');
    // }

    // public function kelas()
    // {
    //     return view('kelas');
    // }

    // public function jeniskelamin()
    // {
    //     return view('jeniskelamin');
    // }

    // public function daftarosis()
    // {
    //     return view('daftarosis');
// }
}
