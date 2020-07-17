<?php

    session_start();

    $_SESSION["x"] = 
    $usuarios = [   ["id" => 1, "email" => "admin@gmail.com", "senha" => "1234" , "type" => "admin"], 
                    ["id" => 2, "email" => "matheus@gmail.com", "senha" => "1234","type" => "user" ],
                    ["id" => 3, "email" => "duda@gmail.com", "senha" => "1234","type" => "user"],
                    ["id" => 4, "email" => "andre@gmail.com", "senha" => "1234","type" => "user"]
                
                ];


    if(autenticador($_POST["email"],$_POST["senha"],$usuarios)){
        
        $_SESSION["autenticado"] = ("sim");
        header("Location: home.php?");
    }else{
        $_SESSION["autenticado"] = ("nao");
        header("Location: index.php?login=erro");
    }


    function autenticador($email, $senha, $usuarios){
        //variavel que guarda o retorno da funcao
        $temp = false;

        foreach($usuarios as $k){
            if($email === $k["email"] and $k["senha"] === $senha){
                $temp = true;
                $_SESSION["id"] = $k["id"];
                $_SESSION["type"] = $k["type"];
            }
        }

        return $temp;
    }

?>