<?php
session_start();
include '../conn.php';
include 'function.php';

$uid=$_REQUEST['uid'];

$sql = "SELECT * FROM user where id = '".$uid."'";
$result = $conn->query($sql);

if ($result->num_rows <= 0) {

echo '请先注册或登录！';
exit;
  }

?>
<!DOCTYPE>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>服装商城系统</title>
  <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/general.css">
  <link rel="stylesheet" type="text/css" href="../css/index.css">
  <link rel="stylesheet" type="text/css" href="../css/list.css">
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/general.js"></script>
  <script type="text/javascript" src="../js/carousel.js"></script>
</head>
<body>
<!-- 顶部开始 -->

<!-- 头部开始 -->
<?php include 'header.php'; ?>
<!-- 头部结束 -->
<!-- 主体开始 -->
	<div class="w1100">
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
		          <img src="../<?php echo $row['picture']?>" width="100%"  border="0">
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
		<div class="col-lg-3 col-md-3">
			<div class="hc_lnav jslist">
				<div class="allbtn">
					<h4  >全部商品分类</h4>
					<ul style="width:100%;" class="jspop box">
						<?php
						$sql = "SELECT * FROM goods";
						$result_page = $conn->query($sql);
						if ($result_page->num_rows > 0) {// 输出每行数据
							while($row = $result_page->fetch_assoc()) {
								?>
								<li class="a1">
									<dl>
									<!-- <dt>热门</dt> -->
									<dd>
										<a href="../goods.php?id=<?php echo $row["id"];
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
		<div class="col-md-9 col-lg-9">
			
			        <?php
			$sql = "SELECT * FROM cart where user_id = ".$uid;
			$result = $conn->query($sql);
			        echo"<table class='table table-bordered'  >";
			        echo"<tr>";
			        echo"<td colspan='6' style='text-align:center;' >购物车</td>";
			        echo"<tr>";
			        echo"<tr>";
			        echo"<th >用户名</th><th >商品名称</th><th >数量</th><th >价格</th><th ></th><th >";
			        echo"<tr>";
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
			    $name=getUserNameById($conn,$row['user_id']);
			    $goods_name=getGoodsNameById($conn,$row['goods_id']);
				$zongjia = $row['price']*$row['count'];
				$heji = $zongjia;
			        echo"<tr>";
			        echo "<td>{$name}</td>";
			        echo "<td>{$goods_name}</td>";
			        echo "<td>{$row['count']}</td>";
			        echo "<td>{$zongjia}</td>";
			        // echo "<td><a href='editcart.php?uid={$row['user_id']}&gid={$row['goods_id']}&count={$row['count']}'>更改</a></td>";
			        echo "<td><a href='deletecart.php?uid={$row['user_id']}&gid={$row['goods_id']}'>删除</a></td>";
			        echo "<td><a href='pay.php?uid={$row['user_id']}&gid={$row['goods_id']}&count={$row['count']}'>付款</a></td>";
			        echo"</tr>";
			
			 // echo "用户名：".getUserNameById($conn,$row['user_id'])."<br>商品名称:".getGoodsNameById($conn,$row['goods_id'])."<br>数量:".$row['count'];
			 ?>
			<hr>
			 <?php
			}
			 echo"</table>";
			}
			 ?> </p>
			 <button type="button" class="btn btn-success"><a style="color: #fff;" href="payall.php?uid=<?php echo $uid?>">结算</a></button>
			 <button type="button" class="btn btn-danger"><a style="color: #fff;" href="cleancart.php?uid=<?php echo $uid?>">清空</a></button>
			
		</div>
	</div>
 <?php include 'footer.php'; ?>
</body>
</html>
