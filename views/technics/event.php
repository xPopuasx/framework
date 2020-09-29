<?
    $Api = new models\Api;
    $db = new app\db;
    $db_2 = clone($db);
    $url = mb_strtolower($_GET['url']);
    $url = explode('/', rtrim($url, '/'));

   $db->query_free("SELECT * FROM `application_deliver` INNER JOIN `technics` ON `application_deliver`.`deliver_technic_name` = `technics`.`id_technic` WHERE `application_deliver`.`id_deliver` = '".$url[2]."' ");
   $row = $db->table_query->fetch_assoc();

?>

<div class="content-wrapper">
	<div class="page-header navbar-default page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold"><?=$row['deliver_specification']?> от <?=date("d.m.Y", strtotime($row['deliver_date']))?> в <?=date("H:s", strtotime($row['deliver_time']))?><br> Техника - <?=$row['technic_name']?></span></h4>
            </div>

            <div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-cash icon-2x text-primary"></i><span>Выписать деньги</span></a>
							</div>
						</div>
        </div>
        <ul class="nav navbar-nav no-border visible-xs-block">
            <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second"><i class="icon-circle-down2"></i></a></li>
        </ul>
    </div>
	<div class="content">
    <?php
    if($row['deliver_specification'] == 'Доставка материалов')
    {
      include __DIR__.'/content/'.$action.'_deliver.php';
    }
    elseif($row['deliver_specification'] == 'Работа техники')
    {
      include __DIR__.'/content/'.$action.'_technic_work.php';
    }

    ?>

        <div id="modal_add_work_technic" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Добавить договор</h5>
                    </div>

                    <div class="modal-body">

                    </div>

                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

        <div id="modal_add_work_technic_deliver" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Добавить договор</h5>
                    </div>

                    <div class="modal-body">

                    </div>

                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
