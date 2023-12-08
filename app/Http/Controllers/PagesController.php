<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $allBerita = Berita::orderBy('id', 'DESC')->get();
        return view('welcome', compact('allBerita'));
    }
    public function single($id)
    {
        $allBerita = Berita::findOrFail($id);
        $allBeritaSingle = Berita::findOrFail($id)->orderBy('id', 'DESC')->paginate(4);
        return view('single', compact('allBerita', 'allBeritaSingle'));
    }
}
