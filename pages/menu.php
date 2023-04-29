<?php
	
	$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
	$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
	
					
?>
<?php
	if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
		unset($_SESSION['dangky']);
	}
?>
	<div class = "menu">
				<ul class="list_menu">
					<li><a href="index.php">Trang Chủ</a></li>
					<?php
					while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
					?>
					<li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?> "><?php echo $row_danhmuc['tendanhmuc']?> </a></li>	
					<?php
					}
					?>
					<li><a href="index.php?quanly=giohang">Giỏ Hàng</a></li>
					<?php
					if (isset($_SESSION['dangky'])){
						?>
					<li><a href="index.php?dangxuat=1">Đăng Xuất</a></li>
					<li><a href="index.php?quanly=thaydoimatkhau">Đổi Mật Khẩu</a></li>
					<?php
					}else{
						?>
					<li><a href="index.php?quanly=dangky">Đăng Ký</a></li>
					<?php 
					}
					?>
					<li><a href="index.php?quanly=tintuc">Tin Tức</a></li>
					<li><a href="index.php?quanly=lienhe">Liên hệ</a></li>
					
				</ul>
				<p>
				<form action= "index.php?quanly=timkiem" method="POST">
					<input type="text" placeholder="Tìm kiếm sản phẩm....." name="tukhoa">
					<input type="submit" name="timkiem" value="Tìm Kiếm">
				</form>
				</p>
		</div> 