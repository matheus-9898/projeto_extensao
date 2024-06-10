<?php 
    class cadastro{

        public static function cadastrarUsuario($usuario,$senha){
            $sql = mysql::conexaoBD()->prepare('SELECT usuario FROM usuarios WHERE usuario=?');
            $sql->execute(array($usuario));

            if($sql->rowCount() != 0){
                echo "<script> alert('Usuário já cadastrado'); </script>";
            }else{
                $sql = mysql::conexaoBD()->prepare('INSERT INTO usuarios VALUES (null,?,?)');
                $sql->execute(array($usuario,$senha));
                header('Location: ../');
                die();
            }

        }
    }
?>