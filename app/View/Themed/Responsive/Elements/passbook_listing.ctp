<table class="profile-table table">
  <thead>
	<tr>
	  <th>Date</th>
	  <th>Point</th>
	  <th>Balance</th>
	  <th>Event</th>
	</tr>
  </thead>
  <tbody>
  <?php foreach($passbooks as $passkey=>$passval) { ?>
	<tr>
	  <td><?php echo date("Y/m/d h:i",strtotime($passval['Passbook']['created'])); ?></td>
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