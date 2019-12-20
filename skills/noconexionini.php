<?php
session_start();
include("noconexion.php");
$documento=$_POST["documento"];
$clave=$_POST["clave"];
$cont="0";
$sql = "Select * from usuarios WHERE documento='$documento' and clave='$clave'";
	if(!$result = $db->query($sql))
	{
		die ('hay un error corriente en la consulta o datos no encontrados!!![' . $db-> error.' ]');
	}
	while($row = $result->fetch_assoc())
	{
		$iid_usuario = $row['id_usuario'];
		$documento = $row['documento'];
		$cont=$cont+1;
	}
$sql = "Select * from permisos WHERE documento='$documento'";
if(!$result = $db->query($sql)){
		die ('hay un error corriente en la consulta o datos no encontrados!!![' . $db-> error.' ]');
	}
	while($row = $result->fetch_assoc()){
		$fk_iid_permiso = $row['fk_id_permiso'];
	}

	$_SESSION["permiso"] = $fk_iid_permiso;

if ($cont!="0")
{
	$_SESSION["admin"]="1";
	$_SESSION["documento"]=$documento;

	if($fk_iid_permiso==1){
		header("location:menuusu.php");
	}
	if($fk_iid_permiso==2){
		header("location:menuadmin.php");
	}
	if($fk_iid_permiso==3){
		header("location:menusuper.php");
	}
}
if ($cont==0)
{
	header("location:index.php");
}
?>