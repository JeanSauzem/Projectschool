<?php
include_once 'conexaofuncao/conexaoDAO.class.php';
class Veiculo{
    private $cod;
    private $nome;
    private $modelo;
    private $tipo;
    private $motorista;
    private $con;
        function SelecaoTipoVeiculo(){
            $this->con=new conexaoDAO();
            $conexao=  $this->con->conecta();
            $sql="select * from veiculo";
            
           return $resultado=  mysql_query($sql,$conexao);
           
      
        }
       function NomeMotoristaVeiculo($id){
            $this->con=new conexaoDAO();
            $conexao=  $this->con->conecta();
            $sql="select motorista from veiculo where cod_veiculo=".$id."";
            
           $resultado=  mysql_query($sql,$conexao);
           
           $linha=  mysql_fetch_array($resultado);
           
           return $linha["motorista"];
      
        }
    
        function Lista_Veiculo($id){
            $this->con=new conexaoDAO();
            $conexao=  $this->con->conecta();
            $sql="select * from veiculo where cod_veiculo=".$id."";
            
           return $resultado=  mysql_query($sql,$conexao);
           
      
        }
}
