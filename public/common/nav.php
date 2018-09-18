<?php
if (session('username')) {
    $admin['username'] = session('username');
    $admin['level'] = session('level');
    $admin['menu1_level'] = session('menu1_level');
    $admin['menu2_level'] = session('menu2_level');
    $admin['menu3_level'] = session('menu3_level');
    $admin['error_level'] = session('error_level');
    $admin['legal_level'] = session('legal_level');
} else {
    echo "<script>location.href='".asset('admin/signin')."'</script>";die;
}
?>



<div class="navbar">
    <div class="navbar-inner">
        <ul class="nav pull-right">
<!--             <li><a href="#" class="hidden-phone visible-tablet visible-desktop" role="button">Settings</a></li> -->
            <li id="fat-menu" class="dropdown">
                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" onclick="showmenu()">
                    <i class="icon-user"></i><?php echo $admin['username']; ?>
                    <i class="icon-caret-down"></i>
                </a>

                <ul class="dropdown-menu" id="menu">
                    <li><a tabindex="-1" href="<?php echo asset('admin/resetpre'); ?>" target="_">Reset Password</a></li>
                    <li class="divider"></li>
                    <li><a tabindex="-1" class="visible-phone" href="#">Settings</a></li>
                    <li class="divider visible-phone"></li>
                    <li><a tabindex="-1" href="<?php echo asset('admin/signout'); ?>">Sign Out</a></li>
                </ul>
            </li>
        </ul>
        <a class="brand" href="//www.tjctime.com" target="tttttt"><span class="first">TJCTIME</span> <span class="second">Company<?php //var_dump(session()->all()); ?></span></a>
    </div>
</div>



<div class="sidebar-nav">
    <form class="search form-inline">
        <input type="text" placeholder="Search..." />
    </form>
    
    
    <!-- 
    <a href="#accounts-menu" class="nav-header" <?php if ($admin['level'] != 1) { echo "style='display:none;'"; } ?> data-toggle="collapse">
    	<i class="icon-briefcase"></i>后台账户
	</a>
    <ul id="accounts-menu" class="nav nav-list collapse">
        <li><a href="<?php echo asset('admin/adminuserretrieve'); ?>">管理者</a></li>
		<li><a href="<?php echo asset('admin/addressretrieve'); ?>">地址</a></li>
		<li><a href="<?php echo asset('admin/activityretrieve'); ?>">活动</a></li>
		<li><a href="<?php echo asset('admin/giftretrieve'); ?>">礼物</a></li>
		<li><a href="<?php echo asset('admin/sysmessageretrieve'); ?>">系统消息</a></li>
    </ul>

    <a href="#dashboard-menu1" class="nav-header" <?php if ($admin['menu1_level'] != 1) { echo "style='display:none;'"; } ?> data-toggle="collapse">
    	<i class="icon-dashboard"></i>用户/视频 模块
	</a>
    <ul id="dashboard-menu1" class="nav nav-list collapse">
        <li><a href="<?php echo asset('admin'); ?>">主页</a></li>
        <li><a href="<?php echo asset('admin/newsretrieve'); ?>">资讯</a></li>
        <li><a href="<?php echo asset('admin/multiretrieve'); ?>">多图片</a></li>
        <li><a href="<?php echo asset('admin/userretrieve'); ?>">用户</a></li>
        <li><a href="<?php echo asset('admin/videoretrieve'); ?>">视频</a></li>
        <li><a href="<?php echo asset('admin/actionretrieve'); ?>">视频相关操作</a></li>
    </ul>
    
    <a href="#dashboard-menu2" class="nav-header" <?php if ($admin['menu2_level'] != 1) { echo "style='display:none;'"; } ?> data-toggle="collapse">
    	<i class="icon-dashboard"></i>打赏/财务 模块
	</a>
    <ul id="dashboard-menu2" class="nav nav-list collapse">
        <li><a href="<?php echo asset('admin/housingretrieve'); ?>">房屋</a></li>
        <li><a href="<?php echo asset('admin/usergiftretrieve'); ?>">打赏</a></li>
        <li><a href="<?php echo asset('admin/balanceretrieve'); ?>">财务</a></li>
    </ul>
    
    <a href="#dashboard-menu3" class="nav-header" <?php if ($admin['menu3_level'] != 1) { echo "style='display:none;'"; } ?> data-toggle="collapse">
    	<i class="icon-dashboard"></i>评论 模块
	</a>
    <ul id="dashboard-menu3" class="nav nav-list collapse">
		<li><a href="<?php echo asset('admin/reportretrieve'); ?>">报告</a></li>
		<li><a href="<?php echo asset('admin/caseretrieve'); ?>">案例</a></li>
        <li><a href="<?php echo asset('admin/partnerretrieve'); ?>">合作伙伴</a></li>
    </ul>
     -->
    
    <a href="<?php echo asset('admin/navretrieve'); ?>" class="nav-header"><i class="icon-dashboard"></i>导航</a>
	<a href="<?php echo asset('admin/newsretrieve'); ?>" class="nav-header"><i class="icon-dashboard"></i>新闻</a>
	<a href="<?php echo asset('admin/caseretrieve'); ?>" class="nav-header"><i class="icon-dashboard"></i>案例</a>
	<a href="<?php echo asset('admin/serviceretrieve'); ?>" class="nav-header"><i class="icon-dashboard"></i>服务</a>
	<a href="<?php echo asset('admin/partnerretrieve'); ?>" class="nav-header"><i class="icon-dashboard"></i>合作</a>
    <a href="<?php echo asset('admin/aboutretrieve'); ?>" class="nav-header"><i class="icon-dashboard"></i>关于</a>
    
    <!-- 
    <a href="#error-menu" class="nav-header collapsed" <?php if ($admin['error_level'] != 1) { echo "style='display:none;'"; } ?> data-toggle="collapse"><i class="icon-exclamation-sign"></i>错误页面<i class="icon-chevron-up"></i></a>
    <ul id="error-menu" class="nav nav-list collapse">
        <li><a href="<?php echo asset('admin/error/403'); ?>">403 page</a></li>
        <li><a href="<?php echo asset('admin/error/404'); ?>">404 page</a></li>
        <li><a href="<?php echo asset('admin/error/500'); ?>">500 page</a></li>
        <li><a href="<?php echo asset('admin/error/503'); ?>">503 page</a></li>
    </ul>

    <a href="#legal-menu" class="nav-header" <?php if ($admin['legal_level'] != 1) { echo "style='display:none;'"; } ?> data-toggle="collapse"><i class="icon-legal"></i>法律声明</a>
    <ul id="legal-menu" class="nav nav-list collapse">
        <li><a href="<?php echo asset('admin/privacyandpolicy'); ?>">隐私权政策</a></li>
        <li><a href="<?php echo asset('admin/termsandconditions'); ?>">条款及协议</a></li>
    </ul>
     -->
    
    
    
    <!-- <a href="<?php echo asset('admin/help'); ?>" class="nav-header" ><i class="icon-question-sign"></i>帮助中心</a> -->
    <!-- <a href="<?php echo asset('admin/faq'); ?>" class="nav-header" ><i class="icon-comment"></i>常见问题</a> -->
</div>


<script>
function showmenu() {
	$('#menu').slideToggle();
}
</script>