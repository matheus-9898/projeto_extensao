<?php 
    class login{
        public static function logar($usuario,$senha){
            $sql = mysql::conexaoBD()->prepare('SELECT * FROM usuarios WHERE usuario=? AND senha=?');
            $sql->execute(array($usuario,$senha));
            if($sql->rowCount() == 1){
                $_SESSION['login'] = true;
                header('Location: ./');
                die();
            }else{
                echo "<script>alert('Dados inválidos.');</script>";
            }
        }
    }
?>