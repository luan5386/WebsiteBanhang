<?php
	session_start();
	include('../../admincp/config/config.php');
	include('../../carbon/autoload.php');
	use Carbon\Carbon;
	use Carbon\CarbonInterval; 
	$now = Carbon::now('Asia/Ho_Chi_Minh');
	$id_khachhang = $_SESSION['id_khachhang'];
	$code_order = rand(0,9999);
	$cart_payment = $_POST['payment'];
	$id_dangky=$_SESSION['id_khachhang'];
    $sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM tbl_shipping WHERE id_dangky='.$id_dangly.' LIMIT 1");
     $row_get_vanchuyen =mysqli_num_rows($sql_get_vanchuyen);
     $id_shipping= $row_get_vanchuyen['id_shipping'];
	$insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date,cart_payment,cart_shipping) VALUE('".$id_khachhang."','".$code_order."',1,'".$now."','".$cart_payment."','".$id_shipping."')";
	$cart_query = mysqli_query($mysqli,$insert_cart);
	if($cart_query){
		foreach($_SESSION['cart'] as $key =>$value){
			$id_sanpham = $value['id'];
			$soluong = $value['soluong'];
			$insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) VALUE('".$id_sanpham."','".$code_order."','".$soluong."')";
			mysqli_query($mysqli,$insert_order_details);
		}
	}	
	unset($_SESSION['cart']);
	header('Location:../../index.php?quanly=camon');



?>