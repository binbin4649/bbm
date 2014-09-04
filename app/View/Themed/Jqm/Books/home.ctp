<?php
$category = array(''=>'State','Sports'=>'Sports','Others'=>'Others');
$state = array(''=>'Category','Up Coming'=>'Up Coming','Bet Now'=>'Bet Now','Bet Finish'=>'Bet Finish','Result'=>'Result','Book Delete'=>'Book Delete','Result Timeover'=>'Result Timeover');

?>


  <div data-role="collapsible">
    <h3>Book Search</h3>
<!--     <form method="GET" action="">
        <input id="search_text" name="search_text" type="search" data-clear-btn="true" />
        <select id="search_category" name="search_category" data-native-menu="false">
            <option>Category</option>
            <option>Sports</option>
            <option>Others</option>
        </select>
        <select id="search_state" name="search_state" data-native-menu="false">
            <option>State</option>
            <option>Up Coming</option>
            <option>Bet Now</option>
            <option>Bet Finish</option>
            <option>Result</option>
            <option>Book Delete</option>
            <option>Result Timeover</option>
          </select>
        <input type="submit" value="Submit" />
    </form> -->
  <?php echo $this->Form->create(); ?>
          <?php echo $this->Form->input('title',array("id"=>"search_text",'label' => false,'data-clear-btn'=>"true",'required'=>false)); ?>
          <?php echo $this->Form->select('category',$category,array("id"=>"search_category","data-native-menu"=>"false",'empty'=>false)); ?>
          <?php echo $this->Form->select('state',$state,array("id"=>"search_state","data-native-menu"=>"false",'empty'=>false)); ?>
  <?php echo $this->Form->end(array('label'=>__('Search'),'div'=>array('class'=>'inline'),'class'=>'btn btn-default')); ?>
  </div>

  <div data-role="content">
  <ul data-role="listview">
      <?php foreach($books as $book):?>
          <li>
            <a href="/books/<?php echo $book['Book']['id'] ?>" class="tuika_ui-icon-carat-r">
                <h2><?php echo $book['Book']['title']?></h2>
                <p class="list_view_stats">
                    <span><?php echo $this->Html->image('/img/icon1.png'); ?>:<?php echo $book['Book']['bet_all_total']?></span>
                    <span><?php echo $this->Html->image('/img/icon2.png'); ?>:<?php echo $book['Book']['user_all_count']?></span>
                    <span class="badge-state tuika_badge-state"><?php echo $book['Book']['state']?></span>
                    <span class="badge-category tuika_badge-category"><?php echo $book['Book']['category']?></span>
                </p>
            </a>
          </li>
      <?php endforeach;?>
  </ul>
  </div>
<?php echo $this->element("mobile_paging"); ?>
