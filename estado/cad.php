<!DOCTYPE html>

<?php
    include_once "acao.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $dados;
    if ($acao == 'editar'){
        $id_estado = isset($_GET['id_estado']) ? $_GET['id_estado'] : "";
    if ($id_estado > 0)
        $dados = buscarDados($id_estado);
}
    $title = "Cadastro de Estados";
    $nome_estado = isset($_POST['nome_estado']) ? $_POST['nome_estado'] : "";
    
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

<h3>Insira o Estado</h3><br>

        <form method="post" action="acao.php">
        <label>ID do Estado</label>
                    <input readonly  type="text" name="id_estado" id="id_estado"value="<?php if ($acao == "editar") echo $dados['id_estado']; else echo 0; ?>"><br>

        <label>Nome do Estado </label>
                    <input name="nome_estado" id="nome_estado" type="text" required="true"value="<?php if ($acao == "editar") echo $dados['nome_estado']; ?>"><br>
                

        <label> Sigla do Estado </label><br>
                    <input name="sigla" id="sigla" type="text" required="true"value="<?php if ($acao == "editar") echo $dados['sigla']; ?>"><br>
                    
<br><br>


    <button name="acao" value="salvar" id="acao" type="submit">
                     Salvar
                </button>
                  
           
    </form>
    

</body>
</html>