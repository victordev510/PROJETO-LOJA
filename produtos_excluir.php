<?php
include 'conexao.php';
include 'funcoes.php';

// 2º momento: confirmou a exclusão
if (isset($_POST['id'])) {
    $sql = $pdo->prepare('DELETE FROM produto WHERE id = ?');
    $sql->execute([$_POST['id']]);

    header('Location: produtos.php?msg=excluido');
    exit;
}

// 1º momento: mostra o produto e pede confirmação
$id = $_GET['id'];

$sql = $pdo->prepare('SELECT * FROM produto WHERE id = ?');
$sql->execute([$id]);
$produto = $sql->fetch();

// Produto que já foi vendido não pode sumir do banco
$sql = $pdo->prepare('SELECT COUNT(*) FROM venda WHERE produto_id = ?');
$sql->execute([$id]);
$qtd_vendas = $sql->fetchColumn();

$titulo = 'Excluir produto';
$pagina = 'produtos.php';
include 'topo.php';
?>

<div class="caixa">
    <h1>Excluir produto</h1>
    <img src="<?= e($produto['imagem']) ?>" alt="" class="previa">

    <?php if ($qtd_vendas > 0) { ?>
        <div class="aviso erro">
            <?= e($produto['nome']) ?> aparece em <?= $qtd_vendas ?> venda(s)
            e não pode ser excluído. Exclua as vendas primeiro.
        </div>
        <div class="acoes">
            <a href="produtos.php" class="botao claro">Voltar</a>
        </div>
    <?php } else { ?>
        <p>Tem certeza que deseja excluir <b><?= e($produto['nome']) ?></b>
        (<?= dinheiro($produto['preco']) ?>)?</p>

        <form method="post" class="acoes">
            <input type="hidden" name="id" value="<?= $produto['id'] ?>">
            <button type="submit" class="botao perigo">Sim, excluir</button>
            <a href="produtos.php" class="botao claro">Cancelar</a>
        </form>
    <?php } ?>
</div>

<?php include 'rodape.php'; ?>