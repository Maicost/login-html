<?php
session_start();
if ($_SESSION['falha'] == true) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    unset($_SESSION['falha']);
    echo "Usuário e senha não encontrados!";
}

//após cadastrar um usuário com sucesso
if($_SESSION['hasCadastrado'] == true){
    unset($_SESSION['hasCadastrado']);
    echo "<script> alert('Sucesso');</script>";
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
    <input type="hidden" name="acao" value="logar">
    <input type="submit" value="LOGAR  "/>
</form>
<button>
    <a href="cadastro.php" style="text-decoration:none">CADASTRO</a>
</button>
</html>