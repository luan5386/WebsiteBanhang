<p>Chi Tiết Sản Phẩm</p>
 	<?php
		$sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham = '$_GET[id]' LIMIT 1 ";
		$query_chitiet= mysqli_query($mysqli,$sql_chitiet);
		while($row_chitiet = mysqli_fetch_array($query_chitiet)){
?>
<div class="wrapper_chitiet">
	<div class="hinhanh_sanpham">
		<img width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>">
	</div>
	<form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham']?>">
	<div class="chitiet_sanpham">
			<h3 style="margin: 0;"> Tên Sản Phẩm: <?php echo $row_chitiet['tensanpham']?></h3>
			<p> Mã Sản Phẩm : <?php echo $row_chitiet['masp']?></p>
			<p> Giá Sản Phẩm  : <?php echo number_format($row_chitiet['giasp'],0,',','.').'vnđ'?></p>
			<p> Số Lượng: <?php echo $row_chitiet['soluong']?></p>
			<p> Danh Mục Sản Phẩm : <?php echo $row_chitiet['tensanpham']?></p>
			<p><input class="themgiohang" name="themgiohang" type="submit" value="THêm Giỏ Hàng"></p>
	</div>
	</form>
</div>
<div class="clear"></div>
<div class="tabs">
  <ul id="tabs-nav">
    <li><a href="#chitiet">Tóm Tắt Sản Phẩm</a></li>
    <li><a href="#noidung">Nội Dung</a></li>
    <li><a href="#hinhanh">Hình Ảnh</a></li>
  </ul> <!-- END tabs-nav -->
  <div id="tabs-content">
    <div id="chitiet" class="tab-content">
      	<?php echo $row_chitiet['tomtat']?>
    </div>
    <div id="noidung" class="tab-content">
      <?php echo $row_chitiet['noidung']?>
    </div>
    <div id="hinhanh" class="tab-content">
     	<img  width="200" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>">
    </div>
  </div> 
</div> <!-- END tabs --> 
<?php
	}
?>