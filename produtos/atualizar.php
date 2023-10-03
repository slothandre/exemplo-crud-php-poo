<?php
require_once "../src/funcoes-produtos.php";
require_once "../src/funcoes-fabricantes.php";
$listaDeFabricantes = lerFabricantes($conexao);

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
$produto = lerUmProduto($conexao, $id);

if(isset($_POST['atualizar'])){
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    
    $preco = filter_input(
        INPUT_POST, "preco", 
        FILTER_SANITIZE_NUMBER_FLOAT,
        FILTER_FLAG_ALLOW_FRACTION
    );

    $quantidade = filter_input(
        INPUT_POST, "quantidade", FILTER_SANITIZE_NUMBER_INT
    );

    $fabricanteId = filter_input(
        INPUT_POST, "fabricante", FILTER_SANITIZE_NUMBER_INT
    );

    $descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_SPECIAL_CHARS);

    atualizarProduto(
        $conexao, $id, $nome, $preco, $quantidade, $descricao, $fabricanteId
    );

    header("location:visualizar.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Atualização</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Produtos | SELECT/UPDATE</h1>
        <hr>
        <form action="" method="post">
            <p class="form-floating">
                <input class="form-control" value="<?=$produto['nome']?>" type="text" name="nome" id="nome" required>
                <label for="nome">Nome:</label>
            </p>
            <p class="form-floating">
                <input class="form-control" value="<?=$produto['preco']?>"
                type="number" min="10" max="10000" step="0.01"
                name="preco" id="preco" required>
                <label for="preco">Preço:</label>
            </p>
            <p class="form-floating">
                <input class="form-control" value="<?=$produto['quantidade']?>"
                type="number" min="1" max="100"
                name="quantidade" id="quantidade" required>
                <label for="quantidade">Quantidade:</label>
            </p>
            <p class="form-floating">
                <select class="form-select" name="fabricante" id="fabricante" required>
                    <option value=""></option>
                    
                    <?php foreach( $listaDeFabricantes as $fabricante ) { ?>
                        <option <?php if($produto["fabricante_id"] === $fabricante["id"]) echo " selected "; ?>
                            value="<?=$fabricante['id']?>">
                            <?=$fabricante['nome']?>
                        </option>
                    <?php } ?>
                </select>
                <label for="fabricante">Fabricante:</label>
            </p>
            <p class="form-floating">
                <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="3"><?=$produto['descricao']?></textarea>
                <label for="descricao">Descrição:</label> <br>
            </p>
            <button class="btn btn-primary" type="submit" name="atualizar">Atualizar produto</button>
        </form>
        <hr>
        <p><a href="visualizar.php">Voltar</a></p>
    </div>
    
</body>
</html>