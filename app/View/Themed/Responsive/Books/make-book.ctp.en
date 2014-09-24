<?php $category = Configure::read("Category");?>
<?php
  $announcement = array(
                'URL'=>'Look at the Website',
                'TV Program Name'=>'Look at the TV',
                'Radio Program Name'=>'Radio',
                'Annoucement name'=>'Other'
                );
?>
          <div class="thebook">
            <h2>Make Book</h2>
            <!-- <form class="well" method="POST"> -->
            <?php echo $this->Form->create(array('class'=>'well')); ?>

              <div class="row">
                <div class="form-group col-xs-10">
                  <p class="help-block"><?php echo __("Book Title"); ?><span>*</span>
                  <a rel="popover" data-trigger="hover" data-placement="top" data-content="<?php echo __("Please enter the title of the book. Max 84 characters and required."); ?>">
                    <i class="fa fa-question-circle"></i>
                  </a>
                  </p>
                  <!-- <input name="title" id="book-title" type="text" class="form-control required" maxlength="84"> -->
                    <?php echo $this->Form->input('title',
                      array('id'=>'book-title','label' => false,'class'=>'form-control required','maxlength'=>"84",'value'=>$new_book['Book']['title'])); 
                    ?>

                </div>
              </div>
              <div class="row">
                <div class="form-group col-xs-8" id="book-content-list">
                  <p class="help-block"><?php echo __("Book Content"); ?><span>*</span>
                    <a rel="popover" data-trigger="hover" data-placement="top" data-content="<?php echo __("Please enter the contents of the book. At least two are required.To 45 characters.This increases the five pressing the add content. 10 is the maximum."); ?>">
                    <i class="fa fa-question-circle"></i>
                  </a>
                  </p>
                  <?php if(isset($errors) && isset($errors['content'])):?>
                    <div class="error-message"><?php echo $errors['content'][0]?></div>
                  <?php endif;?>

                  <?php for($i=1;$i<=10;$i++):?>
                    <?php 
                      $ii = $i-1;
                      if(!empty($new_book['Content'][$ii])){
                        $content_value =  $new_book['Content'][$ii]['title'];
                      }else{
                        $content_value = '';
                      }
                    ?>
                    <!-- <input name="content[]" type="text" class="form-control required" id="bookContent<?php echo $i?>"> -->
                      
                    <?php if ($i<=5):?>
                    <div>
                    <?php else:?>
                    <div class="hidden">
                    <?php endif;?>
                      <label for="bookContent1" class="col-sm-1"><?php echo $i?>,</label>
                      <div class="col-sm-11 content-input-field">
                      <?php echo $this->Form->input("Book.content.{$i}",
                        array('id'=>'bookContent'.$i,'label' => false,'class'=>'form-control required','value'=>$content_value)); 
                      ?>
                      </div>
                    </div>

                    <!-- <br/> -->

                  <?php endfor;?>

                  <div id="book-content-add">
                  <input type="button" id="add" class="btn btn-default" value="Add Content"><br>
                  </div>
                  
                  <br>
                  <p class="help-block"><?php echo __("Result Announcement"); ?>
                    <a rel="popover" data-trigger="hover" data-placement="top" data-content="<?php echo __("Source of the results Where is? Selection and enter."); ?>">
                    <i class="fa fa-question-circle"></i>
                  </a>
                  </p>
                  <?php echo $this->Form->select('announcement',$announcement,
                    array('class'=>'form-control','id'=>'result-select','empty'=>false,'selected'=>$new_book['Book']['announcement_type'])); 
                  ?>

                  <br>
                  <p id="change" class="help-block"></p>
                  <?php echo $this->Form->input('announcementName',array('label' => false,'class'=>'form-control','value'=>$new_book['Book']['announcement_name'])); ?>

                </div>
                <div class="form-group col-xs-10">

                  <p class="help-block"><?php echo __("Result Announcement detail"); ?>
                    <a rel="popover" data-trigger="hover" data-placement="top" data-content="<?php echo __("Enter the details about this result announcement.can not use HTML tags. URL will be automatically linked."); ?>">
                    <i class="fa fa-question-circle"></i>
                  </a>
                  </p>
                  <?php echo $this->Form->input('announcementDetail',
                    array('label' => false,'class'=>'form-control','rows'=>'4','type'=>'textarea','value'=>$new_book['Book']['announcement'])); 
                  ?>
                  
                </div>
                <div class="form-group col-xs-10">
                  <p class="help-block"><?php echo __("Bet Start"); ?><span>*</span>
                    <a rel="popover" data-trigger="hover" data-placement="top" data-content="<?php echo __("Please select the date and time when the Bet is started. Selected in 5-minute intervals. Fields are required."); ?>">
                    <i class="fa fa-question-circle"></i>
                  </a>
                  </p>
                  <div class="input-group date form_date col-xs-7" data-date="" data-date-format="yyyy-mm-dd" data-link-field="betStartDate" data-link-format="yyyy-mm-dd">
                      <!-- <input class="form-control" name="betStartDate" id="betStartDate" size="16" type="text" value="" readonly> -->
                      <?php echo $this->Form->input('betStartDate',array('label' => false,'class'=>'form-control','id'=>'betStartDate','size'=>'16','readonly')); ?>
                      <!-- <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span> -->
                     <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
                  <input type="hidden" id="betStartDate" value="" />

                  <div class="input-group date form_time col-xs-5" data-date="" data-date-format="hh:ii" data-link-field="betStartTime" data-link-format="hh:ii">
                    <!-- <input class="form-control" name="betStartTime" id="betStartTime" size="16" type="text" value="" readonly> -->
                    <?php echo $this->Form->input('betStartTime',array('label' => false,'class'=>'form-control','id'=>'betStartTime','size'=>'16','readonly')); ?>
                    <!-- <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span> -->
                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                  </div>
                  <input type="hidden" id="betStartTime" value="" />
                  <?php if(isset($errors) && isset($errors['bet_start'])):?>
                    <div class="error-message"><?php echo $errors['bet_start'][0]?></div>
                  <?php endif;?>
              </div>
              <div class="form-group col-xs-10">
                  
                  <p class="help-block"><?php echo __("Bet Finish"); ?><span>*</span>
                    <a rel="popover" data-trigger="hover" data-placement="top" data-content="<?php echo __("Please select the date and time that Bet is finished. 5 minute intervals. Required fields. You can not select a date and time in the past than Bet start."); ?>">
                    <i class="fa fa-question-circle"></i>
                  </a>
                  </p>
                  <div class="input-group date form_date col-xs-7" data-date="" data-date-format="yyyy-mm-dd" data-link-field="betFinishDate" data-link-format="yyyy-mm-dd">
                      <!-- <input class="form-control" name="betFinishDate" id="betFinishDate" size="16" type="text" value="" readonly> -->
                    <?php echo $this->Form->input('betFinishDate',array('label' => false,'class'=>'form-control','id'=>'betFinishDate','size'=>'16','readonly')); ?>
                      <!-- <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span> -->
                     <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
                  <input type="hidden" id="betFinishDate" value="" />
                  <div class="input-group date form_time col-xs-5" data-date="" data-date-format="hh:ii" data-link-field="betFinishTime" data-link-format="hh:ii">
                    <!-- <input class="form-control" name="betFinishTime" id="betFinishTime" size="16" type="text" value="" readonly> -->
                    <?php echo $this->Form->input('betFinishTime',array('label' => false,'class'=>'form-control','id'=>'betFinishTime','size'=>'16','readonly')); ?>
                    <!-- <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span> -->
                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                  </div>
                  <input type="hidden" id="betFinishTime" value="" />
                  <?php if(isset($errors) && isset($errors['bet_finish'])):?>
                    <div class="error-message"><?php echo $errors['bet_finish'][0]?></div>
                  <?php endif;?>
              </div>
              <div class="form-group col-xs-10">

                  <p class="help-block"><?php echo __("Result Annoucement Time"); ?><span>*</span>
                    <a rel="popover" data-trigger="hover" data-placement="top" data-content="<?php echo __("Select the scheduled date and time to announce the results. 5 minute intervals. Required fields. You can not select a date and time in the past than Bet Finish."); ?>">
                    <i class="fa fa-question-circle"></i>
                  </a>
                  </p>
                  <div class="input-group date form_date col-xs-7" data-date="" data-date-format="yyyy-mm-dd" data-link-field="betResultDate" data-link-format="yyyy-mm-dd">
                      <!-- <input class="form-control" name="betResultDate" id="betResultDate" size="16" type="text" value="" readonly> -->
                    <?php echo $this->Form->input('betResultDate',array('label' => false,'class'=>'form-control','id'=>'betResultDate','size'=>'16','readonly')); ?>
                      <!-- <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span> -->
                     <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
                  <input type="hidden" id="betResultDate" value="" />
                  <div class="input-group date form_time col-xs-5" data-date="" data-date-format="hh:ii" data-link-field="betResultTime" data-link-format="hh:ii">
                    <!-- <input class="form-control" name="betResultTime" id="betResultTime" size="16" type="text" value="" readonly> -->
                    <?php echo $this->Form->input('betResultTime',array('label' => false,'class'=>'form-control','id'=>'betResultTime','size'=>'16','readonly')); ?>
                    <!-- <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span> -->
                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                  </div>
                  <input type="hidden" id="betResultTime" value="" />
                  <?php if(isset($errors) && isset($errors['result_time'])):?>
                    <div class="error-message"><?php echo $errors['result_time'][0]?></div>
                  <?php endif;?>
              </div>

              <!--
              <div class="form-group col-xs-6">
                  <p class="help-block">Time Zone
                    <a rel="popover" data-content="Select the time zone to be a reference.">
                    <i class="fa fa-question-circle"></i>
                  </a>
                  </p>

                    <?php echo $this->Form->select('time_zone',$timezone,array('class'=>'form-control','empty'=>false)); ?>
              </div>
              -->

              <div class="form-group col-xs-10">
                  <p class="help-block"><?php echo __("Book Detail"); ?>
                    <a rel="popover" data-trigger="hover" data-placement="top" data-content="<?php echo __("Please enter the details of this book. can not use HTML tags. URL will be automatically linked."); ?>">
                    <i class="fa fa-question-circle"></i>
                  </a>
                  </p>
                  <!-- <textarea name="bookDetail" class="form-control" rows="4"></textarea> -->
                  <?php echo $this->Form->input('bookDetail',
                    array('label' => false,'class'=>'form-control','rows'=>'4','type'=>'textarea','value'=>$new_book['Book']['details'])); 
                  ?>

              </div>
              <div class="form-group col-xs-6">
                  <p class="help-block"><?php echo __("Category"); ?>
                  <a rel="popover" data-trigger="hover" data-placement="top" data-content="<?php echo __("Please select the category of this book."); ?>">
                    <i class="fa fa-question-circle"></i>
                  </a>
                  </p>
                  <?php echo $this->Form->select('category',$category,
                    array('class'=>'form-control','id'=>'result-select','empty'=>false,'selected'=>$new_book['Book']['category'])); 
                  ?>

              </div>
              
              </div>
              <!-- <button id="make-book" class="btn btn-primary" data-toggle="modal">Make Book</button> -->
              <button  onclick="$('#Omissions').modal('show')"  id="make-book" class="btn btn-primary" >Make Book</button>

            <?php echo $this->Form->end();?>
          </div>


<!-- Modal -->
<div class="modal fade" id="makeBook" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center" id="myModalLabel">Make Book</h4>
      </div>
      <div class="modal-body">
        <p>If you want to re-create a book you must delete the old one first.
        If nobody has bet there is no penalty.</p>
        <p>You can re-create a book as many times as you like.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Make</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal -->
<div class="modal fade" id="Omissions" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-body">
        <p>If you want to re-create a book you must delete the old one first.
        If nobody has bet there is no penalty.</p>
        <p>You can re-create a book as many times as you like.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  onclick="$('form').trigger('submit')">Make</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    <!-- The Scripts -->

    <script>
      $(document).ready(function(){
          $('.form_date').datetimepicker({
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0,
            startDate: new Date()
          });
          $('.form_time').datetimepicker({ 
            //weekStart: 1,
            todayBtn:  0,
            autoclose: 1,
            todayHighlight: 1,
            startView: 1,
            minView: 0,
            maxView: 1,
            forceParse: 0
            //startDate: new Date()
          });
      });
    </script>