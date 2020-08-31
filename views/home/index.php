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
            <div class="col-md-6">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <ul class="list-inline panel-title">
                            <li>
                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom">
                                    <i class = "icon-folder-open"></i>
                                </a>
                            </li>
                            <li class="text-left">
                                <h5 class="panel-title">Полученные документы</h5>
                                <span class="text-muted">Вам передано 20 докумет(-ов)</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <ul class="list-inline panel-title">
                            <li>
                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom">
                                    <i class = "icon-folder-open"></i>
                                </a>
                            </li>
                            <li class="text-left">
                                <h5 class="panel-title">Ваш поручения</h5>
                                <span class="text-muted">У вас 10 действующих поручения(-ий)</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Напоминания</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="fullcalendar-basic"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
