
<p>Giỏ hàng</p>
<?php
if (isset($_SESSION['dangky'])){
  echo 'Xin chào:'.'<p style ="color:red">'.$_SESSION['dangky'].'</p>'; 
  echo $_SESSION['id_khachhang'];
}
?>  
<?php
	if (isset($_SESSION['cart'])){
		
	}
?>	
<div class="container">
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
    <div class="step current"> <span> <a href="index.php?quanly=giohang#" >Giỏ Hàng</a></span> </div>
    <div class="step "> <span><a href="index.php?quanly=vanchuyen" >Vận Chuyển</a></span> </div>
    <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh Toán</a><span> </div>
    <!-- <div class="step"> <span><a href="index.php?quanly=donhangdadat" >Lịch Sử Đơn Hàng</a><span> </div> -->

  </div>

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
    <th>Quản Lý</th>

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
    <td><?php echo number_format($cart_item['giasp'],0,',','.').'vnđ'?></p>
    <td><?php echo number_format($thanhtien,0,',','.').'vnđ'?></td>
    <td><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id']?>">Xóa</a></td>
  	</tr>
  	<?php 
  	}
  	?>
  	 <tr>
    	<td colspan="8">
        
    		<p style="float: left;">Tồng Tiền: <?php echo number_format($tongtien,0,',','.').'vnđ'?> </p></td>
    		<p style="float:right;"><a  href="pages/main/themgiohang.php?xoatatca=1" >Xóa Tất Cả</p>
        <div style="clear: both;"></div>
        <?php
          if (isset($_SESSION['dangky'])) {
           ?> 
        <p style="float:right;"><a href="index.php?quanly=vanchuyen">Hình Thức Vận Chuyển</p>
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