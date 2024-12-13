<?php
namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Harga;
use App\Models\Jenis;
use App\Models\Ketersediaan;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class SupplierController extends Controller
{
    public function index()
{
    // First, recalculate Vektor V for all suppliers
    $this->calculateSupplierVektorV();

    // Rest of the existing code remains the same
    $suppliers = Supplier::with(['harga', 'jenis', 'ketersediaan'])->get();
    $hargaOptions = Harga::all();
    $jenisKainOptions = Jenis::all();
    $ketersediaanOptions = Ketersediaan::all();

    // Get sorted suppliers based on Vektor V
    $supplierVectorV = Supplier::orderBy('vektor_v', 'desc')->get(['id', 'nama_supplier', 'vektor_v']);

    return Inertia::render('SupplierView', [
        'hargaOptions' => $hargaOptions,
        'jenisKainOptions' => $jenisKainOptions,
        'ketersediaanOptions' => $ketersediaanOptions,
        'suppliers' => $suppliers,
        'supplierVectorV' => $supplierVectorV,
    ]);
}

public function calculateSupplierVektorV()
{
    // Step 1: Define Criteria Weights
    $c1 = 4; // Weight for jenis
    $c2 = 5; // Weight for harga
    $c3 = 3; // Weight for ketersediaan

    // Step 2: Normalize Criteria Weights
    $total_weight = $c1 + $c2 + $c3;
    $normal_c1 = $c1 / $total_weight;
    $normal_c2 = $c2 / $total_weight;
    $normal_c3 = $c3 / $total_weight;

    // Step 3: Get Suppliers with Their Criteria
    $suppliers = Supplier::with(['harga', 'jenis', 'ketersediaan'])->get();
    $supplier_scores = [];

    // Step 4: Calculate Vektor S for each supplier
    foreach ($suppliers as $supplier) {
        // Get the criteria weights from the supplier
        $suplier_c1 = $supplier->jenis->bobot ?? 0;
        $suplier_c2 = $supplier->harga->bobot ?? 0;
        $suplier_c3 = $supplier->ketersediaan->bobot ?? 0;

        // Calculate vektor_s for the supplier
        $vektor_s = pow($suplier_c1, $normal_c1) * pow($suplier_c2, $normal_c2) * pow($suplier_c3, $normal_c3);

        // Store the result with the supplier info
        $supplier_scores[] = [
            'supplier' => $supplier,
            'vektor_s' => $vektor_s,
        ];
    }

    // Step 5: Calculate Total Sum of Vektor S
    $total_vektor_s = array_sum(array_column($supplier_scores, 'vektor_s'));

    // Step 6: Calculate and Save Vektor V for each supplier
    foreach ($supplier_scores as $score) {
        $supplier = $score['supplier'];
        $vektor_v = $score['vektor_s'] / $total_vektor_s;

        // Update the supplier with the calculated Vektor V
        $supplier->update([
            'vektor_v' => $vektor_v
        ]);
    }
}
    public function tes()
    {
        // Step 1: Define Criteria Weights
        $c1 = 4; // Weight for jenis
        $c2 = 5; // Weight for harga
        $c3 = 3; // Weight for ketersediaan
    
        // Step 2: Normalize Criteria Weights
        $total_weight = $c1 + $c2 + $c3;
        $normal_c1 = $c1 / $total_weight;
        $normal_c2 = $c2 / $total_weight;
        $normal_c3 = $c3 / $total_weight;
    
        // Step 3: Get Suppliers with Their Criteria
        $suppliers = Supplier::with(['harga', 'jenis', 'ketersediaan'])->get();
        $supplier_scores = [];
    
        // Step 4: Calculate Vektor S for each supplier
        foreach ($suppliers as $supplier) {
            // Get the criteria weights from the supplier
            $suplier_c1 = $supplier->jenis->bobot ?? 0;
            $suplier_c2 = $supplier->harga->bobot ?? 0;
            $suplier_c3 = $supplier->ketersediaan->bobot ?? 0;
    
            // Calculate vektor_s for the supplier
            $vektor_s = pow($suplier_c1, $normal_c1) * pow($suplier_c2, $normal_c2) * pow($suplier_c3, $normal_c3);
    
            // Store the result with the supplier info
            $supplier_scores[] = [
                'id' => $supplier->id,
                'nama_supplier' => $supplier->nama_supplier,
                'vektor_s' => $vektor_s,
            ];
        }
    
        // Step 5: Calculate Total Sum of Vektor S
        $total_vektor_s = array_sum(array_column($supplier_scores, 'vektor_s'));
    
        // Step 6: Calculate Vektor V for each supplier
        foreach ($supplier_scores as $key => $score) {
            $vektor_v = $score['vektor_s'] / $total_vektor_s;
            $supplier_scores[$key]['vektor_v'] = $vektor_v;
        }
    
        // Step 7: Sort Suppliers by Vektor V in descending order
        usort($supplier_scores, function($a, $b) {
            return $b['vektor_v'] <=> $a['vektor_v'];
        });
    
        // Step 8: Return Sorted Suppliers with Their Vektor V
        return response()->json($supplier_scores);
    }    

    public function store(Request $request)
{
    $validated = $request->validate([
        'nama_supplier' => 'required|max:255',
        'alamat' => 'required|max:255',
        'email' => 'required|email',
        'catatantambahan' => 'nullable|string|max:255',
        'harga_id' => 'required|exists:harga,id',
        'jenis_id' => 'required|exists:jenis,id',
        'ketersediaan_id' => 'required|exists:ketersediaan,id',
        'foto_supplier' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('foto_supplier')) {
        $path = $request->file('foto_supplier')->store('supplier_photos', 'public');
        $validated['foto_supplier'] = $path;
    }

    // Create the supplier
    $supplier = Supplier::create($validated);

    // Recalculate Vektor V for all suppliers
    $this->calculateSupplierVektorV();

    return Redirect::route('supplier.index')->with('success', 'Supplier berhasil ditambahkan');
}

public function update(Request $request, Supplier $supplier)
{
    $validated = $request->validate([
        'nama_supplier' => 'required|max:255',
        'email' => 'required|email',
        'alamat' => 'required|max:255',
        'catatantambahan' => 'nullable|string',
        'harga_id' => 'required|exists:harga,id',
        'jenis_id' => 'required|exists:jenis,id',
        'ketersediaan_id' => 'required|exists:ketersediaan,id',
        'foto_supplier' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    // Proses update data
    $supplier->update($validated);

    // Proses upload foto jika ada
    if ($request->hasFile('foto_supplier')) {
        // Hapus foto lama jika ada
        if ($supplier->foto_supplier) {
            Storage::disk('public')->delete($supplier->foto_supplier);
        }

        // Simpan foto baru
        $fotoPath = $request->file('foto_supplier')->store('supplier_photos', 'public');
        $supplier->update(['foto_supplier' => $fotoPath]);
    }

    // Recalculate Vektor V for all suppliers
    $this->calculateSupplierVektorV();

    return back()->with('success', 'Supplier berhasil diupdate');
}

public function destroy(Supplier $supplier) 
{
    $supplier->delete();

    // Recalculate Vektor V for remaining suppliers
    $this->calculateSupplierVektorV();

    return Redirect::route('supplier.index');
}
}
