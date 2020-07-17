<?php
  session_start();

  if(!isset($_SESSION["autenticado"]) or $_SESSION["autenticado"] == "nao"){
    header("Location: index.php?login=erro2");  
  }
  

?>