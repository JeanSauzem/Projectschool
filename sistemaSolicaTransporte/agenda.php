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
            <h3>Painel Administrativo - Edição de Agenda</h3>
            <div id="contactform"> 
                <a href="painel1.php"><input type="button" value="Pagina Inicial" name="home"  class="button" /></a>
                <a href="usuario.php"><input type="button" value="Usuarios" name="usuarios"  class="button" /></a>
                <a href="agenda.php"><input type="button" value="Agendas" name="agendas"  class="button" /></a>
                <a href="sair.php"><input type="button" value="Sair" name="Sair"  class="button" /></a>
                <table>
                    <tr><td>Codigo</td>
                        <td>Descricao</td>
                        <td>Data de partida</td>
                        <td>Data de chegada</td>
                        <td>Funções</td>
                    </tr>
                    <?php
                    $resulta = $agenda->Ver_agenda_total();
                    while ($linha = mysql_fetch_array($resulta)) {
                        ?>
                        <td><?php echo $linha["cod_agenda"]; ?></td>
                        <td><?php echo $linha["descricao"]; ?></td>
                        <td><?php echo $linha["datapartida"]; ?></td>
                        <td><?php echo $linha["datachegada"]; ?></td>
                        <td><a href="agenda.php?id=<?php echo $linha["cod_agenda"]; ?>&situacao=E">Excluir</a></td>
                        <td><a href="alteraragenda.php?id=<?php echo $linha["cod_agenda"]; ?>">Alterar</a></td>
                        <td><a href="VisualizaAgendamento.php?id=<?php echo $linha["cod_agenda"]; ?>">Visualizar</a></td>

                        </tr>

                    <?php } ?>
                </table>
                <a href="solicitarveiculoadmin.php"><input type="button" value="Solicitar" name="Solicitar"  class="button" /></a>


            </div>
        </div>
    </body>
</html>
<?php
if (isset($_GET["id"]) && isset($_GET["situacao"])) {

    if ($_GET["situacao"] == "E") {
        $re = $agenda->Excluir_agenda($_GET["id"]);
    }
}
?>

