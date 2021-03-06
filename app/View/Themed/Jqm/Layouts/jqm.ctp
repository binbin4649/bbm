<!DOCTYPE html>
<?php echo $this->Facebook->html(); ?>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php
      if(empty($pagetitle)){
        echo 'BookBookMaker.com';
      } else {
        echo $pagetitle;
      } 
    ?></title>
<link rel="stylesheet" href="/themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.3/jquery.mobile.structure-1.4.3.min.css" />
<link rel="stylesheet" href="/themes/default.css" />
<link rel="stylesheet" href="/themes/fix.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
$(document).bind("mobileinit", function(){
 $.mobile.ajaxEnabled = false;
});
</script>
<script src="http://code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.js"></script>
</script>
<!-- <script> $(function() { $('[data-role="panel"]').panel({ theme: 'default' }); }); </script> -->
<script src="/themes/default.js"></script>
<?php echo $this->Html->script('route'); ?>
<script>
		var SITE_LINK = "<?php echo SITE_LINK; ?>";
</script>
</head>
<body>

<!--page area-->
<div data-role="page">
  
  <!--header-->
  <div data-id="common_header" data-role="header" data-position="fixed" id="tuika_header">
    <a href="#panel" class="ui-btn ui-btn-icon-notext ui-corner-all ui-btn-left tuika_btn"><img src="/img/home.png"/></a>
    <h1>
    <?php
      if(empty($pagetitle)){
        echo 'BookBookMaker.com';
      } else {
        echo $pagetitle;
      } 
    ?>
  </h1>
    <a href="#panel-right" class="ui-btn ui-btn-icon-notext ui-corner-all ui-btn-right tuika_btn"><img src="/img/photo_2.png"/></a>
  </div><!--header end-->

  <!--main content-->
  <div role="main" class="ui-content tuika_ui-content">
  
  <?php
    if(isset($errors)){
      foreach($errors as $modelName){
        foreach($modelName as $value){
          echo '<div class="errors-message">ERROR : '.$value.'</div>';
        }
      }
    }
  echo $this->Session->flash();          
  echo $this->fetch('content');
  ?>

  </div><!--main content end-->

  <!--footer-->
  <div data-role="footer">
    <h3>bookbookmaker.com</h3>
    <a href="http://bookbookmaker.com" style="margin-left:5%;">Top Page</a>
    <a href="javascript:void(0);" id="switch" val="<?php echo SITE_LINK."switch_view/wap" ?>">For Desktop View</a>
    <p class="small-text">現在ベータにつきバグがあるかもしれません。見つけたらFacebookページで教えてもらえると助かります。また致命的なバグが見つかった場合は、データをリセットする可能性もあります。</p>
  </div><!--footer end-->



<!--panel-left-->
  <div id="panel" data-role="panel" data-position="left" data-position-fixed="true">
  <h3>Contents</h3>
    <ul data-role="listview" data-inset="true">
        <li><a href="<?php echo SITE_LINK; ?>">Home</a></li>
        <!-- <li><a href="<?php echo SITE_LINK; ?>users/ranking">User Ranking</a></li> -->
        <li><a href="<?php echo SITE_LINK; ?>updates">Updates</a></li>
        <li><a href="<?php echo SITE_LINK; ?>pages/aboutus">About BBM</a></li>
        <li data-icon="action"><a href="https://www.facebook.com/bookbookmaker">Facebook Page</a></li>
        <li data-icon="delete"><a href="#" data-rel="close">Close</a></li>
    </ul>
  </div><!--panel-left end-->

  <!--panel-right-->
  <div id="panel-right" data-role="panel" data-position="right" data-position-fixed="true">
    <h3>User infomation</h3>
    <ul data-role="listview" data-inset="true">
        <?php if($fbuser): $fb = $this->Session->read('FB'); $user_s = $this->Session->read('User'); ?>
                    <li>
                      <a href="<?php echo SITE_LINK; ?>users/<?php echo $user_s['id']; ?>">
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
                      <a href="<?php echo SITE_LINK; ?>profile/edit/">User Edit</a>
                    </li>
                    <li>
                      <?php echo $this->Facebook->logout(array('label' => 'Log out', 'redirect' => array("controller"=>"users","action"=>'logout'))); ?>
                    </li>
                    <li data-icon="delete"><a href="#" data-rel="close">Close</a></li>

        <?php else:?>
              <li>
                    <?php echo $this->Facebook->login(array( 'perms' => 'public_profile,email','label'=>'login','redirect' => '/users/facebook_login')); ?>
              </li>
              <p class="small-text">iPhoneのChromeだとログインできないようです。iPhoneはsafariで開いてください。</p>
        <?php endif;?>
    </ul>
  </div><!--panel-right end-->

<div data-role="popup" id="morePointPopup" data-theme="a" class="ui-corner-all">
  <div style="padding:10px 20px;" class="modal-content">
      <h3 class="content-bets-title">Welcome bookbookmaker</h3>
      <p>1,000ptプレゼントしました！<br>これを元手にポイントを増やしましょう！！</p>
      <p>ポイントの増やし方などは、左上をタップしてAboutusをご覧ください。</p>
      <p>あなたのユーザー情報は、右上をタップしてください。</p>
      <a href="#" data-rel="back" class="ui-btn ui-btn-inline ui-corner-all">Close</a>
  </div>
</div>

</div><!--page area end-->

</body>
<?php echo $this->Facebook->init(); ?>
</html>