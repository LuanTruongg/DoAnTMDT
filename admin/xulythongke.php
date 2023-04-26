<!-- ------------------------------------ List San Pham --------------------------------------- -->		
		<?php $sql_select_sp = mysqli_query($conn, "SELECT * FROM tbl_sanpham ORDER BY sanpham_id DESC") ?>
		<div class="category-container" id="list-thongke">	
			<h2>Thống kê</h2>
			<form method="POST">
			<div style="display: flex;">
				<select class="combobox" name="brand" style="margin-bottom: 50px;">
					<option selected>--- Thống kê theo ---</option>	
					<option value="all">Tất cả</option>	
					<option value="brand_sort">Hãng sãn xuất</option>								
				</select>
				<button type="submit" name="thongketheohang" style="width:100px; height: 40px; margin-left: 50px;">Tìm</button>
			</div>
			</form>
			<?php  
				if(isset($_POST['thongketheohang'])) {
					$chose = $_POST['brand'];
					if ($chose == 'brand_sort'){
					$sql_select_brand = mysqli_query($conn, "SELECT * FROM tbl_brand ORDER BY brand_name ASC");
					while($row_brand = mysqli_fetch_array($sql_select_brand)){
						$brand = $row_brand['brand_name'];
						$sql_select_brand_sp = mysqli_query($conn, "SELECT * FROM tbl_sanpham WHERE sanpham_brand like '$brand'");
						?> 
						<h3 style="font-size: 40px; margin-top: 20px;"><?php echo $row_brand['brand_name'] ?></h3>
						<table cellspacing="1">
						<tr class="border">
							<td>ID</td>
							<td>Ảnh</td>
							<td><span>Tên Sản phẩm</span></td>
							<td><span>Đã<br>bán</span></td>
							<td><span>Tổng tiền</span></td>

						</tr>
						<?php 
							while($row_sp =  mysqli_fetch_array($sql_select_brand_sp)){
						?>
						<tr class="border">
							<td><?php echo $row_sp['sanpham_id']?></td>
							<td><img src="uploads/<?php echo $row_sp['sanpham_img']?>"></td>
							<td><span><?php echo $row_sp['sanpham_name']?></span></td>
							<td><span><?php echo $row_sp['sanpham_daban']?></span></td>
							<td><span><?php echo number_format($row_sp['sanpham_gia']*$row_sp['sanpham_daban']).'đ'?></span></td>							
						</tr>
						<?php 
							}							
						?>
					</table>
					<script type="text/javascript">
						document.getElementById('category').style.display = "none";
					    document.getElementById('product').style.display = "none";
					    document.getElementById('list-donhang').style.display = "none";
					    document.getElementById('list-thongke').style.display = "block"; 
					    document.getElementById('list_ho_tro').style.display = "none"; 
					</script>
						<?php	
						} 
					} else {
							?> 
							<table cellspacing="1">
						<tr class="border">
							<td>ID</td>
							<td>Ảnh</td>
							<td><span>Tên Sản phẩm</span></td>
							<td><span>Đã<br>bán</span></td>
							<td><span>Tổng tiền</span></td>

						</tr>
						<?php 
							while($row_sp = mysqli_fetch_array($sql_select_sp)){
						?>
						<tr class="border">
							<td><?php echo $row_sp['sanpham_id']?></td>
							<td><img src="uploads/<?php echo $row_sp['sanpham_img']?>"></td>
							<td><span><?php echo $row_sp['sanpham_name']?></span></td>
							<td><span><?php echo $row_sp['sanpham_daban']?></span></td>
							<td><span><?php echo number_format($row_sp['sanpham_gia']*$row_sp['sanpham_daban']).'đ'?></span></td>							
						</tr>
						<?php 
							}
						?>
					</table>
					<script type="text/javascript">
						document.getElementById('category').style.display = "none";
					    document.getElementById('product').style.display = "none";
					    document.getElementById('list-donhang').style.display = "none";
					    document.getElementById('list-thongke').style.display = "block"; 
					    document.getElementById('list_ho_tro').style.display = "none"; 
					</script>	
							<?php
						}
				} else { ?>
					<table cellspacing="1">
						<tr class="border">
							<td>ID</td>
							<td>Ảnh</td>
							<td><span>Tên Sản phẩm</span></td>
							<td><span>Đã<br>bán</span></td>
							<td><span>Tổng tiền</span></td>

						</tr>
						<?php 
							while($row_sp = mysqli_fetch_array($sql_select_sp)){
						?>
						<tr class="border">
							<td><?php echo $row_sp['sanpham_id']?></td>
							<td><img src="uploads/<?php echo $row_sp['sanpham_img']?>"></td>
							<td><span><?php echo $row_sp['sanpham_name']?></span></td>
							<td><span><?php echo $row_sp['sanpham_daban']?></span></td>
							<td><span><?php echo number_format($row_sp['sanpham_gia']*$row_sp['sanpham_daban']).'đ'?></span></td>							
						</tr>
						<?php 
							}
						?>
					</table>										
			<?php
				}
			?>
		</div>	
		<!-- ------------------------------------ List San Pham --------------------------------------- -->	
		
