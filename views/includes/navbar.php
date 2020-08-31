<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="">
				<img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/views/images/system_images/logo_mini.png'?>"  height="200px;">
			</a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<?php if($vars['has_sidebar'] == true){
						echo '<li><a class="sidebar-mobile-opposite-toggle"><i class="icon-menu"></i></a></li>';
					}
					?>
				
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div> 	

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a  id="nav-menu" class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i>
					</a></li>
					<?php if($vars['has_sidebar'] == true){
						echo '<li><a class="sidebar-control sidebar-opposite-fix hidden-xs"><i class="icon-lan3"></i></a></li>';
					}
					?>
				
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-bell2"></i>
							<span class="badge badge-pill bg-warning-400 ml-auto ml-md-0" id='alerts_ul_count'> 0</span>
							<span class="visible-xs-inline-block position-right">Уведомления</span>
					</a>

					<div class="dropdown-menu dropdown-content width-400">
						<div class="dropdown-content-heading">
							Уведомления
							<ul class="icons-list">
								<li><a onclick="clearAlerts()"><i class="icon-trash"></i></a></li>
							</ul>
						</div>

						<ul class="media-list dropdown-content-body" id='alerts_ul'>
						</ul>
						<div class="dropdown-content-footer justify-content-center p-0">
								<a href="#" class="bg-light text-grey w-100 py-2"><i class="icon-menu7 d-block top-0"></i> Перейти на страницу уведомлений</a>
							</div>
					</div>
				</li>
				<li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                    	<i class='icon-user-tie'></i>
                        <span><?= $_SESSION['user_name'].' '.$_SESSION['user_surname']?><br></span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>/user/profil"><i class="icon-user-plus"></i> Мой профиль</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>/access/loginout"><i class="icon-switch2"></i> Выход</a></li>
                    </ul>
				</li>
			</ul>
		</div>
	</div>

	<!-- /main navbar -->