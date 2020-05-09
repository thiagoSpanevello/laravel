<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function create(){
        return view('vendas.create');
    }
    public function listar(){
        return view('vendas.index');
    }
}
