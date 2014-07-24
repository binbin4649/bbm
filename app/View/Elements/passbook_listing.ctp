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
	  <td><a href="#"><?php echo $passval['Passbook']['event']; ?> </a></td>
	</tr>
  <?php } ?>
	
  </tbody>
</table>