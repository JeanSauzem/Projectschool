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
            <h3>Painel Administrativo - Solicitar Veiculo</h3>
            <div id="contactform"> 

                <a href="painel1.php"><input type="button" value="Pagina Inicial" name="home"  class="button" /></a>
                <a href="usuario.php"><input type="button" value="Usuarios" name="usuarios"  class="button" /></a>
                <a href="agenda.php"><input type="button" value="Agendas" name="agendas"  class="button" /></a>
                <a href="sair.php"><input type="button" value="Sair" name="Sair"  class="button" /></a>



                <form  class="rounded" action="solicitarveiculoadmin.php" method="post"  >
                    <div class="field">
                        <label for="datainicial" >Data de Partida:</label>
                        <p><input type="text" id="datainicial" name="datapartida"/></p>
                        <p class="hint">Selecione a data de partida</p>
                    </div>
                    <div class="field">
                        <label for="datainicial" >Hora de saída:</label>
                        <input type="text"  name="horasaida" id="hora" class="time"/>
                        <p class="hint">Digite a hora da saída</p>
                    </div>
                    <div class="field">
                        <label for="hora_aida">Data de Chegada:</label>
                        <input type="text" name="datafinal" id="datafinal"/>
                        <p class="hint">Selecione a data de chegada</p>
                    </div>
                    <div class="field">
                        <label for="datainicial" >Hora da chegada:</label>
                        <input type="text" name="horachegada" id="hora1" class="time"/>
                        <p class="hint">Digite a previsão do horário de chegada</p>
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
                    <div class="field">
                        <label for="destino">Destino:</label>
                        <input type="text" name="destino" id="destino"/>
                        <p class="hint">Selecione o destino</p>
                    </div>
                    <div class="field">
                        <label for="descricao">Descrição da solicitação:</label>
                        <textarea name="descricao" rows="10" cols="30"></textarea>
                        <p class="hint">Digite motivo para solicação do veiculo</p>
                    </div>
                    <input type="submit" value="Agendar" name="Submit"  class="button" />
                </form>

            </div>
        </div>

    </body>
</html>
<?php
echo $_SESSION["codusuario"];
if (isset($_POST["datapartida"]) && isset($_POST["horasaida"]) && isset($_POST["datafinal"]) && isset($_POST["horachegada"]) && isset($_POST["veiculo"]) && isset($_POST["destino"]) && isset($_POST["descricao"])) {
    $condicao = $agenda->Adicionaragenda($_POST["datapartida"], $_POST["horasaida"], $_POST["destino"], $_POST["veiculo"], $_SESSION["codusuario"], $_POST["descricao"], $_POST["datafinal"], $_POST["horachegada"]);
}
?>
