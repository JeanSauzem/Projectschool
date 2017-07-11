<?php

include 'conexaofuncao/Usuario.class.php';
 $usuario=new usuario();
 $usuario->desfazer_sessao();
 header('location:index.php');

?>