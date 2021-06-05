<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<?php
session_start();
include '../conn.php';

$uid=$_REQUEST['uid'];
$goods_id = $_REQUEST['gid'];
$count = $_REQUEST['count'];

$sql = "SELECT * FROM user where id = '".$uid."'";
$result = $conn->query($sql);

if ($result->num_rows <= 0) {

echo '请先注册或登录！';
exit;
  }

?>


<meta name="verydows-baseurl" content="">
<meta name="keywords" content="">
<meta name="description" content="">
<title>服装商城系统</title>
<link rel="stylesheet" href="../admin/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/general.css">
<link rel="stylesheet" type="text/css" href="../css/index.css">
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/general.js"></script>
<script type="text/javascript" src="../js/carousel.js"></script>
</head>
<body>
<!-- 头部开始 -->
<?php include 'header.php'; ?>
<!-- 头部结束 -->
<!-- 主体开始 -->
<div class="w1100">
	<div class="row">
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
		<div class="col-lg-9 col-md-9">
			<div class="container w1100">
			        <p style='font-size:20px;'>订单详情：</p>
					<p style='font-size:30px'>
			
			<?php
			$sql = "SELECT * FROM goods where id = '".$goods_id."'";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
			  echo "货物:".$row['goods_name'];
			  echo "<br>价格:".$row['price'].'元';
			  echo "<br>数量:".$count;
			  echo "<br><h3 style='font-size:25px;color:red'>总价:￥".$count*$row['price'];
			}
			
			}
			 ?>/元</h3>
			 </p>
			<p style='font-size:30px'>
			  <a href="pay.php?uid=<?php echo $uid?>&gid=<?php echo $goods_id?>&count=<?php echo $count?>">
			    付款购买</a></p>
			
			</div>
		</div>
		
	</div>
</div>
<!-- 页脚开始 -->
 <?php include 'footer.php'; ?>
</body></html>
