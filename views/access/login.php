<body class="login-container">

    <!-- Page container -->
    <div class="page-container">
        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content">
                                        
                    <!-- Advanced login -->
                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-pie-chart7"></i></div>
                                <h5 class="content-group">Авторизация <small class="display-block">Войти в личный кабинет</small></h5>
                            </div>
                                <div id='error_protocol'></div>
                                <form role="form" enctype='multipart/form-data' method='POST' class="follow-login" id="authorization">
                                    <input type="hidden"  value ='authorization' name='specification'>
                                    <div class="form-group has-feedback has-feedback-left">
                                        <input type="text" class="form-control" placeholder="Ваш логин" id='login' name ='login'>
                                        <div class="form-control-feedback">
                                                <i class="icon-user text-muted"></i>
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback has-feedback-left">
                                        <input type="password" class="form-control" placeholder="Ваш пароль" id='password' name='password'>
                                        <div class="form-control-feedback">
                                                <i class="icon-lock2 text-muted"></i>
                                        </div>
                                    </div>

                                    <div class="form-group login-options">
                                        <div class="row">
                                            <div class="col-sm-6">
                                            </div>

                                            <div class="col-sm-6 text-right">
                                                    <a href="login_password_recover.php">Забыли пароль ?</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn bg-blue btn-block" >Войти <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </form>
                            <div class="content-divider text-muted form-group"><span>Отсутствует аккаунт ?</span></div>
                            <span class="help-block text-center no-margin">Для получения регистрационных данных, обратитесь в отдел кадров</span>
                        </div>
                    <!-- /advanced login -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

</body>
</html>

