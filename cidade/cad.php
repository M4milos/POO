<!DOCTYPE html>

<?php
    include_once "acao.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $dados;
    if ($acao == 'editar'){
        $id_cidade = isset($_GET['id_cidade']) ? $_GET['id_cidade'] : "";
    if ($id_cidade > 0)
        $dados = buscarDados($id_cidade);
}
    $title = "Cadastro de Cidades";
    $nome_cidade = isset($_POST['nome_cidade']) ? $_POST['nome_cidade'] : "";
    
//var_dump($dados);
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>

</head>


<body>
<br>

<h3>Insira a Cidade</h3><br>

        <form method="post" action="acao.php">
        <label>ID da Cidade</label>
                    <input readonly  type="text" name="id_cidade" id="id_cidade"value="<?php if ($acao == "editar") echo $dados['id_cidade']; else echo 0; ?>"><br>

        <label>Nome da Cidade </label>
                    <input name="nome_cidade" id="nome_cidade" type="text" required="true"value="<?php if ($acao == "editar") echo $dados['nome_cidade']; ?>"><br>
                

        <label> Estado da Cidade </label><br>
                    <select name="id_estado" id="id_estado" > 
                        <?php
                            $pdo = Conexao::getInstance(); 
                
                            $consulta = $pdo->query("SELECT * FROM estado");

                            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {   

                                if ($acao == "editar") echo $dados['id_estado']; 
                                                                    
                                ?>

                
              <option value="<?php echo $linha['id_estado'];?>"> <?php if ($acao == "editar"){ $dados['id_estado'];}?>  <?php echo $linha['nome_estado'];?></option> 
               <?php }
               ?>
    </select>

<br><br>


    <button name="acao" value="salvar" id="acao" type="submit">
                     Salvar
                </button>
                  
           
    </form>
    

</body>
</html>