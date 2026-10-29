<?php

date_default_timezone_set('America/Sao_Paulo');

function e($texto){
    if (is_null($texto)){
        return '';

    }
    return htmlspecialchars($texto);
}

function dinheiro($valor){
    return 'R$' . number_format($valor,2,',','.');

}

function data_br($data) {
    $partes = explode('-',' $data');
    return $partes[2] . '/' . $partes[1] . '/' . $partes[0];
}