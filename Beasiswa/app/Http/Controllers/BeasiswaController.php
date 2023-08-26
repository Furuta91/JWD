<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{

    public function index()
    {
        $beasiswas = Beasiswa::all();
        return view('beasiswas.index', ['beasiswas' => $beasiswas]);
    }

    public function detail()
    {
        $beasiswas = Beasiswa::all();
        return view('beasiswas.detail', ['beasiswas' => $beasiswas]);
    }

    public function create()
    {
        return view('beasiswas.create');
    }


    public function store(Request $request)
    {
        // CEK DATA YANG SUDAH ADA
        $existingData = Beasiswa::first();
    
        if ($existingData) {
            return redirect()->back()->with('error', 'Anda hanya dapat memperbarui atau menghapus data beasiswa yang sudah ada.');
        }
    
        // JIKA DATA ADA MAKA TIDA BISA MEMASUKAN DATA KE DATABASE
        $beasiswas = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'nomor_hp' => 'required',
            'semester' => 'required',
            'ipk' => 'required',
            'beasiswa' => 'required',
            'berkas' => 'required',
        ]);
    
        $beasiswas = Beasiswa::create($request->all());

        if($beasiswas){
            return redirect()->route('beasiswas.detail')->with('success','Anda Berhasil Mendaftar');
        }
        else{
            return redirect()->back()->with('error','Anda Gagal Mendaftar');
        }
    }

    public function edit(Beasiswa $beasiswa)
    {
        return view('beasiswas.edit', compact('beasiswa'));
    }

    public function update(Request $request, Beasiswa $beasiswa)
    {
        $beasiswas = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'nomor_hp' => 'required',
            'semester' => 'required',
            'ipk' => 'required',
            'beasiswa' => 'required',
            'berkas' => 'required',
        ]);
        
        $beasiswa->update($request->all());

        if ($beasiswas) {
            return redirect()->route('beasiswas.detail')->with('success', 'Data beasiswa berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui data beasiswa.');
        }   
    }

    public function destroy($id)
    {
        $beasiswas = Beasiswa::destroy($id);
        $beasiswas = Beasiswa::all();   
        return view('beasiswas.detail', ['beasiswas' => $beasiswas]);
    }
}
