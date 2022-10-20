<?php session_start(); ?>
<!-- BEGIN CONTENT -->
<div class="page-container row-fluid">
    <!-- BEGIN SIDEBAR -->
    <!-- BEGIN MENU -->
    <div class="page-sidebar" id="main-menu"> 
          <div class="page-sidebar-wrapper" id="main-menu-wrapper">
        <!-- BEGIN MINI-PROFILE -->
        <div class="user-info-wrapper"> 
            <div class="user-info">
                <div class="greeting">Welcome</div>
                <div class="username"><span class="semi-bold"><?php echo $_SESSION['fullname']; ?></span></div> &nbsp; &nbsp;
            </div>
        </div>
        <!-- END MINI-PROFILE -->
        <!-- BEGIN SIDEBAR MENU --> 
        <p class="menu-title"></p>
        <ul>
            <li class="start active"><a href="member.php"><i class="fa fa-users"></i><span class="title">Member</span><span class="selected"></span></a></li>
            <li class="start active"><a href="category.php"><i class="fa fa-tasks"></i><span class="title">Category</span><span class="selected"></span></a></li>
            <li class="start active"><a href="sms.php"><i class="fa fa-briefcase"></i><span class="title">SMS</span><span class="selected"></span></a></li>
            <li class="start active"><a href="media.php"><i class="fa fa-film"></i><span class="title">Media</span><span class="selected"></span></a></li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    </div>
    <!-- END MENU -->
    <!-- BEGIN SIDEBAR FOOTER WIDGET -->
    <div class="footer-widget">     
       <a href="http://www.alfateemacademy.com" target="_blank"> Al-Fateem Academy  <small>&reg;</small> </a>
    </div>
    <!-- END SIDEBAR FOOTER WIDGET -->
    <!-- END SIDEBAR --> 