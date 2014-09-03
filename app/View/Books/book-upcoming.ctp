<script>
$(function(){
  $('#count_down').countdowntimer({
    dateAndTime : "<?php echo date('Y/m/d H:i:s',$startTime)?>",
    size : "sm"
  });
});
</script>

<div class="book">
  <?php echo $this->element("desktop_book_detail_header"); ?>
            
            <p class="help-block">Message</p>
            <div class="sub-head">
              <div class="message col-xs-9">
                <p>Bet Start : <?php echo date('Y/m/d H:i e O',$startTime)?>  Please wait.<br>Count Down <span id="count_down"></span></p>
              </div>
              <div class="col-xs-3">
                <?php if ($book['User']['id'] == $this->Session->read('User.id')):?>
                <button class="btn btn-default btn-block btn-delete make-delete" data-toggle="modal" data-target="#Delete">Delete & Copy</button>
              <?php endif;?>
              </div>
            </div>

            <table class="book-table table table-bordered">
              <tbody>
                <?php foreach ($book['Content'] as $content):?>
                  <tr>
                    <td><?php echo $content['no'] ?></td>
                    <td>
                      <div class="title">
                        <p class="thetitle"><?php echo $content['title']?></p>
                      </div>
                      <div class="left">
                        
                      </div>
                      <div class="right">
                        
                      </div>
                    </td>
                  </tr>
                <?php endforeach;?>
                
              </tbody>
            </table>
            
  <?php echo $this->element("desktop_book_detail_footer"); ?>
            
            <div class="sns-buttons">
              <?php echo $this->element("zenback"); ?>
            </div><!--End of SNS Buttons -->

            <div class="facebook">
              
            </div><!--End of facebook-->

            <div class="twitter">
              
            </div><!--End of twitter-->

          </div>


      <!-- Modal Delete Button -->
      <div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header text-center">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Book Delete</h4>
            </div>
            <div class="modal-body">
              <p>You can delete a book. However, if you have deleted a book that has bets already placed on it the bookmaker receives a penalty. If nobody has bet yet there is no penalty.</p>
              <form>
                <div class="form-group">
                  <label>Delete Detail</label>
                  <textarea class="form-control" rows="7"></textarea>
                  <input type="hidden" class="currentContentIdOnModal">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-danger delete-book">Delete</button>
              <button type="button" class="btn btn-warning delete-copy-book">Delete & Copy</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->