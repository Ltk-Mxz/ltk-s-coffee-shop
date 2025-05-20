<?php
session_start();
session_unset();
session_destroy();
header("location: http://localhost/coffee-ltk/admin-panel/admins/login-admins.php");
