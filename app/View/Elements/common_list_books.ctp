<?php foreach($books as $book):?>
          <div class="<?php echo $type; ?>-entry col-xs-12">
            <h2><a href="<?php echo SITE_LINK; ?>books/<?php echo $book['Book']['id'] ?>"><?php echo $book['Book']['title']?></a></h2>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon2.png'); ?>:<?php echo $book['Book']['user_all_count']?></span>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon1.png'); ?>:<?php echo $book['Book']['bet_all_total']?></span>
            <span class="badge-state"><?php echo $book['Book']['state']?></span>
            <span class="badge-category"><?php echo $book['Book']['category']?></span>
            <p><a href="<?php echo SITE_LINK; ?>users/<?php echo $book['Book']['user_id']?>">Created:<?php echo CakeTime::format($book['Book']['created'],'%Y/%m/%d %H:%M')?> <?php echo $book['User']['name']?></a></p>
            <p>Bet Start:<?php echo CakeTime::format( $book['Book']['bet_start'],'%Y/%m/%d %H:%M')?>   Bet Finsh:<?php echo CakeTime::format( $book['Book']['bet_finish'],'%Y/%m/%d %H:%M')?>   Result:<?php echo CakeTime::format( $book['Book']['result_time'],'%Y/%m/%d %H:%M')?> </p>
          </div>
          <?php endforeach;?>
         
          <span class="clearfix"></span>
          
          <div class="pagination-wrap">
            <ul class="pagination pagination-lg">
              <?php echo $this->Paginator->prev(__('<<'), array('tag' => 'li'), null,  array('class' => 'disabled','tag' => 'li'));?>
              <?php echo $this->Paginator->numbers(array('tag' => 'li','separator'=>''));?>
              <?php echo $this->Paginator->next(__('>>'), array('tag' => 'li'), null,  array('class' => 'disabled','tag' => 'li'));?>
            </ul>
          </div>