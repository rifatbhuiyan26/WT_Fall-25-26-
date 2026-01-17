<?php
session_start(); // Session shuru kora jate sheti bondho kora jay

// Shob session variable muche fela
session_unset(); 

// Session-ti puro-puri dhongso kora
session_destroy();

// Logout hoye gele user-ke abar login page-e pathiye dewa
header("Location: view/index.html");
exit();
?>