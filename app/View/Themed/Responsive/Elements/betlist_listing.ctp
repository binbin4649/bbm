
<span class="clearfix"></span>

<table class="profile-table table">
  <thead>
	<tr>
	  <th width="21%">Date</th>
	  <th width="49%">Book</th>
	  <th width="12%">Bet</th>
	  <th width="18%">Result</th>
	</tr>
  </thead>
  <tbody>
  <?php foreach($betlists as $betkey=>$betval) { ?>
	<tr>
	  <td><?php echo date("Y/m/d h:i",strtotime($betval['Bet']['created'])); ?></td>
	  <td><a href="/books/<?php echo $betval['Book']['id']?>"><?php echo $betval['Book']['title'] ?></a></td>
	  <td><?php echo $betval['Bet']['betpoint'] ?></td>
	  <td><?php echo $betval['Bet']['result_point'] ?></td>
	</tr>
  <?php } ?>
  </tbody>
</table>

<!--
<?php $books = $betlists; foreach($books as $book):?>
          <div class="home-entry col-xs-12">
            <h2><a href="<?php echo SITE_LINK; ?>books/<?php echo $book['Book']['id'] ?>"><?php echo $book['Book']['title']?></a></h2>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon2.png'); ?>:<?php echo $book['Book']['user_all_count']?></span>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon1.png'); ?>:<?php echo $book['Book']['bet_all_total']?></span>
            <span class="badge-state"><?php echo $book['Book']['state']?></span>
            <span class="badge-category"><?php echo $book['Book']['category']?></span>
            <p><a href="<?php echo SITE_LINK; ?>users/<?php echo $book['Book']['user_id']?>">Created:<?php echo CakeTime::format($book['Book']['created'],'%Y/%m/%d %H:%M')?> <?php echo $book['User']['name']?></a></p>
            <p>Bet Start:   Bet Finsh:<?php echo CakeTime::format( $book['Book']['bet_finish'],'%Y/%m/%d %H:%M')?>   Result:<?php echo CakeTime::format( $book['Book']['result_time'],'%Y/%m/%d %H:%M')?> </p>
          </div>
          <?php endforeach;?>
-->