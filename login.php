<?php
class Facebook{
	public $caminho;
	public $url = "https://m.facebook.com/login.php";
	public $navegador = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36";
	
	function estouLogado(){
		if (file_exists($caminho)){
			return true;
		}else{
			return false;
		}	
	}
	function entrar($email, $senha){
		$ch = curl_init($this->url);
		curl_setopt($ch, CURLOPT_POSTFIELDS,'email='.urlencode($email).'&pass='.urlencode($senha).'&login=Login');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_COOKIEJAR, $this->caminho);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $this->caminho);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, $this->navegador);
		curl_exec($ch);
		curl_close($ch);
	}
	function abrirPagina($link){
		$ch = curl_init($link);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_COOKIEJAR, $this->caminho);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $this->caminho);
		curl_setopt ($ch, CURLOPT_COOKIESESSION, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, $this->navegador);
		return curl_exec($ch);
	}
}