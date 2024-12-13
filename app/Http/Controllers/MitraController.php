<?php

namespace App\Http\Controllers;


use App\Models\Mitra;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class MitraController extends Controller
{
    public function landing() {
        return Inertia::render('FrontEnd/Landing', [
            'mitra' => Mitra::all()->map(function($mitra){
                return [
                    'id' => $mitra->id,
                    'name_mitra' => $mitra->name_mitra,
                    'logo_mitra' => $mitra->logo_mitra, 
                ];
            })
        ]);
    }

    public function index() {
        return Inertia::render('MitraView',[
            'mitra' => Mitra::all()->map(function($mitra){
                return [
                    'id'=>$mitra->id,
                    'name_mitra'=>$mitra->name_mitra,
                    'logo_mitra'=>$mitra->logo_mitra, 
                ];
            })
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name_mitra' => 'required|max:255',
            'logo_mitra' => 'required|image|max:2048', // Validation for image file
        ]);

        if ($request->hasFile('logo_mitra')) {
            $path = $request->file('logo_mitra')->store('mitra_logos', 'public'); // Store image in 'public/mitra_logos'
            $validated['logo_mitra'] = $path;
        }

        Mitra::create($validated);

        return Redirect::route('mitra.index');
    }
    
    public function destroy(Mitra $mitra) {
        // Check if a logo file exists and delete it from storage
        if ($mitra->logo_mitra) {
            Storage::disk('public')->delete($mitra->logo_mitra);
        }
        
        // Delete the mitra record
        $mitra->delete();
        
        return Redirect::route('mitra.index')->with('success', 'Mitra deleted successfully');
    }
    

    public function update(Request $request, Mitra $mitra) {
        $validated = $request->validate([
            'name_mitra' => 'nullable|string|max:255',
            'logo_mitra' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $dataUpdate = [];
    
        // Only add 'name_mitra' if it exists in validated data
        if (array_key_exists('name_mitra', $validated)) {
            $dataUpdate['name_mitra'] = $validated['name_mitra'];
        }

        if ($request->hasFile('logo_mitra')) {
            // Hapus logo lama jika ada
            if ($mitra->logo_mitra) {
                Storage::disk('public')->delete($mitra->logo_mitra);
            }

            // Simpan logo baru
            $path = $request->file('logo_mitra')->store('mitra_logos', 'public');
            $dataUpdate['logo_mitra'] = $path;
        }  

        $mitra->update($dataUpdate);

        return Redirect::route('mitra.index')->with('success', 'Data mitra updated successfully');
    }

    
}
