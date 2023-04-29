<p>Hình Thức Thanh Toán</p>
<div class="container">
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
    <div class="step done "> <span> <a href="index.php?quanly=giohang" >Giỏ Hàng</a></span> </div>
    <div class="step done"> <span><a href="index.php?quanly=vanchuyen" >Vận Chuyển</a></span> </div>
    <div class="step current"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh Toán</a><span> </div>
    <!-- <div class="step"> <span><a href="index.php?quanly=donhangdadat" >Lịch Sử Đơn Hàng</a><span> </div> -->
  </div>
  <form action="pages/main/xulythanhtoan.php" method="POST">
    <div class="row">
        <?php
        $id_dangky=$_SESSION['id_khachhang'];
        $sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM tbl_shipping WHERE id_dangky='.$id_dangky.' LIMIT 1");
        $count=mysqli_num_rows($sql_get_vanchuyen);
        if($count>0){
        $row_get_vanchuyen =mysqli_fetch_array($sql_get_vanchuyen);
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
        <div class="col-md-8">
          <h4>Thông tin vận chuyển và giao hàng</h4>
          <ul>
            <li>Họ và tên vận chuyển: <b><?php echo $name ?></b></li>
            <li>Số Điện Thoại: <b><?php echo $phone ?></b></li>
            <li>Địa chỉ: <b><?php echo $address ?></b></li>
            <li>Ghi Chú: <b><?php echo $note ?></b></li>
          </ul>
          <!--------------Giỏ hàng-------------->
          <table style="width: 100%;text-align: center;border-collapse: collapse;"border="1">
            <tr>
              <th>Id</th>
              <th>Mã Sản Phẩm</th>
              <th>Tên Sản Phẩm</th>
              <th>Hình Ảnh</th>
              <th>Số Lượng</th>
              <th>Giá Sản Phẩm</th>
              <th>Thành Tiền</th>

            </tr>
            <?php
            if(isset($_SESSION['cart'])){
              $i=0;
              $tongtien=0;
              foreach($_SESSION['cart'] as $cart_item){
                $thanhtien=$cart_item['soluong']*$cart_item['giasp'];
                $tongtien+=$thanhtien;
                $i++;
            ?>
            <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $cart_item['masp'] ?></td>
              <td><?php echo $cart_item['tensanpham'] ?></td>
              <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>" width=150px ></td>
              <td>
                <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id']?>"><i class="fa fa-plus fa-style" aria-hidden="true"></i></a>
                <?php echo $cart_item['soluong'] ?>
                <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id']?>"><i class="fa fa-plus fa-style" aria-hidden="true"></i></a>
              </td>
              <td><?php echo number_format($cart_item['giasp'],0,',','.').'vnd' ?></td>
              <td><?php echo number_format($thanhtien,0,',','.').'vnd' ?></td>
            </tr> 
            <?php   
              }
             ?>
             <tr>
               <td colspan="8">
                 <div style="clear: both;"></div>
                 <?php 
                 if (isset($_SESSION['dangky'])){
                  ?>
                  <?php
                 }else{
                  ?>
                  <?php
                 }
                 ?>
               </td>
             </tr> 
             <?php
            }else{
              ?>
              <tr>
              <td colspan="8"><p>Hiện tại giỏ hàng trống</p></td>
            </tr>
            <?php
            }
            ?>
          </table>
        </div>
        <style type="text/css">
          .col-md-4.hinhthucthanhtoan .form-check{
            margin: 10px;
          }
        </style>
        <div class="col-md-4 hinhthucthanhtoan">
          <h4>Hình Thức Thanh Toán</h4>
          <div class="form-check">
            <input class="form-check-input" type="radio" name ="payment"id="exampleRadios2" value="tien mat" checked>
            <label class="form-check-label" for= "exampleRadios2">
              Nhân hàng thanh toán( kiểm tra hàng trước khi thanh toán)
            </label>
          </div>

          <p style="float: left;">Tổng tiền cần thanh toán: <?php echo number_format($tongtien,0,',','.').'vnd' ?></p>
          <input type="submit" name="checkout" value="Thanh toán ngay" class="btn-btn-danger">
        </div>
    </div>
    
  </form>