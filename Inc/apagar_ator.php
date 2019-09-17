<?php
global $elemento;
use App\Delete\Deletar;

$apagarAtor = new Deletar("ator", $elemento);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Loja DVD :: <?php echo ucfirst($pagina);  ?> - Apagar</title>
</head>

<body>
    <?php
        echo $apagarAtor;
    ?>
    <a href="./index.php">Voltar para a página inicial</a>
</body>

</html>
