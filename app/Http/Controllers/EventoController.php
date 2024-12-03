<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;

class EventoController extends Controller
{
    public function index()
    {
        return view('eventos.index');
    }

}
