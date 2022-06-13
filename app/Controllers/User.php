<?php

namespace App\Controllers;

class User extends BaseController
{
    public function halaman_awal()
    {
        return view('/pendaftar/halaman_awal/root');
    }
    public function index()
    {
        if (in_groups('admin')) {
            return redirect()->to('home_admin/index');
        } else {
            return redirect()->to('home_pendaftar/index');
        }
    }
}