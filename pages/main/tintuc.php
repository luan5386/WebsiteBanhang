<h2 style="text-align:center; text-transform: uppercase;">Tin Tức Mới Nhất</h2>
<?php
	$sql_bv = "SELECT * FROM tbl_baiviet WHERE tinhtrang=1 ORDER BY id DESC";
	$query_bv = mysqli_query($mysqli,$sql_bv);


?>

				<ul class="product_list">
					<?php
					while($row_bv = mysqli_fetch_array($query_bv)){
					?>
					<li>
						<a href=" index.php?quanly=baiviet&id=<?php echo $row_bv['id'] ?>">
						<img src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh']?>">
						<p class="title_product"> Tên bài viết: <?php echo $row_bv['tenbaiviet']?> </p>
						</a>
						<p style="margin: 10px" class="title_product"> Tóm Tắt: <?php echo $row_bv['tomtat']?> </p>
					</li>
					<?php
					}
					?>
				
					
				</ul>