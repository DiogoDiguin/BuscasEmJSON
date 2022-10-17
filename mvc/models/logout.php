<?php

    session_start();
    unset ($_SESSION['idCientista']);
    header('Location: ../../publico/Index.php');

?>