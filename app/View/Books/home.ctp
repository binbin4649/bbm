<?php
/**
 *
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');

$category = array(''=>'State','Sports'=>'Sports','Others'=>'Others');
$state = array(''=>'Category','Up Coming'=>'Up Coming','Bet Now'=>'Bet Now','Bet Finish'=>'Bet Finish','Result'=>'Result','Book Delete'=>'Book Delete','Result Timeover'=>'Result Timeover');




?>
          <!-- <form class="home-search form-inline" role="form" action="/" method="GET"> -->
          <?php echo $this->Form->create(array('class'=>'home-search form-inline home-search-form')); ?>
            <div class="form-group">
             <!--  <input type="text" name="title" class="form-control" placeholder="Search" value="<?php echo (isset($_GET['title']))?$_GET['title']:''?>"> -->
          <?php echo $this->Form->input('title',array('label' => false,'class'=>'form-control','placeholder'=>"Search",'required'=>false)); ?>
            <span class="help-block">Search Condition: xxx xxx xxx</span>
            </div>
            <div class="form-group">
         <!--      <select class="form-control" name="category">
                <option>Category</option>
                <option <?php echo (isset($_GET['category']) && $_GET['category']=='Sports')?'selected':''?>>Sports</option>
                <option <?php echo (isset($_GET['category']) && $_GET['category']=='Others')?'selected':''?>>Others</option>
              </select> -->
          <?php echo $this->Form->select('category',$category,array('class'=>'form-control','empty'=>false)); ?>
            </div>
            <div class="form-group">
          <?php echo $this->Form->select('state',$state,array('class'=>'form-control','empty'=>false)); ?>
            </div>
          <?php echo $this->Form->end(array('label'=>__('Search'),'div'=>array('class'=>'inline'),'class'=>'btn btn-default')); ?>
            <!-- <button type="submit" class="btn btn-default">Search</button> -->
          <!-- </form>End of form  -->

          <?php foreach($books as $book):?>
          <div class="home-entry col-xs-12">
            <h2><a href="/books/<?php echo $book['Book']['id'] ?>"><?php echo $book['Book']['title']?></a></h2>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon2.png'); ?>:<?php echo $book['Book']['user_all_count']?></span>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon1.png'); ?>:<?php echo $book['Book']['bet_all_total']?></span>
            <span class="badge-state"><?php echo $book['Book']['state']?></span>
            <span class="badge-category"><?php echo $book['Book']['category']?></span>
            <p><a href="users/<?php echo $book['Book']['user_id']?>">Created:<?php echo CakeTime::format($book['Book']['created'],'%Y/%m/%d %H:%M')?> <?php echo $book['User']['name']?></a></p>
            <p>Bet Start:   Bet Finsh:<?php echo CakeTime::format( $book['Book']['bet_finish'],'%Y/%m/%d %H:%M')?>   Result:<?php echo CakeTime::format( $book['Book']['result_time'],'%Y/%m/%d %H:%M')?> </p>
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
