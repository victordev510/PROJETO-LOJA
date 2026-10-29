<?php
include 'conexao.php';
include 'funcoes.php';

$produtos = $pdo->query('SELECT * FROM produto ORDER BY nome')->fetchAll();

$msg = '';
if(isset($_GET['msg'])) {
    $msg = $_GET['msg'];

}

$titulo = 'Produtos';
$pagina = 'produtos.php';
include 'topo.php';

?>

<div class="titulo-pagina">
    <h1>Produtos</h1>
    <a href="produto_form.php" class="botao">+ Novo Produto</a>

</div>

<?php if($msg == 'salvo') { ?>
    <div class="aviso">Produto salvo cOm sucesso"</div>
<?php } ?>
<?php if ($msg == 'excluido') { ?>
    <div class="aviso">Produto excluído.</div>
<?php } ?>

<div class="tabela">
    <table>
        <tr>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Preco</th>
            <th>Ações</th>
        </tr>
        <?php foreach($produtos as $produto) { ?>
            <tr>
                <td><img src="<?= e($produto['imagem']) ?>" alt="" class="miniatura"></td>
                <td>
                    <div class="nome-produto"><?= e($produto['nome'])?></div>
                    <div class="descricao-produto"><?= e($produto['descricao'])?></div>
                </td>
                <td><?= dinheiro($produto['preco']) ?></td>
                <td>
                    <div class="acoes-tabela">
                        <a href="produto_form.php?id=<?= $produto['id'] ?>" class="botao pequeno">Editar</a>
                        <a href="produto_excluir.php?id=<?= $produto['id'] ?>" class="botao pequeno perigo">Excluir</a>
                        
                    </div>
                </td>        
            </tr>
        <?php } ?>
    </table>
</div>
<p class="contador"><?= count($produtos) ?> produto(s) cadastrado(s).</p>
<?php include 'rodape.php'; ?>