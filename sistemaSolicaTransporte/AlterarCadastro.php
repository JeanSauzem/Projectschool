<?php
include 'conexaofuncao/Usuario.class.php';
include 'conexaofuncao/Veiculo.class.php';
include 'conexaofuncao/Agenda.class.php';
$usuario = new usuario();
$veiculo = new Veiculo();

$usuario->verifica_sessao();
$mostra = $usuario->listar_usuario($_SESSION["codusuario"]);
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
           <h1>Olá <?php echo $_SESSION['nome']; ?></h1>
            <h3>Alterar Cadastro</h3>
            <div id="contactform"> 
                <a href="painel.php"><input type="button" value="Pagina Inicial" name="Solicitar"  class="button" /></a>
                <a href="solicitarveiculo.php"><input type="button" value="Solicitar Veiculo" name="Solicitar"  class="button" /></a>
                <a href="AlterarCadastro.php"><input type="button" value="Alterar Cadastro" name="Alterar"  class="button" /></a>
                <a href="sair.php"><input type="button" value="Sair" name="Sair"  class="button" /></a>
                <form  class="rounded" action="AlterarCadastro.php" method="post">
                    <div class="field">
                        <label for=nome >Nome:</label>
                        <input type="text" id="nome" name="nome" value="<?php echo $linha["nome"] ?>" />
                        <p class="hint">Renova o Nome</p>
                    </div>
                    <div class="field">
                        <label for="email" >Email:</label>
                        <input type="text" id="email" name="email" value="<?php echo $linha["email"] ?>"/>
                        <p class="hint">Renova o email</p>
                    </div>
                    <div class="field">
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" id="telefone" value="<?php echo $linha["telefone"] ?>"/>
                        <p class="hint">Renova o telefone </p>
                    </div>
                    <div class="field">
                        <label for="senha" >Senha:</label>
                        <input type="text" id="senha" name="senha" value="<?php echo $linha["senha"] ?>" />
                        <p class="hint">Renova a senha</p>
                    </div>
                    <div class="field">
                        <label for="siape" >Siape</label>
                        <input type="text" id="siape" name="siape" value="<?php echo $linha["siape"] ?>" />
                        <p class="hint">Renova o siape</p>
                    </div>

                    <input type="submit" value="Alterar" name="Submit"  class="button" />
                </form>
            </div>
        </div>
    </body>
</html>
<?php
//echo "teste".$_POST["nome"];
if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["telefone"]) && isset($_POST["senha"]) && isset($_POST["siape"])) {
    $usuario->atualizar_usuario($_POST["email"], $_POST["nome"], $_POST["senha"], $_POST["siape"], $_POST["telefone"], $_SESSION["codusuario"]);
}
?>

