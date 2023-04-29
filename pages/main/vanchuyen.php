	<p>Vận chuyển</p>
<div class="container">
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
    <div class="step done "> <span> <a href="index.php?quanly=giohang" >Giỏ Hàng</a></span> </div>
    <div class="step current"> <span><a href="index.php?quanly=vanchuyen" >Vận Chuyển</a></span> </div>
    <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh Toán</a><span> </div>
    <!-- <div class="step"> <span><a href="index.php?quanly=donhangdadat" >Lịch Sử Đơn Hàng</a><span> </div> -->
  </div>
  <h4>Thông Tin Vận Chuyển</h4>
  <?php
  if (isset($_POST['themvanchuyen'])){
  	$name=$_POST['name']; 
  	$phone=$_POST['phone'];
  	$address=$_POST['address'];
  	$note=$_POST['note'];
  	$id_dangky=$_SESSION['id_khachhang'];
  	$sql_them_vanchuyen = mysqli_query($mysqli,"INSERT INTO tbl_shipping(name,phone,address,note,id_dangky) VALUE('$name','$phone','$address','$note','$id_dangky')");
  	if($sql_them_vanchuyen){
  		echo '<script> alert("Thêm Thông Tin Thành Công")</script>';
  	}
  }elseif(isset($_POST['capnhatvanchuyen'])) {
  	 	$name=$_POST['name']; 
  		$phone=$_POST['phone'];
  		$address=$_POST['address'];
  		$note=$_POST['note'];
  		$id_dangky=$_SESSION['id_khachhang'];
  		$sql_update_vanchuyen = mysqli_query($mysqli,"UPDATE tbl_shipping SET name='$name',phone='$phone',address='$address',note='$note',id_dangky='$id_dangky' WHERE id_dangky='$id_dangky'") ;
  		if($sql_update_vanchuyen){
  			echo '<script> alert("cập Nhật Thông Tin Thành Công")</script>';
  	}
  }
  ?>
		 <div class="row">
		 	<?php 
		 	$id_dangky=$_SESSION['id_khachhang'];
		 	$sql_get_vanchuyen = mysqli_query($mysqli, "SELECT *FROM tbl_shipping WHERE id_dangky='$id_dangky' LIMIT 1");
		 	$count = mysqli_num_rows($sql_get_vanchuyen);
		 	if ($count >0){
		 		$row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
		 		$name=$row_get_vanchuyen['name']; 
			  	$phone=$row_get_vanchuyen['phone'];
			  	$address=$row_get_vanchuyen['address'];
			  	$note=$row_get_vanchuyen['note'];
		 	}else{
		 		$name='';
		 		$phone='';
		 		$address='';
		 		$note='';
		 	}
		 	?>
		 <div class="col-md-12">
		  	<form action="" autocomplete="off" method="POST">
		  	<div class="form-group">
		    	<label for="email">Họ và tên:</label>
		    	<input type="text" name="name" class="form-control" value="<?php echo $name ?>" placeholder="...." >
		  	</div>
		  <div class="form-group">
		    	<label for="email">Phone:</label>
		    	<input type="text" name="phone"class="form-control" value="<?php echo $phone ?>"   placeholder="...." >
		  	</div>
		  	<div class="form-group">
		    	<label for="email">Địa Chỉ:</label>
		    	<input type="text" name="address"class="form-control" value="<?php echo $address ?>"  placeholder="....">
		  	</div>
		  	<div class="form-group">
		    	<label for="email">Ghi Chú:</label>
		    	<input type="text" name="note"class="form-control" value="<?php echo $note ?>"  placeholder="...." >
		  	</div>
		  	<?php 
		  	if($name=='' && $phone==''){

		  		?>
				<button type="submit" name="themvanchuyen"  class="btn btn-primary">Thêm vận chuyển</button>
				<?php
				}elseif($name!='' && $phone!=''){
					?>
				<button type="submit" name="capnhapvanchuyen"  class="btn btn-primary">Cập Nhập vận chuyển</button>
				<?php
				}
				?>
			</form>
			</div>
		<table style="width: 100% ; text-align: center;border-collapse: collapse; "border = "1">
  <tr>
    <th>ID</th>
    <th>Mã Sản Phẩm</th>
    <th>Tên Sản Phẩm</th>
    <th>Hình Ảnh</th>
    <th>Số Lượng</th>
    <th>Giá Sản Phẩm</th>
    <th>Thành Tiền</th>


  </tr>
 <?php
 if (isset($_SESSION['cart'])){
 	$i=0;
 	$tongtien=0;
 	foreach($_SESSION['cart'] as $cart_item){
 		$thanhtien=$cart_item['soluong'] *$cart_item['giasp'];
 		$tongtien+=$thanhtien;
 		$i++;
 ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $cart_item['masp'];?></td>
    <td><?php echo $cart_item['tensanpham'];?></td>
    <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'];?>" width = "150px"> </td>
    <td>
    	<a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id']?>"> <i class="fa-solid fa-circle-minus"></i> </a>
    	<?php echo $cart_item['soluong'];?>
    	<a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id']?>"> <i class="fa-sharp fa-solid fa-circle-plus"></i> </a>



    </td>
    <td><?php echo number_format($cart_item['giasp'],0,',','.').'vnđ'?></td>
    <td><?php echo number_format($thanhtien,0,',','.').'vnđ'?></td>

  	</tr>
  	<?php 
  	}
  	?>
  	 <tr>
    	<td colspan="8">
        
    		<p style="float: left;">Tồng Tiền: <?php echo number_format($tongtien,0,',','.').'vnđ'?> </p></td>
        <div style="clear: both;"></div>
        <?php
          if (isset($_SESSION['dangky'])) {
           ?> 
        <p style="float:right;"><a href="index.php?quanly=thongtinthanhtoan">Hình Thức Thanh Toán</p>
        <?php
        }else{
          ?>
          <p style="float:right;"><a href="index.php?quanly=dangky">Đăng Ký Đặt Hàng</p>
            <?php
         }
         ?>   
      </td>
    </tr>
  	<?php
  	}else {
	?>
	 <tr>
    	<td colspan=""><p>Hiện tại giỏ hàng trống</p></td>
    </tr>
	<?php
	}
	?>

</table>
		</div>
		</div>