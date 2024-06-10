<?php 
    class painel{
        public static function consultaCategoriasExistentes(){
            $sql = mysql::conexaoBD()->prepare('SELECT DISTINCT categoria FROM produtos');
            $sql->execute();
            $info = $sql->fetchAll(PDO::FETCH_NUM);
            return($info);
        }
        public static function consultaProdutosExistentes(){
            $sql = mysql::conexaoBD()->prepare('SELECT nome FROM produtos');
            $sql->execute();
            $info = $sql->fetchAll(PDO::FETCH_NUM);
            return($info);
        }

        public static function entradaProdutos($categoria){
            $sql = mysql::conexaoBD()->prepare('INSERT INTO produtos VALUES (null,?,?,?,?)');
            $sql->execute(array($_POST['produto'],$_POST['codigo'],$categoria,$_POST['quantidade']));
        }

        public static function saidaProdutos(){
            $sql = mysql::conexaoBD()->prepare('UPDATE produtos SET quantidade = quantidade - ? WHERE nome=?');
            $sql->execute(array($_POST['quantidade'],$_POST['produto']));
        }

        public static function consultaDetalhadaProdutosExistentes(){
            $sql = mysql::conexaoBD()->prepare('SELECT * FROM produtos');
            $sql->execute();
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            return(array_reverse($info));
        }

        public static function histEntradas(){
            $sql = mysql::conexaoBD()->prepare('INSERT INTO histentradas VALUES (null,?,?,?)');
            $sql->execute(array($_POST['produto'],$_POST['quantidade'],date("d/m/Y H:i")));
            header('Location: ./');
            die();
        }

        public static function histSaidas(){
            $sql = mysql::conexaoBD()->prepare('INSERT INTO histsaidas VALUES (null,?,?,?)');
            $sql->execute(array($_POST['produto'],$_POST['quantidade'],date("d/m/Y H:i")));
            header('Location: ./');
            die();
        }

        public static function consultaHistEntradas(){
            $sql = mysql::conexaoBD()->prepare('SELECT * FROM histentradas');
            $sql->execute();
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            return(array_reverse($info));
        }

        public static function consultaHistSaidas(){
            $sql = mysql::conexaoBD()->prepare('SELECT * FROM histsaidas');
            $sql->execute();
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            return(array_reverse($info));
        }

        public static function deletarProdutos(){
            $sql = mysql::conexaoBD()->prepare('DELETE FROM produtos WHERE quantidade<=0');
            $sql->execute();
        }
    }
?>