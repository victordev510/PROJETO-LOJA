<?php
include 'conexao.php';

$id        = $_POST['id'];
$nome      = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco     = $_POST['preco'];
$imagem    = $_POST['imagem'];

if ($id == '') {
    // Produto NOVO
    $sql = $pdo->prepare('INSERT INTO produto (nome, descricao, preco, imagem) VALUES (?, ?, ?, ?)');
    $sql->execute([$nome, $descricao, $preco, $imagem]);
} else {
    // ATUALIZA o produto existente
    $sql = $pdo->prepare('UPDATE produto SET nome = ?, descricao = ?, preco = ?, imagem = ? WHERE id = ?');
    $sql->execute([$nome, $descricao, $preco, $imagem, $id]);
}

header('Location: produtos.php?msg=salvo');
exit;