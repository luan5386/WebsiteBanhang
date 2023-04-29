<p>Thêm Sản Phẩm</p>
<table border="1" width="100%" style="border-collapse:collapse ;">
	<form method="POST" action="modules/quanlysp/xuly.php" enctype="multipart/form-data">
		<tr>
			<td>Tên Sản Phẩm</td>
			<td><input type="text" name="tensanpham"></td>
		</tr>
		<tr>
			<td>Mã Sản Phẩm</td>
			<td><input type="text" name="masp"></td>
		</tr>
		<tr>
			<td>Giá Sản Phẩm</td>
			<td><input type="text" name="giasp"></td>
		</tr>
		<tr>
			<td>Số Lượng</td>
			<td><input type="text" name="soluong"></td>
		</tr>
		<tr>
			<td>Hình Ảnh</td>
			<td><input type="file" name="hinhanh"></td>
		</tr>
		<tr>
			<td>Tóm Tắt</td>
			<td><textarea rows="10"  name="tomtat"></textarea></td>
		</tr>
		<tr>
			<td>Nội Dung</td>
			<td><textarea rows="10" name="noidung"></textarea></td>
		</tr>
		<tr>
			<td>Danh Mục Sản Phẩm</td>
			<td>
				<select name = 'danhmuc'>
					<?php
					$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
					$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
					while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
					?>
					<option value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc'] ?> </option>
					<?php
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tình Trạng</td>
			<td>
				<select name = 'tinhtrang'>
					<option value="1">Kích Hoạt</option>
					<option value="0">Ẩn</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="themsanpham" value="Thêm Sản Phẩm"></td>
		</tr>
	</form>
	
</table>