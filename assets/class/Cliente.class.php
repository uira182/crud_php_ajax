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

    protected function oneCliente($nome) {
        $nome .= "%";
        $sql = "SELECT * FROM cliente WHERE nome LIKE '$nome'";
        $resultado = parent:: getOne($sql);

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
                echo"Não foram encontrados clientes";
            }else{ 

                sleep(1); //Tempo para pensar
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
                                    <button id='btn_del' type='button' class='badge btn btn-danger m-0  rounded' value='{$cliente['id']}'>
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
            if(!$cliente = parent:: oneCliente($nome)){
                echo"Não foram encontrados clientes";
            }else{ 
                
                sleep(1); //Tempo para pensar
            
                echo "
                        <div class='row border pt-1 pb-2'>
                            <div class='col-sm-12 mx-auto'>
                                <div class='row'>
                                    <div class='col-3'>{$cliente['nome']}</div>
                                    <div class='col-3'>{$cliente['email']}</div>
                                    <div class='col-2 d-none d-md-block'>{$cliente['telefone']}</div>
                                    <div class='col-2 d-none d-md-block'>{$cliente['celular']}</div>
                                    <div class='col-1 text-center p-0 m-0'>
                                        <button id='btn_del' class='badge btn btn-danger m-0  rounded' value='{$cliente['id']}'>x</button>                            
                                    </div>                            
                                </div>
                            </div>
                        </div>
                ";
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
            echo "<script>alert('Erro');</script>";
        } else {
            echo "<script>alert('Inserido com Sucesso!');</script>";
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
            return "<script>alert('Erro');</script>";
        } else {
            return "<script>alert('Inserido com Sucesso!');</script>";
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