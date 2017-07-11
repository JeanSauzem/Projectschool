<?php
include 'conexaofuncao/Usuario.class.php';
include 'conexaofuncao/Veiculo.class.php';
include 'conexaofuncao/Agenda.class.php';
$usuario = new usuario();
$veiculo = new Veiculo();

$usuario->verifica_sessao();
if (isset($_GET["id"])) {
    $mostra = $usuario->listar_usuario($_GET["id"]);
    $linha = mysql_fetch_array($mostra);
    ?>
    <html lang="pt-br">
        <head>
            <meta charset="utf-8">

            <title>Página Inicial</title>

            <link rel="stylesheet" type="text/css" href="css/loginform.css" />
            <link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />


        </head>
        <body >
            <div class="container">
                <h1>Ola <?php echo $_SESSION['nome']; ?></h1>
            <h3>Painel Administrativo - Visualização Usuario</h3>
                <div id="contactform"> 
                    <a href="painel1.php"><input type="button" value="Pagina Inicial" name="home"  class="button" /></a>
                    <a href="usuario.php"><input type="button" value="Usuarios" name="usuarios"  class="button" /></a>
                    <a href="agenda.php"><input type="button" value="Agendas" name="agendas"  class="button" /></a>
                    <a href="sair.php"><input type="button" value="Sair" name="Sair"  class="button" /></a>
                    
                    <br />
                    <br />
                    <br />
                    <br />
                    <p><h3>Nome:</h3><?php echo $linha["nome"] ?> </p>
                    <p><h3>Email </h3><?php echo $linha["email"] ?></p>
                    <p><h3>Telefone </h3><?php echo $linha["telefone"] ?></p>
                    <p><h3>Senha </h3><?php echo $linha["senha"] ?>
                    <h3>Siape </h3><?php echo $linha["siape"] ?></p>
                    <p><h3>Tipo do usuario </h3><?php
                    if ($linha["tipo"] == 0) {
                        echo "Servidor";
                    } else {
                        echo "Administrador";
                    }
                    ?>
                    </p>
                </div>
            </div>
        </body>
    </html>
    <?php
}

