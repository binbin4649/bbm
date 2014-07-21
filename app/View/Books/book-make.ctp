          <div class="thebook">
            <h2>Make Book</h2>
            <!-- <form class="well" method="POST"> -->
            <?php echo $this->Form->create(array('class'=>'well')); ?>

              <div class="row">
                <div class="form-group col-xs-10">
                  <p class="help-block">Book Title <span>*</span>
                  <a rel="popover" data-content="Please enter the title of the book. Max 84 characters and required.">
                    <i class="fa fa-question-circle"></i>
                  </a>
                  </p>
                  <!-- <input name="title" id="book-title" type="text" class="form-control required" maxlength="84"> -->
                    <?php echo $this->Form->input('title',array('id'=>'book-title','label' => false,'class'=>'form-control required','maxlength'=>"84")); ?>

                </div>
              </div>
              <div class="row">
                <div class="form-group col-xs-8" id="book-content-list">
                  <p class="help-block">Book Content <span>*</span>
                    <a rel="popover" data-content="Please enter the contents of the book. At least two are required.To 45 characters.This increases the five pressing the add content. 10 is the maximum.">
                    <i class="fa fa-question-circle"></i>
                  </a>
                  </p>
                  <?php if(isset($errors) && isset($errors['content'])):?>
                    <div class="error-message"><?php echo $errors['content'][0]?></div>
                  <?php endif;?>

                  <?php for($i=1;$i<=10;$i++):?>

                    <!-- <input name="content[]" type="text" class="form-control required" id="bookContent<?php echo $i?>"> -->
                      
                    <?php if ($i<=5):?>
                    <div>
                    <?php else:?>
                    <div class="hidden">
                    <?php endif;?>
                      <label for="bookContent1" class="col-sm-1"><?php echo $i?>,</label>
                      <div class="col-sm-11 content-input-field">
                      <?php echo $this->Form->input("Book.content.{$i}",array('id'=>'bookContent'.$i,'label' => false,'class'=>'form-control required')); ?>
                      </div>
                    </div>

                    <!-- <br/> -->

                  <?php endfor;?>
                   <!--  <label for="bookContent1" class="col-sm-1">1,</label>
                    <div class="col-sm-11"><input name="content[]" type="text" class="form-control required" id="bookContent1"><br></div>
                    <label for="bookContent2" class="col-sm-1">2,</label>
                    <div class="col-sm-11"><input name="content[]" type="text" class="form-control required" id="bookContent2"><br></div>
                    <label for="bookConten3" class="col-sm-1">3,</label>
                    <div class="col-sm-11"><input name="content[]" type="text" class="form-control required" id="bookContent3"><br></div>
                    <label for="bookConten4" class="col-sm-1">4,</label>
                    <div class="col-sm-11"><input name="content[]" type="text" class="form-control required" id="bookContent4"><br></div>
                    <div id="book-content">
                      <label for="bookConten5" class="col-sm-1">5,</label>
                      <div class="col-sm-11"><input name="content[]" type="text" class="form-control required" id="bookContent5"><br></div>
                    </div> -->
                  <div id="book-content-add">
                  <input type="button" id="add" class="btn btn-default" value="Add Content"><br>
                  </div>
                  
                  <br>
                  <p class="help-block">Result Announcement
                    <a rel="popover" data-content="Source of the results Where is? Selection and enter.">
                    <i class="fa fa-question-circle"></i>
                  </a>
                  </p>
<?php
  $announcement = array(
                'URL'=>'Look at the Website',
                'TV Program Name'=>'Look at the TV',
                'Radio Program Name'=>'Radio',
                'Annoucement name'=>'Other'
                );
?>
                  <?php echo $this->Form->select('announcement',$announcement,array('class'=>'form-control','id'=>'result-select','empty'=>false)); ?>
                  <!-- <select name="announcement" id="result-select" class="form-control">
                    <option value="URL">Look at the Website</option>
                    <option value="TV Program Name">Look at the TV</option>
                    <option value="Radio Program Name">Radio</option>
                    <option value="Annoucement name">Other</option>
                  </select> -->
                  <br>
                  <p id="change" class="help-block"></p>
                  <!-- <input name="announcementName" type="text" class="form-control"> -->
                  <?php echo $this->Form->input('announcementName',array('label' => false,'class'=>'form-control')); ?>

                </div>
                <div class="form-group col-xs-10">

                  <p class="help-block">Result Announcement detail
                    <a rel="popover" data-content="Enter the details about this result announcement.can not use HTML tags. URL will be automatically linked.">
                    <i class="fa fa-question-circle"></i>
                  </a>
                  </p>
                  <?php echo $this->Form->input('announcementDetail',array('label' => false,'class'=>'form-control','rows'=>'4','type'=>'textarea')); ?>
                  <!-- <textarea  name="announcementDetail" class="form-control" rows="4"></textarea> -->
                  
                </div>
                <div class="form-group col-xs-10">
                  <p class="help-block">Bet Start <span>*</span>
                    <a rel="popover" data-content="Please select the date and time when the Bet is started. Selected in 5-minute intervals. Fields are required.">
                    <i class="fa fa-question-circle"></i>
                  </a>
                  </p>
                  <div class="input-group date form_date col-xs-7" data-date="" data-date-format="yyyy-mm-dd" data-link-field="betStartDate" data-link-format="yyyy-mm-dd">
                      <!-- <input class="form-control" name="betStartDate" id="betStartDate" size="16" type="text" value="" readonly> -->
                      <?php echo $this->Form->input('betStartDate',array('label' => false,'class'=>'form-control','id'=>'betStartDate','size'=>'16','readonly')); ?>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                     <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
                  <input type="hidden" id="betStartDate" value="" />

                  <div class="input-group date form_time col-xs-5" data-date="" data-date-format="hh:ii" data-link-field="betStartTime" data-link-format="hh:ii">
                    <!-- <input class="form-control" name="betStartTime" id="betStartTime" size="16" type="text" value="" readonly> -->
                    <?php echo $this->Form->input('betStartTime',array('label' => false,'class'=>'form-control','id'=>'betStartTime','size'=>'16','readonly')); ?>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                  </div>
                  <input type="hidden" id="betStartTime" value="" />
                  <?php if(isset($errors) && isset($errors['bet_start'])):?>
                    <div class="error-message"><?php echo $errors['bet_start'][0]?></div>
                  <?php endif;?>
              </div>
              <div class="form-group col-xs-10">
                  
                  <p class="help-block">Bet Finish <span>*</span>
                    <a rel="popover" data-content="Please select the date and time that Bet is finished. 5 minute intervals. Required fields. You can not select a date and time in the past than Bet start.">
                    <i class="fa fa-question-circle"></i>
                  </a>
                  </p>
                  <div class="input-group date form_date col-xs-7" data-date="" data-date-format="yyyy-mm-dd" data-link-field="betFinishDate" data-link-format="yyyy-mm-dd">
                      <!-- <input class="form-control" name="betFinishDate" id="betFinishDate" size="16" type="text" value="" readonly> -->
                    <?php echo $this->Form->input('betFinishDate',array('label' => false,'class'=>'form-control','id'=>'betFinishDate','size'=>'16','readonly')); ?>

                      <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                     <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
                  <input type="hidden" id="betFinishDate" value="" />
                  <div class="input-group date form_time col-xs-5" data-date="" data-date-format="hh:ii" data-link-field="betFinishTime" data-link-format="hh:ii">
                    <!-- <input class="form-control" name="betFinishTime" id="betFinishTime" size="16" type="text" value="" readonly> -->
                    <?php echo $this->Form->input('betFinishTime',array('label' => false,'class'=>'form-control','id'=>'betFinishTime','size'=>'16','readonly')); ?>

                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                  </div>
                  <input type="hidden" id="betFinishTime" value="" />
                  <?php if(isset($errors) && isset($errors['bet_finish'])):?>
                    <div class="error-message"><?php echo $errors['bet_finish'][0]?></div>
                  <?php endif;?>
              </div>
              <div class="form-group col-xs-10">

                  <p class="help-block">Result Annoucement Time <span>*</span>
                    <a rel="popover" data-content="Select the scheduled date and time to announce the results. 5 minute intervals. Required fields. You can not select a date and time in the past than Bet Finish.">
                    <i class="fa fa-question-circle"></i>
                  </a>
                  </p>
                  <div class="input-group date form_date col-xs-7" data-date="" data-date-format="yyyy-mm-dd" data-link-field="betResultDate" data-link-format="yyyy-mm-dd">
                      <!-- <input class="form-control" name="betResultDate" id="betResultDate" size="16" type="text" value="" readonly> -->
                    <?php echo $this->Form->input('betResultDate',array('label' => false,'class'=>'form-control','id'=>'betResultDate','size'=>'16','readonly')); ?>

                      <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                     <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
                  <input type="hidden" id="betResultDate" value="" />
                  <div class="input-group date form_time col-xs-5" data-date="" data-date-format="hh:ii" data-link-field="betResultTime" data-link-format="hh:ii">
                    <!-- <input class="form-control" name="betResultTime" id="betResultTime" size="16" type="text" value="" readonly> -->
                    <?php echo $this->Form->input('betResultTime',array('label' => false,'class'=>'form-control','id'=>'betResultTime','size'=>'16','readonly')); ?>

                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                  </div>
                  <input type="hidden" id="betResultTime" value="" />
              </div>

              <div class="form-group col-xs-6">
                  <p class="help-block">Time Zone
                    <a rel="popover" data-content="Select the time zone to be a reference.">
                    <i class="fa fa-question-circle"></i>
                  </a>
                  </p>

<select name="timeZone" class="form-control">
  <option timeZoneId="1" gmtAdjustment="GMT-12:00" useDaylightTime="0" value="-12">(GMT-12:00) International Date Line West</option>
  <option timeZoneId="2" gmtAdjustment="GMT-11:00" useDaylightTime="0" value="-11">(GMT-11:00) Midway Island, Samoa</option>
  <option timeZoneId="3" gmtAdjustment="GMT-10:00" useDaylightTime="0" value="-10">(GMT-10:00) Hawaii</option>
  <option timeZoneId="4" gmtAdjustment="GMT-09:00" useDaylightTime="1" value="-9">(GMT-09:00) Alaska</option>
  <option timeZoneId="5" gmtAdjustment="GMT-08:00" useDaylightTime="1" value="-8">(GMT-08:00) Pacific Time (US & Canada)</option>
  <option timeZoneId="6" gmtAdjustment="GMT-08:00" useDaylightTime="1" value="-8">(GMT-08:00) Tijuana, Baja California</option>
  <option timeZoneId="7" gmtAdjustment="GMT-07:00" useDaylightTime="0" value="-7">(GMT-07:00) Arizona</option>
  <option timeZoneId="8" gmtAdjustment="GMT-07:00" useDaylightTime="1" value="-7">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
  <option timeZoneId="9" gmtAdjustment="GMT-07:00" useDaylightTime="1" value="-7">(GMT-07:00) Mountain Time (US & Canada)</option>
  <option timeZoneId="10" gmtAdjustment="GMT-06:00" useDaylightTime="0" value="-6">(GMT-06:00) Central America</option>
  <option timeZoneId="11" gmtAdjustment="GMT-06:00" useDaylightTime="1" value="-6">(GMT-06:00) Central Time (US & Canada)</option>
  <option timeZoneId="12" gmtAdjustment="GMT-06:00" useDaylightTime="1" value="-6">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
  <option timeZoneId="13" gmtAdjustment="GMT-06:00" useDaylightTime="0" value="-6">(GMT-06:00) Saskatchewan</option>
  <option timeZoneId="14" gmtAdjustment="GMT-05:00" useDaylightTime="0" value="-5">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
  <option timeZoneId="15" gmtAdjustment="GMT-05:00" useDaylightTime="1" value="-5">(GMT-05:00) Eastern Time (US & Canada)</option>
  <option timeZoneId="16" gmtAdjustment="GMT-05:00" useDaylightTime="1" value="-5">(GMT-05:00) Indiana (East)</option>
  <option timeZoneId="17" gmtAdjustment="GMT-04:00" useDaylightTime="1" value="-4">(GMT-04:00) Atlantic Time (Canada)</option>
  <option timeZoneId="18" gmtAdjustment="GMT-04:00" useDaylightTime="0" value="-4">(GMT-04:00) Caracas, La Paz</option>
  <option timeZoneId="19" gmtAdjustment="GMT-04:00" useDaylightTime="0" value="-4">(GMT-04:00) Manaus</option>
  <option timeZoneId="20" gmtAdjustment="GMT-04:00" useDaylightTime="1" value="-4">(GMT-04:00) Santiago</option>
  <option timeZoneId="21" gmtAdjustment="GMT-03:30" useDaylightTime="1" value="-3.5">(GMT-03:30) Newfoundland</option>
  <option timeZoneId="22" gmtAdjustment="GMT-03:00" useDaylightTime="1" value="-3">(GMT-03:00) Brasilia</option>
  <option timeZoneId="23" gmtAdjustment="GMT-03:00" useDaylightTime="0" value="-3">(GMT-03:00) Buenos Aires, Georgetown</option>
  <option timeZoneId="24" gmtAdjustment="GMT-03:00" useDaylightTime="1" value="-3">(GMT-03:00) Greenland</option>
  <option timeZoneId="25" gmtAdjustment="GMT-03:00" useDaylightTime="1" value="-3">(GMT-03:00) Montevideo</option>
  <option timeZoneId="26" gmtAdjustment="GMT-02:00" useDaylightTime="1" value="-2">(GMT-02:00) Mid-Atlantic</option>
  <option timeZoneId="27" gmtAdjustment="GMT-01:00" useDaylightTime="0" value="-1">(GMT-01:00) Cape Verde Is.</option>
  <option timeZoneId="28" gmtAdjustment="GMT-01:00" useDaylightTime="1" value="-1">(GMT-01:00) Azores</option>
  <option timeZoneId="29" gmtAdjustment="GMT+00:00" useDaylightTime="0" value="0">(GMT+00:00) Casablanca, Monrovia, Reykjavik</option>
  <option timeZoneId="30" gmtAdjustment="GMT+00:00" useDaylightTime="1" value="0">(GMT+00:00) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London</option>
  <option timeZoneId="31" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
  <option timeZoneId="32" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1">(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
  <option timeZoneId="33" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
  <option timeZoneId="34" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1">(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
  <option timeZoneId="35" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1">(GMT+01:00) West Central Africa</option>
  <option timeZoneId="36" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Amman</option>
  <option timeZoneId="37" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Athens, Bucharest, Istanbul</option>
  <option timeZoneId="38" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Beirut</option>
  <option timeZoneId="39" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Cairo</option>
  <option timeZoneId="40" gmtAdjustment="GMT+02:00" useDaylightTime="0" value="2">(GMT+02:00) Harare, Pretoria</option>
  <option timeZoneId="41" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius</option>
  <option timeZoneId="42" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Jerusalem</option>
  <option timeZoneId="43" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Minsk</option>
  <option timeZoneId="44" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Windhoek</option>
  <option timeZoneId="45" gmtAdjustment="GMT+03:00" useDaylightTime="0" value="3">(GMT+03:00) Kuwait, Riyadh, Baghdad</option>
  <option timeZoneId="46" gmtAdjustment="GMT+03:00" useDaylightTime="1" value="3">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
  <option timeZoneId="47" gmtAdjustment="GMT+03:00" useDaylightTime="0" value="3">(GMT+03:00) Nairobi</option>
  <option timeZoneId="48" gmtAdjustment="GMT+03:00" useDaylightTime="0" value="3">(GMT+03:00) Tbilisi</option>
  <option timeZoneId="49" gmtAdjustment="GMT+03:30" useDaylightTime="1" value="3.5">(GMT+03:30) Tehran</option>
  <option timeZoneId="50" gmtAdjustment="GMT+04:00" useDaylightTime="0" value="4">(GMT+04:00) Abu Dhabi, Muscat</option>
  <option timeZoneId="51" gmtAdjustment="GMT+04:00" useDaylightTime="1" value="4">(GMT+04:00) Baku</option>
  <option timeZoneId="52" gmtAdjustment="GMT+04:00" useDaylightTime="1" value="4">(GMT+04:00) Yerevan</option>
  <option timeZoneId="53" gmtAdjustment="GMT+04:30" useDaylightTime="0" value="4.5">(GMT+04:30) Kabul</option>
  <option timeZoneId="54" gmtAdjustment="GMT+05:00" useDaylightTime="1" value="5">(GMT+05:00) Yekaterinburg</option>
  <option timeZoneId="55" gmtAdjustment="GMT+05:00" useDaylightTime="0" value="5">(GMT+05:00) Islamabad, Karachi, Tashkent</option>
  <option timeZoneId="56" gmtAdjustment="GMT+05:30" useDaylightTime="0" value="5.5">(GMT+05:30) Sri Jayawardenapura</option>
  <option timeZoneId="57" gmtAdjustment="GMT+05:30" useDaylightTime="0" value="5.5">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
  <option timeZoneId="58" gmtAdjustment="GMT+05:45" useDaylightTime="0" value="5.75">(GMT+05:45) Kathmandu</option>
  <option timeZoneId="59" gmtAdjustment="GMT+06:00" useDaylightTime="1" value="6">(GMT+06:00) Almaty, Novosibirsk</option>
  <option timeZoneId="60" gmtAdjustment="GMT+06:00" useDaylightTime="0" value="6">(GMT+06:00) Astana, Dhaka</option>
  <option timeZoneId="61" gmtAdjustment="GMT+06:30" useDaylightTime="0" value="6.5">(GMT+06:30) Yangon (Rangoon)</option>
  <option timeZoneId="62" gmtAdjustment="GMT+07:00" useDaylightTime="0" value="7">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
  <option timeZoneId="63" gmtAdjustment="GMT+07:00" useDaylightTime="1" value="7">(GMT+07:00) Krasnoyarsk</option>
  <option timeZoneId="64" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
  <option timeZoneId="65" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8">(GMT+08:00) Kuala Lumpur, Singapore</option>
  <option timeZoneId="66" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
  <option timeZoneId="67" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8">(GMT+08:00) Perth</option>
  <option timeZoneId="68" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8">(GMT+08:00) Taipei</option>
  <option timeZoneId="69" gmtAdjustment="GMT+09:00" useDaylightTime="0" value="9">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
  <option timeZoneId="70" gmtAdjustment="GMT+09:00" useDaylightTime="0" value="9">(GMT+09:00) Seoul</option>
  <option timeZoneId="71" gmtAdjustment="GMT+09:00" useDaylightTime="1" value="9">(GMT+09:00) Yakutsk</option>
  <option timeZoneId="72" gmtAdjustment="GMT+09:30" useDaylightTime="0" value="9.5">(GMT+09:30) Adelaide</option>
  <option timeZoneId="73" gmtAdjustment="GMT+09:30" useDaylightTime="0" value="9.5">(GMT+09:30) Darwin</option>
  <option timeZoneId="74" gmtAdjustment="GMT+10:00" useDaylightTime="0" value="10">(GMT+10:00) Brisbane</option>
  <option timeZoneId="75" gmtAdjustment="GMT+10:00" useDaylightTime="1" value="10">(GMT+10:00) Canberra, Melbourne, Sydney</option>
  <option timeZoneId="76" gmtAdjustment="GMT+10:00" useDaylightTime="1" value="10">(GMT+10:00) Hobart</option>
  <option timeZoneId="77" gmtAdjustment="GMT+10:00" useDaylightTime="0" value="10">(GMT+10:00) Guam, Port Moresby</option>
  <option timeZoneId="78" gmtAdjustment="GMT+10:00" useDaylightTime="1" value="10">(GMT+10:00) Vladivostok</option>
  <option timeZoneId="79" gmtAdjustment="GMT+11:00" useDaylightTime="1" value="11">(GMT+11:00) Magadan, Solomon Is., New Caledonia</option>
  <option timeZoneId="80" gmtAdjustment="GMT+12:00" useDaylightTime="1" value="12">(GMT+12:00) Auckland, Wellington</option>
  <option timeZoneId="81" gmtAdjustment="GMT+12:00" useDaylightTime="0" value="12">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
  <option timeZoneId="82" gmtAdjustment="GMT+13:00" useDaylightTime="0" value="13">(GMT+13:00) Nuku'alofa</option>
</select>
              </div>

              <div class="form-group col-xs-10">
                  <p class="help-block">Book Detail
                    <a rel="popover" data-content="Please enter the details of this book. can not use HTML tags. URL will be automatically linked.">
                    <i class="fa fa-question-circle"></i>
                  </a>
                  </p>
                  <!-- <textarea name="bookDetail" class="form-control" rows="4"></textarea> -->
                  <?php echo $this->Form->input('bookDetail',array('label' => false,'class'=>'form-control','rows'=>'4','type'=>'textarea')); ?>

              </div>
              <div class="form-group col-xs-6">
                  <p class="help-block">Category
                  <a rel="popover" data-content="Please select the category of this book.">
                    <i class="fa fa-question-circle"></i>
                  </a>
                  </p>
                  <?php
                    $category = array('Sports'=>'Sports','Other'=>'Other');
                  ?>
                  <?php echo $this->Form->select('category',$category,array('class'=>'form-control','id'=>'result-select','empty'=>false)); ?>
<!-- 
                  <select name="category" class="form-control">
                    <option value="sports">Sports</option>
                    <option value="other">Other</option>
                  </select> -->
              </div>
              
              </div>
              <!-- <button id="make-book" class="btn btn-primary" data-toggle="modal">Make Book</button> -->
              <button tylpe="submit" id="make-book" class="btn btn-primary" >Make Book</button>

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
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center" id="myModalLabel">Make Book</h4>
      </div>
      <div class="modal-body">
        <p>There are omissions in the required fields</p>
        <p>Please Check</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
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
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 1,
            minView: 0,
            maxView: 1,
            forceParse: 0,
            startDate: new Date()
          });
      });
    </script>