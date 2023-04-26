<?php  
	include_once('db/connect.php');
	session_start();
	if(isset($_SESSION['id_admin'])){
			$id = $_SESSION['id_admin'];
			$sql_select_id_admin = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE admin_id='$id'"); 
		
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
	<link rel = "stylesheet" href="css/style.css"/>
	<link rel = "stylesheet" href="css/reset.css"/>
	<link rel="stylesheet" href="font/fontawesome-free-6.2.0/css/all.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	
</head>
<body>
<!-- ------------------------------------ Slidebar --------------------------------------- -->
	<nav class="slidebar">
		<div class="slidebar-text">
			<a href="index.php" id="logo-footer">
				<img src="img/logo-footer.png">
			</a>
		</div>
		<button onclick="show_category()">Danh mục <span class="fas fa-caret-down second"></span></button>
		<button onclick="show_product()" id="btn-product">Sản phẩm <span class="fas fa-caret-down second"></span></button>
		<button onclick="show_donhang()" id="show_donhang">Đơn hàng <span class="fas fa-caret-down second"></span></button>
		<button onclick="show_thongke()" id="show_thongke">Thống kê<span class="fas fa-caret-down second"></span></button>
		<button onclick="show_hotro()" id="show_hotro">Hỗ trợ <span class="fas fa-caret-down second"></span></button>
	</nav>
<!-- ------------------------------------ Slidebar --------------------------------------- -->
<!-- ------------------------------------ Header --------------------------------------- -->
	<div class="admin-container">
		<div class="btn-logout">
			<a href="logout.php"><span style="color: red"><i class="fa-solid fa-power-off"></i></span></a>
		</div>
		<div class="admin-avatar">
			<?php 
					while($row_admin = mysqli_fetch_array($sql_select_id_admin)){ 
				?>
			<span><?php echo $row_admin['admin_email'] ?><i class="fa-solid fa-user"></i></span>
			<?php } ?>
		</div>

	</div>
<!-- ------------------------------------ Header --------------------------------------- -->

<!-- ------------------------------------ Danh Muc --------------------------------------- -->
	<?php
		include('admin/xulydanhmuc.php');
	?>
<!-- ------------------------------------ Danh Muc --------------------------------------- -->
<!-- ------------------------------------ San Pham --------------------------------------- -->
	<?php
		include('admin/xulysanpham.php');
	?>
<!-- ------------------------------------ San Pham --------------------------------------- -->
<!-- ------------------------------------ Don Hang --------------------------------------- -->
	<?php
		include('admin/xulydonhang.php');
	?>
<!-- ------------------------------------ Don Hang --------------------------------------- -->	
<!-- ------------------------------------ Support --------------------------------------- -->
	<?php
		include('admin/xulyhotro.php');
	?>
<!-- ------------------------------------ Support --------------------------------------- -->	
<!-- ------------------------------------ Thongke --------------------------------------- -->	
	<?php
		include('admin/xulythongke.php');
	?>


<!-- ------------------------------------ Thongke --------------------------------------- -->	
</body>
	<script src="js/main.js" language=JavaScript>	
		window.onload = function(){
		window.getElementById('category').style.display = "flex";
		window.getElementById('product').style.display = "none";
		window.getElementById('list-donhang').style.display = "none";
		window.getElementById('chi_tiet_don_hang').style.display = "none";		
		window.getElementById('list-thongke').style.display = "none";	
		window.getElementById('list_ho_tro').style.display = "none";
		};
	</script>
</html>
<?php
}
else {
	echo"bạn không có quyền vào trang này";
	header("Location:login.php");
} 
?>