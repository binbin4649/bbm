<!DOCTYPE html>
<!-- <html> -->
<?php echo $this->Facebook->html(); ?>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php //echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		//<!-- Bootstrap -->
		echo $this->Html->css('bootstrap.min');
		//<!-- Main Styles -->
		echo $this->Html->css('main');
		//<!-- Responsive Styles -->
		echo $this->Html->css('non-responsive');
		//<!-- Icon Styles -->
    echo $this->Html->css('font-awesome.min');
		echo $this->Html->css('bootstrap-datetimepicker.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

	?>
    <?php
    echo $this->Html->script('jquery');
    echo $this->Html->script('bootstrap.min');
    echo $this->Html->script('bootstrap-datetimepicker.min');
    echo $this->Html->script('respond.min');
    echo $this->Html->script('readmore'); 

    echo $this->Html->script('bbm'); 
    echo $this->Html->script('route'); 



    ?>
	<script>
		var SITE_LINK = "<?php echo SITE_LINK; ?>";
	</script>
</head>
<body>
    <div class="container">
      
      <header class="row">
        <div class="col-xs-12">
          <div class="col-xs-6">
            <a href="<?php echo SITE_LINK; ?>"><h1 class="logo">BBM</h1></a>
          </div>
          <div class="col-xs-6">
                <?php if($fbuser): $fb = $this->Session->read('FB'); $user_s = $this->Session->read('User'); ?>
                  <div class="row header-user-info">
                    <div class="col-xs-4">
                      <img style="width:20%" src="<?php echo "http://graph.facebook.com/".$fb['Me']['id']."/picture?type=square"?>">
                      <a href="<?php echo SITE_LINK; ?>users/<?php echo $user_s['id']; ?>"><?php echo $user_s['name'];; ?></a>
                    </div>
                    <div class="col-xs-4">
                      <i class="glyphicon glyphicon-edit"></i><a href="<?php echo SITE_LINK; ?>profile/edit">Edit</a>
                    </div>
                    <div class="col-xs-4">
                      <i class="glyphicon glyphicon-log-out"></i><?php echo $this->Facebook->logout(array('label' => 'Logout', 'redirect' => array("controller"=>"users","action"=>'logout'))); ?>
                    </div>
                  </div>
                  <div class="row header-user-info">
                    <div class="col-xs-4">
                      <a href="<?php echo SITE_LINK; ?>passbooks/<?php echo $user_s['id']; ?>"><?php echo $this->Html->image('/img/icon1.png').$user_s['point']; ?></a>
                    </div>
                    <div class="col-xs-4">
                      <a href="<?php echo SITE_LINK; ?>betlists/<?php echo $user_s['id']; ?>"><span>Bet Now:</span><?php echo $user_s['betlist'];?></a>

                    </div>
                    <div class="col-xs-4">
                      <a href="<?php echo SITE_LINK; ?>makedbooks/<?php echo $user_s['id']; ?>"><span>Maked Book:</span><?php echo $user_s['makedbook'];?></a>
                    </div>
                  </div>
                <?php else:?>
              <div class="row">
                <div class="pull-right">
                      <div class = "fb-button">
                            <?php echo $this->Facebook->login(array( 'perms' => 'public_profile,email','img'=>'/fb-button.png','redirect' => '/users/facebook_login')); ?>
                      </div>
                </div>
              </div>
                <?php endif;?>

            <!-- <a href="#" class="fb-button pull-right"><?php echo $this->Html->image('fb-button.png'); ?></a> -->
          </div>
        </div>
      </header><!--END of header -->

      <nav class="row">
        <div class="col-xs-12">
          <ul>
            <li><a href="<?php echo SITE_LINK; ?>">Book Search</a></li>
            <li><?php echo $this->Html->link('User Ranking', '/users/ranking') ?></li>
            <li><?php echo $this->Html->link('Make Book', '/books/add') ?></li>
            <li><?php echo $this->Html->link('Updates', '/updates') ?></li>
            <li><?php echo $this->Html->link('About Us', '/pages/aboutus') ?></li>
            <li><a href="https://www.facebook.com/bookbookmaker" target="_blank"><?php echo $this->Html->image('fb-icon.png'); ?> FB Page</a></li>
            <li><div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div></li>
          </ul>
        </div>
      </nav><!--END of nav -->

      <div class="main-content row">

        <div class="content col-xs-9">
          
          <?php echo $this->Session->flash(); ?>

        <?php echo $this->fetch('content'); ?>

        </div> <!--End of content -->

        <aside class="sidebar col-xs-3">
          <div class="row">

            <div class="ads col-xs-12">
              <?php echo $this->Html->image('ad.png'); ?>
            </div>
            <div class="ads col-xs-12">
            <?php echo $this->Html->image('ad.png'); ?>
            </div>
            <div class="ads col-xs-12">
              <?php echo $this->Html->image('ad.png'); ?>
            </div>
            <div class="ads col-xs-12">
              <?php echo $this->Html->image('ad.png'); ?>
            </div>

          </div>
        </aside><!--END of sidebar-->

        <div class="clearfix"></div>
        <div class="updates-wrap col-xs-12">
          <h2>Updates</h2>
          <div class="updates col-xs-12">
            <?php foreach($update_info as $update):?>
            <p><a href="<?php echo SITE_LINK; ?>books/<?php echo $update['Update']['book_id'] ?>">
              <?php echo $update['Update']['content'] ?>    
            </a></p>
            <?php endforeach;?>
          </div>
        </div>

        <hr></hr>

        <footer>
          <div class="col-xs-12">
            <div class="footer-links">
              <ul>
                <li><a href="/">Book Search</a></li>
	            <li><?php echo $this->Html->link('User Ranking', '/users/ranking') ?></li>
	            <li><?php echo $this->Html->link('Make Book', '/books/add') ?></li>
	            <li><?php echo $this->Html->link('Updates', '/updates') ?></li>
	            <li><?php echo $this->Html->link('About Us', '/pages/aboutus') ?></li>
              </ul>
              <p class="copyright"><a href="http://bookbookmaker.com">bookbookmaker.com </a> - <a href="http://hideichi.com/">hideichi.com</a></p>
            </div>
          </div>
        </footer>

      </div><!--END of main-content-->

    </div><!-- End of container -->

<!-- Modal -->
<div class="modal fade" id="morePointModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center" id="myModalLabel">More Points</h4>
      </div>
      <div class="text-center modal-body">
        <p>Welcome bookbookmaker.com</p>
        <p>1000point gift. I will try to bet right away! </p>
        <p>However, please carefully check the contents of the book!</p>
        <p>When you press the like button a user will receive </p>
        <p><span class="modal-red">1,000 pt</span> as a gift.</p>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    
    <!-- The Scripts -->

    <script>
      // $('#morePointModal').modal({show: true});
    </script>
  </body>

<?php echo $this->element('sql_dump'); ?>
<?php echo $this->Facebook->init(); ?>

</html>
