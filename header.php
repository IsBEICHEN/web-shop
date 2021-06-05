<link rel="stylesheet" href="admin/css/bootstrap.min.css">
<div class="header">
    <div class="w1100" style="height: 60px;">
        <!-- 头部主体开始 -->
        <div class=" row">
            <div class="logo fl col-lg-3 col-md-3"><a ><img alt="" src="images/logo.png" border="0"></a></div>
            <!-- 头部搜索开始 -->
			<div class="col-lg-7 col-md-7">
				<div class="nav  ">
				    <div>
				        <ul>
				
				            <?php
				            if(isset($_REQUEST['uid'])){ //isset检查变量是否设置
				                $uid = $_REQUEST['uid'];
				                // echo $_SESSION['uid'.$uid];
				                // exit;
				                if(isset($_SESSION['uid'.$uid]))
				                {
				                    $flag=1;
				                    ?>
				                    <li><a href="index.php?uid=<?php echo $uid?>">首页</a></li>
                                    <li><a href="user/center.php?uid=<?php echo $uid?>">用户中心</a></li>
				                    <li><a href="user/logout.php?uid=<?php echo $uid?>">退出</a></li>
				                    <?php
				
				                }
				            }
				            else
				            {?>
				                <li><a href="index.php">首页</a></li>
				                <li><a href="user/login.php">登录</a></li>
				                <li><a href="user/regist.php">注册</a></li>
				                <?php
				
				            }
				            ?>
				
				        </ul>
				    </div>
				</div>
			</div><?php
            if (isset($_REQUEST['uid'])) {
                ?>
                <!-- 头部购物车开始 -->
                <div class="top-cart fr">
                    <div class="radius4 mt10">
                        <i class=""><img src="images/cart.gif" style="width: 20px"> </i>
                        <a href="user/cart.php?uid=<?php echo $_REQUEST['uid']?>"><font>购物车</font></a></div>
                </div>
                <!-- 头部购物车结束 -->
                <?php
            }
            ?>
            <div class="top-search col-lg-2 col-md-2"   >
                <form method="get" action="search.php">
                    <?php
                    if (isset($_REQUEST['uid'])) {
                        ?>
                        <input type="text"  style="display:none;" name="uid" value="<?php echo $_REQUEST['uid']?>">
                        <?php
                    }
                    ?>
                    <div class="sf cut">
                        <input class="fl" name="kw" type="text" value="" placeholder="search">
                        <button class="fr" type="submit" style="background: url(images/icons.png) no-repeat;background-position: 4px -96px;"> </button>
                    </div>
                </form>

            </div>
            <!-- 头部搜索结束 -->
            

        </div>
         
    </div>
</div>
