<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
session_start();
include 'conn.php';
//获取URL参数中的id
$goods_id = $_REQUEST['id'];

   ?>
   <!DOCTYPE>
   <html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <title>商品</title>
   <link rel="stylesheet" href="admin/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="./css/general.css">
   <link rel="stylesheet" type="text/css" href="./css/goods.css">
   <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
   <script type="text/javascript" src="admin/js/bootstrap.js"></script>
   <script type="text/javascript" src="./js/general.js"></script>
   </head>
   <body>



   <!-- 头部开始 -->
<?php include 'header.php'; ?>
   <!-- 头部结束 -->
  
   <!-- 主体开始 -->
   <div class=" w1100 mt10">
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
		 <?php
		 $sql = "select * from goods where id = '".$goods_id."'";
		 
		   $result = $conn->query($sql);
		 
		   if ($result->num_rows > 0) {
		       // 输出每行数据
		       while($row = $result->fetch_assoc()) {
		 			 ?>
		 <div class="gtds cut col-lg-9 col-md-9">
		 		 
		        <div class="gimbox fl ">
		          <!-- 商品图片开始 -->
		          <div class="module">
		            <div class="im cut">
		              <div id="goods-imgarea" style="position: relative; overflow: hidden;">
		                <img src="<?php echo $row['picture']?>" width="350px">
		                </div>
		 
		              <i class="zoom icon"></i> </div>
		            <div class="tmb mt10 cut">
		              <a class="tmb-arrow lh disabled" id="tmb-back-btn"><i class="icon">&lt;</i></a>
		              <div class="tmb-im cut">
		 
		              </div>
		              <a class="tmb-arrow rh disabled" id="tmb-forward-btn"><i class="icon">&gt;</i></a>
		            </div>
		          </div>
		          <!-- 商品图片结束 -->		 
		        </div>
		        <div class="gtbox cut">
		          <p class="mt8 c888"></p><p style="font-size:30px">
				  <?php
				  echo $row['goods_name'];
				  ?>
		          </p>
		          <div class="gatt module mt10 cut">
		            <dl>
		              <dt>商品ID:</dt>
		              <dd>
						  <?php
						  echo $row['id'];
						  ?>
		              </dd>
		            </dl>
		            <dl class="mt5">
		              <dt>原价:</dt>
		              <dd class="npri">
						  <del><i>¥</i>
							  <font id="nowprice" data-price="89.00">
								  <?php echo $row['old_price']; ?>
							  </font>
						  </del>
					  </dd>
					</dl>
		            <dl class="mt5">
		              <dt>现价:</dt>
		              <dd class="npri"><i>¥</i>
						<font id="nowprice" data-price="89.00">
							<?php echo $row['price']; ?>
						</font>
					  </dd>
		            </dl>
		              <dl>
		              <dt>详细介绍:</dt>
		              <dd>
						  <?php
						  echo $row['description'];
						  ?>
		              </dd>
		            </dl>
				</div>
				
		          <div class="cutline mt10"></div>
		          <div class="gatt module">
		           <form method="post" action="user/buy.php?gid=<?php echo $goods_id ?> &uid=<?php echo $uid ?>" id="buy-form">
		            <dl class="mt15">
		              <dt>购买数量:</dt>
		              <dd >
		                <input name="count" id="count" type="number" min="1" max="10" value="1" >
		                <input name="peices"  type="text" hidden="hidden" id="nowPri" value="<?php echo $row['price']; ?>" >
		                <font class="c999 ml5">件</font>
		              </dd>
		            </dl>
		            <input type="submit"  value="立即购买" style="width:120px;height: 38px;  line-height: 38px;text-align: center;background-color: #ffeded;border: 1px solid #FF0036;color: #FF0036;">
		            <button id="addcart" name="addcart" type="button" style="width:120px;height: 38px;  line-height: 38px;background-color: #ff0036;border: 1px solid #ff0036;    color: #fff;;">加入购物车</button>
		            </form>
		 <?php
		       }
		   } else {
		       echo "0 个结果";
		   }
		  ?>
		          </div>
				  <div style="margin-top: 10px;    height: 30px;    line-height: 30px;">
					  <span>支持服务：</span>
					  <span><img src="images/half.png" style="vertical-align:middle;">&nbsp;半日达</span>
					  <span><img src="images/take.png" style="vertical-align:middle; margin-left:10px ;">&nbsp;门店自提</span>
				  </div>
				  
		        </div>
				<div id="content">
					<ul id="detailTop" class="nav nav-tabs">
						<li class="active on"><a href="#detail" data-toggle="tab">商品详情</a></li>
						<li><a href="#shouhou" data-toggle="tab">售后服务</a></li>
						 
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade in active" id="detail">
							<?php
							$sql = "select * from goods where id = '".$goods_id."'";
							
							  $result = $conn->query($sql);
							
							  if ($result->num_rows > 0) {
							      // 输出每行数据
							      while($row = $result->fetch_assoc()) {
								?>
							<p>
								<ul id="describe">
									<li>商品名称： <?php echo $row['goods_name']; ?> </li>
									<li>商品类型：<?php echo $row['type']; ?></li>
									<li>商品产地：中国</li>
									<li>商品描述：<?php echo $row['description']; ?></li>
									<li id="product_brand">品牌：服装商城系统</li>
								</ul>
								<div id="picShow">	</div>	
							</p>
							<?php
							      }
							  } else {
							      echo "0 个结果";
							  }
							 ?>
						</div>
						<div class="tab-pane fade" id="pinglun">
							 
						</div>
						<div class="tab-pane fade" id="shouhou">
							<p>
								<div class="promise">
									<h2>服务承诺</h2>
									<p>
										网站所售产品均为厂商正品，如有任何问题可与我们客服人员联系，我们会在第一时间跟您沟通处理。我们将争取以最低的价格、最优的服务来满足您最大的需求。
									</p>
									<h2>温馨提示</h2>
									<p>
										验货签收时请您与配送人员当面核对：商品及配件、商品金额及数量、发票（如有）、赠品（如有）等；如存在包装破损、商品错误、商品短缺、商品存在质量问题等影响签收的
										因素，您可以拒收全部商品（相关的赠品，配件或捆绑商品和发票应一起当场拒收）。
									</p> 
									<p>
										由于部分商品包装更换较为频繁，因此您收到的货品有可能与图片不完全一致，请您以收到的商品实物为准，同时我们会尽量做到及时更新，由此给您带来不便多多谅解，如有任
										何问题可与我们客服人员联系，谢谢！
									</p>
								</div>
							</p>
						</div>
						 
					</div>
								
								
				
				<!-- -------------------------服务承诺 -------------------- -->				
								
								
							</div>
				
		      </div>
	 </div>  
     
<?php include 'footer.php'; ?>

   </div>
   
   </body>






<script type="text/javascript">
$(function(){
  $('#addcart').click(function(){

    location.href ="user/addcart.php?uid=<?php echo $uid?>&gid=<?php echo $goods_id?>&count="+$('#count').val()+"&price="+$('#nowPri').val();
  });
});
</script>