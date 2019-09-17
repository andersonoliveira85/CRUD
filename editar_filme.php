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
    $consulta = $banco->prepare("SELECT * FROM filme WHERE filme_id=?");
    $consulta->execute(array($id));
    $row = $consulta->fetch(PDO::FETCH_ASSOC);
    DB::disconnect();
    	

?>
<form method="POST" action="proc_editar_filme.php">
	<label>Id</label>
	<input type="text" name="filme_id" value="<?php if(isset($row['filme_id'])) echo $row['filme_id'];?>" <br><br><br>

	<label>Título</label>
	<input type="text" name="titulo" value="<?php if(isset($row['titulo']))echo $row['titulo'];	?>" <br><br><br>

	<label>Descrição</label>
	<input type="text" name="descricao" value="<?php if(isset($row['descricao']))echo $row['descricao'];?>"></br><br>

	<label>Ano de Lançamento</label>
	<input type="text" name="ano_de_lancamento" value="<?php if(isset($row['ano_de_lancamento']))echo $row['ano_de_lancamento'];	?>"><br><br>

	<label>Idioma</label>
	<input type="text" name="descricao" value="<?php if(isset($row['descricao']))echo $row['descricao'];?>"></br><br>

	<input type="submit" name="editarConteudo" value="Editar">


</form>