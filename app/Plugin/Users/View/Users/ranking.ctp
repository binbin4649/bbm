
<div class="user-rankings">
  <h2><?=  __d('users', 'User Ranking');?></h2>
  <?php 
    $icon_arr = array(
        '0' => 'img/rank1.png',
        '1' => 'img/rank2.png',
        '2' => 'img/rank3.png',
        '3' => 'img/rank4.png',
        '4' => 'img/rank5.png',
        '5' => 'img/rank6.png',
        '6' => 'img/rank7.png',
        '7' => 'img/rank8.png',
        '8' => 'img/rank9.png',
        '9' => 'img/rank10.png',
      );
    foreach ($users as $key => $user)  {
  ?>
     <div class="ranking-item">
      <span class="ranking-icon"><?php if ($key <= 10) : echo "<img src='" . $this->webroot . $icon_arr[$key] . "' />"; else : echo $key + 1; endif;?> </span>
      <p class="points"><?= $user['User']['point']?> pt</p>
      <a href="/users/<?php echo $user['User']['id'] ?>"><img src="http://graph.facebook.com/<?= $user['User']['facebook_id'] ?>/picture" /><?php echo $user['User']['name']?></a>
    </div>

  <?php      
    }
  ?>
</div>