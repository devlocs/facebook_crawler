<?php
require_once "login.php";

$email = "";
$senha = "";

$login = new Facebook();
$login->caminho = "cookies.txt";

//verifica se ja está logado, "!" informando caso não esteja ele realiza o login
if(!$login->estouLogado){
  $login->entrar($email, $senha, false);
}
//abre uma pagina do facebook
echo $login->abrirPagina("https://www.facebook.com");