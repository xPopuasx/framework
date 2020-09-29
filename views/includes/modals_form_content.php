<?php
  include $_SERVER["DOCUMENT_ROOT"]."/app/db.php";
  $db = new app\db;
  $db_2 = clone($db);
if($_POST['arr_post'][0]['value'] == '#modal_add_counterparty')
{
	$error_code = 0;
	$result_body = '
						<script type="text/javascript">
			      	    	$(".file-styled").uniform({
						        fileButtonClass: "action btn bg-blue"
						    });
                            $(".select").select2();
                            var elements = document.getElementsByClassName("mask-phone");
                            for (var i = 0; i < elements.length; i++) {
                              new IMask(elements[i], {
                                mask:"+{7}(000)000-00-00",
                              });
                            }
			      	    </script>
						<form   class="follow-form" enctype="multipart/form-data" method="POST" id="add_counterparty">
                            <input type="hidden"  value ="add_counterparty" name="specification">
							<div class="row">
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label><span style="color:red;">*</span>  Название контрагента</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  placeholder="Укажите название контрагента" name="counterparty_title">
                                            <span class="input-group-addon bg-primary"><i class="icon-font"></i></span>
                                        </div>
                                    </div>
                                </div>
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label><span style="color:red;">*</span>  ИНН контрагента</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  placeholder="Укажите ИНН" name="counterparty_inn">
                                            <span class="input-group-addon bg-primary"><i class="icon-credit-card"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-material">
                                        <label class="display-block has-margin">Карточка предприятия</label>
                                        <input type="file" class="file-styled"  name="counterparty_vis">
                                    </div>
                                </div>
                            </div>
							<div class="row">
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label><span style="color:red;">*</span>  Имя представителя</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  placeholder="Укажите представителя" name="counterparty_user">
                                            <span class="input-group-addon bg-primary"><i class="icon-user"></i></span>
                                        </div>
                                    </div>
                                </div>
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label><span style="color:red;">*</span>  Номер телефона</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control mask-phone"  placeholder="Укажите номер телефона" name="counterparty_phone">
                                            <span class="input-group-addon bg-primary"><i class="icon-phone"></i></span>
                                        </div>
                                    </div>
                                </div>
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label><span style="color:red;">*</span>  E-mail</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  placeholder="Укажите E-mail" name="counterparty_email">
                                            <span class="input-group-addon bg-primary"><i class="icon-envelop"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Укажите виды техники контрагента</label>
                                        <select multiple="multiple" class="select" name="counterparty_tech[]">';
                                        $db->select_table(NULL, 'technics_class', NULL);
                                        while($row = $db->table_select->fetch_assoc())
                                        {
                                        $result_body .= '<optgroup label="'.$row['technics_class_name'].'">';
                                            $db_2->query_free("SELECT * FROM `technics`  WHERE `id_technic_class` = '".$row['technics_class_id']."'");
                                            while($row_2 = $db_2->table_query->fetch_assoc())
                                            {
                                                $result_body .= '<option value="'.$row_2['id_technic'].'">'.$row_2['technic_name'].'</option>';
                                            }

                                        $result_body .= '</optgroup>';
                                        }
                                        $result_body .= '</select>
                                    </div>
                                </div>
                            </div>';

    $result_footer = '<button class="btn btn-primary" form="add_counterparty" >Сохранить</button>
              <button type="button" class="btn btn-grey-400" data-dismiss="modal">Отмена</button>
					 </form>
                    ';
}

elseif($_POST['arr_post'][0]['value'] == '#modal_add_counterpartyDoc')
{
	$error_code = 0;
	$result_body = '
			      	    <script type="text/javascript">
			      	    	$(".select-search").select2();
			      	    	$(".file-styled").uniform({
						        fileButtonClass: "action btn bg-blue"
						    });

                            $(".pickadate-accessibility").pickadate({
                                labelMonthNext: "Go to the next month",
                                labelMonthPrev: "Go to the previous month",
                                labelMonthSelect: "Pick a month from the dropdown",
                                labelYearSelect: "Pick a year from the dropdown",
                                selectMonths: true,
                                selectYears: true,
                                 format: "dd.mm.yyyy",
                            });
			      	    </script>
			      	    <form  class="follow-form" enctype="multipart/form-data" method="POST" id="add_counterpartyDoc">
                  <input type="hidden"  value ="add_counterpartyDoc" name="specification">
							<div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-material">
                                        <label class="display-block has-margin">Прикрепить документ</label>
                                        <input type="file" class="file-styled"  name="doc_file">
                                    </div>
                                </div>
								<div class="col-md-4">
		                            <div class="form-group">
		                                <label><span style="color:red;">*</span> Выбрать контрагента</label>
                                        <select class="select select-search"  name="doc_counterparty">';
                                $result_body .= '<option  value="0">Выбрать контрагента</option>';
                                        $db->select_table(NULL, 'technics_counterparty', NULL);
                                while($row = $db->table_select->fetch_assoc())
                                {
                                    $result_body .= '<option value="'.$row['counterparty_id'].'">'.$row['counterparty_name'].' ('.$row['counterparty_INN'].')</option>';
                                }
                                $result_body .= '       </select>
		                            </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><span style="color:red;">*</span> Дата подписания договора</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                                            <input type="text" name="doc_date" class="form-control pickadate-accessibility" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><span style="color:red;">*</span> Номер договора</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  placeholder="Укажите номер договра" name="doc_number">
                                            <span class="input-group-addon bg-primary"><i class="icon-font"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div> ';

    $result_footer = '<button class="btn btn-primary" form="add_counterpartyDoc">Сохранить</button>
              <button type="button" class="btn btn-grey-400" data-dismiss="modal">Отмена</button>
					 </form>
                    ';
}

elseif($_POST['arr_post'][0]['value'] == '#modal_add_technics')
{
    $error_code = 0;
    $result_body = '
                        <script type="text/javascript">
                            $(".select-search").select2();
                            $(".file-styled").uniform({
                                fileButtonClass: "action btn bg-blue"
                            });
                        </script>
                        <form  class="follow-form" enctype="multipart/form-data" method="POST" id="add_technics">
                            <input type="hidden"  value ="add_technics" name="specification">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><span style="color:red;">*</span> Выбрать тип техники</label>
                                        <select class="select select-search"  name="technic_class">';
                                $result_body .= '<option  value="0">Выбрать тип</option>';
                                        $db->select_table(NULL, 'technics_class', NULL);
                                while($row = $db->table_select->fetch_assoc())
                                {
                                    $result_body .= '<option value="'.$row['technics_class_id'].'">'.$row['technics_class_name'].'</option>';
                                }
                                $result_body .= '       </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><span style="color:red;">*</span> Название единицы</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  placeholder="Укажите номер договра" name="technic_name">
                                            <span class="input-group-addon bg-primary"><i class="icon-font"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div> ';

    $result_footer = '<button class="btn btn-primary" form="add_technics">Сохранить</button>
    <button type="button" class="btn btn-grey-400" data-dismiss="modal">Отмена</button>
                     </form>
                    ';
}
elseif($_POST['arr_post'][0]['value'] == '#modal_add_role')
{
	include $_SERVER['DOCUMENT_ROOT'].'/models/GeneralModel.php';
    $GeneralModel = new models\GeneralModel;
	$result_body .= ' <script type="text/javascript">
			      	    	if (Array.prototype.forEach) {
						        var elems = Array.prototype.slice.call(document.querySelectorAll(".switchery"));
						        elems.forEach(function(html) {
						            var switchery = new Switchery(html);
						        });
						    }
						    else {
						        var elems = document.querySelectorAll(".switchery");
						        for (var i = 0; i < elems.length; i++) {
						            var switchery = new Switchery(elems[i]);
						        }
						    }
			      	    </script>

			<div class="row">
                <div class="col-lg-12">
                    <form class="follow-form" enctype="multipart/form-data" method="POST" id="add_role">
                        <input type="hidden" class="form-control" value="add_role" name="specification">
                        <div class="row">
                            <div class="col-md-12">
                                Доступы к разделам
                                <hr>
                            </div>
                        </div>';
       $result_body .=  $GeneralModel->create_role('');
       $result_body .=
				 '
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Наименование роли</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Укажите наименование роли" name="role_title">
                                    <span class="input-group-addon bg-primary"><i class="icon-cog"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        	</div>';
	$result_footer = '<button class="btn btn-primary" form="add_role">Добавить роль</button>
			 </form>
             <button type="button" class="btn btn-grey-400" data-dismiss="modal">Отмена</button>
            ';
}

elseif($_POST['arr_post'][0]['value'] == '#modal_add_user')
{
	$error_code = 0;
	$result_body = '
			      	    <script type="text/javascript">
			      	    	$(".select-search").select2();
                            $(".pickadate-accessibility").pickadate({
                                labelMonthNext: "Go to the next month",
                                labelMonthPrev: "Go to the previous month",
                                labelMonthSelect: "Pick a month from the dropdown",
                                labelYearSelect: "Pick a year from the dropdown",
                                selectMonths: true,
                                selectYears: true,
                                 format: "dd.mm.yyyy",
                            });
                            var elements = document.getElementsByClassName("mask-phone");
                            for (var i = 0; i < elements.length; i++) {
                              new IMask(elements[i], {
                                mask:"+{7}(000)000-00-00",
                              });
                            }
			      	    </script>
			      	    <form  class="follow-form" enctype="multipart/form-data" method="POST" id="add_user">
                            <input type="hidden"  value ="add_user" name="specification">

							<div class="row">
								<div class="col-md-12">
									Перснальные данные
									<hr>
								</div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><span style="color:red;">*</span> Фамилия</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  placeholder="Укажите фамилию" name="user_surname">
                                            <span class="input-group-addon bg-primary"><i class="icon-user"></i></span>
                                        </div>
                                    </div>
                                </div>
								<div class="col-md-4">
		                            <div class="form-group">
                                        <label><span style="color:red;">*</span> Имя</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  placeholder="Укажите имя" name="user_name">
                                            <span class="input-group-addon bg-primary"><i class="icon-user"></i></span>
                                        </div>
                                    </div>
                                </div>
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label><span style="color:red;">*</span> Отчество</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  placeholder="Укажите отчество" name="user_middle_name">
                                            <span class="input-group-addon bg-primary"><i class="icon-user"></i></span>
                                        </div>
                                    </div>
                                </div>
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label><span style="color:red;">*</span> Дата рождения</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                                            <input type="text" name="user_birthday" class="form-control pickadate-accessibility" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-md-12">
									Контактные данные
									<hr>
								</div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><span style="color:red;">*</span> Номер телефона</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control mask-phone"  placeholder="Укажите номер телефона" name="user_phone">
                                            <span class="input-group-addon bg-primary"><i class="icon-mobile"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><span style="color:red;">*</span> E-mail</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  placeholder="Укажите E-mail" name="user_email">
                                            <span class="input-group-addon bg-primary"><i class="icon-envelop"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-md-12">
									Данные доступа
									<hr>
								</div>
                                <div class="col-md-4">
		                            <div class="form-group">
		                                <label><span style="color:red;">*</span> Выбрать роль</label>
		                                <select class="select select-search"  name="user_role">';
                                $result_body .= '<option  value="0">Выбрать роль</option>';
                                        $db->select_table(NULL, 'roles', NULL);
                                while($row = $db->table_select->fetch_assoc())
                                {
                                    $result_body .= '<option value="'.$row['role_id'].'">'.$row['role_name'].'</option>';
                                }
	                            $result_body .= '       </select>
		                            </div>
                                </div>
                                <div class="col-md-4">
		                            <div class="form-group">
		                                <label><span style="color:red;">*</span> Выбрать отделение</label>
		                                <select class="select select-search" name="user_sector">';
                                        $result_body .= '<option  value="0">Выбрать отделение</option>';
                                        $db_2->select_table(NULL, 'sectors', NULL);
                                        while($row = $db_2->table_select->fetch_assoc())
                                        {
                                            $result_body .= '<option value="'.$row['sector_id'].'">'.$row['sector_title'].'</option>';
                                        }
                                        $result_body .= '</select>
		                            </div>
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label><span style="color:red;">*</span> Укажите логин</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  placeholder="Укажите логин" name="user_login">
                                            <span class="input-group-addon bg-primary"><i class="icon-user-lock"></i></span>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label><span style="color:red;">*</span> Укажите пароль</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control"  placeholder="Укажите пароль" name="user_password">
                                            <span class="input-group-addon bg-primary"><i class="icon-lock2"></i></span>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label><span style="color:red;">*</span> Повторить пароль</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control"  placeholder="Укажите пароль" name="user_password_re">
                                            <span class="input-group-addon bg-primary"><i class="icon-lock2"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div> ';

    $result_footer = '<button class="btn btn-primary" form="add_user">Сохранить</button>
					 </form>
                     <button type="button" class="btn btn-grey-400" data-dismiss="modal">Отмена</button>
                    ';
}

elseif($_POST['arr_post'][0]['value'] == '#modal_add_organization')
{
	$result_body .= ' <script type="text/javascript">
			      	    	$(".file-styled").uniform({
						        fileButtonClass: "action btn bg-blue"
						    });
			      	    </script>

                <form class="follow-form" enctype="multipart/form-data" method="POST" id="add_organization">
                <input type="hidden"  value ="add_organization" name="specification">
				<div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-group-material">
                            <label class="display-block has-margin">Прикрепить карту предприятия</label>
                            <input type="file" class="file-styled"  name="organization_vis">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><span style="color:red;">*</span>  Название организации</label>
                            <div class="input-group">
                                <input type="text" class="form-control"  placeholder="Укажите название" name="organization_name">
                                <span class="input-group-addon bg-primary"><i class="icon-envelop"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><span style="color:red;">*</span>  Юридический адрес</label>
                            <div class="input-group">
                                <input type="text" class="form-control"  placeholder="Укажите юр. адрес" name="organization_address">
                                <span class="input-group-addon bg-primary"><i class="icon-envelop"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><span style="color:red;">*</span>  ИНН организации</label>
                            <div class="input-group">
                                <input type="text" class="form-control"  placeholder="Укажите ИНН" name="organization_inn">
                                <span class="input-group-addon bg-primary"><i class="icon-envelop"></i></span>
                            </div>
                        </div>
                    </div>
        	</div>
        	<div class="row">
            	<div class="col-md-12">
					Контактная информация
					<hr>
				</div>
			</div>
			<div class="row">
            	<div class="col-md-4">
                    <div class="form-group">
                        <label><span style="color:red;">*</span>  Номер телефона</label>
                        <div class="input-group">
                            <input type="text" class="form-control"  placeholder="Укажите номер телфона" name="organization_phone">
                            <span class="input-group-addon bg-primary"><i class="icon-envelop"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label><span style="color:red;">*</span>  Электронная почта</label>
                        <div class="input-group">
                            <input type="text" class="form-control"  placeholder="Укажите E-mail" name="organization_email">
                            <span class="input-group-addon bg-primary"><i class="icon-envelop"></i></span>
                        </div>
                    </div>
                </div>
			</div>
				';


	$result_footer = '<button class="btn btn-primary" form="add_organization">Добавить организацию</button>
			 </form>
             <button type="button" class="btn btn-grey-400" data-dismiss="modal">Отмена</button>
            ';
}

elseif($_POST['arr_post'][0]['value'] == '#modal_add_sector')
{
	$result_body .= '<script type="text/javascript">
			      	    $(".select-search").select2();
		      	    </script>
                    <form class="follow-form" enctype="multipart/form-data" method="POST" id="add_sector">
                	<input type="hidden"  value ="add_sector" name="specification">
		            <div class="row">
						<div class="col-md-6">
		                    <div class="form-group">
		                        <label><span style="color:red;">*</span> Выбрать организацию</label>
		                        <select class="select select-search"  name="sector_id_organization">
                                <option value="0">Выбрать организацию</option>';
                                $db->select_table(NULL, 'organizations', NULL);
		                        while($row = $db->table_select->fetch_assoc())
                                {
                                    $result_body .= '<option value="'.$row['organization_id'].'">'.$row['organization_name'].'</option>';
                                }

    $result_body .=             '</select>
		                    </div>
		                </div>
		                <div class="col-md-6">
		                    <div class="form-group">
		                        <label><span style="color:red;">*</span>  Название отделения</label>
		                        <div class="input-group">
		                            <input type="text" class="form-control"  placeholder="Укажите название отделения" name="sector_title">
		                            <span class="input-group-addon bg-primary"><i class="icon-envelop"></i></span>
		                        </div>
		                    </div>
		                </div>
		            </div>
				';
$result_footer = '<button class="btn btn-primary" form="add_sector">Добавить отделение</button>
			 </form>
             <button type="button" class="btn btn-grey-400" data-dismiss="modal">Отмена</button>
            ';
}


elseif($_POST['arr_post'][0]['value'] == '#modal_add_object')
{
	$result_body .= '<script type="text/javascript">
                    $(".select").select2();
		      	       </script>
                    <form class="follow-form" enctype="multipart/form-data" method="POST" id="add_object">
                	<input type="hidden"  value ="add_object" name="specification">
		            <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label><span style="color:red;">*</span> Ответственное лицо (-ые)</label>
                            <select multiple="multiple" class="select" name="object_users[]">';
                                $db->select_table(NULL, 'users', NULL);
                                  while($row = $db->table_select->fetch_assoc())
                                {
                                    $result_body .= '<option value="'.$row['user_id'].'">'.$row['user_surname'].' '.$row['user_name'].' '.$row['user_middle_name'].'</option>';
                                }
              $result_body .='</select>
                        </div>
                    </div>
		                <div class="col-md-6">
		                    <div class="form-group">
		                        <label><span style="color:red;">*</span>  Название объекта</label>
		                        <div class="input-group">
		                            <input type="text" class="form-control"  placeholder="Укажите название" name="object_title">
		                            <span class="input-group-addon bg-primary"><i class="icon-envelop"></i></span>
		                        </div>
		                    </div>
		                </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><span style="color:red;">*</span>  Полный адрес объекта</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  placeholder="Укажите адрес" name="obecjt_address">
                                    <span class="input-group-addon bg-primary"><i class="icon-map4"></i></span>
                                </div>
                            </div>
                        </div>
		            </div>
				';
$result_footer = '
      <button class="btn btn-primary" form="add_object">Добавить объект</button>
			 </form><button type="button" class="btn btn-grey-400" data-dismiss="modal">Отмена</button>';
}




elseif($_POST['arr_post'][0]['value'] == '#modal_add_contractor')
{
    $result_body .= '<script type="text/javascript">
                    $(".select").select2();
                    var elements = document.getElementsByClassName("mask-phone");
                    for (var i = 0; i < elements.length; i++) {
                      new IMask(elements[i], {
                        mask:"+{7}(000)000-00-00",
                      });
                    }
                    var elements = document.getElementsByClassName("mask-numeral");
                    for (var i = 0; i < elements.length; i++) {
                      new IMask(elements[i], {
                        mask:"00000000000000000000",
                      });
                    }
                    if (Array.prototype.forEach) {
                        var elems = Array.prototype.slice.call(document.querySelectorAll(".switchery"));
                        elems.forEach(function(html) {
                            var switchery = new Switchery(html);
                        });
                    }
                    else {
                        var elems = document.querySelectorAll(".switchery");
                        for (var i = 0; i < elems.length; i++) {
                            var switchery = new Switchery(elems[i]);
                        }
                    }
                   </script>
                    <form class="follow-form" enctype="multipart/form-data" method="POST" id="add_contractor">
                    <input type="hidden"  value ="add_contractor" name="specification">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><span style="color:red;">*</span>  Название поставщика</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  placeholder="Укажите название" name="title_contractor">
                                    <span class="input-group-addon bg-primary"><i class="icon-envelop"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><span style="color:red;">*</span>  ИНН поставщика</label>
                                <div class="input-group">
                                    <input type="text" class="form-control mask-numeral"  placeholder="Укажите название" name="inn_contractor">
                                    <span class="input-group-addon bg-primary"><i class="icon-envelop"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><span style="color:red;">*</span>  Геопозиция (город)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  placeholder="Укажите название" name="city_contractor">
                                    <span class="input-group-addon bg-primary"><i class="icon-envelop"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Поставляеммые группы ТМЦ</label>
                                <select  class="select" name="category_contractor">';
                                $db->select_table(NULL, 'contractor_category', NULL);
                                while($row = $db->table_select->fetch_assoc())
                                {
                                    $result_body .= '<option value="'.$row['id_contractor_category'].'">'.$row['title_contractor_category'].'</option>';
                                }
                                $result_body .= '</select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Поставляеммые группы ТМЦ</label>
                                <select multiple="multiple" class="select" name="ul_contractor_tmc[]">';
                                $db->select_table(NULL, 'contractor_tmc', NULL);
                                while($row = $db->table_select->fetch_assoc())
                                {
                                    $result_body .= '<option value="'.$row['id_contractor_tmc'].'">'.$row['title_contractor_tmc'].'</option>';
                                }
                                $result_body .= '</select>
                            </div>
                        </div>
                        <div class="col-md-12">
                          <div class="checkbox checkbox-switchery">
                            <label>
                              <input type="checkbox" class="switchery"  name="longpay_contractor" > <span style="margin-left:10px;">
                              Работа по договору в отсрочку </span>
                            </label>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <hr>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><span style="color:red;">*</span>  ФИО представителя</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  placeholder="Укажите название" name="contractor_representative_fio">
                                    <span class="input-group-addon bg-primary"><i class="icon-envelop"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><span style="color:red;">*</span>  Номер телефона представителя</label>
                                <div class="input-group">
                                    <input type="text" class="form-control mask-phone"  placeholder="Укажите название" name="contractor_representative_phone">
                                    <span class="input-group-addon bg-primary"><i class="icon-envelop"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><span style="color:red;">*</span>  Адрес электронной почты</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"  placeholder="Укажите название" name="contractor_representative_mail">
                                    <span class="input-group-addon bg-primary"><i class="icon-envelop"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
$result_footer = '
              <button class="btn btn-primary" form="add_contractor">Добавить поставщика</button>
              <button type="button" class="btn btn-grey-400" data-dismiss="modal">Отмена</button>
             </form>';
}

elseif($_POST['arr_post'][0]['value'] == '#modal_add_work_technic_deliver')
{
	$result_body .= '<script type="text/javascript">
			      	    $(".select-search").select2();
                  $(".select-size-sm").select2();
                  var elements = document.getElementsByClassName("mask-phone");
                  for (var i = 0; i < elements.length; i++) {
                    new IMask(elements[i], {
                      mask:"+{7}(000)000-00-00",
                    });
                  }
                  var elements = document.getElementsByClassName("mask-timer");
                  for (var i = 0; i < elements.length; i++) {
                    new IMask(elements[i], {
                      mask:"00:00",
                    });
                  }
                  var elements = document.getElementsByClassName("mask-gov-number");
                  for (var i = 0; i < elements.length; i++) {
                    new IMask(elements[i], {
                      mask:"a000aa00",
                    });
                  }
                  var elements = document.getElementsByClassName("no-letter");
                  for (var i = 0; i < elements.length; i++) {
                    new IMask(elements[i], {
                      mask:"000000000000000",
                    });
                  }

  	      	    	if (Array.prototype.forEach) {
				        var elems = Array.prototype.slice.call(document.querySelectorAll(".switchery"));
				        elems.forEach(function(html) {
				            var switchery = new Switchery(html);
				        });
				    }
				    else {
				        var elems = document.querySelectorAll(".switchery");
				        for (var i = 0; i < elems.length; i++) {
				            var switchery = new Switchery(elems[i]);
				        }
				    }
            $(".pickadate-accessibility").pickadate({
                labelMonthNext: "Go to the next month",
                labelMonthPrev: "Go to the previous month",
                labelMonthSelect: "Pick a month from the dropdown",
                labelYearSelect: "Pick a year from the dropdown",
                selectMonths: true,
                selectYears: true,
                 format: "dd.mm.yyyy",
            });
		      	    </script>
                <form class="follow-form" enctype="multipart/form-data" method="POST" id="add_work_technic_deliver">
              	<input type="hidden"  value ="add_work_technic_deliver" name="specification">
		            <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><span style="color:red;">*</span> Выбрать тип техники</label>
                            <select class="select select-search"  name="deliver_technic_name">';
                            $db->query_free("SELECT * FROM `technics_class`  WHERE  `technics_class_id` = '3'");
                                  while($row = $db->table_query->fetch_assoc())
                                  {
                                  $result_body .= '<optgroup label="'.$row['technics_class_name'].'">';
                                      $db_2->query_free("SELECT * FROM `technics`  WHERE `id_technic_class` = '".$row['technics_class_id']."'");
                                      while($row_2 = $db_2->table_query->fetch_assoc())
                                      {
                                          $result_body .= '<option value="'.$row_2['id_technic'].'">'.$row_2['technic_name'].'</option>';
                                      }

                                  $result_body .= '</optgroup>';
                                  }
                          $result_body .= '
                          </select>

                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                          <label><span style="color:red;">*</span> Дата выполнения заявки</label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                              <input type="text" name="deliver_date" class="form-control pickadate-accessibility" placeholder="">
                          </div>
                      </div>
                    </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label><span style="color:red;">*</span>  Укажите время отправки заявки</label>
                              <div class="input-group">
                                  <input type="text" class="form-control mask-timer"  placeholder="Укажите время" name="deliver_time">
                                  <span class="input-group-addon bg-primary"><i class="icon-alarm"></i></span>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label><span style="color:red;">*</span> Выбрать объект(-ы) доставки</label>
                            <select multiple="multiple" class="select-size-sm" name="deliver_objects[]" >';
                            $db->select_table(NULL, 'objects', NULL);
                                  while($row = $db->table_select->fetch_assoc())
                                  {
                                      $result_body .= '<option value="'.$row['object_id'].'">'.$row['object_title'].'</option>';
                                  }
                          $result_body .= '
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><span style="color:red;">*</span> Укажите пункт(-ы) заезда(-ов) по порядку</label>
                            <select multiple="multiple" class="select-size-sm" name="deliver_contractors[]">';
                                $db->select_table(NULL, 'contractors', NULL);
                                  while($row = $db->table_select->fetch_assoc())
                                {
                                    $result_body .= '<option value="'.$row['id_contractor'].'">'.$row['title_contractor'].' ('.$row['inn_contractor'].')</option>';
                                }
              $result_body .='</select>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><span style="color:red;">*</span>  Оговоренная стоимость</label>
                            <div class="input-group">
                                <input type="text" class="form-control no-letter"  placeholder="Укажите стоимость" name="deliver_price">
                                <span class="input-group-addon bg-primary"><i class="icon-cash"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><span style="color:red;">*</span>  Гос. номер</label>
                            <div class="input-group">
                                <input type="text" class="form-control mask-gov-number"  placeholder="Укажите гос. номер" name="deliver_gov_number">
                                <span class="input-group-addon bg-primary"><i class="icon-car"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><span style="color:red;">*</span>  Телефон для связи</label>
                            <div class="input-group">
                                <input type="text" class="form-control mask-phone"  placeholder="Укажите телефон" name="deliver_phone">
                                <span class="input-group-addon bg-primary"><i class="icon-phone"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><span style="color:red;">*</span>  Имя водителя</label>
                            <div class="input-group">
                                <input type="text" class="form-control"  placeholder="Укажите имя" name="deliver_user_name">
                                <span class="input-group-addon bg-primary"><i class="icon-user"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                      <div class="checkbox checkbox-switchery">
                        <label>
                          <input type="checkbox" class="switchery"  name="deliver_attorney"> <span style="margin-left:10px;">
                          На водителя данной машины будет выдаваться доверенность </span>
                      </label>
                      </div>
                    </div>
		            </div>
              </div>
				';

$result_footer = '
      <button class="btn btn-primary" form="add_work_technic_deliver" id="fullcalendar_button">Внести доставку</button>
      <button type="button" class="btn btn-grey-400" data-dismiss="modal">Отмена</button>
     </form>';
}

elseif($_POST['arr_post'][0]['value'] == '#modal_add_work_technic')
{
	$result_body .= '<script type="text/javascript">
			      	    $(".select-search").select2();
                  $(".select-size-sm").select2();
                  var elements = document.getElementsByClassName("mask-phone");
                  for (var i = 0; i < elements.length; i++) {
                    new IMask(elements[i], {
                      mask:"+{7}(000)000-00-00",
                    });
                  }
                  var elements = document.getElementsByClassName("mask-hours");
                  for (var i = 0; i < elements.length; i++) {
                    new IMask(elements[i], {
                      mask:"00",
                    });
                  }
                  var elements = document.getElementsByClassName("no-letter");
                  for (var i = 0; i < elements.length; i++) {
                    new IMask(elements[i], {
                      mask:"000000000000000",
                    });
                  }
            $(".pickadate-accessibility").pickadate({
                labelMonthNext: "Go to the next month",
                labelMonthPrev: "Go to the previous month",
                labelMonthSelect: "Pick a month from the dropdown",
                labelYearSelect: "Pick a year from the dropdown",
                selectMonths: true,
                selectYears: true,
                 format: "dd.mm.yyyy",
            });
		      	    </script>
                <form class="follow-form" enctype="multipart/form-data" method="POST" id="add_work_technic">
              	<input type="hidden"  value ="add_work_technic" name="specification">
		            <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><span style="color:red;">*</span> Выбрать тип техники</label>
                            <select class="select select-search"  name="deliver_technic_name">';
                            $db->query_free("SELECT * FROM `technics_class`");
                                  while($row = $db->table_query->fetch_assoc())
                                  {
                                  $result_body .= '<optgroup label="'.$row['technics_class_name'].'">';
                                      $db_2->query_free("SELECT * FROM `technics`  WHERE `id_technic_class` = '".$row['technics_class_id']."'");
                                      while($row_2 = $db_2->table_query->fetch_assoc())
                                      {
                                          $result_body .= '<option value="'.$row_2['id_technic'].'">'.$row_2['technic_name'].'</option>';
                                      }

                                  $result_body .= '</optgroup>';
                                  }
                          $result_body .= '
                          </select>

                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                          <label><span style="color:red;">*</span> Дата начала выполнения</label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                              <input type="text" name="deliver_date" class="form-control pickadate-accessibility" placeholder="">
                          </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                          <label><span style="color:red;">*</span> Дата окончания выполнения</label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                              <input type="text" name="deliver_date_end" class="form-control pickadate-accessibility" placeholder="">
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><span style="color:red;">*</span> Выбрать поставщика техники</label>
                            <select class="select-size-sm" name="deliver_contractors">';
                  $result_body .= '<option  value="0">Выбрать поставщика</option>';
                            $db->select_table(NULL, 'technics_counterparty', NULL);
                                  while($row = $db->table_select->fetch_assoc())
                                  {
                                      $result_body .= '<option value="'.$row['counterparty_id'].'">'.$row['counterparty_name'].' ('.$row['counterparty_INN'].')</option>';
                                  }
                          $result_body .= '
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><span style="color:red;">*</span> Выбрать объект выполнения</label>
                            <select class="select-size-sm" name="deliver_objects">';
                  $result_body .= '<option  value="0">Выбрать объект</option>';
                            $db->select_table(NULL, 'objects', NULL);
                                  while($row = $db->table_select->fetch_assoc())
                                  {
                                      $result_body .= '<option value="'.$row['object_id'].'">'.$row['object_title'].'</option>';
                                  }
                          $result_body .= '
                          </select>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><span style="color:red;">*</span>  Оговоренная стоимость за час</label>
                            <div class="input-group">
                                <input type="text" class="form-control no-letter"  placeholder="Укажите стоимость" name="deliver_price">
                                <span class="input-group-addon bg-primary"><i class="icon-cash"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><span style="color:red;">*</span>  Продолжительность смены</label>
                            <div class="input-group">
                                <input type="text" class="form-control mask-hours"   placeholder="Укажите в часах" name="deliver_hours">
                                <span class="input-group-addon bg-primary"><i class="icon-cash"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><span style="color:red;">*</span>  Телефон для связи</label>
                            <div class="input-group">
                                <input type="text" class="form-control mask-phone"  placeholder="Укажите телефон" name="deliver_phone">
                                <span class="input-group-addon bg-primary"><i class="icon-phone"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><span style="color:red;">*</span>  Имя водителя</label>
                            <div class="input-group">
                                <input type="text" class="form-control"  placeholder="Укажите имя" name="deliver_user_name">
                                <span class="input-group-addon bg-primary"><i class="icon-user"></i></span>
                            </div>
                        </div>
                    </div>
		            </div>
              </div>
				';

$result_footer = '
      <button class="btn btn-primary" form="add_work_technic" id="fullcalendar_button">Внести работу техники</button>
      <button type="button" class="btn btn-grey-400" data-dismiss="modal">Отмена</button>
     </form>';
}

$list = array("error_code" => $error_code, "error_message" => $error_str, "result_body" => $result_body, "result_footer" => $result_footer);
$c = json_encode($list);
echo $c;
?>
