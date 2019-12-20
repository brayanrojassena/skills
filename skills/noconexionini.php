<?php
session_start();
include("noconexion.php");
$documento=$_POST["documento"];
$contraseña=$_POST["contraseña"];
$cont="0";
$sql = "Select * from usuario WHERE documento='$documento' and contraseña='$contraseña'";
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
		header("location:usuperfil.php");
	}
	if($fk_iid_permiso==2){
		header("location:admindex.php");
	}
	if($fk_iid_permiso==3){
		header("location:supindex.php");
	}
}
if ($cont==0)
{
	header("location:index.php");
}
?>