<!DOCTYPE html>
<html lang="pt-br">

<?php
session_start();

	//utilizando autoload
	require __DIR__.'/App/autoload.php';
	use DB\Conexao as DB;

	$enviarEditarConteudo = filter_input(INPUT_POST, 'editarConteudo', FILTER_SANITIZE_STRING);
	if($enviarEditarConteudo){
		//recebe dados do formulario
		$ator_id = filter_input(INPUT_POST, 'id');
		$nome = filter_input(INPUT_POST, 'nome');
		$sobrenome = filter_input(INPUT_POST, 'sobrenome');
		$ultima_atualizacao = filter_input(INPUT_POST, 'ultima_atualizacao');
	
	$banco = DB::getInstance();
	$sql = "UPDATE ator SET primeiro_nome=:nome,  ultimo_nome =:sobrenome, ultima_atualizacao =:ultima_atualizacao 
	WHERE ator_id = $ator_id";

	$consulta = $banco->prepare($sql);
	$consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
	$consulta->bindParam(':sobrenome', $sobrenome, PDO::PARAM_STR);
	$consulta->bindParam(':ultima_atualizacao', $ultima_atualizacao, PDO::PARAM_STR);

	if($consulta->execute()){
		$_SESSION['msg'] = "<p style='color:green;'>Mensagem editada com sucesso</p>";
        header("Location: 	listar.php?p=ator");

	}else{ $_SESSION['msg'] = "<p style='color:red;'>Mensagem não foi editada com sucesso</p>";
    header("Location: index.php");
	}
}	

?>