@extends('layouts.app', ['title' => __('Edição de Produto')])

@section('content')
@include('users.partials.header', ['title' => __('Editar Produto')])

<div class="container-fluid mt--7" style="margin-top:1.5%!important">


    @foreach($produtos as $prod)

    <?php
    $valor_porcent = ($prod->valor * 100) / $total_produtos;
    $valor_porcentr = number_format($valor_porcent, 2, '.', '');
    ?>
    <div class = 'row col-8' >
    <div class='col-2'><?php echo $prod->nome;?></div>
    <div style="background-color: #642EFE;margin-left:1%; width: <?php echo $valor_porcent;?>%!important"><br></div>
    <div style="margin-left:18%;position:absolute; color: grey" ><?php echo $valor_porcentr;?>%</div>
    <div style="margin-left:24%;position:absolute; color: grey" >R$<?php echo $prod->valor;?></div>
    </div>
    <br>
  

    

    @endforeach




    @include('layouts.footers.auth')
</div>
@endsection