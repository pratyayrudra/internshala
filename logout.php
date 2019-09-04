<?php
    setcookie("account_type", "", time() - 3600);
    setcookie("user_id", "", time() - 3600);
    header("Location: index.php");
?>