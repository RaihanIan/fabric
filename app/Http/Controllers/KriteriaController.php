<?php

namespace App\Http\Controllers;


use App\Models\Kriteria;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class KriteriaController extends Controller
{
    public function index() {
        return Inertia::render('KriteriaView');
    }    
}
