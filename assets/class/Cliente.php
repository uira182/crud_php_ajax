<?php

class Cliente extends Conexao {

    private $id;
    private $nome;
    private $agencia;
    private $conta;

    public function __construct($id) {
        parent::__construct();
        $this->id = $id;
    }

    function getNome() {
        return $this->nome;
    }

    function getAgencia() {
        return $this->agencia;
    }

    function getConta() {
        return $this->conta;
    }

}

class LisatarClientes extends Cliente {

    public function __construct($id) {
        parent::__construct($id);
    }

    private function oneCliente($id) {
        $query = "SELECT c.*, ag.*, cli.* FROM conta c, agencia ag, cliente cli WHERE cli.id='$id' and c.cliete_conta=cli.id and cli.agencia_conta=id_agencia";
    }

}
