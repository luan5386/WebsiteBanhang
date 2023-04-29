<?php
	$sql_lietke_bv = "SELECT * FROM tbl_baiviet,tbl_danhmucbaiviet WHERE tbl_baiviet.id_danhmuc = tbl_danhmucbaiviet.id_baiviet ORDER BY tbl_baiviet.id DESC";
	$query_lietke_bv = mysqli_query($mysqli,$sql_lietke_bv);
?>
<p>Liệt Kê Bài Viết</p>
<table style="width:100%" border="1" style="border-collapse: collapse;">
	<tr>
		<th>Id</th>
		<th>Tên Bài Viết</th>
		<th>Hình Ảnh</th>
		<th>Danh Mục</th>
		<th>Tóm Tắt</th>
		<th>Trạng Thái</th>
		<th>Quản lý</th>
	</tr>
<?php
	$i = 0;
	while ($row = mysqli_fetch_array($query_lietke_bv)) {
		$i++;
?>
<tr>
	<td><?php echo $i ?></td>
	<td><?php echo $row ['tenbaiviet'] ?></td>
	<td><img src="modules/quanlybaiviet/uploads/<?php echo $row ['hinhanh'] ?>" width="150px"> </td>
	<td><?php echo $row ['tendanhmuc_baiviet'] ?></td>
	<td><?php echo $row ['tomtat'] ?></td>
	<td><?php  if( $row ['tinhtrang']==1){
		echo 'Kích hoạt';
	}else{
		echo 'Ẩn';
	}
	 ?>
	 	
	 </td>
	

	<td>
		<a href="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id'] ?>">Xóa</a>| 
		<a href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['id'] ?>">Sữa</a>
	</td>
</tr>
	<?php
	}
	?>
</table>