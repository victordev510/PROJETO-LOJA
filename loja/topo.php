<?php
// topo.php
// Começo de TODAS as páginas: logo e menu.
// Antes do include, a página precisa criar $titulo e $pagina.

// Itens do menu: nome do arquivo => texto do link
$menu = [
    'index.php'    => 'Vitrine',
    'clientes.php' => 'Clientes',
    'produtos.php' => 'Produtos',
    'vendas.php'   => 'Vendas',
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?> | Minha Loja</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
</head>
<body>

<div class="pagina">

    <div class="topo">
        <a href="index.php" class="logo">
            <img src="assets/imagens/logo.png" alt="Logo da loja">
            Minha Loja
        </a>

        <div class="menu">
            <?php foreach ($menu as $arquivo => $texto) {
                // O link da página atual ganha a classe "ativo"
                $classe = '';
                if ($arquivo === $pagina) {
                    $classe = 'ativo';
                }
            ?>
                <a href="<?= $arquivo ?>" class="<?= $classe ?>"><?= $texto ?></a>
            <?php } ?>
        </div>
    </div>

    <div class="conteudo">