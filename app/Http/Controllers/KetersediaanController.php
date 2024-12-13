<?php

namespace App\Http\Controllers;

use App\Models\Ketersediaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class KetersediaanController extends Controller
{
    // Endpoint JSON untuk pengambilan data ketersediaan
    public function indexJson()
    {
        return response()->json(Ketersediaan::all()->map(function ($ketersediaan) {
            return [
                'id' => $ketersediaan->id,
                'name' => $ketersediaan->ketersediaan, // Sesuaikan dengan nama kolom di frontend
                'bobot' => $ketersediaan->bobot,
            ];
        }));
    }

    public function index()
    {
        return Inertia::render('KetersediaanView', [
            'ketersediaan' => Ketersediaan::all()->map(function ($ketersediaan) {
                return [
                    'id' => $ketersediaan->id,
                    'ketersediaan' => $ketersediaan->ketersediaan,
                    'bobot' => $ketersediaan->bobot,
                ];
            })
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ketersediaan' => 'required|max:255',
            'bobot' => 'required|integer|min:1|max:5',
        ]);

        Ketersediaan::create($validated);

        return Redirect::route('ketersediaan.index');
    }

    public function destroy(Ketersediaan $ketersediaan)
    {
        $ketersediaan->delete();
        return Redirect::route('ketersediaan.index');
    }

    public function update(Request $request, Ketersediaan $ketersediaan)
    {
        $validated = $request->validate([
            'ketersediaan' => 'nullable|string|max:255',
            'bobot' => 'required|integer|min:1|max:5',
        ]);

        $ketersediaan->update($validated);

        return Redirect::route('ketersediaan.index')->with('success', 'Data Ketersediaan updated successfully');
    }
}
