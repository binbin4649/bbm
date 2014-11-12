<div class="sushi-bana"><a href="#descrption"><img src="http://bookbookmaker.com/img/sushi-bana1.jpg"></a></div>
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
      <span class="ranking-icon"><?php if ($key <= 9) : echo "<img src='" . $this->webroot . $icon_arr[$key] . "' />"; else : echo $key + 1; endif;?> </span>
      <p class="points"><?= $user['User']['point']?> pt</p>
      <a href="/users/<?php echo $user['User']['id'] ?>"><img src="http://graph.facebook.com/<?= $user['User']['facebook_id'] ?>/picture" /><?php echo $user['User']['name']?></a>
    </div>

  <?php      
    }
  ?>
</div>
<div class="about-us" id="descrption">
<h2>第1回　BBM杯</h2>
<p>
2015年12月31日　23時59分59秒<br>
この時、ポイントが一番多い人が優勝！
</p>
<ul style="margin-top:-15px;">
<li>賞品　：　すし券　1万円分</li>
<li>期間　：　2014年11月3日　～　2015年12月31日</li>
<li>条件　：　ポイントが一番多い人が優勝</li>
</ul>
<p>※優勝者にはメールでご連絡致します。</p>
</div>