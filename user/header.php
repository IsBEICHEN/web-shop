
<div class="header mt30">
  <div class="w1100">
    <!-- 头部主体开始 -->
    <div class="module cut">
      <div class="logo fl col-lg-2 col-md-2"><img src="../images/logo.png"></div>
	  
      <!-- 头部搜索开始 -->
	  <div>
		  <div class="nav  col-lg-6 col-md-6"  >
		  
		    <div class="cross cut">
		      <ul>
		  
		      <?php
		      if(isset($_REQUEST['uid'])){
		        $uid = $_REQUEST['uid'];
		        // echo $_SESSION['uid'.$uid];
		        // exit;
		        if(isset($_SESSION['uid'.$uid]))
		        {
		          $flag=1;
		             ?>
					
		           <li><a href="../index.php?uid=<?php echo $uid?>">首页</a></li>
				   <li><a href="center.php?uid=<?php echo $uid?>">用户中心</a></li>
		          <li><a href="logout.php?uid=<?php echo $uid?>">退出</a></li>
		           <?php
		  
		         }
		        else
		        {?>
				
		            <li><a href="../index.php">首页</a></li>
		            <li><a href="login.php">登录</a></li>
		            <li><a href="regist.php">注册</a></li>
		            <?php
		  
		        }
		       }
		        ?>
		  
		  			</ul>
		    </div>
		  </div>
	  </div>
	  <?php
	  if (isset($_REQUEST['uid'])) {
	    ?>
	    <!-- 头部购物车开始 -->
	    <div class="top-cart  " style="float: right;">
	      <div class="radius4 mt10">
	        <i class=""><img src="../images/cart.gif" style="width: 20px"> </i>
	        <a href="cart.php?uid=<?php echo $_REQUEST['uid']?>"><font>购物车</font></a></div>
	    </div>
	    <!-- 头部购物车结束 -->
	    <?php
	  }
	   ?>
      <div class="top-search  col-lg-2 col-md-2" style="float: right;">
           <form method="get" action="../search.php">
        <?php
          if (isset($_REQUEST['uid'])) {
          ?>
          <input type="text"  style="display:none;" name="uid" value="<?php echo $_REQUEST['uid']?>">
          <?php
          }
         ?>
		 <div class="sf cut">
            <input class="fl" name="kw" type="text" value="" placeholder="搜索">
            <button class="fr" type="submit" style="background: url(../images/icons.png) no-repeat;background-position: 4px -96px;"> </button>
          </div>
        </form>

      </div>
      <!-- 头部搜索结束 -->
     

    </div>
    <!-- 头部主体结束 -->
  </div>
</div>
