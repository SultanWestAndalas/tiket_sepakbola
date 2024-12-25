<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function index()
    {
        $tikets = Tiket::all();
        return view('tikets.index', compact('tikets'));
    }

    public function pesan(Request $request, Tiket $tiket)
    {
        $request->validate(['jumlah' => 'required|integer|min:1|max:' . $tiket->stok]);

        $tiket->stok -= $request->jumlah;
        $tiket->save();

        return redirect()->back()->with('success', 'Tiket berhasil dipesan!');
    }
}
