<?php
include 'conexao.php';
include 'funcoes.php';

$total_clientes = $pdo->query('SELECT COUNT(*) FROM cliente')->fetchColumn();
$total_produtos = $pdo->query('SELECT COUNT(*) FROM produto')->fetchColumn();
$total_vendas = $pdo->query('SELECT COUNT(*) FROM venda')->fetchColumn();

$busca = '';
if (isset($_GET['busca'])){
    $busca = $_GET['busca'];

}

$sql = $pdo->prepare('SELECT * FROM produto WHERE nome LIKE ? ORDER BY nome');
$sql->execute(['%'.$busca.'%']);
$produtos = $sql->fetchAll();

$titulo = 'Vitrine';
$pagina = 'index.php';
include 'topo.php';
?>

<div class="painel">
    <div class="numero">
        <img src="assets/imagens/icone-clientes.png" alt="">
        <div>
            <div class="valor"><?= $total_clientes ?></div>
            <div class="rotulo">clientes</div>
        </div>

    </div>
    <div class="numero">
        <img src="https://raw.githubusercontent.com/microsoft/fluentui-emoji/main/assets/Package/3D/package_3d.png" alt="">
        <div>
            <div class="valor"><?= $total_produtos ?></div>
            <div class="rotulo">produto</div>
        </div>
    </div>
    <div class="numero">
        <img src="https://raw.githubusercontent.com/microsoft/fluentui-emoji/main/assets/Receipt/3D/receipt_3d.png" alt="">
        <div>
            <div class="valor"><?= $total_vendas ?></div>
            <div class="rotulo">vendas</div>
        </div>
    </div>
</div>
<div class="titulo-pagina">
    <h1>Vitrine</h1>
    <form method="get" action="index.php" class="busca">
        <input type="text" name="busca" value="<?= e($busca) ?>" placeholder="Buscar produto...">
        <button type="submit" class="botao">Buscar</button>
    </form>
</div>

<?php if (count($produtos) == 0) { ?>
    <div class="aviso">Nenhum produto encontrado para "<?= e($busca) ?>".</div>
<?php } ?>

<div class="vitrine">
    <?php foreach ($produtos as $produto) { ?>
    <div class="card">
        <img src="<?= e($produto['imagem']) ?>" alt="<?= e($produto['nome']) ?>">
        <h2><?= e($produto['nome']) ?></h2>
        <p><?= e($produto['descricao']) ?></p>
        <div class="preco"><?= dinheiro($produto['preco']) ?></div>
    </div>
<?php } ?>
</div>

<?php include 'rodape.php'; ?>