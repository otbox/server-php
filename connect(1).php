<?php 
$sever= "localhost";
$bd = 'id21631877_lojaesdatabase';
$user = 'id21631877_otboxes';
$passw = 'BancodaHora10@';
// $sever= "sql213.infinityfree.com";
// $bd = 'if0_35969915_lojaes';
// $user = 'if0_35969915';
// $passw = 'jmWcg3QgQlAC';

function newPedido($conn, $content) {
    $idProdutos = $conte['idPedidos'];
    
}

function addClient ($conn,$content){
    $UserName = $content['username'];
    $passw = $content['passw'];
    $cpf = $content['cpf'];
    $endereco = $content['UserEndereco'];
    $email = $content['email'];
    if(mysqli_connect_errno()){
        echo "conncetion failed". mysqli_connect_errno();
    }else{
        $query = "INSERT INTO `produtos`(`nome`, `endereco`, `preco`, `nomeCategoria`, `SrcImgProd`) VALUES ('$nome','$endereco','$preco', '$nomeCategoria', '$enderecoViewPort')";
        $result = mysqli_query($conn, $query);
        if($result == TRUE){
        echo 'Success';
        }else{
        echo 'Failed'. $query . '  ' .$result;
        }
    }
}

function addImages($conn,$content){
    $srcImagem = $content['endereco'];

    if(mysqli_connect_errno()){
        echo "conncetion failed". mysqli_connect_errno();
    }else{
        $query = "INSERT INTO `imagens`(`SrcImagens`) VALUES ('$srcImagem')";
        $result = mysqli_query($conn, $query);
        if($result == TRUE){
        echo 'Success';
        }else{
        echo 'Failed'. $query . '  ' .$result;
        }
    }
}

function addProducts($conn, $content){
    $nome = $content['nome'];
    $preco = $content['preco'];
    $endereco = $content['endereco'];
    $nomeCategoria = $content['categoria'];
    $enderecoViewPort = $content['ercView'];
    
    if(mysqli_connect_errno()){
            echo "conncetion failed". mysqli_connect_errno();
        }else{
            $query = "INSERT INTO `produtos`(`nome`, `endereco`, `preco`, `nomeCategoria`, `SrcImgProd`) VALUES ('$nome','$endereco','$preco', '$nomeCategoria', '$enderecoViewPort')";
            $result = mysqli_query($conn, $query);
            if($result == TRUE){
            echo 'Success';
            }else{
            echo 'Failed'. $query . '  ' .$result;
            }
        }
}

function searchByCategory($conn, $content){
    $categoria = $content['categoria'];
    //echo  $categoria;
    if(mysqli_connect_errno()){
            echo "conncetion failed". mysqli_connect_errno();
        }else{
            $query = "Select * from `produtos` where `nomeCategoria` = '$categoria'";
            $result = mysqli_query($conn, $query);
            if($result == TRUE){
            $row = mysqli_fetch_all($result);
            echo json_encode($row);
            }else{
            echo 'Failed'. $query . '  ' .$result;
            }
        }
}

function addCategory($conn, $content){
    $category = $content['newCategory'];
     if(mysqli_connect_errno()){
            echo "conncetion failed". mysqli_connect_errno();
        }else{
            $query = "INSERT INTO `categoria`(`nomeCategoria`) VALUES ('$category')";
            $result = mysqli_query($conn, $query);
            if($result == TRUE){
            echo 'Categoria Adicionada';
            }else{
            echo 'Failed'. $query . '  ' .$result;
            }
        }
}

function pesquisar ($conn, $content){
    $item = $content['item'];
    
    if(mysqli_connect_errno()){
        echo "conncetion failed". mysqli_connect_errno();
    }else{
        $query = "SELECT * FROM `produtos` WHERE nome like '%$item%' or nomeCategoria like '%$item%'";
        $result = mysqli_query($conn, $query);
        if($result == TRUE){
        $row = mysqli_fetch_all($result);
        echo json_encode($row);
        }else{
        echo 'Failed'. $query . '  ' .$result;
        }
    }
}

function removeProduct($conn, $content){
    $idProduto = $content['idProduto'];
    if(mysqli_connect_errno()){
            echo "conncetion failed". mysqli_connect_errno();
        }else{
            $query = "delete from produtos where idProduto = $idProduto";
            $result = mysqli_query($conn,$query);
            if($result == TRUE){
                echo 'Sucesso na remoção do produto';
            }else{
                echo 'Falhou';
            }
        }
}

function alterarProduct($conn, $content){
    $idProduto = $content['idProduto'];
    $nomeProd = $content['nome'];
    $preco = $content['preco'];
    $categoria = $content['categoria'];

    if(mysqli_connect_errno()){
        echo "conection fauild". mysqli_connect_errno();
    }else{
        $query = "UPDATE `produtos` SET `nome`='$nomeProd',`preco`='$preco',`nomeCategoria`='$categoria' WHERE idProduto = $idProduto";
        // echo($query);
        $result = mysqli_query($conn,$query);
        if($result == TRUE){
            echo "Alterado com Sucesso";
        }else{
            echo "Alteração Falhou". $query ."  ". $result;
        }
    }
}

function selectAllCategories($conn) {
    if(mysqli_connect_errno()){
            echo "conncetion failed". mysqli_connect_errno();
        }else{
            $query = "Select * from `categoria`";
            $result = mysqli_query($conn, $query);
            if($result == TRUE){
            $row = mysqli_fetch_all($result);
            echo json_encode($row);
            }else{
            echo 'Failed'. $query . '  ' .$result;
            }
        }
}
?>