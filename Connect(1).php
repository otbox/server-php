<?php 
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Origin: *");


    include '../connect.php';
    
    $method = $_SERVER['REQUEST_METHOD'];
    
    $conn = new mysqli($sever,$user,$passw,$bd);

    //Essa Parte serve para a Seleção da Operação no BD
    
    $data = json_decode(file_get_contents("php://input"), true) ?? $_POST;
    if(isset($data['Operation'])){ 
        $WhoOperation = $data['Operation'];
        $content = $data['Content'];
        
        switch ($WhoOperation) {
            case 'select':
                SelectAllProducts($conn);
                break;
            case 'searchByCategory':
                searchByCategory($conn, $content);
                break;
            case 'pesquisar':
                pesquisar($conn,$content);
                break;
            case 'addProducts':
                addProducts($conn, $content);
                break;
            case 'pesquisar':
                pesquisar($conn,$content);
                break;
            case 'newCategory':
                addCategory($conn,$content);
                break;
            case 'selectAllCategories':
                selectAllCategories($conn);
            break;
            
            case 'removeProduct':
                removeProduct($conn, $content);
            break;
            
            case 'alterarProduct':
                alterarProduct($conn,$content);
                break;
                
            default:
                error404();
        }
    }else{
        error404();
    }
    
    function getUser($conn, $content){
        $user = $content['user'];
        $passw = $content['passw'];
        
        if(mysqli_connect_errno()){
            echo "conncetion failed". mysqli_connect_errno();
        }else{
            $result = mysqli_query($conn, "Select * from usuarios where Nome = '$user' and Senha = '$passw'");
            $row = mysqli_fetch_all($result);
            echo json_encode($row);
        }
    }

   
    function SelectAllProducts($conn):void {
        if (mysqli_connect_errno()){
            echo "Connection failed" . mysqli_connect_error();
        }else{
            $result = mysqli_query($conn,'Select * from produtos order by idProduto desc');
            $row = mysqli_fetch_all($result);
            echo json_encode($row);
        }
    }
    
    function error404():void {
        echo "<div style='text-align: center; margin-top: 40%'><h1>404</h1> <p>Page Not Found</p></div>";
    }
?>