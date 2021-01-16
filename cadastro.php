<?php
session_start();
if ($_SESSION['falha'] == true) {
    unset($_SESSION['falha']);
    echo "Usuário já existe ou dados invalidos";
}
?>
<html>
<form method="post" action="ope.php">
    <legend>LOGIN</legend>
    <br/>
    <label>NOME : </label>
    <input type="text" name="login" id="login"/><br/>
    <label>SENHA :</label>
    <input type="password" name="senha" id="senha"/><br/>
    <input type="hidden" name="acao" value="cadastro">
    <input type="submit" value="CADASTRAR"/>
</form>
</html>