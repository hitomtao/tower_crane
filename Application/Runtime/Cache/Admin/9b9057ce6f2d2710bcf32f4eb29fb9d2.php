<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>江麓 塔机监控系统</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="/tower_crane/Public/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/tower_crane/Public/stylesheets/theme.css">
    <link rel="stylesheet" href="/tower_crane/Public/lib/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="/tower_crane/Public/stylesheets/page.css">

    <script src="/tower_crane/Public/lib/jquery-1.7.2.min.js" type="text/javascript"></script>
      <!--原本是用1.7的jquery，我改成1.8的了-->
      <!--<script src="/tower_crane/Public/lib/jquery-1.8.1.min.js" type="text/javascript"></script>-->

    <!--高德地图API-->
    <script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=eaf401a9420bae96eab086ccf8f4ff9a"></script>
      <!-- Demo page code -->
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="/tower_crane/Public/lib/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->
    
	<!--顶 部 导 航-->
    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                    <li><a href="#" class="hidden-phone visible-tablet visible-desktop" role="button">设置</a></li>
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> 管理员 <?php echo ($username); ?>
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="#">我的账号</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" class="visible-phone" href="#">设置</a></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="<?php echo U('Admin/Login/logout');?>">退出登录</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="<?php echo U('Admin/Index/index');?>"><span class="first">江麓</span> <span class="second">塔机监控系统</span></a>
        </div>
    </div>
    


    <!--侧 边 导 航-->
    <div class="sidebar-nav">

        <a href="#common-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>塔机监控<i class="icon-chevron-up"></i></a>
        <ul id="common-menu" class="nav nav-list collapse in">
            <li ><a href="<?php echo U('Admin/CraneReal/CraneList');?>">塔机工况监控</a></li>
            <li ><a href="#">服务转移</a></li>

        </ul>

        <a href="#manufacture-menu" class="nav-header" data-toggle="collapse"><i class="icon-legal"></i>远程控制<i class="icon-chevron-up"></i></a>
        <ul id="manufacture-menu" class="nav nav-list collapse">
            <li ><a href="<?php echo U('Admin/CraneAdmin/craneList');?>">塔机注册</a></li>
            <li ><a href="#">塔机锁机</a></li>
            <li ><a href="#">塔机解锁</a></li>
            <li ><a href="#">锁解机上线提醒</a></li>
            <li ><a href="#">锁解机日志</a></li>
            <li ><a href="#">报警查询</a></li>
            <li ><a href="#">不在线跟踪</a></li>
            <li ><a href="#">指令透传</a></li>
            <li ><a href="#">短信报警开关</a></li>
        </ul>

        <a href="#manage-menu" class="nav-header" data-toggle="collapse"><i class="icon-random"></i>生产制造管理<i class="icon-chevron-up"></i></a>
        <ul id="manage-menu" class="nav nav-list collapse">
            <li ><a href="#">SIM卡池管理</a></li>
            <li ><a href="#">终端池管理</a></li>
            <li ><a href="#">服务开通管理</a></li>
            <li ><a href="#">客户信息管理</a></li>

        </ul>

        <a href="#service-menu" class="nav-header" data-toggle="collapse"><i class="icon-wrench"></i>系统管理<i class="icon-chevron-up"></i></a>
        <ul id="service-menu" class="nav nav-list collapse">
            <li ><a href="<?php echo U('Admin/User/userlist');?>">用户管理</a></li>
            <li ><a href="#">操作日志</a></li>
            <li ><a href="#">通讯日志</a></li>
            <li ><a href="#">字典项管理</a></li>
            <li ><a href="#">功能集管理</a></li>
            <li ><a href="#">塔机类型管理</a></li>
            <li ><a href="#">塔机型号管理</a></li>
            <li ><a href="#">塔机组管理</a></li>
        </ul>

        <a href="../faq.html" class="nav-header" ><i class="icon-comment"></i>研发设计管理</a>

        <a href="../faq.html" class="nav-header" ><i class="icon-comment"></i>系统配置</a>
    </div>
    

<!--修改用户-->

<div class="content">

    <div class="header">

        <h1 class="page-title">添加用户</h1>
    </div>

    <ul class="breadcrumb">
        <li><a href="<?php echo U('Admin/Index/index');?>">系统管理</a> <span class="divider">/</span></li>
        <li><a href="<?php echo U('Admin/User/userList');?>">用户管理</a> <span class="divider">/</span></li>
        <li class="active">添加用户</li>
    </ul>

    <div class="container-fluid">
        <div class="row-fluid">

            <div class="btn-toolbar">
                <!--<button class="btn btn-primary"><i class="icon-save"></i> 保存修改</button>-->
                <div class="btn-group">
                </div>
            </div>
            <div class="well">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">必填</a></li>
                    <li><a href="#profile" data-toggle="tab">详细资料</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="home">
                        <form id="tower-form">
                            <label>用户名</label>
                            <input type="text" class="input-xlarge" placeholder="用户名长度范围在6-16" name="username">
                            <label>密码</label>
                            <input type="password" class="input-xlarge" placeholder="密码长度范围在6-16" name="password">
                            <label>真实姓名</label>
                            <input type="text" class="input-xlarge" placeholder="请输入真实姓名" name="realname">
                            <label>邮箱地址</label>
                            <input type="text" class="input-xlarge" placeholder="请输入邮箱地址" name="email">
                            <label>授权码</label>
                            <input type="text" class="input-xlarge" placeholder="请输入授权码" name="auth_code">
                        </form>

                    </div>
                    <div class="tab-pane fade" id="profile">
                        <form id="tower-form2">
                            <label>公司名</label>
                            <input type="text" class="input-xlarge" placeholder="请输入公司名" name="company">
                            <label>联系电话</label>
                            <input type="text" class="input-xlarge" placeholder="请输入联系电话" name="phone">
                            <label>联系地址</label>
                            <input type="text" class="input-xlarge" placeholder="请输入联系地址" name="address">
                        </form>
                    </div>
                    <div>
                        <button id="button-submit" type="button" class="btn btn-primary">添加</button>
                        <button id="button-cancel" type="button" class="btn">取消</button>
                    </div>
                </div>

            </div>




            <footer>
                <hr>
            </footer>

        </div>
    </div>
</div>
<script src="/tower_crane/Public/lib/bootstrap/js/bootstrap.js"></script>
<script src="/tower_crane/Public/lib/jquery-1.8.1.min.js"></script>
<script src="/tower_crane/Public/lib/layer/layer.js"></script>
<script src="/tower_crane/Public/js/dialog.js"></script>
<script src="/tower_crane/Public/js/admin/common.js"></script>
<script>
    var SCOPE = {
        'post_url' : "<?php echo U('Admin/User/userAdd');?>",
        'jump_url' : "<?php echo U('Admin/User/userList');?>",
    };
</script>

</body>
</html>