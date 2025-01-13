<?php
session_destroy();
setcookie("user_session", "", time() - 3600, "/");
setcookie("user_email", "", time() - 3600, "/");
header("Location: index.php");
exit();
?>
