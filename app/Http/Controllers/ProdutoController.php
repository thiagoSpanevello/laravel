<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Produto;
use Illuminate\Support\Facades\DB;


class ProdutoController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Produto  $model
     * @return \Illuminate\View\View
     */
    public function listar(Produto $produto)
    {
        return view('produto.index', ['produtos' => $produto->paginate(15)]);
    }
    public function grafico()
    {
        $produtos = DB::table('_produtos')
        ->orderBy('valor', 'desc')
        ->take(5)
        ->get();
        $total_produtos = DB::table('_produtos')->sum('valor');
   

        return view('produto.grafico',compact('produtos', 'total_produtos'));
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('produto.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProdutoRequest $request, Produto $model)
    {
        $model->create($request->all());

        return redirect()->route('produto.listar')->withStatus(__('Produto criado com sucesso.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(Produto $produto)
    {
        return view('produto.edit', compact('produto'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProdutoRequest $request, Produto  $produto)
    {
        $produto->update($request->all());

        return redirect()->route('produto.listar')->withStatus(__('product successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Produto  $produto)
    {
        $produto->delete();

        return redirect()->route('produto.listar')->withStatus(__('product successfully deleted.'));
    }
}
