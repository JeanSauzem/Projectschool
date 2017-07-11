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
          <h1>Olá <?php echo $_SESSION['nome']; ?></h1>
            <h3>Visualização do Solicitação</h3>
            <div id="contactform"> 
                <a href="painel.php"><input type="button" value="Pagina Inicial" name="Solicitar"  class="button" /></a>
                <a href="solicitarveiculo.php"><input type="button" value="Solicitar Veiculo" name="Solicitar"  class="button" /></a>
                <a href="AlterarCadastro.php"><input type="button" value="Alterar Cadastro" name="Alterar"  class="button" /></a>
                <a href="sair.php"><input type="button" value="Sair" name="Sair"  class="button" /></a>

                <?php
                $resulta = $agenda->Ver_agenda($_GET["id"]);
                $linha = mysql_fetch_array($resulta);
                $motorista=$veiculo->NomeMotoristaVeiculo($linha["cod_veiculo"]);
                ?>
                <p><h3>Ordem de solicitação:</h3><?php echo $linha["cod_agenda"]; ?></td>
                <h3>Nome:</h3><?php echo $_SESSION["nome"]; ?></p>
                <p><h3>Descricao:</h3><?php echo $linha["descricao"]; ?></p>
                <p> <h3>Data de Partida:</h3><?php echo $linha["datapartida"]; ?>
                <h3>Hora de Partida:</h3><?php echo $linha["horapartida"]; ?></p>
                <p><h3>Data de Chegada:</h3><?php echo $linha["datachegada"]; ?>
                <h3>Data de Chegada:</h3><?php echo $linha["horachegada"]; ?></p>
                <p><h3>Motorista:</h3><?php echo $motorista?></p>