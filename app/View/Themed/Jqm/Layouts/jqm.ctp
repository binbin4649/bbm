<!DOCTYPE html>
<?php echo $this->Facebook->html(); ?>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php echo $pagetitle?></title>
<link rel="stylesheet" href="/themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.3/jquery.mobile.structure-1.4.3.min.css" />
<link rel="stylesheet" href="/themes/default.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.js"></script>
</script>
<!-- <script> $(function() { $('[data-role="panel"]').panel({ theme: 'default' }); }); </script> -->
<script src="/themes/default.js"></script>
<?php echo $this->Html->script('route'); ?>

</head>
<body>

<!--page area-->
<div data-role="page" data-title="BBM - Home">
  
  <!--header-->
  <div data-id="common_header" data-role="header" data-position="fixed">
    <a href="#panel" class="ui-btn ui-btn-icon-notext ui-icon-home ui-corner-all ui-btn-left">Home</a>
    <h1><?php echo $pagetitle?></h1>
    <a href="#panel-right" class="ui-btn ui-btn-icon-notext ui-icon-user ui-corner-all ui-btn-right">User</a>
  </div><!--header end-->

  <!--main content-->
  <div role="main" class="ui-content">
          <?php echo $this->fetch('content'); ?>

  </div><!--main content end-->

  <!--footer-->
  <div data-role="footer">
    <h3>bookbookmaker.com</h3>
    <a href="http://bookbookmaker.com">bookbookmaker.com</a>
    <a href="http://hideichi.com">hideichi.com</a>
  </div><!--footer end-->



<!--panel-left-->
  <div id="panel" data-role="panel" data-position="left" data-position-fixed="true">
  <h3>Contents</h3>
    <ul data-role="listview" data-inset="true">
        <li><a href="/">Home</a></li>
        <li><a href="user-rankings.html">User Ranking</a></li>
        <li><a href="updates.html">Updates</a></li>
        <li><a herf="about-us.html">About BBM</a></li>
        <li data-icon="action"><a href="https://www.facebook.com/bookbookmaker">Facebook Page</a></li>
        <li data-icon="delete"><a href="#" data-rel="close">Close</a></li>
    </ul>
  </div><!--panel-left end-->

  <!--panel-right-->
  <div id="panel-right" data-role="panel" data-position="right" data-position-fixed="true">
    <h3>User infomation</h3>
    <ul data-role="listview" data-inset="true">
<!--         <li>
            <a href="profile-home.html"><img src="img/167313_108568132552016_5047279_n.jpg" />Hideichi saito</a>
        </li>
        <li><a href="profile-passbook.html"><img src="img/icon1.png" class="ui-li-icon ui-corner-none" />Pass Book<span class="ui-li-count">999999</span></a></li>
        <li><a href="profile-betlist.html">Bet List<span class="ui-li-count">999999</span></a></li>
        <li><a herf="profile-makedbook.html">Maked Book<span class="ui-li-count">999999</span></a></li>
        <li><a herf="book-make.html">Make Book</a></li>
        <li><a herf="profile-edit.html">User Edit</a></li>
        <li><a herf="#">Log out</a></li>
        <li data-icon="delete"><a href="#" data-rel="close">Close</a></li> -->
        <?php if($fbuser): $fb = $this->Session->read('FB'); $user_s = $this->Session->read('User'); ?>
                    <li>
                      <a href="<?php echo SITE_LINK; ?>profile ?>">
                        <img style="width:20%" src="<?php echo "http://graph.facebook.com/".$fb['Me']['id']."/picture?type=square"?>">
                        <?php echo $user_s['name']; ?>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo SITE_LINK; ?>passbooks/<?php echo $user_s['id']; ?>"><?php echo $this->Html->image('/img/icon1.png',array('class'=>'ui-li-icon ui-corner-none'));?>Pass Book<span class="ui-li-count"><?php echo $user_s['point']; ?></span></a>
                    </li>
                    <li>
                      <a href="<?php echo SITE_LINK; ?>betlists/<?php echo $user_s['id']; ?>"><span >Bet List:</span><span class="ui-li-count"><?php echo $user_s['betlist'];?></span></a>
                    </li>
                   <li>
                      <a href="<?php echo SITE_LINK; ?>makedbooks/<?php echo $user_s['id']; ?>"><span>Maked Book:</span><span class="ui-li-count"><?php echo $user_s['makedbook'];?></span></a>
                    </li>
                    <li>
                      <a href="<?php echo SITE_LINK; ?>profile/edit/<?php echo $user_s['id']; ?>">User Edit</a>
                    </li>
                    <li>
                      <?php echo $this->Facebook->logout(array('label' => 'Log out', 'redirect' => array("controller"=>"users","action"=>'logout'))); ?>
                    </li>
                    <li data-icon="delete"><a href="#" data-rel="close">Close</a></li>

        <?php else:?>
              <li>
                    <?php echo $this->Facebook->login(array( 'perms' => 'public_profile,email','label'=>'login','redirect' => '/users/facebook_login')); ?>
              </li>
        <?php endif;?>
    </ul>
  </div><!--panel-right end-->

</div><!--page area end-->

</body>
<?php echo $this->Facebook->init(); ?>
</html>