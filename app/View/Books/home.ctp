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

$category = array(''=>'category','Sports'=>'Sports','Others'=>'Others');
$state = array(''=>'state','Up Coming'=>'Up Coming','Bet Now'=>'Bet Now','Bet Finish'=>'Bet Finish','Result'=>'Result','Delete'=>'Delete','Timeover'=>'Timeover');

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

          <?php echo $this->element("common_list_books",array("type"=>"home")); ?>
