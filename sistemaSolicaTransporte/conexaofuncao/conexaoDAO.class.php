<?php

class conexaoDAO {
//    private $conexao;
//    private $selecionabd;
    function conecta() {
        $conexao = mysql_connect("localhost", "root", "") or die("Erro na conexão do banco de dados.");
        $selecionabd = mysql_select_db("controlemotorista", $conexao) or die("Banco de dados inexistente.");
        return $conexao;
    }

}
?>

