<?php

class Cliente extends Conexao {

    public function __construct() {
        parent::__construct();
    }

    public function __destruct(){
        parent:: __destruct();
    }

}

class ListarClientes extends Conexao {

    public function __construct() {
        parent::__construct();
    }

    public function __destruct(){
        parent:: __destruct();
    }

    public function oneCliente($id){
        $sql = "SELECT * FROM cliente WHERE id='$id'";
        $resultado = parent:: getOne($sql);
        return $resultado;
    }

    protected function buscaCliente($nome) {
        $nome .= "%";
        $sql = "SELECT * FROM cliente WHERE nome LIKE '$nome' OR email LIKE '$nome' OR celular LIKE '$nome' OR telefone LIKE '$nome'";
        $resultado = parent:: getAll($sql);

        $cont = Count($resultado);

        if($cont > 0){
            return $resultado;
        }else{
            return false;
        }

    }

    protected function allCliente(){
        $sql = "SELECT * FROM cliente";
        $resultado = parent:: getAll($sql);
        //var_dump($resultado);
        $cont = Count($resultado);

        if($cont > 0){
            return $resultado;
        }else{
            return false;
        }

    }

}

class ExibirClientes extends ListarClientes{

    public function __construct() {
        parent::__construct();
    }

    public function __destruct(){
        parent:: __destruct();
    }

    public function exibeListaCliente($nome){

        // Atribui o código HTML para montar uma tabela
            echo "
                <table class='table table-bordered p-0 m-0'>
                    <thead>
                        <tr>
                            <th class=''>Nome</th>
                            <th class='d-none d-sm-table-cell'>Email</th>
                            <th class='d-none d-md-table-cell'>Telefone</th>
                            <th class='d-none d-md-table-cell'>Celular</th>
                            <th class=' text-center '>
                                <i class='fa fa-pen'></i>
                            </th>
                            <th class=' text-center '>
                                <i class='fa fa-trash'></i>
                            </th>
                        </tr>
                    </thread>
            ";

        // Verifica se a variável está vazia
        if (empty($nome)) {
            if(!$clientes = parent:: allCliente()){ 
                echo"
                    <tr>
                        <td>
                            Não foram encontrados clientes
                        </td>
                    </tr>
                ";
            }else{ 

                //sleep(1); //Tempo para pensar
                echo " <tbody> ";
                foreach ($clientes as $cliente) {
                    echo "
                            <tr>
                                <td>
                                    <small>{$cliente['nome']}</small>
                                </td>
                                <td class='d-none d-sm-table-cell'>
                                    <small>{$cliente['email']}</small>
                                </td>
                                <td class='d-none d-md-table-cell'>
                                    <small>{$cliente['telefone']}</small>
                                </td>
                                <td class='d-none d-md-table-cell'>
                                    <small>{$cliente['celular']}</small>
                                </td>
                                <td class='text-center'>
                                    <button id='btn_edt' type='button' class='badge btn btn-danger m-0  rounded' value='{$cliente['id']}'>
                                        <i class='fa fa-pen-alt'></i>
                                    </button>
                                </td>
                                <td class='text-center'>
                                    <button id='btn_del' type='button' class='badge btn btn-danger m-0  rounded' value='{$cliente['id']}'>
                                        <i class='fa fa-times'></i>
                                    </button>
                                </td>
                            </tr>
                    ";
                }
                echo " </tbody> ";
            }
        } else {
            if(!$clientes = parent:: buscaCliente($nome)){
                echo"
                    <tr>
                        <td>
                            Não foram encontrados clientes
                        </td>
                    </tr>
                ";
            }else{ 
                
                //sleep(1); //Tempo para pensar
                echo " <tbody> ";
                foreach ($clientes as $cliente) {
                    echo "
                            <tr>
                                <td>
                                    <small>{$cliente['nome']}</small>
                                </td>
                                <td class='d-none d-sm-table-cell'>
                                    <small>{$cliente['email']}</small>
                                </td>
                                <td class='d-none d-md-table-cell'>
                                    <small>{$cliente['telefone']}</small>
                                </td>
                                <td class='d-none d-md-table-cell'>
                                    <small>{$cliente['celular']}</small>
                                </td>
                                <td class='text-center'>
                                    <button id='btn_edt' type='button' class='badge btn btn-danger m-0  rounded' value='{$cliente['id']}'>
                                        <i class='fa fa-pen-alt'></i>
                                    </button>
                                </td>
                                <td class='text-center'>
                                    <button id='btn_del' type='button' class='badge btn btn-danger m-0  rounded' value='{$cliente['id']}'>
                                        <i class='fa fa-times'></i>
                                    </button>
                                </td>
                            </tr>
                    ";
                }
                echo " </tbody> ";
            }
        }
        echo'
            </table>
        ';
    }
}

class InsertCliente extends Conexao{

    private $nome;
    private $email;
    private $sexo;
    private $celular;
    private $telefone;
    private $cep;
    private $endereco;
    private $numero;
    private $complemento;
    private $bairro;
    private $estado;
    private $cidade;
    private $status;
    private $data_nascimento;

    public function __construct($nome, $email, $sexo, $celular, $telefone, $cep, $endereco, $numero, $complemento, $bairro, $estado, $cidade, $status, $data_nascimento){
        parent:: __construct();

        $this->nome = $nome;
        $this->email = $email;
        $this->sexo = $sexo;
        $this->celular = $this->removeChar($celular);
        $this->telefone = $this->removeChar($telefone);
        $this->endereco = $endereco;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->status = $status;
        $this->data_nascimento = $data_nascimento;
        $this->cep = $this->removeChar($cep);

        $this->insertCliente();

    }

    public function __desctruct(){
        parent:: __destruct();
    }

    private function removeChar($valor){
        $valor = trim($valor);
        $valor = str_replace(")", "", $valor);
        $valor = str_replace("(", "", $valor);
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", "", $valor);
        $valor = str_replace("-", "", $valor);
        $valor = str_replace("/", "", $valor);
        $valor = str_replace(" ", "", $valor);
        return $valor;
    }

    private function insertCliente(){

        $sql = "INSERT INTO cliente (nome, email, sexo, celular, telefone, cep, endereco, numero, complemento, bairro, estado, cidade, status, data_nascimento) VALUES ('{$this->nome}', '{$this->email}', '{$this->sexo}', '{$this->celular}', '{$this->telefone}', '{$this->cep}', '{$this->endereco}', '{$this->numero}', '{$this->complemento}', '{$this->bairro}', '{$this->estado}', '{$this->cidade}', '{$this->status}', '{$this->data_nascimento}')";

        $resultado = parent:: execute($sql);

        if (!$resultado) {
            echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Erro!</strong> Não foi possivel cadatrar cliente.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
        } else {
            echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Sucesso!</strong> Cadastro realizado.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
        }
    }
}

class UpdateCliente extends Conexao{

    private $nome;
    private $email;
    private $sexo;
    private $celular;
    private $telefone;
    private $cep;
    private $endereco;
    private $numero;
    private $complemento;
    private $bairro;
    private $estado;
    private $cidade;
    private $status;
    private $data_nascimento;

    public function __construct($id, $nome, $email, $sexo, $celular, $telefone, $cep, $endereco, $numero, $complemento, $bairro, $estado, $cidade, $status, $data_nascimento){
        parent:: __construct();
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->sexo = $sexo;
        $this->celular = $this->removeChar($celular);
        $this->telefone = $this->removeChar($telefone);
        $this->endereco = $endereco;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->status = $status;
        $this->data_nascimento = $data_nascimento;
        $this->cep = $this->removeChar($cep);

        $this->updateCliente();

    }

    public function __desctruct(){
        parent:: __destruct();
    }

    private function removeChar($valor){
        $valor = trim($valor);
        $valor = str_replace(")", "", $valor);
        $valor = str_replace("(", "", $valor);
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", "", $valor);
        $valor = str_replace("-", "", $valor);
        $valor = str_replace("/", "", $valor);
        $valor = str_replace(" ", "", $valor);
        return $valor;
    }

    private function updateCliente(){

    $sql = "UPDATE cliente SET nome='{$this->nome}', email='{$this->email}', sexo='{$this->sexo}', celular='{$this->celular}', telefone='{$this->telefone}', cep='{$this->cep}', endereco='{$this->endereco}', numero='{$this->numero}', complemento='{$this->complemento}', bairro='{$this->bairro}', estado='{$this->estado}', cidade='{$this->cidade}', status='{$this->status}', data_nascimento='{$this->data_nascimento}' WHERE id='{$this->id}'";

        $resultado = parent:: execute($sql);

        if (!$resultado) {
            echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Erro!</strong> Não foi possivel atualizar cliente.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
        } else {
            echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Sucesso!</strong> Cliente atualizado.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
        }
    }
}

class DeleteCliente extends Conexao{

    private $del;

    public function __construct($del) {
        parent::__construct();

        $this->del = $del;
        $this->deleteCliente();

    }

    public function __destruct(){
        parent:: __destruct();
    }

    private function deleteCliente(){

        $sql = "DELETE FROM cliente WHERE id='{$this->del}'";
        $resultado = parent:: execute($sql);

        if (!$resultado) {
            echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Erro!</strong> Não foi possivel deletar cliente.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
        } else {
            echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Sucesso!</strong> Cliente deletado.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';return "<script>alert('Inserido com Sucesso!');</script>";
        }

    }

}

class TelaCadastroCliente extends ListarClientes{
    
    public function __construct() {
        parent:: __construct();
    }

    public function __destruct(){
        parent:: __destruct();
    }

    private function telaEditarCadastro (){
        echo'
            
        ';
    }

    public function telaCadastro (){
        include_once("../pages/script/scriptCadCli.php");
    }
}