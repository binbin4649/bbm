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
?>

          <form class="home-search form-inline" role="form">

            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <div class="form-group">
              <select class="form-control">
                <option>Category</option>
                <option>Sports</option>
                <option>Others</option>
              </select>
            </div>
            <div class="form-group">
              <select class="form-control">
                <option>State</option>
                <option>Up Coming</option>
                <option>Bet Now</option>
                <option>Bet Finish</option>
                <option>Result</option>
                <option>Book Delete</option>
                <option>Result Timeover</option>
              </select>
            </div>
            <button type="submit" class="btn btn-default">Search</button>
            <span class="help-block">Search Condition: xxx xxx xxx</span>
          </form><!--End of form -->

          
          <div class="home-entry col-xs-12">
            <h2><a href="book-upcoming.html">EXSAMPLE Title EXSAMPLE Title SAMPLE TITLE</a></h2>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon2.png'); ?>:012345</span>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon1.png'); ?>:0123456789</span>
            <span class="badge-state">Up coming</span>
            <span class="badge-category">Sports</span>
            <p><a href="profile-home.html">Created:2013/08/07 17:57 hideichi_saito</a></p>
            <p>Bet Start:2013/08/07 20:00  Bet Finsh:2013/08/07 21:00  Result:2013/08/07 23:30</p>
          </div>
          <div class="home-entry col-xs-12">
            <h2><a href="book-betnow.html">EXSAMPLE Title EXSAMPLE Title SAMPLE TITLE</a></h2>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon2.png'); ?>:012345</span>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon1.png'); ?>:0123456789</span>
            <span class="badge-state">Bet Now</span>
            <span class="badge-category">Sports</span>
            <p><a href="profile-home.html">Created:2013/08/07 17:57 hideichi_saito</a></p>
            <p>Bet Start:2013/08/07 20:00  Bet Finsh:2013/08/07 21:00  Result:2013/08/07 23:30</p>
          </div>
          <div class="home-entry col-xs-12">
            <h2><a href="book-betfinish.html">EXSAMPLE Title EXSAMPLE Title SAMPLE TITLE</a></h2>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon2.png'); ?>:012345</span>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon1.png'); ?>:0123456789</span>
            <span class="badge-state">Bet Finish</span>
            <span class="badge-category">Sports</span>
            <p><a href="profile-home.html">Created:2013/08/07 17:57 hideichi_saito</a></p>
            <p>Bet Start:2013/08/07 20:00  Bet Finsh:2013/08/07 21:00  Result:2013/08/07 23:30</p>
          </div>
          <div class="home-entry col-xs-12">
            <h2><a href="book-result.html">EXSAMPLE Title EXSAMPLE Title SAMPLE TITLE</a></h2>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon2.png'); ?>:012345</span>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon1.png'); ?>:0123456789</span>
            <span class="badge-state">Result</span>
            <span class="badge-category">Sports</span>
            <p><a href="profile-home.html">Created:2013/08/07 17:57 hideichi_saito</a></p>
            <p>Bet Start:2013/08/07 20:00  Bet Finsh:2013/08/07 21:00  Result:2013/08/07 23:30</p>
          </div>
          <div class="home-entry col-xs-12">
            <h2><a href="book-delete.html">EXSAMPLE Title EXSAMPLE Title SAMPLE TITLE</a></h2>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon2.png'); ?>:012345</span>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon1.png'); ?>:0123456789</span>
            <span class="badge-state">Book Delete</span>
            <span class="badge-category">Sports</span>
            <p><a href="profile-home.html">Created:2013/08/07 17:57 hideichi_saito</a></p>
            <p>Bet Start:2013/08/07 20:00  Bet Finsh:2013/08/07 21:00  Result:2013/08/07 23:30</p>
          </div>
          <div class="home-entry col-xs-12">
            <h2><a href="book-timeover.html">EXSAMPLE Title EXSAMPLE Title SAMPLE TITLE</a></h2>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon2.png'); ?>:012345</span>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon1.png'); ?>:0123456789</span>
            <span class="badge-state">Result Timeover</span>
            <span class="badge-category">Sports</span>
            <p><a href="profile-home.html">Created:2013/08/07 17:57 hideichi_saito</a></p>
            <p>Bet Start:2013/08/07 20:00  Bet Finsh:2013/08/07 21:00  Result:2013/08/07 23:30</p>
          </div>
          <div class="home-entry col-xs-12">
            <h2><a href="book-betnow.html">EXSAMPLE Title EXSAMPLE Title SAMPLE TITLE</a></h2>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon2.png'); ?>:012345</span>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon1.png'); ?>:0123456789</span>
            <span class="badge-state">Bet Now</span>
            <span class="badge-category">Sports</span>
            <p><a href="profile-home.html">Created:2013/08/07 17:57 hideichi_saito</a></p>
            <p>Bet Start:2013/08/07 20:00  Bet Finsh:2013/08/07 21:00  Result:2013/08/07 23:30</p>
          </div>
          <div class="home-entry col-xs-12">
            <h2><a href="book-betnow.html">EXSAMPLE Title EXSAMPLE Title SAMPLE TITLE</a></h2>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon2.png'); ?>:012345</span>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon1.png'); ?>:0123456789</span>
            <span class="badge-state">Bet Now</span>
            <span class="badge-category">Sports</span>
            <p><a href="profile-home.html">Created:2013/08/07 17:57 hideichi_saito</a></p>
            <p>Bet Start:2013/08/07 20:00  Bet Finsh:2013/08/07 21:00  Result:2013/08/07 23:30</p>
          </div>
          <div class="home-entry col-xs-12">
            <h2><a href="book-betnow.html">EXSAMPLE Title EXSAMPLE Title SAMPLE TITLE</a></h2>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon2.png'); ?>:012345</span>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon1.png'); ?>:0123456789</span>
            <span class="badge-state">Bet Now</span>
            <span class="badge-category">Sports</span>
            <p><a href="profile-home.html">Created:2013/08/07 17:57 hideichi_saito</a></p>
            <p>Bet Start:2013/08/07 20:00  Bet Finsh:2013/08/07 21:00  Result:2013/08/07 23:30</p>
          </div>
          <div class="home-entry col-xs-12">
            <h2><a href="book-betnow.html">EXSAMPLE Title EXSAMPLE Title SAMPLE TITLE</a></h2>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon2.png'); ?>:012345</span>
            <span class="entry-icons"><?php echo $this->Html->image('/img/icon1.png'); ?>:0123456789</span>
            <span class="badge-state">Bet Now</span>
            <span class="badge-category">Sports</span>
            <p><a href="profile-home.html">Created:2013/08/07 17:57 hideichi_saito</a></p>
            <p>Bet Start:2013/08/07 20:00  Bet Finsh:2013/08/07 21:00  Result:2013/08/07 23:30</p>
          </div>

          <span class="clearfix"></span>
          
          <div class="pagination-wrap">
            <ul class="pagination pagination-lg">
              <li><a href="#">&laquo;</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">6</a></li>
              <li><a href="#">7</a></li>
              <li><a href="#">8</a></li>
              <li><a href="#">9</a></li>
              <li><a href="#">&raquo;</a></li>
            </ul>
          </div>
      
