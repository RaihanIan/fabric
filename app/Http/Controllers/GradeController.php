<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GradeController extends Controller
{
    public function index() {
        $suppliers = Supplier::with(['harga', 'jenis', 'ketersediaan'])->get();
        return Inertia::render('FrontEnd/GradePage', [
            'suppliers' => $suppliers
        ]);
    }
}   