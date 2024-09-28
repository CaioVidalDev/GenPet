<?php

namespace App\Http\Controllers;

use App\Models\Vacina;
use Illuminate\Http\Request;

class VacinaController extends Controller
{
    public function index()
    {
        return view('vacinas.index');
    }

    public function create()
    {
        return view('vacinas.create');
    }

    public function show(Vacina $vacina)
    {
        return view('vacinas.show', compact('vacina'));
    }

    public function edit(Vacina $vacina)
    {
        return view('vacinas.edit', compact('vacina'));
    }
}
