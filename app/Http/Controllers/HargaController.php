<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class HargaController extends Controller
{
    // Endpoint JSON untuk pengambilan data harga
    public function indexJson()
    {
        return response()->json(Harga::all()->map(function ($harga) {
            return [
                'id' => $harga->id,
                'name' => $harga->harga, // Sesuaikan dengan nama kolom yang digunakan di frontend
                'bobot' => $harga->bobot,
            ];
        }));
    }

    public function index()
    {
        return Inertia::render('HargaView', [
            'harga' => Harga::all()->map(function ($harga) {
                return [
                    'id' => $harga->id,
                    'harga' => $harga->harga,
                    'bobot' => $harga->bobot,
                ];
            })
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'harga' => 'required|max:255',
            'bobot' => 'required|integer|min:1|max:5',
        ]);

        Harga::create($validated);

        return Redirect::route('harga.index');
    }

    public function destroy(Harga $harga)
    {
        $harga->delete();
        return Redirect::route('harga.index');
    }

    public function update(Request $request, Harga $harga)
    {
        $validated = $request->validate([
            'harga' => 'nullable|string|max:255',
            'bobot' => 'required|integer|min:1|max:5',
        ]);

        $dataUpdate = [];

        if (array_key_exists('harga', $validated)) {
            $dataUpdate['harga'] = $validated['harga'];
            $dataUpdate['bobot'] = $validated['bobot'];
        }

        $harga->update($dataUpdate);

        return Redirect::route('harga.index')->with('success', 'Data Harga updated successfully');
    }
}
