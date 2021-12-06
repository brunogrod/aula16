<?php
include('conexao.php');

try{
    $sql = "SELECT * from tblvendas";
    $qry = $con->query($sql);
    $vendas = $qry->fetchAll(PDO::FETCH_OBJ);
    //echo "<pre>";
    //print_r($clientes);
    //die();
} catch(PDOException $e){
    echo $e->getMessage();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendas</title>
</head>
<body>
    
<h1>Lista de Vendas</h1>
<hr>
<a href="frmvendas.php">Novo Cadastro</a>
<hr>
<table border=1>
    <thead>
        <tr>
           <th>ID vendedor</th> 
           <th>Id Produto</th>
           <th>Quantidade</th>
           <th colspan=2>Ações</th>
           
        </tr>
    </thead>
    <tbody>
        <?php foreach($vendas as $venda) { ?>
        <tr>
            <td><?php echo $venda->idvendedor ?></td>
            <td><?php echo $venda->idproduto ?></td>
            <td><?php echo $venda->qtd ?></td>
            <td><a href="frmvendas.php?idvendas=<?php echo $venda->idvendas ?>">Editar</a></td>
            <td><a href="frmvendas.php?op=del&idvendas=<?php echo  $venda->idvendas ?>">Excluir</a></td>

        </tr>
        <?php } ?>
    </tbody>
</table>
<a href="index.php">volta</a>
</body>
</html>