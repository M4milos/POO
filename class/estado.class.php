<?php
    class Estado{
        private $id_estado;
        private $nome_estado;
        private $sigla;
        
        public function __construct($id, $cid, $idest){ 
            $this->id_estado = $id;
            $this->nome_estado = $cid;
            $this->sigla = $idest;
        }

        public function __toString(){
            $str = "ID da Cidade: ".$this->id_estado.
            "<br>Nome da Cidade: ".$this->nome_cidade.
            "<br>Sigla: ".$this->sigla;
            return $str;
        }

        public function inserir(){
            
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO estado (nome_estado,  sigla) VALUES(:nome_estado,  :sigla)');
            $stmt->bindParam(':nome_estado', $this->nome_estado, PDO::PARAM_STR);
            $stmt->bindParam(':sigla', $this->sigla, PDO::PARAM_STR);
    
            return $stmt->execute();
            
        }

        public function editar(){
            
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('UPDATE estado SET id_estado = :id_estado, nome_estado = :nome_estado, sigla = :sigla WHERE id_estado = :id_estado ');
        $stmt->bindParam(':id_estado', $this->id_estado, PDO::PARAM_INT);
        $stmt->bindParam(':nome_estado', $this->nome_estado, PDO::PARAM_STR);
        $stmt->bindParam(':sigla', $this->sigla, PDO::PARAM_STR);
        
            return $stmt->execute();
            
        }


        function excluir(){

            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM estado WHERE id_estado = :id_estado');
            $stmt->bindParam(':id_estado', $this->id_estado);
            $stmt->execute();
        }
       
}

?>