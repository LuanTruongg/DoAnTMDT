<?php 
	$sql_select_donhang = mysqli_query($conn, "SELECT * FROM tbl_donhang ORDER BY tbl_donhang.donhang_id DESC");
?>

<!-- ---------------------------- Update tinh trang don hang ----------------------------- -->
<?php  
	if (isset($_POST['capnhatdonhang'])) {
		$xuly = $_POST['xu_ly_tinh_trang'];
		$mahang_xuly = $_POST['mahang_xuly'];
		$sql_update_donhang = mysqli_query($conn,"UPDATE tbl_donhang SET donhang_tinhtrang = '$xuly' WHERE donhang_id = '$mahang_xuly'");
?>
	<script type="text/javascript">
		alert("Đã cập nhật tình trạng đơn hàng. Vui lòng tải lại trang!");
		window.location.href = 'admin.php';
	</script>  
<?php } ?>
<!-- ---------------------------- Update tinh trang don hang ----------------------------- -->

<!-- ---------------------------- xoa don hang ----------------------------- -->
<?php  
	if(isset($_GET['xoadonhang'])){
		$id=$_GET['xoadonhang'];
		$sql_donhang = mysqli_query($conn,"DELETE FROM tbl_donhang WHERE donhang_id='$id'"); 
		?>
		<script type="text/javascript">
			alert("Đã xoá đơn hàng. Vui lòng tải lại trang!");
			window.location.href = 'admin.php';
		</script>  
<?php
	}
?>
<!-- ---------------------------- xoa don hang ----------------------------- -->

<div class="category-container" id="list-donhang">
	<!-- ---------------------------- Xem chi tiet don hang ----------------------------- -->
<?php 
	if(isset($_GET['quanlydonhang']) == 'xemdonhang'){
		$mahang = $_GET['mahang'];
		$sql_chi_tiet_don = mysqli_query($conn, "SELECT * FROM tbl_donhang WHERE tbl_donhang.donhang_id = '$mahang'");
?>
	<script type="text/javascript">
		window.onload = function(){
    		var button = document.getElementById('show_donhang');
        	button.click();
		};
	</script>
	<div class="category-container" id="chi_tiet_don_hang">
		<h2>Chi tiết đơn hàng</h2>
		<form action="" method="POST">
			<table cellspacing="1">
				<tr class="border">
					<td>Mã hàng</td>
					<!-- <td><span>Mã đơn hàng</span></td> -->
					<td>Tên sản phẩm</td>
					<td>Số điện thoại</td>
					<td>Tổng tiền</td>
					<td><span>Địa chỉ</span></td>
					<td>Ghi chú</td>
				</tr>			
				<?php 
					$i=0;
					while($row_donhang = mysqli_fetch_array($sql_chi_tiet_don)){ 
						$i++;
				?>
				<tr class="border">
					<td><?php echo $row_donhang['donhang_id'] ?></td>
					
					<input type="hidden" name="mahang_xuly" value="<?php echo $row_donhang['donhang_id'] ?>">
					<td><span><?php echo $row_donhang['sanpham_name'] ?></span></td>				
					<td><span><?php echo $row_donhang['khachhang_phone'] ?></span></td>	
					<td><span><?php echo number_format($row_donhang['donhang_gia']).'đ' ?></span></td>
					<td><span><?php echo $row_donhang['donhang_diachi'] ?></span></td>
					<td><span><?php echo $row_donhang['yeucau'] ?></span></td>
				</tr>
				<?php } ?>
			</table>
			<select class="combobox" name="xu_ly_tinh_trang">
				<option value="1">Đã xử lý</option>
				<option value="0">Chưa xử lý</option>
			</select>
			<button type="submit" class="category-button" id="button_capnhat_donhang" name="capnhatdonhang">Cập nhật tình trạng</button>
		</form>
	</div>
<?php } ?> 
<!-- ---------------------------- Xem chi tiet don hang ----------------------------- -->
		<h2>Danh Sách Đơn Hàng</h2>
		<table cellspacing="1">
			<tr class="border">
				<td>Thứ tự</td>
				<td>Mã hàng</td>
				<td>Tên sản phẩm</td>
				<!-- <td><span>Mã đơn hàng</span></td> -->
				<td><span>Tên KH</span></td>
				<td><span>Ngày đặt</span></td>
				<td><span>Tình trạng</span></td>
				<td>Xem<br>đơn<br>hàng</td>
				<td>Xoá</td>
			</tr>			
			<?php 
				$i=0;
				while($row_donhang = mysqli_fetch_array($sql_select_donhang)){ 
					$i++;
			?>
			<tr class="border">
				<td><?php echo $i; ?></td>
				<td><?php echo $row_donhang['donhang_id'] ?></td>
				<td><span><?php echo $row_donhang['sanpham_name'] ?></span></td>
				<!-- <td><span><?php echo $row_donhang['donhang_mahang'] ?></span></td> -->
				<td><span><?php echo $row_donhang['khachhang_name'] ?></span></td>
				<td><span><?php echo $row_donhang['ngaydat'] ?></span></td>
				<td><span><?php if($row_donhang['donhang_tinhtrang'] == 0) echo 'Chưa xử lý'; else if($row_donhang['donhang_tinhtrang'] == 1) echo 'Đã xử lý'; else echo "Đã giao hàng" ?></span></td>
				<td><a href="?quanlydonhang=xemdonhang&mahang=<?php echo $row_donhang['donhang_id'] ?>"><span><i class="fa-solid fa-eye" style="color: black;"></i></i></span></a></td>
				<td><a href="?xoadonhang=<?php echo $row_donhang['donhang_id'] ?>"><span><i class="fa-regular fa-trash-can" style="color: black;"></i></span></a></td>
			</tr>
			<?php } ?>
		</table>
</div>