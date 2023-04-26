<?php 
	$sql_select_hotro = mysqli_query($conn, "SELECT * FROM tbl_hotro ORDER BY tbl_hotro.hotro_id DESC");
?>

	<!-- ---------------------------- Xem chi tiet don hang ----------------------------- -->
<?php 
	if(isset($_GET['quanlyhotro']) == 'xemhotro'){
		$hotro_id = $_GET['id'];
		$sql_chi_tiet_ho_tro = mysqli_query($conn, "SELECT * FROM tbl_hotro WHERE tbl_hotro.hotro_id = '$hotro_id'");
?>


	<script type="text/javascript">
		window.onload = function(){
    		var button = document.getElementById('show_hotro');
        	button.click();
		};
	</script>
	<?php $row_hotro2 = mysqli_fetch_array($sql_chi_tiet_ho_tro) ?>
	<div class="category-container" id="chi_tiet_ho_tro">
		<h2>Nội dung chi tiết</h2>
		<fieldset>
				<legend>Nội dung</legend>
				<p><?php echo $row_hotro2['hotro_noidung'] ?></p>
			</fieldset>		
		<form action="" method="POST">			
			<input type="hidden" name="email" value="<?php echo $row_hotro2['hotro_email'] ?>">
			<input type="hidden" name="tieude" value="<?php echo $row_hotro2['hotro_tieude'] ?>">
			<h2>Viết câu trả lời</h3>
			<textarea cols="100" rows="10" name="noidung"></textarea>
			<button type="submit" name="reply">Gửi</button>
			<?php
				// if (isset($_POST['reply'])) {
				//     ini_set( 'display_errors', 1 );
				//     error_reporting( E_ALL );
				//     $from = "luan020101017@gmail.com";
				//     $to = $_POST['email'];
				//     $subject = $_POST['tieude'];
				//     $message =  $_POST['noidung'];
				//     $headers = "From:" . $from;
				//     mail($to,$subject,$message, $headers);
				//     echo "Đã gửi mail";
			    // }
			?>
		</form>
	</div>
<?php } ?> 
<!-- ---------------------------- Xem chi tiet don hang ----------------------------- -->
	<div class="category-container" id="list_ho_tro" >
		<h2>Danh sách hỗ trợ</h2>
		<table cellspacing="1">
			<tr class="border">
				<td>ID</td>
				<td>Chủ đề</td>
				<td>Tiêu đề</td>
				<td><span>Họ tên</span></td>
				<td><span>Email</span></td>
				<td>Xem<br>nội<br>dung</td>
				<td>Xoá</td>
			</tr>			
			<?php 
				$i=0;
				while($row_hotro = mysqli_fetch_array($sql_select_hotro)){ 
					$i++;
			?>
			<tr class="border">
				<td><?php echo $row_hotro['hotro_id'] ?></td>
				<td><span><?php echo $row_hotro['hotro_chude'] ?></span></td>
				<td><span><?php echo $row_hotro['hotro_tieude'] ?></span></td>
				<td><span><?php echo $row_hotro['hotro_hoten'] ?></span></td>
				<td><span><?php echo $row_hotro['hotro_email'] ?></span></td>
				<td><a href="?quanlyhotro=xemhotro&id=<?php echo $row_hotro['hotro_id'] ?>"><span><i class="fa-solid fa-eye" style="color: black;"></i></i></span></a></td>
				<td><a href="?xoahotro=<?php echo $row_hotro['hotro_id'] ?>"><span><i class="fa-regular fa-trash-can" style="color: black;"></i></span></a></td>
			</tr>
			<?php } ?>
		</table>
	</div>