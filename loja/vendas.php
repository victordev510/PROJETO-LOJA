<?php
include 'conexao.php';
include 'funcoes.php';

// JOIN junta as tabelas: a venda só guarda os números (cliente_id, produto_id),
// e o JOIN busca o nome do cliente e o nome do produto.
$sql = 'SELECT venda.*, cliente.nome AS cliente, produto.nome AS produto, produto.imagem
        FROM venda
        JOIN cliente ON cliente.id = venda.cliente_id
        JOIN produto ON produto.id = venda.produto_id
        ORDER BY venda.data_venda DESC, venda.id DESC';
$vendas = $pdo->query($sql)->fetchAll();

// Soma o valor de todas as vendas
$total_geral = 0;
foreach ($vendas as $venda) {
    $total_geral = $total_geral + $venda['valor_total'];
}

$msg = '';
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
}

$titulo = 'Vendas';
$pagina = 'vendas.php';
include 'topo.php';
?>

<div class="titulo-pagina">
    <h1>Vendas</h1>
    <a href="venda_form.php" class="botao">+ Nova venda</a>
</div>

<?php if ($msg == 'salvo') { ?>
    <div class="aviso">Venda salva com sucesso!</div>
<?php } ?>

<?php if ($msg == 'excluido') { ?>
    <div class="aviso">Venda excluída.</div>
<?php } ?>

<div class="tabela">
    <table>
        <tr>
            <th>Data</th>
            <th>Cliente</th>
            <th>Produto</th>
            <th>Qtd.</th>
            <th>Total</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($vendas as $venda) { ?>
            <tr>
                <td><?= data_br($venda['data_venda']) ?></td>
                <td><?= e($venda['cliente']) ?></td>
                <td>
                    <div class="produto-celula">
                        <img src="<?= e($venda['imagem']) ?>" alt="">
                        <?= e($venda['produto']) ?>
                    </div>
                </td>
                <td><?= $venda['quantidade'] ?></td>
                <td><?= dinheiro($venda['valor_total']) ?></td>
                <td>
                    <div class="acoes-tabela">
                        <a href="venda_form.php?id=<?= $venda['id'] ?>" class="botao pequeno">Editar</a>
                        <a href="venda_excluir.php?id=<?= $venda['id'] ?>" class="botao pequeno perigo">Excluir</a>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<div class="total-geral">
    <?= count($vendas) ?> venda(s) · Total vendido: <b><?= dinheiro($total_geral) ?></b>
</div>

<?php include 'rodape.php'; ?>