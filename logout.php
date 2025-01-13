<?php
session_destroy();
setcookie("user_session", "", time() - 3600, "/");