<?php
// teste_conexao.php
// Página só para testar se o PHP conversa com o banco. Pode apagar depois.
include 'conexao.php';

echo '<h1>Conexão OK!</h1>';
echo '<p>O PHP abriu o arquivo banco/loja.db.</p>';

// query() roda um SQL. fetchColumn() pega o primeiro valor do resultado.
$clientes = $pdo->query('SELECT COUNT(*) FROM cliente')->fetchColumn();
$produtos = $pdo->query('SELECT COUNT(*) FROM produto')->fetchColumn();
$venda   = $pdo->query('SELECT COUNT(*) FROM venda')->fetchColumn();

echo '<ul>';
echo '<li>Clientes: ' . $clientes . '</li>';
echo '<li>Produtos: ' . $produtos . '</li>';
echo '<li>Vendas: ' . $venda . '</li>';
echo '</ul>';

?>