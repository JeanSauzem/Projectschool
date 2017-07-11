<?php
include 'conexaofuncao/Usuario.class.php';
include 'conexaofuncao/Veiculo.class.php';
include 'conexaofuncao/Agenda.class.php';
$usuario = new usuario();
$veiculo = new Veiculo();

$usuario->verifica_sessao();

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
            <h1>Painel Administrativo</h1>
            <h3>Acesso Restrito</h3>
            <div id="contactform"> 
                <a href="painel1.php"><input type="button" value="Pagina Inicial" name="home"  class="button" /></a>
                <a href="usuario.php"><input type="button" value="Usuarios" name="usuarios"  class="button" /></a>
                <a href="agenda.php"><input type="button" value="Agendas" name="agendas"  class="button" /></a>
                <a href="sair.php"><input type="button" value="Sair" name="Sair"  class="button" /></a>
          
                <h1>Adicionar Usuario</h1>

                <form  class="rounded" action="add_usuario.php" method="post">
                    <div class="field">
                        <label for=nome >Nome:</label>
                        <input type="text" id="nome" name="nome"  />
                        <p class="hint">Digite o Nome</p>
                    </div>
                    <div class="field">
                        <label for="email" >Email:</label>
                        <input type="text" id="email" name="email" />
                        <p class="hint">Digite o email</p>
                    </div>
                    <div class="field">
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" id="telefone" />
                        <p class="hint">Digite o  telefone </p>
                    </div>
                    <div class="field">
                        <label for="senha" >Senha:</label>
                        <input type="text" id="senha" name="senha"  />
                        <p class="hint">Digite a senha</p>
                    </div>
                    <div class="field">
                        <label for="siape" >Siape</label>
                        <input type="text" id="siape" name="siape"  />
                        <p class="hint">Digite o siape</p>
                    </div>
                    <div class="field">
                        <label for="tipo" >Tipo de Usuario</label>
                        <select name="tipo">
                            <option value="1">Administrador</option>
                            <option value="0">Servidor</option>
                        </select>   
                        <p class="hint">Selecione o tipo de usuario</p>
                    </div>

                    <input type="submit" value="Adicionar" name="Submit"  class="button" />
                </form>
            </div>
        </div>
    </body>
</html>
<?php

if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["telefone"]) && isset($_POST["senha"]) && isset($_POST["siape"]) && isset($_POST["tipo"])) {
  $re= $usuario->adicionar_usuario($_POST["email"], $_POST["nome"], $_POST["senha"], $_POST["siape"], $_POST["telefone"], $_POST["tipo"]);
  
}
?>

