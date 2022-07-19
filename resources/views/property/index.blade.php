@extends('property.master')

@section('content')
    <div class="container my-3">
        <h1>Listagem de Produtos</h1>
            <?php
                if(!empty($properties)){

                    echo "<table class='table table-striped table-hover'>";

                        echo
                            "<thead class='bg-primary text-white'>
                                <td>Titulo</td>
                                <td>Valor de Locação</td>
                                <td>Valor de Compra</td>
                                <td>Ações</td>
                            </thead>";

                    foreach ($properties as $property){


                        $linkReadMode = url('imoveis/' . $property->name);
                        $linkEditItem = url('/imoveis/editar/' . $property->name);
                        $linkRemoveItem = url('/imoveis/remover/' . $property->name);

                        echo "<tr>
                                <td>{$property->title}</td>
                                <td>R$" . number_format($property->rental_price, 2 , ',' , '.') . "</td>
                                <td>R$" . number_format($property->sale_price, 2 , ',' , '.') . "</td>
                                <td><a href='{$linkReadMode}'class='btn btn-primary'>Ver mais</a> <a href='{$linkEditItem}'class='btn btn-primary'>Editar</a> <a href='{$linkRemoveItem}'class='btn btn-primary'>Remover</a></td>
                            </tr>";
                    }
                    echo "</table>";
                }
            ?>
        </div>
@endsection
