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

    <?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $resulta = $agenda->Ver_agenda($id);
        $linha = mysql_fetch_array($resulta);
        ?>
        <body>
            <div class="container">
                <h1>Olá <?php echo $_SESSION['nome']; ?></h1>
                <h3>Alterar Solicitação</h3>
                <div id="contactform"> 

                    <a href="painel.php"><input type="button" value="Pagina Inicial" name="Solicitar"  class="button" /></a>
                    <a href="solicitarveiculo.php"><input type="button" value="Solicitar Veiculo" name="Solicitar"  class="button" /></a>
                    <a href="AlterarCadastro.php"><input type="button" value="Alterar Cadastro" name="Alterar"  class="button" /></a>
                    <a href="sair.php"><input type="button" value="Sair" name="Sair"  class="button" /></a>

                    <form  class="rounded" action="alterarveiculo.php" method="post"  >
                        <INPUT TYPE="hidden" NAME="cod" value="<?php echo $linha["cod_agenda"]; ?>">
                        <div class="field">
                            <label for="datainicial" >Data de Partida:</label>

                            <p><input type="text" id="datainicial" name="datapartida" value="<?php echo $linha["datapartida"]; ?>"/></p>
                            <p class="hint">Selecione a data de partida</p>
                        </div>
                        <div class="field">
                            <label for="datainicial" >Hora de Partida:</label>
                            <input type="text"  name="horasaida" id="hora" class="time" value="<?php echo $linha["horapartida"]; ?>"/>
                            <p class="hint">Digite a hora da saída</p>
                        </div>
                        <div class="field">
                            <label for="hora_aida">Data de Chegada:</label>
                            <input type="text" name="datafinal" id="datafinal" value="<?php echo $linha["datachegada"]; ?>"/>
                            <p class="hint">Selecione a data de chegada</p>
                        </div>
                        <div class="field">
                            <label for="datainicial" >Hora da chegada:</label>
                            <input type="text" name="horachegada" id="hora1" class="time" value="<?php echo $linha["horachegada"]; ?>"/>
                            <p class="hint">Digite a previsão do horário de chegada</p>
                        </div>
                        <div class="field">
                            <label for="destino">Destino:</label>
                            <input type="text" name="destino" id="destino" value="<?php echo $linha["destino"]; ?>" />
                            <p class="hint">Selecione o destino</p>
                        </div>
                        <div class="field">
                            <label for="descricao">Descrição da solicitação:</label>
                            <textarea name="descricao" rows="10" cols="30" ><?php echo $linha["descricao"]; ?></textarea>
                            <p class="hint">Digite motivo para solicação do veiculo</p>
                        </div>
                        <div class="field">
                            <label for="data">Veiculo:</label>
                            <select name="veiculo" id="veiculo" >
                                <?php
                                $resulta = $veiculo->SelecaoTipoVeiculo();
                                while ($linha = mysql_fetch_array($resulta)) {
                                    ?>

                                    <option value="<?php echo $linha["cod_veiculo"]; ?>"><?php
                                        echo $linha["modelo"] . " | " . $linha["tipo"];
                                    }
                                    ?>
                                </option>
                            </select>

                            <p class="hint">Selecione o Veiculo</p>
                        </div>

                        <input type="submit" value="Alterar" name="Submit"  class="button" />
                    </form>

                </div>
            </div>

        </body>
    </html>

    <?php
}
if (isset($_POST["datapartida"]) && isset($_POST["horasaida"]) && isset($_POST["datafinal"]) && isset($_POST["cod"]) && isset($_POST["horachegada"]) && isset($_POST["veiculo"]) && isset($_POST["destino"]) && isset($_POST["descricao"])) {

    $agenda->atualizar_agenda($_POST["datapartida"], $_POST["horasaida"], $_POST["destino"], $_POST["veiculo"], $_POST["cod"], $_POST["descricao"], $_POST["datafinal"], $_POST["horachegada"]);

    $id = $_POST["cod"];
    header('location: http://localhost/sistemaSolicaTransporte/painel.php');
}
?>