<?php
include 'conexao.php';
include 'funcoes.php';
 
 $clientes = $pdo->query('SELECT * FROM cliente ORDER BY nome')->fetchAll();
 
 
 $msg = '';
 if (isset($_GET['msg'])) {
     $msg = $_GET['msg'];
 }
 
 $titulo = 'CLientes';
 $pagina = 'clientes.php';
 include 'topo.php';
 ?>
 
 <div class="titulo-pagina">
     <h1>CLientes</h1>
     <a href="cliente_form.php" class="botao">+ Novo cliente</a>
 </div>
 
 <?php if ($msg == 'salvo') { ?>
     <div class="aviso">Cliente salvo com sucesso!</div>
 <?php } ?>
 <?php if ($msg == 'excluido') { ?>
    <div class="aviso">Cliente excluído.</div>
 <?php } ?>
 
<div class="tabela">
    <table>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Cidade</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($clientes as $cliente) {?>
            <tr>
                <td><?= e($cliente['nome']) ?></td>
                <td><?= e($cliente['email']) ?></td>
                <td><?= e($cliente['telefone']) ?></td>
                <td><?= e($cliente['cidade']) ?></td>
                <td>
                    <div class="acoes-tabela">
                        <a href="cliente_form.php?id=<?= $cliente['id'] ?>" class="botao pequeno">Editar</a>
                        <a href="cliente_excluir.php?id=<?= $cliente['id'] ?>" class="botao pequeno perigo">Excluir</a>
                    </div>
                </td>
            </tr>
        <?php } ?>
</table>
</div>
 
<p class="contador"><?= count($clientes) ?> cliente(s) cadastrados (s). </p>
 
<?php include 'rodape.php';