<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class JenisController extends Controller
{
    // Endpoint JSON untuk pengambilan data jenis kain
    public function indexJson()
    {
        return response()->json(Jenis::all()->map(function ($jenis) {
            return [
                'id' => $jenis->id,
                'name' => $jenis->jenis, // Sesuaikan dengan nama kolom di frontend
                'bobot' => $jenis->bobot,
            ];
        }));
    }

    public function index()
    {
        return Inertia::render('JenisKainView', [
            'jenis' => Jenis::all()->map(function ($jenis) {
                return [
                    'id' => $jenis->id,
                    'jenis' => $jenis->jenis,
                    'bobot' => $jenis->bobot,
                ];
            })
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis' => 'required|max:255',
            'bobot' => 'required|integer|min:1|max:5',
        ]);

        Jenis::create($validated);

        return Redirect::route('jenis.index');
    }

    public function destroy(Jenis $jenis)
    {
        $jenis->delete();
        return Redirect::route('jenis.index');
    }

    public function update(Request $request, Jenis $jenis)
    {
        $validated = $request->validate([
            'jenis' => 'nullable|string|max:255',
            'bobot' => 'required|integer|min:1|max:5',
        ]);

        $jenis->update($validated);

        return Redirect::route('jenis.index')->with('success', 'Data Jenis Kain updated successfully');
    }
}
