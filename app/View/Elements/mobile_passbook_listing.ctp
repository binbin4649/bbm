<table class="profile-table table">
  <thead>
	<tr>
	  <th width="35%">Date</th>
	  <th width="13%">Point</th>
	  <th width="30%">Balance</th>
	  <th width="22%">Event</th>
	</tr>
  </thead>
  <tbody>
  <?php foreach($passbooks as $passkey=>$passval) { ?>
	<tr>
	  <td  class="tuika_date"><?php echo date("Y/m/d h:i",strtotime($passval['Passbook']['created'])); ?></td>
	  <td><?php echo $passval['Passbook']['point']; ?></td>
	  <td><?php echo $passval['Passbook']['balance']; ?> </td>
	  <td>
	  <?php
	  $events = array('bet','win','return','reward');
	  if(in_array($passval['Passbook']['event'], $events)){
	  	echo '<a href="/books/'.$passval['Passbook']['book_id'].'">'.$passval['Passbook']['event'].'</a>';
	  }else{
	  	echo $passval['Passbook']['event'];
	  }
	  ?>
	  </td>
	</tr>
  <?php } ?>
	
  </tbody>
</table>