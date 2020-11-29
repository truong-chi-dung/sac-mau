<?php
    session_start();
    if(!isset($_SESSION['lang']))
    {
    $_SESSION['lang']='vi';
    }
    $lang=$_SESSION['lang'];
    
    @define ( '_lib' , '../libraries/');
    @define ( '_source' , '../sources/');
    
    include_once _lib."config.php";
    include_once _lib."constant.php";
    include_once _lib."functions.php";
    include_once _lib."functions_share.php";
    include_once _lib."class.database.php";
    include_once _source."lang_$lang.php";  
    include_once _lib."functions_giohang.php";
    include_once _lib."file_requick.php";
    include_once _lib."counter.php"; 
    
    $d = new database($config['database']); 
    @$id_pr = $_POST['id_pr'];
    remove_product($id_pr);
    $data['count']=count($_SESSION['cart']);
    $data['tonggia']=number_format(get_order_total(),0, ',', '.').' đ';
    echo json_encode($data);
?>

