<table class="profile-table table">
  <thead>
	<tr>
	  <th>Date</th>
	  <th>Book</th>
	  <th>Bet</th>
	  <th>Result</th>
	</tr>
  </thead>
  <tbody>
  <?php foreach($betlists as $betkey=>$betval) { ?>
	<tr>
	  <td><?php echo date("Y/m/d h:i",strtotime($betval['Bet']['created'])); ?></td>
	  <td><a href="/books/<?php echo $betval['Book']['id']?>"><?php echo $betval['Book']['title'] ?></a></td>
	  <td><?php echo $betval['Bet']['betpoint'] ?></td>
	  <td><?php echo $betval['Bet']['result_point'] ?></td>
	</tr>
  <?php } ?>
  </tbody>
</table>