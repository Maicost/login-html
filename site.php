<!DOCTYPE html>
<html>
<head>
    <?php
    session_start();
    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location:index.php');
    }
    $logado = $_SESSION['login'];
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Privado</title>
</head>

<body>
    <p><?php echo "".$logado;?> Logado com sucesso</p>
</body>
</html>