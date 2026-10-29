<?php
include 'conexao.php';
include 'funcoes.php';

// Listas para montar os dois <select>
$clientes = $pdo->query('SELECT id, nome FROM cliente ORDER BY nome')->fetchAll();
$produtos = $pdo->query('SELECT id, nome, preco FROM produto ORDER BY nome')->fetchAll();

// Valores iniciais: venda nova, quantidade 1 e a data de hoje
$venda = [
    'id' => '',
    'cliente_id' => '',
    'produto_id' => '',
    'quantidade' => 1,
    'data_venda' => date('Y-m-d'),
];

$titulo = 'Nova venda';

if (isset($_GET['id'])) {
    $sql = $pdo->prepare('SELECT * FROM venda WHERE id = ?');
    $sql->execute([$_GET['id']]);
    $venda = $sql->fetch();
    $titulo = 'Editar venda';
}

$pagina = 'vendas.php';
include 'topo.php';
?>

<div class="caixa">
    <h1><?= $titulo ?></h1>

    <form method="post" action="venda_salvar.php" class="formulario">
        <input type="hidden" name="id" value="<?= $venda['id'] ?>">

        <div class="campo">
            <label for="cliente_id">Cliente</label>
            <select id="cliente_id" name="cliente_id" required>
                <option value="">Escolha o cliente</option>
                <?php foreach ($clientes as $cliente) {
                    // Na edição, deixa marcado o cliente da venda
                    $marcado = '';
                    if ($cliente['id'] == $venda['cliente_id']) {
                        $marcado = 'selected';
                    }
                ?>
                    <option value="<?= $cliente['id'] ?>" <?= $marcado ?>><?= e($cliente['nome']) ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="campo">
            <label for="produto_id">Produto</label>
            <select id="produto_id" name="produto_id" required>
                <option value="">Escolha o produto</option>
                <?php foreach ($produtos as $produto) {
                    $marcado = '';
                    if ($produto['id'] == $venda['produto_id']) {
                        $marcado = 'selected';
                    }
                ?>
                    <option value="<?= $produto['id'] ?>" <?= $marcado ?>><?= e($produto['nome']) ?> (<?= dinheiro($produto['preco']) ?>)</option>
                <?php } ?>
            </select>
        </div>

        <div class="campo">
            <label for="quantidade">Quantidade</label>
            <input type="number" id="quantidade" name="quantidade" min="1" value="<?= $venda['quantidade'] ?>" required>
        </div>

        <div class="campo">
            <label for="data_venda">Data da venda</label>
            <input type="date" id="data_venda" name="data_venda" value="<?= $venda['data_venda'] ?>" required>
            <div class="dica">O total é calculado ao salvar: preço do produto × quantidade.</div>
        </div>

        <div class="acoes">
            <button type="submit" class="botao">Salvar</button>
            <a href="vendas.php" class="botao claro">Cancelar</a>
        </div>
    </form>
</div>

<?php include 'rodape.php'; ?>