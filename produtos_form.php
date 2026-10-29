<?php
include 'conexao.php';
include 'funcoes.php';
 
$produto = [
    'id'       => '',
    'nome'     => '',
    'descricao' => '',
    'preco'    => '',
    'imagem'   => '',
];
$titulo = 'Novo produto';
 
// Com ?id= na URL: edição
if (isset($_GET['id'])) {
    $sql = $pdo->prepare("SELECT * FROM produto WHERE id = ?");
    $sql->execute([$_GET['id']]);
    $produto = $sql->fetch();
    $titulo = 'Editar produto';
}
 
$pagina = 'produtos.php';
include 'topo.php';
?>
 
<div class="caixa">
    <h1><?= $titulo ?></h1>
 
    <form method="post" action="produto_salvar.php" class="formulario">
        <input type="hidden" name="id" value="<?= $produto['id'] ?>">
 
        <div class="campo">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" value="<?= e($produto['nome']) ?>" required>
        </div>
 
        <div class="campo">
            <label for="descricao">Descrição</label>
            <textarea id="descricao" name="descricao" rows="3"><?= e($produto['descricao']) ?></textarea>
        </div>
 
        <div class="campo">
            <label for="preco">Preço (R$)</label>
 
            <input type="number" id="preco" name="preco" step="0.01" min="0" value="<?= $produto['preco'] ?>" required>
        </div>
 
        <div class="campo">
            <label for="imagem">Imagem</label>
            <input type="text" id="imagem" name="imagem" value="<?= e($produto['imagem']) ?>" placeholder="https:// ... ou assets/imagens/arquivo.png">
            <div class="dica">Cole o link de uma imagem da internet ou o caminho de um arquivo da pasta assets/imagens.</div>
        </div>
 
        <?php if ($produto['imagem'] != '') { ?>
            <img src="<?= e($produto['imagem']) ?>" alt="Imagem atual" class="previa">
        <?php } ?>
 
        <div class="acoes">
            <button type="submit" class="botao">Salvar</button>
            <a href="produtos.php" class="botao claro">Cancelar</a>
        </div>
    </form>
</div>
 
<?php include 'rodape.php'; ?>