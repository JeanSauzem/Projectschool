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
            <h3>Painel Administrativo - Edição de Usuários</h3>
            <div id="contactform"> 
                <a href="painel1.php"><input type="button" value="Pagina Inicial" name="home"  class="button" /></a>
                <a href="usuario.php"><input type="button" value="Usuarios" name="usuarios"  class="button" /></a>
                <a href="agenda.php"><input type="button" value="Agendas" name="agendas"  class="button" /></a>
                <a href="sair.php"><input type="button" value="Sair" name="Sair"  class="button" /></a>


                <table>
                    <tr><td>Codigo</td>
                        <td>nome</td>
                        <td>siape</td>
                        <td>email</td>
                        <td>funções</td>
                    </tr>
                    <?php
                    $resulta = $usuario->listar_usuario1();
                    while ($linha = mysql_fetch_array($resulta)) {
                        ?>
                        <td><?php echo $linha["cod_usuario"]; ?></td>
                        <td><?php echo $linha["nome"]; ?></td>
                        <td><?php echo $linha["siape"]; ?></td>
                        <td><?php echo $linha["email"]; ?></td>
                        <td><a href="usuario.php?id=<?php echo $linha["cod_usuario"]; ?>&situacao=E">Excluir</a></td>
                        <td><a href="alterarusuario.php?id=<?php echo $linha["cod_usuario"]; ?>">Alterar</a></td>
                        <td><a href="visualizarusuario.php?id=<?php echo $linha["cod_usuario"]; ?>">Visualizar</a></td>

                        </tr>
                    <?php } ?>
                </table>
                <a href="add_usuario.php"><input type="button" value="Adicionar" name="home"  class="button" /></a>
            </div>
        </div>
    </body>
</html>
<?php
    if(isset($_GET["id"])){
        if($_GET["situacao"]=='E'){
            $usuario->excluir_usuario($_GET["id"]);
            $agenda->Excluir_agenda_u($_GET["id"]);
        }
    }
?>