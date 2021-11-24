<?php
    session_start();
    unset($_SESSION['userCPF']);
    unset($_SESSION['passCPF']);
    header('Location: ../login.php');
?>