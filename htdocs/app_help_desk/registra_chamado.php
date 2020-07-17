<?php

    session_start();


    $text = fopen("../../app_help_desk/arquivo.txt","a");

    if($_POST["titulo"] === "" || $_POST["categoria"] === "" || $_POST["descricao"] === ""){
        
    header("Location: abrir_chamado.php?aviso=dadosinvalidos");
        
    }else{

    $titulo = str_replace("#", "-",$_POST["titulo"]);
    $categoria = str_replace("#", "-",$_POST["categoria"]);
    $descricao = str_replace("#", "-",$_POST["descricao"]);

    $texto = $titulo . "#" . $categoria . "#" . $descricao . "#" . $_SESSION["id"] . PHP_EOL ;


    fwrite($text, $texto);

    fclose($text);

    header("Location: abrir_chamado.php");
    }

?>