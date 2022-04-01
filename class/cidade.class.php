<?php
    class Cidade{
        private $id_cidade;
        private $nome_cidade;
        private $id_estado;
        
        public function __construct($id, $cid, $idest){ 
            $this->id_cidade = $id;
            $this->nome_cidade = $cid;
            $this->id_estado = $idest;
        }

        public function __toString(){
            $str = "ID da Cidade: ".$this->id_cidade.
            "<br>Nome da Cidade: ".$this->nome_cidade.
            "<br>Estado: ".$this->id_estado;
            return $str;
        }

        public function inserir(){
            
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO cidade (nome_cidade, id_estado) VALUES(:nome_cidade, :id_estado)');
            $stmt->bindParam(':nome_cidade', $this->nome_cidade, PDO::PARAM_STR);
            $stmt->bindParam(':id_estado', $this->id_estado, PDO::PARAM_STR);
    
            return $stmt->execute();
            
        }

        public function editar(){
            
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('UPDATE cidade SET nome_cidade = :nome_cidade, id_estado = :id_estado WHERE id_cidade = :id_cidade');
        $stmt->bindParam(':id_cidade', $this->id_cidade, PDO::PARAM_INT);
        $stmt->bindParam(':nome_cidade', $this->nome_cidade, PDO::PARAM_STR);
        $stmt->bindParam(':id_estado', $this->id_estado, PDO::PARAM_STR);
        
            return $stmt->execute();
            
        }


        function excluir(){

            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM cidade WHERE id_cidade = :id_cidade');
            $stmt->bindParam(':id_cidade', $this->id_cidade);
            $stmt->execute();
        }
       
}

?>