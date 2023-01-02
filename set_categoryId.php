 <?php 
session_start();
    if(isset($_POST['categoryId'])){  
        $_SESSION['categoryId']=$_POST['categoryId'];
        $result['valid'] = TRUE;
    }
    echo json_encode($result);
    exit();
 ?> 



