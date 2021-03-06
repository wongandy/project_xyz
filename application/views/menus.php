 <!-- side-menu -->
	<ul class="nav" id="side-menu">
		<li>
			<!-- user image section-->
			<div class="user-section">
				<div class="user-info">
					<div><strong><?php echo $this->session->userdata('username');?></strong></div>
					<div class="user-text-online">
						<span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
					</div>
				</div>
			</div>
			<!--end user image section-->
		</li>
		<!--li <?php echo ($menu_id==1?'class="selected"':''); ?> >
			<a href="<?php echo $this->config->base_url().'dashboard';?>"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
		</li-->
		<li>
			<a href="<?php echo $this->config->base_url().'dashboard/monitor';?>" target="_new"><i class="fa fa-dashboard fa-fw"></i>Movie Room Monitoring</a>
		</li>
		<?php if($this->session->userdata('role')==1 || $this->session->userdata('role')==4):?>
		<li <?php echo ($menu_id==2?'class="selected"':''); ?> >
			<a href="<?php echo $this->config->base_url().'movie_room_transaction';?>"><i class="fa fa-dashboard fa-fw"></i>Movie Room Transactions</a>
		</li>
		<li <?php echo ($menu_id==3?'class="selected"':''); ?> >
			<a href="<?php echo $this->config->base_url().'snack_bar_transaction';?>"><i class="fa fa-dashboard fa-fw"></i>Snack Bar Transactions</a>
		</li>
		<li <?php echo ($menu_id==4?'class="selected"':''); ?> >
			<a href="<?php echo $this->config->base_url().'users';?>"><i class="fa fa-dashboard fa-fw"></i>Users</a>
		</li>
		
		<li <?php echo ($menu_id==5?'class="selected"':''); ?> >
			<a href="<?php echo $this->config->base_url().'movies';?>"><i class="fa fa-dashboard fa-fw"></i>Movies</a>
		</li>
		
		<li <?php echo ($menu_id==6?'class="selected"':''); ?> >
			<a href="<?php echo $this->config->base_url().'rooms';?>"><i class="fa fa-dashboard fa-fw"></i>Rooms</a>
		</li>
		<li <?php echo ($menu_id==7?'class="selected"':''); ?> >
			<a href="<?php echo $this->config->base_url().'products';?>"><i class="fa fa-dashboard fa-fw"></i>Products</a>
		</li>
		<li <?php echo ($menu_id==8?'class="selected"':''); ?> >
			<a href="<?php echo $this->config->base_url().'product_inventory';?>" target="_new"><i class="fa fa-dashboard fa-fw"></i>Product Inventory</a>
		</li>
		<li <?php echo ($menu_id==9?'class="selected"':''); ?> >
			<a href="<?php echo $this->config->base_url().'reports';?>"><i class="fa fa-dashboard fa-fw"></i>Report</a>
		</li>
		<li <?php echo ($menu_id==10?'class="selected"':''); ?> >
			<a href="<?php echo $this->config->base_url().'settings';?>"><i class="fa fa-dashboard fa-fw"></i>Settings</a>
		</li>
		<?php endif;?>
	</ul>
	<!-- end side-menu -->