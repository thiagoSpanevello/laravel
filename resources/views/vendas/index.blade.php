@extends('layouts.app', ['title' => __('Cadastro de Produtos')])

@section('content')
    @include('users.partials.header', ['title' => __('Cadastro de Produtos')])   

    <div class="container-fluid mt--7">
      
        
        @include('layouts.footers.auth')
    </div>
@endsection