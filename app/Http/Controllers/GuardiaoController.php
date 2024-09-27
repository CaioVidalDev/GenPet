<?php

namespace App\Http\Controllers;


use App\Models\Guardiao;
use Illuminate\Http\Request;

class GuardiaoController extends Controller
{
    public function index()
    {
        return view('guardiaos.index');
    }

    public function create()
    {
        return view('guardiaos.create');
    }

    public function show(Guardiao $guardiao)
    {
        return view('guardiaos.show', compact('guardiao'));
    }

    public function edit(Guardiao $guardiao)
    {
        return view('guardiaos.edit', compact('guardiao'));
    }
}
