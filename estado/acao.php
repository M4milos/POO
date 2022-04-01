<?php

    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    require_once "../class/estado.class.php";

    // Se foi enviado via GET para acao entra aqui
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $id_estado = isset($_GET['id_estado']) ? $_GET['id_estado'] : 0;
        excluir($id_estado);
    }

    // Se foi enviado via POST para acao entra aqui
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $id_estado = isset($_POST['id_estado']) ? $_POST['id_estado'] : "";
        $nome_estado = isset($_POST['nome_estado']) ? $_POST['nome_estado'] : "";
        $sigla = isset($_POST['sigla']) ? $_POST['sigla'] : "";
        if ($id_estado == 0)
            inserir($id_estado,$nome_estado,$sigla);
        else
            editar($id_estado,$nome_estado,$sigla);
    }

    
   
    function inserir($id_estado,$nome_estado,$sigla){
        $dados = dadosForm();

        //var_dump($dados);
        
        $estado = new estado($id_estado,$nome_estado,$sigla);
        $estado->inserir();
        
        header("location:estado.php");
        
    }

    function editar($id_estado,$nome_estado,$sigla){
        $dados = dadosForm($id_estado,$nome_estado,$sigla);

        $estado = new Estado($id_estado,$nome_estado,$sigla);
        $estado->editar();


        header("location:estado.php");
    }

    function excluir($id_estado){   
        
        $estado = new Estado($id_estado,"","");
        $estado->excluir();
        
        //echo $id_estado;
        header("location:estado.php");
        //echo "Excluir".$id;

    }
    
    // Busca um item pelo código no BD
    function buscarDados($id_estado){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM estado WHERE id_estado = $id_estado");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['id_estado'] = $linha['id_estado'];
            $dados['nome_estado'] = $linha['nome_estado'];
            $dados['sigla'] = $linha['sigla'];
        }
        //var_dump($dados);
        return $dados;
    }
    
    // Busca as informações digitadas no form
    function dadosForm(){
        $dados = array();
        $dados['id_estado'] = $_POST['id_estado'];
        $dados['nome_estado'] = $_POST['nome_estado'];
        $dados['sigla'] = $_POST['sigla'];
        return $dados;
    }

?>