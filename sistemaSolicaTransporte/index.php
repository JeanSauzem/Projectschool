<html>
    <head>
        <meta charset="UTF-8" />
        <title>Página Inicial</title>
        <link rel="stylesheet" type="text/css" href="css/loginform.css" />
    </head>
    <body>
        <div class="container">
            <h1>Solicitação Veiculo</h1>
            <h3>Acesso Restrito</h3>

            <form id="contactform" class="rounded" action="index.php" method="post">
                <div class="field">
                    <label for="nome" >Siape:</label>
                    <input type="text" name="siape" id="nome"/>
                    <p class="hint">Digite seu Siape</p>
                </div>
                <div class="field">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha"/>
                    <p class="hint">Digite sua Senha</p>
                </div>
                <input type="submit" value="acessar" name="Submit"  class="button" />
            </form>
        </div>
    </body>
</html>
<?php
include 'conexaofuncao/Usuario.class.php';

if (isset($_POST["siape"]) && isset($_POST["senha"])) {
    $usuario = new usuario();
    $valida = $usuario->autenticao_sessao($_POST["siape"], $_POST["senha"]);
    if ($valida) {
        if ($_SESSION['tipo'] == 0) {
            header("location:painel.php");
        } else {
            header("location:painel1.php");
        }
    } else {
        ?>
<script type="text/javascript">
    alert("Usuario não cadastro");
</script>
        <?php
    }
}
?>

