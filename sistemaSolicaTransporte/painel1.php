<?php
include 'conexaofuncao/Usuario.class.php';
include 'conexaofuncao/Agenda.class.php';
$usuario = new usuario();
$usuario->verifica_sessao();
$agenda = new Agenda();
?>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Página Inicial</title>
        <link rel="stylesheet" type="text/css" href="css/loginform.css" />
    </head>
    <body>
        <div class="container">
            <h1>Olá <?php echo $_SESSION['nome']; ?></h1>
            <h3>Painel Administrativo</h3>
            <div id="contactform"> 
                <a href="painel1.php"><input type="button" value="Pagina Inicial" name="home"  class="button" /></a>
                <a href="usuario.php"><input type="button" value="Usuarios" name="usuarios"  class="button" /></a>
                <a href="agenda.php"><input type="button" value="Agendas" name="agendas"  class="button" /></a>
                <a href="sair.php"><input type="button" value="Sair" name="Sair"  class="button" /></a>
            </div>
        </div>
    </body>
</html>