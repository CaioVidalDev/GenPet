<?php

namespace App\Http\Controllers;

use App\Models\Tratamento;
use Illuminate\Http\Request;

class TratamentoController extends Controller
{
    public function index()
    {
        return view('tratamentos.index');
    }

    public function create()
    {
        return view('tratamentos.create');
    }

    public function show(Tratamento $tratamento)
    {
        return view('tratamentos.show', compact('tratamento'));
    }

    public function edit(Tratamento $tratamento)
    {
        return view('tratamentos.edit', compact('tratamento'));
    }
}
