<?
    $Api = new models\Api;
?>

<div class="content-wrapper">
	<div class="page-header navbar-default page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold"><?=$vars['title']?></span></h4>
            </div>
        </div>
        <ul class="nav navbar-nav no-border visible-xs-block">
            <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second"><i class="icon-circle-down2"></i></a></li>
        </ul>
    </div>
	<div class="content">
        <div class="row">
            <div class="col-md-7">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="collapse"></a></li>
                            </ul>
                        </div>
                        <ul class="list-inline panel-title">
                            <li>
                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom">
                                    <i class = "icon-list"></i>
                                </a>
                            </li>
                            <li class="text-left">
                                <h5 class="panel-title">Список контрагентов</h5>
                                <span class="text-muted">Полный список</span>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-body" id="table_counterpartys">
                        
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="reload"></a></li>   
                                <li><a data-action="collapse"></a></li>
                            </ul>
                        </div>
                        <ul class="list-inline panel-title">
                            <li>
                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom">
                                    <i class = "icon-folder"></i>
                                </a>
                            </li>
                            <li class="text-left">
                                <h5 class="panel-title">Действующие договоры</h5>
                                <span class="text-muted"> Полный список </span>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        
                    </div>
                </div>
            </div>
        </div>
	</div>	

    <div id="modal_add_counterparty" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Добавить контрагента</h5>
                </div>

                <div class="modal-body">
                   
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Добавить</button>
                    <button type="button" class="btn btn-grey-400" data-dismiss="modal">Отмена</button>
                </div>
            </div>
        </div>
    </div>

    <div id="modal_add_doc" class="modal fade">
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
    <div id="modal_add_technics" class="modal fade">
        <div class="modal-dialog">
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
