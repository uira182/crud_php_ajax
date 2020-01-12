<?php

require_once("../class/Conexao.class.php");
require_once("../class/Cliente.class.php");
//Captura todos os elementos enviados
$meuPost = file_get_contents("php://input");

//Decodifira para formato JSON
$json = json_decode($meuPost);

$conexao = mysqli_connect("localhost", "root", "", "agenda");

mysqli_set_charset($conexao, "utf8");

if(isset($json->operacao)){
    switch($json->operacao){
        case "BuscaCli":
            $cliente = new ExibirClientes();
            $cliente->exibeListaCliente($json->nome);
        break;
        case "CadastroCli":
            $cliente = new InsertCliente($json->nome, $json->email, $json->sexo, $json->celular, $json->telefone, $json->cep, $json->endereco, $json->numero, $json->complemento, $json->bairro, $json->estado, $json->cidade, '0', $json->data_nascimento);
        break;
        case "DeletarCli":
            $cliente = new DeleteCliente($json->del);
        break;
    }
}elseif(isset($json->tela)){
    switch($json->tela){
        case "PrimeiraPagina":
            include_once("../pages/script/scriptCadCli.php");
        break;
        case "EditarCli":

        break;
    }
}

?>