<?php $language = array('en'=>'English','ja'=>'Japanese')?>
<div class="theprofile">
            <h2>Profile - [Edit]</h2>
            <?php echo $this->element("user_profile_bar"); ?>
            <span class="clearfix"></span>

            <?php echo $this->Form->create('User',array('class'=>'well', 'type'=>'put'))?>
            <?php echo $this->Form->hidden('id',array('value'=>$data['User']['id']))?>
                <p class="help-block">Profile
                  <a rel="popover" data-content="Please enter the details of Profile. can not use HTML tags. URL will be automatically linked.">
                    <i class="fa fa-question-circle"></i>
                  </a>
                </p>
                <div class="form-group">
                  <?php echo $this->Form->input('profile',array('label' => false,'class'=>'form-control','rows'=>"7",'value'=>$data['User']['profile'])); ?>
                </div>
              <div class="row">
                <p class="help-block">Screen Name <span>*</span>
                  <a rel="popover" data-content="Can change the name that is displayed. You can not change the name that is being used.">
                    <i class="fa fa-question-circle"></i>
                  </a>
                </p>
                <div class="form-group col-xs-4">
                  <?php echo $this->Form->input('name',array('label' => false,'class'=>'form-control','placeholder'=>"Screen Name",'value'=>$data['User']['name'])); ?>
                </div>
              </div>
              <div class="row">
                
                <p class="help-block">Default Bet rate <span>*</span>
                  <a rel="popover" data-content="Can change the number of points that have been pre-entered in Bet window.">
                    <i class="fa fa-question-circle"></i>
                  </a>
                </p>
                <div class="form-group col-xs-2">
                  <?php echo $this->Form->input('default_rate',array('label' => false,'class'=>'form-control','type'=>"number",'maxlength'=>4,'min'=>1,'value'=>$data['User']['default_rate'])); ?>
                  <!-- <input type="number" class="form-control" maxlength="4"> -->
                </div>
              </div>

              <!--
              <div class="row">
                  <p class="help-block">Time Zone</p>
                  <div class="form-group col-xs-6">
                    <?php echo $this->Form->select('time_zone',$timezone,array('class'=>'form-control','empty'=>false,'value'=>$data['User']['time_zone'])); ?>

                </div>
              </div>

              <div class="row">
                  <p class="help-block">Language</p>
                <div class="form-group col-xs-5">
                  <?php echo $this->Form->select('language',$language,array('class'=>'form-control','empty'=>false,'value'=>$data['User']['language'])); ?>
                </div>
              </div>
              -->

              <div class="row">
                  <p class="help-block">e-mail</p>
                  <div class="form-group col-xs-5">
                    <?php echo $this->Form->input('mail',array('label' => false,'class'=>'form-control','type'=>'email','value'=>$data['User']['mail'])); ?>
                  </div>
              </div>
              <div class="checkbox">
               
                <label>
                  <?php echo  $this->Form->checkbox('facebook_link_hide',array('checked'=>$data['User']['facebook_link_hide']))?> <span class="help-block">Show a Facebook Link</span>
                </label>
                <!--
                <label>
                  <?php echo  $this->Form->checkbox('wallPost')?> <span class="help-block">Post a facebook wall</span>
                </label>
                <label>
                  <?php echo  $this->Form->checkbox('sendEmail')?> <span class="help-block">Send information in e-mail</span>
                </label>
                -->
              </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            <?php echo $this->Form->end();?>

          </div>