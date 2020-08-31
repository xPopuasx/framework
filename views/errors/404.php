
					<!-- Error title -->
					<div class="text-center content-group">
						<h1 class="error-title">404</h1>
						<h4  style="margin-top: -20px;"><b>Страница не найдена, возможно она была удалена. </b></h4>
						<div class="row">
							<div class="col-md-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
								<div class="panel panel-white">
									<div class="panel-heading">
										<h6 class="panel-title">
											<span style='color:red;'>Проверьте правильность введённой ссылки</span> <a class="collapsed" data-toggle="collapse" href="#collapsible-control-right-group2"><span class='icon-help'></span></a>
										</h6>
									</div>
									<div id="collapsible-control-right-group2" class="panel-collapse collapse">
										<div class="panel-body">
											<b>Данная ошибка возникает из-за перехода на неуществющую страницу</b> 
											<hr>
											Проверьте источник или убедитесь что вы ввели правильный адрес, если вы не обнаружили ошибку, сообщите нам об этом, через конпку 
											<br>
											<b>"Сообщить об ошибке"</b>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /error title -->


					<!-- Error content -->
					<div class="row">
						<div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
							<form action="#" class="main-search">

								<div class="row">
									<div class="col-sm-6">
										<a href="http://<?= $_SERVER['HTTP_HOST'];?>/home/index" class="btn btn-primary btn-block content-group"><i class="icon-home5 position-left"></i> Перейти на главную</a>
									</div>

									<div class="col-sm-6">
										<a href="#" class="btn btn-default btn-block content-group" data-toggle="modal" data-target="#modal_error_reporting"><i class="icon-alert position-left"></i> Сообщить об ошибке</a>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div id="modal_error_reporting" class="modal fade">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h5 class="modal-title">Отчет об ошибке</h5>
								</div>

								<div class="modal-body">
									<h6 class="text-semibold">Помните</h6>
									<p>Для решения проблемы может потребоваться время, но Вы можете упростить задачу, заполнив следующую форму</p>

									<hr>
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Отменить</button>
									<button type="button" class="btn btn-primary">Отправить</button>
								</div>
							</div>
						</div>
					</div>
					<!-- /error wrapper -->


					<!-- Footer -->

					<!-- /footer -->
