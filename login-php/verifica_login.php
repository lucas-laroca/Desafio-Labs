<?php
session_start();
if(!$_SESSION['usuario']) {
	header('Location: index.php');
	exit();
}
//Lucas Laroca - Senha :luca2805
//Anny Navarro - Senha :Anny123