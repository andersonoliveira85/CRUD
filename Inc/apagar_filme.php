<?php
global $elemento;
use App\Delete\Deletar;

$apagarFilme = new Deletar("Filme", $elemento);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Loja DVD :: <?php echo ucfirst($pagina);  ?> - Apagar</title>
</head>

<body>
    <?php
        echo $apagarFilme;
    ?>
    <a href="./index.php">Voltar para a página inicial</a>
</body>

</html>
