@extends('property.master')
@section('content')

<div class="container my-3">
    <h1>Formulario de Cadastro de Imoveis</h1>
        <form action="<?= url('/imoveis/store') ;?>" method = "post" >

            <?= csrf_field();?>

            <div class="form-group">
                <label for="title">Titulo do imovel</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="rental_price">Valor de Locação</label>
                <input type="text" name="rental_price" id="rental_price" class="form-control">
            </div>

            <div class="form-group">
                <label for="titsale_pricele">Valor de compra</label>
                <input type="text" name="sale_price" id="sale_price" class="form-control">
            </div>


            <button type="submite" class="btn btn-primary">Cadastrar imovel</button>


        </form>
</div>
@endsection

