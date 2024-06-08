<?php
session_start();
session_destroy();

// destruyo la sesion y te redirijo al index
header("Location: index.php");
exit;