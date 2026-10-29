<?php
include 'conexao.php';
include 'funcoes.php';

if(isset($_POST['id'])) {
    $sql = $pdo->prepare('DELETE FROM cliente WHERE id = ?');
    $sql->execute([$_POST['id']]);

    header('Location: clientes.php?msg=excluido');
    exit;
}

$id = $_GET['id'];

$sql = $pdo->prepare('SELECT * FROM cliente WHERE id = ?');
$sql->execute([$id]);
$cliente = $sql->fetch();

$sql = $pdo->prepare('SELECT COUNT(*) FROM venda WHERE cliente_id = ?');
$sql->execute([$id]);
$qtd_vendas = $sql->fetchColumn();

$titulo = 'Excluir cliente';
$pagina = 'clientes.php';
include 'topo.php';
?>

<div class="caixa">
    <h1>Excluir cliente</h1>

    <?php if ($qtd_vendas > 0) { ?>
    
        <div class="aviso erro">
            <?= e($cliente['nome']) ?> tem <?= $qtd_vendas ?> venda(s) registrada(s)
            e não pode ser excluído. Exclua as vendas primeiro.
        </div>
        <div class="acoes">
            <a href="clientes.php" class="botao claro">Voltar</a>
        </div>
    <?php } else { ?>
        <p>Tem certeza que deseja excluir <b><?= e($cliente['nome']) ?></b>?</p>
        <p>Essa ação não pode ser desfeita.</p>

    
        <form method="post" class="acoes">
            <input type="hidden" name="id" value="<?= $cliente['id'] ?>">
            <button type="submit" class="botao perigo">Sim, excluir</button>
            <a href="clientes.php" class="botao claro">Cancelar</a>
        </form>
    <?php } ?>
</div>

<?php include 'rodape.php'; ?>