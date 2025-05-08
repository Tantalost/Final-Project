<?php
session_start();
session_unset();
session_destroy();
header("Location: Member-Login.php");
exit();
?> 