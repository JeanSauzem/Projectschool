<?php
include 'conexaofuncao/Usuario.class.php';
include 'conexaofuncao/Veiculo.class.php';
include 'conexaofuncao/Agenda.class.php';
$usuario = new usuario();
$veiculo = new Veiculo();
$agenda = new Agenda();
$usuario->verifica_sessao();
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">

        <title>Página Inicial</title>

        <link rel="stylesheet" type="text/css" href="css/loginform.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.timepicker.css" />

        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/jquery.timepicker.js"></script>
        <script src="js/jquery.timepicker.min.js"></script>
        <script>
            $(function () {
                $("#datainicial").datepicker();
            });
            $(function () {
                $("#datafinal").datepicker();
            });
            $(function () {
                $('#hora').timepicker({'timeFormat': 'H:i'});
            });
            $(function () {
                $('#hora1').timepicker({'timeFormat': 'H:i'});
            });
        </script>
        <script src="js/time.js"></script>

    </head>
    <body  class="cap10">
        <div class="container">
                   <h1>Ola <?php echo $_SESSION['nome']; ?></h1>
            <h3>Painel Administrativo - Visualização da Agenda</h3>
            <div id="contactform"> 
                 <a href="painel1.php"><input type="button" value="Pagina Inicial" name="home"  class="button" /></a>
                <a href="usuario.php"><input type="button" value="Usuarios" name="usuarios"  class="button" /></a>
                <a href="agenda.php"><input type="button" value="Agendas" name="agendas"  class="button" /></a>
                <a href="sair.php"><input type="button" value="Sair" name="Sair"  class="button" /></a>
               <br />
               <br />
               <br />
               <br />
               <br />
                <?php
                $resulta = $agenda->Ver_agenda($_GET["id"]);
                $linha = mysql_fetch_array($resulta);
                $resulta1 = $veiculo->Lista_Veiculo($linha["cod_veiculo"]);
                $linha1 = mysql_fetch_array($resulta1);
                $nome=$usuario->listar_usuario_user($linha["cod_user"]);
                ?>
                <p><h3>Ordem de solicitação:</h3><?php echo $linha["cod_agenda"]; ?></td>
                <h3>Nome:</h3><?php echo $nome; ?></p>
                <p><h3>Descricao:</h3><?php echo $linha["descricao"]; ?></p>
                <p> <h3>Data de Partida:</h3><?php echo $linha["datapartida"]; ?>
                <h3>Hora de Partida:</h3><?php echo $linha["horapartida"]; ?></p>
                <p><h3>Data de Chegada:</h3><?php echo $linha["datachegada"]; ?>
                <h3>Data de Chegada:</h3><?php echo $linha["horachegada"]; ?></p>
                <p> <h3>Data de Chegada:</h3><?php echo $linha["horachegada"]; ?></p>

                <p><h3>Tipo de Veiculo</h3><?php echo $linha1["tipo"]; ?></p>
                <p><h3>Modelo do Veiculo</h3><?php echo $linha1["modelo"]; ?></p>
                <p><h3>Motorista:</h3><?php
                echo $linha1["motorista"];
                ?></p>
 </div>
        </div>
    </body>
</html>
