<?php
session_start();
include 'conn.php';

$flag=0;

 ?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="icon" href="./images/icon.ico">
<link rel="stylesheet" href="admin/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./css/general.css">
<link rel="stylesheet" type="text/css" href="./css/index.css">
<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript" src="./js/general.js"></script>
<script type="text/javascript" src="./js/carousel.js"></script>
<title>服装商城系统</title>
</head>
<body>
<!-- 顶部开始 -->

<?php include 'header.php'; ?>
<!-- 头部结束 -->
<!-- 主体开始 -->
<div class="w1100  " style="margin: 0 auto;">
	<div class="w1110 "><div class="carousel ">
	  <div class="carousel-imgs ">
	    <?php
	      $sql = "select * from adv";
	
	      $result = $conn->query($sql);
	      if ($result->num_rows>0) {
	        $count = $result->num_rows;
	        while ($row=$result->fetch_assoc()) {
	?>
	          <a href="<?php echo $row['link']?>" style="display: block;">
	          <img src="<?php echo $row['picture']?>" width="100%"  border="0">
	          </a>
	<?php
	        }
	        ?>
	
	        <ul class="carousel-tog">
	        <?php
	        while ($count>0) {
	          ?>
	          <li class="cur"><?php echo $count ?></li>
	          <?php
	          $count -= 1;
	        }
	 ?>
	
	 </ul>
	<?php
	      }
	     ?>
	
	</div>
	
	</div></div>
	<div class="row">
		<div class="col-lg-3 col-md-3">
			<div class="hc_lnav jslist">
				<div class="allbtn">
					<h4>商品商城</h4>
					<ul style="width:100%;" class="jspop box">
						<?php
						$sql = "SELECT * FROM goods order by id limit 10";
						$result_page = $conn->query($sql);
						if ($result_page->num_rows > 0) {// 输出每行数据
							while($row = $result_page->fetch_assoc()) {
								?>
								<li class="a1">
									<dl>
									<!-- <dt>热门</dt> -->
									<dd>
										<a href="goods.php?id=<?php echo $row["id"];
											      if($flag==1){
											        echo '&uid='.$uid;
											      }
											      ?>">
											<?php
											echo $row["goods_name"];
											 ?>
										</a>
									</dd>
									</dl>
							      
							      </li>
							        <?php
							    }
							} else {
								echo "0 个结果";
							}
							?>
					</ul>
				</div>
			</div>
		</div>
		<div class=" mt30 cut col-lg-9 col-md-9"  >
		<div class="row  ">
			<ul class="">
				<?php
				if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
				$num_rec_per_page=6;
				$start_from = ($page-1) * $num_rec_per_page; 
				$sql = "SELECT * FROM goods LIMIT $start_from, $num_rec_per_page";
				$sql_all = "SELECT * FROM goods";
				$result = $conn->query($sql_all);
				$result_page = $conn->query($sql);
				
				$total_records = $result->num_rows;  // 统计总共的记录条数
				$total_pages = ceil($total_records / $num_rec_per_page);  // 计算总页数
				if ($result_page->num_rows > 0) {// 输出每行数据
					while($row = $result_page->fetch_assoc()) {
						?>
						<li class="col-md-4 col-lg-4 col-sm-12">
							<div class="thumbnail"><a href="goods.php?id=<?php echo $row["id"];
							if($flag==1){
								echo '&uid='.$uid;
							}
							?>"><img  src="<?php echo $row['picture']?>"></a></div>
							<div class="caption">
								 <h4><a href="goods.php?id=<?php echo $row["id"];
								       if($flag==1){
								         echo '&uid='.$uid;
								       }
								       ?>">
								 <?php
								 echo $row["goods_name"];
								  ?>
								       </a></h4>
								       <del> <p class="price">原价¥
								 <?php
								 echo $row["old_price"]
								  ?>
								       </p></del>
								       <p class="price">现价¥
									   <?php
								 echo $row["price"]
								  ?>
								       </p>
							</div>
					      
					      </li>
					        <?php
					    }
					} else {
						echo "0 个结果";
					}
					?>
			</ul>
		</div>
		<div class="col-lg-12 col-md-12">
			<?php 
			 // 第一页
			echo "<ul class='pagination col-lg-8 col-md-8' >";
			for ($i=1; $i<=$total_pages; $i++) { 
				echo "<li><a href='pagination.php?page=".$i."'>".$i."</a></li> "; 
			}; 
			echo "</ul>";
			?>		
			<div class="pagination col-lg-4 col-md-4 ">
				<div class="pull-left pagination-detail">
					<span class="pagination-info">
						总共<span style="color:#00f;"><?php echo $total_records ?></span>条记录；
					</span>
					<span class="page-list">每页显示<?php echo $num_rec_per_page ?>条记录</span>
				</div>
			</div>
			
		</div>
		</div>
	</div>
	</div>
	<?php include 'footer.php'; ?>
</body>	
</html>
