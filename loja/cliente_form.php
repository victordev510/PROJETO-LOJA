<?php
include 'conexao.php';
include 'funcoes.php';

$cliente = [
    'id'   =>'',
    'nome'   =>'',
    'email'   =>'',
    'telefone'   =>'',
    'cidade'   =>'',

];

$titulo = 'Novo cliente';

if(isset($_GET['id'])){
    $sql=$pdo-prepare('SELECT * FROM cliente WHERE id = ?');
    $sql->execute([$_GET['id']]);
    $cliente = $sql->fetch();
    $titulo = 'Editar cliente';
}

$pagina = 'clientes.php';
include 'topo.php';
?>

<div class="caixa">
    <h1><?= $titulo ?></h1>

    <!-- method="post": os dados vão escondidos, não aparecem na URL -->
    <!-- action: arquivo que recebe e grava os dados -->
    <form method="post" action="cliente_salvar.php" class="formulario">

        <input type="hidden" name="id" value="<?= e($cliente['id']) ?>">

        <div class="campo">
            <label for="nome">Nome</label>
            <input type="text" name="nome" value="<?= e($cliente['nome']) ?>" required>

        </div>

        <div class="campo">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" value="<?= e($cliente['email']) ?>">
        </div>

        <div class="campo">
            <label for="telefone">Telefone</label>
            <input type="text" id="telefone" name="telefone" value="<?= e($cliente['telefone']) ?>" placeholder="(11) 99999-9999">
        </div>

        <div class="campo">
            <label for="cidade">Cidade</label>
            <input type="text" id="cidade" name="cidade" value="<?= e($cliente['cidade']) ?>">
        </div>

        <div class="acoes">
            <button type="submit" class="botao">Salvar</button>
            <a href="clientes.php" class="botao claro">Cancelar</a>
        </div>

    </form>
</div>

<?php include 'rodape.php'; ?>