<?php
function takip(){
	Global $db;
	$gecerliAdres = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	if(@$_SERVER['HTTP_REFERER']) $birOncekiDizin = @$_SERVER['HTTP_REFERER'];
	else $birOncekiDizin = 'BOŞ';
	$kullaniciDil = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
	$kullaniciIp = $_SERVER['REMOTE_ADDR'];
	$veri = $db->prepare("INSERT INTO user SET ip=?, bulundugu=?,geldigi=?,dil=?");
	$veri->execute(array($kullaniciIp,$gecerliAdres,$birOncekiDizin,$kullaniciDil));
	
} 	

function onlinemi($ip){
	Global	$db;
	date_default_timezone_set('Europe/Istanbul');
	setlocale(LC_ALL, 'tr_TR.UTF-8', 'tr_TR', 'tr', 'turkish');
	$zaman= date("Y-m-d H:i:s", time ()-5);
	$veri = $db->prepare("SELECT * FROM user WHERE ip='$ip' AND TIMESTAMP(zaman) >'$zaman'");
	$veri->execute(array());
	$verisay=$veri->rowCount();
	if($verisay>0){
		return 1;
		
	}else {
		return 0;
	}
}