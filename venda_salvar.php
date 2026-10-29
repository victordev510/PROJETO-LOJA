<?php
include 'conexao.php';

$id          = $_POST['id'];
$cliente_id  = $_POST['cliente_id'];
$produto_id  = $_POST['produto_id'];
$quantidade  = $_POST['quantidade'];
$data_venda  = $_POST['data_venda'];

// Busca o preço atual do produto escolhido
$sql = $pdo->prepare('SELECT preco FROM produto WHERE id = ?');
$sql->execute([$produto_id]);
$preco = $sql->fetchColumn();

// Calcula o total da venda (round deixa só 2 casas depois da vírgula)
$valor_total = round($preco * $quantidade, 2);

if ($id == '') {
    // Venda NOVA
    $sql = $pdo->prepare('INSERT INTO venda (cliente_id, produto_id, quantidade, valor_total, data_venda) VALUES (?, ?, ?, ?, ?)');
    $sql->execute([$cliente_id, $produto_id, $quantidade, $valor_total, $data_venda]);
} else {
    // ATUALIZA a venda existente
    $sql = $pdo->prepare('UPDATE venda SET cliente_id = ?, produto_id = ?, quantidade = ?, valor_total = ?, data_venda = ? WHERE id = ?');
    $sql->execute([$cliente_id, $produto_id, $quantidade, $valor_total, $data_venda, $id]);
}

header('Location: vendas.php?msg=salvo');
exit;