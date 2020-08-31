<?php
	$GeneralModel = new models\GeneralModel;
?>
<div class="sidebar sidebar-main">
	<div class="sidebar-content">
		
		<!-- User menu -->
		<div class="sidebar-user">
			<div class="category-content">
				<div class="media">
					<div class="media-body">
						<span class="media-heading text-semibold"></span>
					</div>
				</div>
			</div>
		</div>
		<!-- /user menu -->
		<?php
			echo $GeneralModel->get_menu('');
		?>
		
	</div>
</div>
