<html>
<form method="post" action="ope.php" id="formlogin" name="formlogin">
    <fieldset id="fie">
        <legend>LOGIN</legend>
        <br/>
        <label>NOME : </label>
        <input type="text" name="login" id="login"/><br/>
        <label>SENHA :</label>
        <input type="password" name="senha" id="senha"/><br/>
        <input type="submit" value="LOGAR  "/>
        <?php
        session_start();
        if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true) and ($_SESSION[count] = 1))
        {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            unset($_SESSION['count']);
            echo "credenciais erradas";
        }
        ?>
    </fieldset>
</form>
</html>