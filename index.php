<?php
require_once "login.php";

$email = "teste@teste.com";
$senha = "teste";

$login = new Facebook();
$login->caminho = "cookies.txt";

//realiza o login
$login->entrar($email, $senha, false);

//abre uma pagina do facebook
echo $login->abrirPagina("https://www.facebook.com");

