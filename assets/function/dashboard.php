<?php

//Captura todos os elementos enviados
$meuPost = file_get_contents("php://input");

//Decodifira para formato JSON
$json = json_decode($meuPost);

$conexao = mysqli_connect("localhost", "root", "", "agenda");

mysqli_set_charset($conexao, "utf8");

// Verifica se existe a variável txtnome
if (isset($json->operacao) && $json->operacao == "Busca") {

    $nome = $json->nome;
    // Verifica se a variável está vazia
    if (empty($nome)) {
        $sql = "SELECT * FROM cliente";
    } else {
        $nome .= "%";
        $sql = "SELECT * FROM cliente WHERE nome like '$nome'";
    }
    sleep(1); //Tempo para pensar
    $result = mysqli_query($conexao, $sql);
    $cont = mysqli_affected_rows($conexao);
    // Verifica se a consulta retornou linhas 
    if ($cont > 0) {
        // Atribui o código HTML para montar uma tabela
        echo "
            <div class='row'>
                <div class='col-sm-12 mx-auto'>
                    <div class='row'>
                        <div class='col-1'>Id</div>
                        <div class='col-3'>Nome</div>
                        <div class='col-2'>Telefone</div>
                        <div class='col-2'>Celular</div>
                        <div class='col-3'>Email</div>
                        <div class='col-1 material-icons'>delete</div>
                    </div>
                </div>
            </div>
        ";
        // Captura os dados da consulta e inseri na tabela HTML
        while ($linha = mysqli_fetch_array($result)) {
            echo "
                <div class='row border pt-1 pb-2'>
                    <div class='col-sm-12 mx-auto'>
                        <div class='row'>
                            <div class='col-1'>{$linha['id']}</div>
                            <div class='col-3'>{$linha['nome']}</div>
                            <div class='col-2'>{$linha['telefone']}</div>
                            <div class='col-2'>{$linha['celular']}</div>
                            <div class='col-3'>{$linha['email']}</div>
                            <div class='col-1 text-center p-0 m-0'>
                                <button id='btn_del' class='badge btn btn-danger m-0  rounded' value='{$linha['id']}'>x</button>                            
                            </div>                            
                        </div>
                    </div>
                </div>
            ";
        }
    } else {
        // Se a consulta não retornar nenhum valor, exibi mensagem para o usuário
        echo "Não foram encontrados registros!";
    }
} else if (isset($json->operacao) && $json->operacao == "Cadastro") {

    $sql = "INSERT INTO cliente (nome, email, sexo, celular, telefone, cep, endereco, numero, complemento, bairro, estado, cidade, status, data_nascimento) VALUES ('{$json->nome}', '$json->email}', '{$json->sexo}', '{$json->celular}', '{$json->telefone}', '{$json->cep}', '{$json->endereco}', '{$json->numero}', '{$json->complemento}', '{$json->bairro}', '{$json->estado}', '{$json->cidade}', '0', '{$json->data_nascimento}')";

    var_dump($sql);

    $resultado = mysqli_query($conexao, $sql);

    if (!$resultado) {
        echo "<script>alert('Erro');</script>";
    } else {
        echo "<script>alert('Inserido com Sucesso!');</script>";
    }

} else if (isset($json->operacao) && $json->operacao == "Deletar") {

    $resultado = mysqli_query($conexao, "DELETE FROM cliente WHERE id='" . $json->del . "'");
    if (!$resultado) {
        echo "<script>alert('Erro');</script>";
    } else {
        echo "<script>alert('Inserido com Sucesso!');</script>";
    }

}
?>