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

        <?php
            include __DIR__.'/content/'.$action.'.php';
        ?>

        <div id="modal_add_organization" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Добавить роль</h5>
                    </div>

                    <div class="modal-body">
                       
                    </div>

                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>

        <div id="modal_add_sector" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Добавить роль</h5>
                    </div>

                    <div class="modal-body">
                       
                    </div>

                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>

        <div id="modal_add_object" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Добавить роль</h5>
                    </div>

                    <div class="modal-body">
                       
                    </div>

                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
        <div id="modal_add_contractor" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Добавить роль</h5>
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
