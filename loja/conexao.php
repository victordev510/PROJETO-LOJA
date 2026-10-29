<?php

$arquivo_banco = 'banco/loja.db';

if (!file_exists($arquivo_banco)) {
    die('Banco não encontrado em '.$arquivo_banco.'.Confira o nome do arquivo na pasta ');
}
try {
    $pdo = new PDO('sqlite:'. $arquivo_banco);

    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $erro){
    die('Erro ao conectar com o banco: '. $erro->getMessage());
}

?>