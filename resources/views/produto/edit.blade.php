@extends('layouts.app', ['title' => __('Edição de Produto')])

@section('content')
    @include('users.partials.header', ['title' => __('Editar Produto')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Editar Produto') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('produto.listar') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('produto.update', $produto) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Informações do Produto') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Nome') }}</label>
                                    <input type="text" name="nome" id="nome" class = "inputs" value="{{ $produto->nome}}">

                                    @if ($errors->has('Nome'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('Nome') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('valor') }}</label>
                                    <input type="number" name="valor" id="valor" class = "inputs" value="{{ $produto->valor}}"/>

                                    @if ($errors->has('valor'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('valor') }}</strong>
                                        </span>
                                    @endif
                                </div>
                               

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection