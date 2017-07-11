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
            <h3>Seus Agendamento de Veiculos</h3>
            <div id="contactform"> 
                <a href="painel.php"><input type="button" value="Pagina Inicial" name="Solicitar"  class="button" /></a>
                <a href="solicitarveiculo.php"><input type="button" value="Solicitar Veiculo" name="Solicitar"  class="button" /></a>
                <a href="AlterarCadastro.php"><input type="button" value="Alterar Cadastro" name="Alterar"  class="button" /></a>
                <a href="sair.php"><input type="button" value="Sair" name="Sair"  class="button" /></a>
                <table>
                    <tr><td>Codigo</td>
                        <td>Descricao</td>
                        <td>Data de partida</td>
                        <td>Data de chegada</td>
                        <td>Funções</td>
                    </tr>
                    <?php
                    $resulta = $agenda->Ver_agenda_u($_SESSION["codusuario"]);
                    while ($linha = mysql_fetch_array($resulta)) {
                    ?>
                    <td><?php echo $linha["cod_agenda"]; ?></td>
                    <td><?php echo $linha["descricao"]; ?></td>
                    <td><?php echo $linha["datapartida"]; ?></td>
                    <td><?php echo $linha["datachegada"]; ?></td>
                    <td><a href="painel.php?id=<?php echo $linha["cod_agenda"]; ?>&situacao=E">Excluir</a></td>
                    <td><a href="alterarveiculo.php?id=<?php echo $linha["cod_agenda"]; ?>&situacao=A">Alterar</a></td>
                    <td><a href="visualizarOrdem.php?id=<?php echo $linha["cod_agenda"]; ?>">Visualizar</a></td>

                    </tr>
                    <?php } ?>
                </table>

                <?php
                if(isset($_GET["id"]) && isset($_GET["situacao"])) {

                if($_GET["situacao"]=="E"){
                $re = $agenda->Excluir_agenda($_GET["id"]);

                if($re){?>
                <script type = "text/javascript">
                alert("Solicitacao excluida");
                </script>
                <?php
                }
                }
                }
                ?>
            </div>
        </div>
    </body>
</html>

