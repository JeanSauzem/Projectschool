<?php

include 'conexaofuncao/conexaoDAO.class.php';

class usuario {

    private $tipo;
    private $email;
    private $nome;
    private $senha;
    private $siape;
    private $telefone;
    private $cod;
    private $con;

    function autenticao_sessao($siape, $senha) {
        $this->con = new conexaoDAO();

        $conexao = $this->con->conecta();
        $sql = "SELECT * FROM usuario WHERE siape = '$siape' AND senha = '$senha'";

        $resultado = mysql_query($sql, $conexao) or die("Erro na seleção da tabela.");

//Caso consiga logar cria a sessão
        if (mysql_num_rows($resultado) > 0) {
            // session_start inicia a sessão
            session_start();

            $_SESSION['siape'] = $siape;
            $_SESSION['senha'] = $senha;
            while ($linha = mysql_fetch_array($resultado)) {
                $_SESSION['nome'] = $linha["nome"];
                $_SESSION['codusuario'] = $linha["cod_usuario"];
                $_SESSION['tipo']=$linha["tipo"];
            }

            return TRUE;
        } else {

            return FALSE;
        }
    }

    function verifica_sessao() {
        session_start();

        if ((!isset($_SESSION['siape']) == true) and ( !isset($_SESSION['senha']) == true )) {
            //Destrói
            session_destroy();

            //Limpa
            unset($_SESSION['siape']);
            unset($_SESSION['senha']);

            //Redireciona para a página de autenticação
            header('location:index.php');
        }
    }

    function desfazer_sessao() {
        session_start();
        session_destroy();
        session_unset();
    }

    function atualizar_usuario($email, $nome, $senha, $siape, $telefone, $cod) {
        $this->email = $email;
        $this->nome = $nome;
        $this->senha = $senha;
        $this->siape = $siape;
        $this->telefone = $telefone;
        $this->cod = $cod;
        $this->con = new conexaoDAO();
        $conexao = $this->con->conecta();

        $sql = "Update usuario set email='" . $this->email . "' , nome='" . $this->nome . "', senha='" . $this->senha . "' , siape='" . $this->siape . "' , telefone='" . $telefone . "'  where cod_usuario=" . $this->cod . "";
        $resultado = mysql_query($sql, $conexao) or die("$sql");
    }
    function atualizar_usuario_admin($email, $nome, $senha, $siape, $telefone, $cod,$tipo) {
        $this->email = $email;
        $this->nome = $nome;
        $this->senha = $senha;
        $this->siape = $siape;
        $this->telefone = $telefone;
        $this->cod = $cod;
        $this->tipo=$tipo;
        $this->con = new conexaoDAO();
        $conexao = $this->con->conecta();

        $sql = "Update usuario set email='" . $this->email . "' , nome='" . $this->nome . "', senha='" . $this->senha . "' , siape='" . $this->siape . "' , telefone='" . $telefone . "', tipo=".$this->tipo."  where cod_usuario=" . $this->cod . "";
        $resultado = mysql_query($sql, $conexao) or die("$sql");
    }
    function adicionar_usuario($email, $nome, $senha, $siape, $telefone, $tipo) {
        $this->email = $email;
        $this->nome = $nome;
        $this->senha = $senha;
        $this->siape = $siape;
        $this->telefone = $telefone;
        $this->tipo = $tipo;
        $this->con = new conexaoDAO();
        $conexao = $this->con->conecta();

        $sql = "Insert into usuario (cod_usuario, email, nome, senha, siape, telefone, tipo) values (default,'".$this->email."','".$this->nome."','".$this->senha."','".$this->siape."','".$this->telefone."','".$this->tipo."')";
        $resultado = mysql_query($sql, $conexao) or die("$sql");
    }

    function listar_usuario($cod) {
        $this->cod = $cod;
        $this->con = new conexaoDAO();
        $conexao = $this->con->conecta();

        $sql = "select * from usuario where cod_usuario='" . $this->cod . "'";
        $resultado = mysql_query($sql, $conexao) or die("$sql");
        return $resultado;
    }
     function listar_usuario1() {
        
        $this->con = new conexaoDAO();
        $conexao = $this->con->conecta();

        $sql = "select * from usuario";
        $resultado = mysql_query($sql, $conexao) or die("$sql");
        return $resultado;
    }
    function listar_usuario_user($id) {
        $this->cod=$id;
        $this->con = new conexaoDAO();
        $conexao = $this->con->conecta();

        $sql = "select nome from usuario where cod_usuario=".$this->cod."";
        $resultado = mysql_query($sql, $conexao) or die("$sql");
        $linha=  mysql_fetch_array($resultado);
        return $linha["nome"];
        }
     function excluir_usuario($cod) {
        $this->cod = $cod;
        $this->con = new conexaoDAO();
        $conexao = $this->con->conecta();

        $sql = "delete from usuario where cod_usuario='" . $this->cod . "'";
        $resultado = mysql_query($sql, $conexao) or die("$sql");
        return $resultado;
    }
    
}
