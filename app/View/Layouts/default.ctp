<!DOCTYPE html>
<html>
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

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

</head>
<body>

    <div class="container">
      
      <header class="row">
        <div class="col-xs-12">
          <div class="col-xs-6">
            <a href="/"><h1 class="logo">BBM</h1></a>
          </div>
          <div class="col-xs-6">
            <a href="#" class="fb-button pull-right"><?php echo $this->Html->image('fb-button.png'); ?></a>
          </div>
        </div>
      </header><!--END of header -->

      <nav class="row">
        <div class="col-xs-12">
          <ul>
            <li><a href="index">Book Search</a></li>
            <li><a href="user-rankings">User Ranking</a></li>
            <li><a href="book-make">Make Book</a></li>
            <li><?php echo $this->Html->link('About Us', '/pages/aboutus') ?></li>
            <li><?php echo $this->Html->link('About Us', '/pages/aboutus') ?></li>
            <li><a href="#"><?php echo $this->Html->image('fb-icon.png'); ?> FB Page</a></li>
            <li><a href="#"><?php echo $this->Html->image('fb-like.png'); ?></a></a></li>
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
            <p><a href="#">hideichi_saito san, I made a sample page. Voting Begins is 0 minutes 10:07 August.</a></p>
            <p><a href="#">Vote of the sample page has been started. Deadline is 0 minutes 12:07 August.</a></p>
            <p><a href="#">Result of sample pages have been announced. Is a sample report.</a></p>
            <p><a href="#">hideichi_saito san, I made a sample page. Voting Begins is 0 minutes 10:07 August.</a></p>
            <p><a href="#">Vote of the sample page has been started. Deadline is 0 minutes 12:07 August.</a></p>
            <p><a href="#">Result of sample pages have been announced. Is a sample report.</a></p>
          </div>
        </div>

        <hr></hr>

        <footer>
          <div class="col-xs-12">
            <div class="footer-links">
              <ul>
                <li><a href="index.html">Book Search</a></li>
                <li><a href="user-ranking.html">User Ranking</a></li>
                <li><a href="book-make.html">Make Book</a></li>
                <li><a href="updates.html">Updates</a></li>
                <li><a href="about-us.html">About Us</a></li>
              </ul>
              <p class="copyright"><a href="index.html">bookbookmaker.com </a> - <a href="http://hideichi.com/">hideichi.com</a></p>
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
    <?php
    echo $this->Html->script('jquery');
    echo $this->Html->script('bootstrap.min');
    echo $this->Html->script('respond.min'); 
    ?>
    <script>
      // $('#morePointModal').modal({show: true});
    </script>
  </body>

<?php echo $this->element('sql_dump'); ?>
</html>
