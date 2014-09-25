<ul data-role="listview">
    <li>
      <a href="<?php echo SITE_LINK."users/".$data['User']['id']; ?>">
        <img style="width:20%" src="<?php echo "http://graph.facebook.com/".$data['User']['facebook_id']."/picture?type=square"?>" />
        <?php echo $data['User']['name']; ?>
      </a>
    </li>
    <li>
      <a href="<?php echo SITE_LINK."passbooks/".$data['User']['id']; ?>">
      <?php echo $this->Html->image('/img/icon1.png',array('class'=>'ui-li-icon ui-corner-none'));?>
      Pass Book<span class="ui-li-count"><?php echo $data['User']['point']; ?></span></a>
    </li>
    <li>
      <a href="<?php echo SITE_LINK."betlists/".$data['User']['id']; ?>">
      <span >Bet List:</span><span class="ui-li-count"><?php echo $data['User']['betlist'];?></span></a>
    </li>
   <li>
      <a href="<?php echo SITE_LINK."makedbooks/".$data['User']['id']; ?>">
      <span>Maked Book:</span><span class="ui-li-count"><?php echo $data['User']['makedbook'];?></span></a>
    </li>
    <li>Result Timeover:<span class="ui-li-count"><?php echo $data['User']['result_timeover']; ?></span></li>
    <li>Book Delete:<span class="ui-li-count"><?php echo $data['User']['book_delete']; ?></span></li>
    <li><?php 
    		echo empty($data['User']['facebook_link_hide'])?'':
    			'<a class="fb-link" href="'.$data['User']['facebook_link'].'">FB Page : '.$data['User']['name'].'</a>'; 
    	?>
    </li>
</ul>
<span class="clearfix"></span>
