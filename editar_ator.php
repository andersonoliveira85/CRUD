<!DOCTYPE html>
<html lang="pt-br">

<?php

	//utilizando autoload
	require __DIR__.'/App/autoload.php';
	use DB\Conexao as DB;

	
	//verifica se id é nulo
	$id = null;

	if(!empty($_GET['id']))
   	{
       	$id = $_REQUEST['id'];
   	}
   	if(null==$id)
    {
       	header("Location: index.php");
    }

	$banco = DB::getInstance();
    $consulta = $banco->prepare("SELECT * FROM ator WHERE ator_id=?");
    $consulta->execute(array($id));
    $row = $consulta->fetch(PDO::FETCH_ASSOC);
    DB::disconnect();
    	

?>
<form method="POST" action="proc_editar_ator.php">
	<label>Id</label>
	<input type="text" name="id" value="<?php if(isset($row['ator_id'])) echo $row['ator_id'];?>" <br><br><br>

	<label>Nome</label>
	<input type="text" name="nome" value="<?php if(isset($row['primeiro_nome']))echo $row['primeiro_nome'];	?>" <br><br><br>

	<label>Sobrenome</label>
	<input type="text" name="sobrenome" value="<?php if(isset($row['ultimo_nome']))echo $row['ultimo_nome'];?>"></br><br>

	<label>ultima atualização</label>
	<input type="text" name="ultima_atualização" value="<?php if(isset($row['ultima_atualizacao']))echo $row['ultima_atualizacao'];	?>"><br><br>

	<input type="submit" name="editarConteudo" value="Editar">


</form>