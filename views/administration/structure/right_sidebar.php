

<div class="sidebar sidebar-opposite sidebar-default">
    <div class="sidebar-content">

        <!-- Sidebar search -->
        <div class="sidebar-category">
            <div class="category-title">
                <h4>Функции</h4>
            </div>
            <div class="category-title">
                <span>Действия</span>
                <ul class="icons-list">
                    <li><a href="#" data-action="collapse"></a></li>
                </ul>
            </div>
            <?php
            if($_SERVER['REQUEST_URI'] == '/administration/users')
            {
            echo'
                <div class="category-content no-padding">
                    <ul class="navigation navigation-alt navigation-accordion">
                        <li class="modal-li"  data-toggle="modal" data-target="#modal_add_user"><a><i class="icon-add" style="margin-right:15px;"></i> Добавить пользователя</a></li>
                    </ul>
                </div>';
            }
            elseif($_SERVER['REQUEST_URI'] == '/administration/access')
            {
            echo'
                <div class="category-content no-padding">
                    <ul class="navigation navigation-alt navigation-accordion">
                        <li class="modal-li"  data-toggle="modal" data-target="#modal_add_role"><a><i class="icon-add" style="margin-right:15px;"></i> Добавить роль</a></li>
                    </ul>
                </div>';
            }
            elseif($_SERVER['REQUEST_URI'] == '/administration/management')
            {
            echo'
                <div class="category-content no-padding">
                    <ul class="navigation navigation-alt navigation-accordion">
                        <li class="modal-li"  data-toggle="modal" data-target="#modal_add_organization"><a><i class="icon-add" style="margin-right:15px;"></i> Добавить организацию</a></li>
                        <li class="modal-li"  data-toggle="modal" data-target="#modal_add_sector"><a><i class="icon-add" style="margin-right:15px;"></i> Добавить отделение</a></li>
                        <li class="modal-li"  data-toggle="modal" data-target="#modal_add_object"><a><i class="icon-office" style="margin-right:15px;"></i> Добавить объект</a></li>
                        <li class="modal-li"  data-toggle="modal" data-target="#modal_add_contractor"><a><i class=" icon-truck" style="margin-right:15px;"></i> Добавить поставщика</a></li>
                    </ul>
                </div>';
            }
            ?>
        </div>

        <div class="category-title">
            <span>Списки</span>
            <ul class="icons-list">
            <li><a href="#" data-action="collapse"></a></li>
            </ul>
        </div>
        <?php
        if($_SERVER['REQUEST_URI'] == '/administration/management')
            {
            echo'<div class="category-content no-padding">
                    <ul class="navigation navigation-alt navigation-accordion">
                        <li class="modal-li"><a><i class="icon-eye" style="margin-right:15px;"></i><i class="icon-office" style="margin-right:15px;"></i> Объекты</a></li>
                        <li class="modal-li"><a><i class="icon-eye" style="margin-right:15px;"></i><i class="icon-truck" style="margin-right:15px;"></i> Поставщики</a></li>
                    </ul>
                </div>';
            }
        ?>
    </div>     
</div>