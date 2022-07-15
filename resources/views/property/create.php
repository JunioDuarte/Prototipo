<h1>Formulario de Cadastro:: Imoveis</h1>






<form action="<?= url('/imoveis/store') ;?>" method = "post" >

    <?= csrf_field();?>

    <label for="title">Titulo do imovel</label>
    <input type="text" name="title" id="title">

    <br />

    <label for="description">Descrição</label>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>

    <br />

    <label for="rental_price">Valor de Locação</label>
    <input type="text" name="rental_price" id="rental_price">

    <br />

    <label for="titsale_pricele">Valor de compra</label>
    <input type="text" name="sale_price" id="sale_price">

    <br />

    <button type="submite">Cadastrar imovel</button>

    <br />


</form>
