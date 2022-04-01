<?php

    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    require_once "../class/cidade.class.php";

    // Se foi enviado via GET para acao entra aqui
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $id_cidade = isset($_GET['id_cidade']) ? $_GET['id_cidade'] : 0;
        excluir($id_cidade);
    }

    // Se foi enviado via POST para acao entra aqui
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $id_cidade = isset($_POST['id_cidade']) ? $_POST['id_cidade'] : "";
        $nome_cidade = isset($_POST['nome_cidade']) ? $_POST['nome_cidade'] : "";
        $id_estado = isset($_POST['id_estado']) ? $_POST['id_estado'] : "";
        if ($id_cidade == 0)
            inserir($id_cidade,$nome_cidade,$id_estado);
        else
            editar($id_cidade,$nome_cidade,$id_estado);
    }

    
   
    function inserir($id_cidade,$nome_cidade,$id_estado){
        $dados = dadosForm();

        //var_dump($dados);
        
        $cidade = new Cidade($id_cidade,$nome_cidade,$id_estado);
        $cidade->inserir();
        
        header("location:cidade.php");
        
    }

    function editar($id_cidade,$nome_cidade,$id_estado){
        $dados = dadosForm($id_cidade,$nome_cidade,$id_estado);

        $cidade = new Cidade($id_cidade,$nome_cidade,$id_estado);
        $cidade->editar();


        header("location:cidade.php");
    }

    function excluir($id_cidade){   
        
        $cidade = new Cidade($id_cidade,"","");
        $cidade->excluir();
        
        //echo $id_cidade;
        header("location:cidade.php");
        //echo "Excluir".$id;

    }
    
    // Busca um item pelo código no BD
    function buscarDados($id_cidade){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM cidade WHERE id_cidade = $id_cidade");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['id_cidade'] = $linha['id_cidade'];
            $dados['nome_cidade'] = $linha['nome_cidade'];
            $dados['id_estado'] = $linha['id_estado'];
        }
        //var_dump($dados);
        return $dados;
    }
    
    // Busca as informações digitadas no form
    function dadosForm(){
        $dados = array();
        $dados['id_cidade'] = $_POST['id_cidade'];
        $dados['nome_cidade'] = $_POST['nome_cidade'];
        $dados['id_estado'] = $_POST['id_estado'];
        return $dados;
    }

?>