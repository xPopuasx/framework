

<div class="sidebar sidebar-opposite sidebar-default">
    <div class="sidebar-content">

        <!-- Sidebar search -->
        <div class="sidebar-category">
            <div class="category-title">
                <h6><i class='icon-cogs' style="margin-right:10px;"></i> Панель инструментов</h6>
            </div>
            <div class="category-title">
                <span>Действия</span>
                <ul class="icons-list">
                    <li><a href="#" data-action="collapse"></a></li>
                </ul>
            </div>
            <?php
            if($_SERVER['REQUEST_URI'] == '/technics/management')
            {
            echo'
                <div class="category-content no-padding">
                    <ul class="navigation navigation-alt navigation-accordion">
                        <li><a><i class="icon-add"></i> Добавить технику</a></li>
                        <li><a><i class="icon-alignment-align"></i> Добавить доставку</a></li>
                        <li><a><i class="icon-file-plus2"></i> Добавить договор</a></li>
                    </ul>
                </div>';
            }
            elseif($_SERVER['REQUEST_URI'] == '/technics/counterparty')
            {
            echo'
                <div class="category-content no-padding">
                    <ul class="navigation navigation-alt navigation-accordion">
                        <li class="modal-li"  data-toggle="modal" data-target="#modal_add_counterparty" ><a><i class="icon-add" style="margin-right:15px;"></i> Добавить контрагента</a></li>
                        <li class="modal-li" data-toggle="modal" data-target="#modal_add_counterparty_doc"><a><i class="icon-file-plus2" style="margin-right:15px;"></i> Добавить договор</a></li>

                        <li class="modal-li" data-toggle="modal" data-target="#modal_add_technics"><a><i class="icon-truck" style="margin-right:15px;"></i> Создать новую единциу</a></li>
                    </ul>
                </div>';
            }
            ?>
        </div>
        <div class="sidebar-category">
            <div class="category-title">
                <span>Фильтр</span>
                <ul class="icons-list">
                    <li><a href="#" data-action="collapse"></a></li>
                </ul>
            </div>
            <?php
                if($_SERVER['REQUEST_URI'] == '/technics/management')
                {
                echo'
                    <div class="category-content no-padding">
                        <form action="#" class="category-content">
                             <div class="form-group">
                                <label>Выбрать технику</label>
                                <select class="select select-search" id="object" name="object">
                                    <option>123</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Выбрать объект</label>
                                <select class="select select-search" id="object" name="object">
                                    <option>123</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Выбрать контрагента</label>
                                <select class="select select-search" id="object" name="object">
                                    <option>123</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6" style="margin-top:20px;">
                                    <div class="checkbox checkbox-switchery switchery-sm">
                                        <label>
                                            <input type="checkbox" class="switchery" checked="checked">
                                            c НДС
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6" style="margin-top:20px;">
                                    <div class="checkbox checkbox-switchery switchery-sm">
                                        <label>
                                            <input type="checkbox" class="switchery" checked="checked">
                                            Договор
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:20px;">
                                <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="icon-filter3 position-left"></i> Фильтровать</button>
                                </div>
                            </div>
                        </form>
                    </div>';
                }
                elseif($_SERVER['REQUEST_URI'] == '/technics/counterparty')
                {
                    echo'
                    <div class="category-content no-padding">
                        <form action="#" class="category-content">
                             <div class="form-group">
                                <label>Название контрагента</label>
                                <select class="select select-search" id="object" name="object">
                                    <option>123</option>
                                </select>
                            </div>
                             <div class="form-group">
                                <label>Номер договора</label>
                                <input type="text" class="form-control" placeholder="Укажите номер договора">
                            </div>
                            <div class="row" style="margin-top:20px;">
                                <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="icon-filter3 position-left"></i> Фильтровать</button>
                                </div>
                            </div>
                        </form>
                    </div>';
                }
            ?>
        </div>

    </div>
</div>
