<style> #accordion ul { display: block !important;} </style>
<script type="text/javascript">
	$(document).ready(function() {
		$(".unlinkit").click(function(e){
			alert("The page is under Construction!");
			e.preventDefault();
		});
	});
</script>
<div id="adminMenu" class="ddsmoothmenu actions">
<a class="side-bar" onclick="hidepanel();" id="btn" href="javascript:void(0);" title="Click to hide panel" >Click to hide panel</a>
<ul>
	<ul class="admintoggel">
		<li><a href="javascript:void(0);" class="Admins">Dashboard</a></li>
	</ul>
	<ul class="sublist-menu <?php echo ((($this->params['controller']=='admins' && ($this->params['action'] =='dashboard' ||  $this->params['action'] =='newsletter' ||  $this->params['action'] =='changepassword' ||  $this->params['action'] =='configurations' ||  $this->params['action'] =='editprofile')) || $this->params['controller']=='orders' || $this->params['controller']=='backupdbs')?'hide1':'hide'); ?>">
		<li><?php echo $this->Html->link("Change Password","/admin/changepassword"); ?></li>
	</ul>
	<ul class="admintoggel">
		<li><a href="javascript:void(0);" class="Admins">Passbooks</a></li>
	</ul>
	<ul class="sublist-menu <?php echo (($this->params['controller']=='passbooks')?'hide1':'hide'); ?>">
		<li><?php echo $this->Html->link("List Passbooks","/admin/passbooks"); ?></li>
		<li><?php echo $this->Html->link("Add Passbooks","/admin/passbooks/add"); ?></li>
	</ul>
		
<br style="clear: left" />
</ul>
</div>
	
