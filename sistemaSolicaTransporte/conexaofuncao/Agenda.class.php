<?php

include_once 'conexaofuncao/conexaoDAO.class.php';

class Agenda {

    private $agenda;
    private $datainicial;
    private $horainicial;
    private $destino;
    private $veiculo;
    private $usuario;
    private $descricao;
    private $datafinal;
    private $horafinal;
    private $con;

    function Adicionaragenda($datainicial, $horainicial, $destino, $veiculo, $usuario, $descricao, $datafinal, $horafinal) {
        $this->destino = $destino;
        $this->datainicial = $datainicial;
        $this->datafinal = $datafinal;
        $this->horainicial = $horainicial;
        $this->usuario = $usuario;
        $this->veiculo = $veiculo;
        $this->horafinal = $horafinal;
        $this->descricao = $descricao;
        $this->con = new conexaoDAO();

        $conexao = $this->con->conecta();
        $sql = "insert into agenda (cod_agenda, datapartida, horapartida, datachegada, horachegada, destino, descricao, cod_user, cod_veiculo) values (default,'" . $this->datainicial . "','" . $this->horainicial . "','" . $this->datafinal . "','" . $this->horafinal . "','" . $this->destino . "','" . $this->descricao . "','" . $this->usuario . "','" . $this->veiculo . "')";

        $resultado = mysql_query($sql, $conexao) or die("$sql");

        return $resultado;
    }

    function Ver_agenda($id) {

        $this->con = new conexaoDAO();

        $conexao = $this->con->conecta();

        $sql = "select * from agenda where cod_agenda = " . $id . "";

        $resultado = mysql_query($sql, $conexao) or die("$sql");

        return $resultado;
    }
    
      function Ver_agenda_u($id) {

        $this->con = new conexaoDAO();

        $conexao = $this->con->conecta();

        $sql = "select * from agenda where cod_user = " . $id . "";

        $resultado = mysql_query($sql, $conexao) or die("$sql");

        return $resultado;
    }
     function Ver_agenda_total() {

        $this->con = new conexaoDAO();

        $conexao = $this->con->conecta();

        $sql = "select * from agenda ";

        $resultado = mysql_query($sql, $conexao) or die("$sql");

        return $resultado;
    }

    function atualizar_agenda($datainicial, $horainicial, $destino, $veiculo, $agenda, $descricao, $datafinal, $horafinal) {
        $this->destino = $destino;
        $this->datainicial = $datainicial;
        $this->datafinal = $datafinal;
        $this->horainicial = $horainicial;
        $this->veiculo = $veiculo;
        $this->horafinal = $horafinal;
        $this->descricao = $descricao;
        $this->agenda = $agenda;
        $this->con = new conexaoDAO();

        $conexao = $this->con->conecta();
        $sql = "update agenda set  datapartida='".$this->datainicial."', horapartida='".$this->horainicial."', datachegada='".$this->datafinal."', horachegada='".$this->horafinal."', destino='" . $this->destino . "', descricao='" . $this->descricao . "', cod_veiculo=" . $this->veiculo . " where cod_agenda=" . $this->agenda . " ";
        $resultado = mysql_query($sql, $conexao) or die("$sql");
    }

    function Excluir_agenda($id) {

        $this->con = new conexaoDAO();

        $conexao = $this->con->conecta();

        $sql = "delete from agenda where cod_agenda= " . $id . "";

        $resultado = mysql_query($sql, $conexao) or die("$sql");

        return $resultado;
    }
    function Excluir_agenda_u($id) {

        $this->con = new conexaoDAO();

        $conexao = $this->con->conecta();

        $sql = "delete from agenda where cod_user= " . $id . "";

        $resultado = mysql_query($sql, $conexao) or die("$sql");

        return $resultado;
    }
   
    function verifica_datapartida(
    $data) {
        $this->con = new conexaoDAO();

        $conexao = $this->con->conecta();

        $sql = "select * from agenda where datapartida >" . $data . " and datachegada < " . $data . "";

        $resultado = mysql_query($sql, $conexao) or die("$sql");

        if (mysql_num_rows($resultado) > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function verifica_datachegada($data) {


        $this->con = new conexaoDAO();

        $conexao = $this->con->conecta();

        $sql = "select * from agenda where datachegada < " . $data . " or datachegada == " . $data . "";

        $resultado = mysql_query($sql, $conexao) or die("$sql");

        if (mysql_num_rows($resultado) > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
?>

