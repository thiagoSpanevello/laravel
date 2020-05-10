<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Produto;
use Illuminate\Support\Facades\DB;
use App\Charts\ProdChart;


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

        $chart = new ProdChart;
        $chart->labels([$produtos[0]->nome,$produtos[1]->nome,$produtos[2]->nome,$produtos[3]->nome,$produtos[4]->nome]);
        $chart->dataset('valores', 'line', [$produtos[0]->valor,$produtos[1]->valor,$produtos[2]->valor,$produtos[3]->valor,$produtos[4]->valor]);


        

        return view('produto.grafico',compact('chart'));
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
