<?php
use ExemploCrudPoo\{Produto, Fabricante};
require_once "../vendor/autoload.php";

$produto = new Produto;
$fabricante = new Fabricante;

$listaDeFabricantes = $fabricante->lerFabricantes();

if(isset($_POST['inserir'])){
    $produto->setNome($_POST['nome']);
    $produto->setPreco($_POST['preco']);
    $produto->setQuantidade($_POST['quantidade']);
    $produto->setFabricanteId($_POST['fabricante']);
    $produto->setDescricao($_POST['descricao']);

    $produto->inserirProduto();

    header("location:visualizar.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Inserção</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Produtos | INSERT</h1>
        <hr>
        <form action="" method="post">
            <p class="form-floating">
                <input class="form-control" type="text" name="nome" id="nome" required placeholder="">
                <label for="nome">Nome:</label>
            </p>
            <p class="form-floating">
                <input class="form-control" type="number" min="10" max="10000" step="0.01"
                name="preco" id="preco" required placeholder="">
                <label for="preco">Preço:</label>
            </p>
            <p class="form-floating">
                <input class="form-control" type="number" min="1" max="100"
                name="quantidade" id="quantidade" required placeholder="">
                <label for="quantidade">Quantidade:</label>
            </p>
            <p class="form-floating">
                <select class="form-select" name="fabricante" id="fabricante" required>
                    <option value=""></option>
                    
                    <?php foreach($listaDeFabricantes as $fabricante) { ?>
                        <option value="<?=$fabricante['id']?>">
                            <?=$fabricante['nome']?>
                        </option>
                    <?php } ?>
                </select>
                <label for="fabricante">Fabricante:</label>
            </p>
            <p class="form-floating">
                <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="3" placeholder=""></textarea>
                <label for="descricao">Descrição:</label> <br>
            </p>
            <button type="submit" name="inserir">Inserir produto</button>
        </form>
        <hr>
        <p><a href="visualizar.php">Voltar</a></p>
    </div>
    
</body>
</html>