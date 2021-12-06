<?php
include('conexao.php');

try{
    $sql = "SELECT * from tblvendedores";
    $qry = $con->query($sql);
    $vendedores = $qry->fetchAll(PDO::FETCH_OBJ);
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
    <title>Vendedores</title>
</head>
<body>
    
<h1>Lista de Vendedores</h1>
<hr>
<a href="frmvendedores.php">Novo Cadastro</a>
<hr>
<table border=1>
    <thead>
        <tr>
           <th>id</th> 
           <th>Vendedor</th>
           <th>Data de admissão</th>
           <th>Salário</th>
           <th colspan=2>Ações</th>
           
        </tr>
    </thead>
    <tbody>
        <?php foreach($vendedores as $vendedor) { ?>
        <tr>
            <td><?php echo $vendedor->idvendedor ?></td>
            <td><?php echo $vendedor->vendedor ?></td>
            <td><?php echo $vendedor->dataadmissao ?></td>
            <td><?php echo $vendedor->salario ?></td>
            <td><a href="frmvendedores.php?idvendedor=<?php echo $vendedor->idvendedor ?>">Editar</a></td>
            <td><a href="frmvendedores.php?op=del&idvendedor=<?php echo  $vendedor->idvendedor ?>">Excluir</a></td>

        </tr>
        <?php } ?>
    </tbody>
</table>
<a href="index.php">volta</a>
</body>
</html>