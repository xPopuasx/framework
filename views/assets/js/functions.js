function access_roles(roles_id){
    var split = roles_id.split('-');
    $('#'+split[0]).parent().parent().toggleClass("active");

    $('.'+split[0]+'-class').parent().parent().toggleClass("disabled");
    if ($('.'+split[0]+'-class').is("[disabled]"))
    {

        $('.'+split[0]+'-class').removeAttr("disabled");
        var i = 0;
        while(i<$('.'+split[0]+'-class').length)
        {
            if(!$('.'+split[0]+'-class:eq('+i+')').hasClass("active"))
            {
                $('.'+split[0]+'-class:eq('+i+')').addClass("active");
                $('.'+split[0]+'-class:eq('+i+')').click();
            }
        i++;
        }

    }

    $('.'+split[0]+'-class').on("click", function()
    {
        $(this).toggleClass("active");
    });


    if(!$('#'+split[0]).parent().parent().hasClass("active"))
    {
        if($('.'+split[0]+'-class').hasClass("active"))
        {
            var i = 0;
            while(i<$('.'+split[0]+'-class').length)
            {
                if($('.'+split[0]+'-class:eq('+i+')').hasClass("active"))
                {
                    $('.'+split[0]+'-class:eq('+i+')').removeClass("active");
                    $('.'+split[0]+'-class:eq('+i+')').click();
                }
            i++;
            }
        }
    }
    if($('.'+split[0]+'-class').parent().parent().hasClass("disabled"))
    {
        $('.'+split[0]+'-class').attr("disabled", "disabled");
    }

}

function access_roles_subclass(roles_id)
{
    var split = roles_id.split('-');
    console.log(roles_id);
    $('.'+split[0]+'-subclass').parent().parent().toggleClass("disabled");
    if ($('.'+split[0]+'-subclass').is("[disabled]"))
    {

        $('.'+split[0]+'-subclass').removeAttr("disabled");
        var i = 0;
        while(i<$('.'+split[0]+'-subclass').length)
        {
            if(!$('.'+split[0]+'-subclass:eq('+i+')').hasClass("active"))
            {
                $('.'+split[0]+'-subclass:eq('+i+')').addClass("active");
                $('.'+split[0]+'-subclass:eq('+i+')').click();
            }
        i++;
        }

    }
    else
    {
        if($('.'+split[0]+'-class').hasClass("active"))
        {
        var i = 0;
            while(i<$('.'+split[0]+'-subclass').length)
            {
                if($('.'+split[0]+'-subclass:eq('+i+')').hasClass("active"))
                {
                   $('.'+split[0]+'-subclass:eq('+i+')').click();
                }
                i++;
            }
            if($('.'+split[0]+'-subclass').parent().parent().hasClass("disabled"))
            {
                $('.'+split[0]+'-subclass').attr("disabled", "disabled");
            }
        }
    }

    $('.'+split[0]+'-subclass').on("click", function()
    {
        $(this).toggleClass("active");
    });

}



function spinner_block(name,block_window){
    var block = $('#'+name).parent();
    if(block_window === 'block'){
        $(block).block({
            message: '<div class="pace-demo">' +
            '<div class="theme_xbox_xs"><div class="pace_progress" data-progress-text="60%" data-progress="60"></div><div class="pace_activity"></div></div>' +
            '</div>',
            overlayCSS: {
                backgroundColor: '#fff',
                opacity: 0.8,
                cursor: 'wait',
                'box-shadow': '0 0 0 0 #ddd'
            },
            css: {
                border: 0,
                padding: 0,
                backgroundColor: 'none'
            }
        });
    }
    else{
        $(block).unblock();
    }
}


$(function () {
    $("form.follow-login").submit(function (e) {
        e.preventDefault();
        var id = $(this).attr('id');
        var formdata = $(this).serialize();
        $.ajax({
            url: '../../models/parser.php',
            type: "POST",
            data: formdata,
            dataType: 'json',
            beforeSend: function (){
                spinner_block(id, 'block');
            },
            success: function(msg)
            {
                spinner_block(id, 'unblock');
                if(msg.error_code == 0)
                {
                    location.reload();
                }
                else
                {
                    $('#error_protocol').html(msg.error_msg);
                }
            }
        });

    });
});

$(function () {
    $(document).on("submit", ".follow-form", function (e) {
        e.preventDefault();
        var id = $(this).attr('id');
        var formdata = $(this).serialize();

        $.ajax({
            url: '../../models/parser.php',
            type: "POST",
            data: formdata,
            dataType: 'json',
            beforeSend: function (){
                spinner_block(id, 'block');
            },
            success: function(msg)
            {
                spinner_block(id, 'unblock');
                if(msg.error_code == 0)
                {
                    new PNotify({
                        title: 'Выполнено',
                        text: msg.error_msg,
                        addclass: 'alert bg-success alert-styled-right',
                        type: 'error'
                    });
                    var split = id.split('_');
                    appendContent('table_'+split[1]+'s');
                    $('.close').click();
                }
                else
                {
                    new PNotify({
                        title: 'Ошибка ' + msg.error_code,
                        text: msg.error_msg,
                        addclass: 'alert bg-danger alert-styled-right',
                        type: 'error'
                    });
                }
            }
        });
    });

    $(document).on("click", ".prev-modal-li", function (e) {
      $('.close').click();
      var element = $(this);
       setTimeout(function(){
         element.next('li').click();
       }, 550);
    })

    function getViewContentPagination(id_block, page, interval)
    {
        var arr_post = [];
        arr_post.push({"id" : 1, "value":id_block});
        arr_post.push({"id" : 2, "value":page});
        arr_post.push({"id" : 3, "value":interval});
        $.post('../../views/includes/view_content.php', {arr_post}, function(data){
           $('#'+id_block).html(data.result_content);
           spinner_block(id_block, 'unblock');
        }, 'json');
    }

    function getViewContentPagination(id_block, page, interval)
    {
        var arr_post = [];
        arr_post.push({"id" : 1, "value":id_block});
        arr_post.push({"id" : 2, "value":page});
        arr_post.push({"id" : 3, "value":interval});
        $.post('../../views/includes/view_content.php', {arr_post}, function(data){
           $('#'+id_block).html(data.result_content);
        }, 'json');
        spinner_block(id_block, 'unblock');
    }

    $(document).on("click", ".pagination-arrow", function (e) {
      e.preventDefault();
      var id = $(this).attr('data-target');
      var page =  $(this).attr('data-page');
      var interval =  $(this).attr('data-interval');
      var id_block = $(this).attr('data-block');

      spinner_block(id_block, 'block');
      getViewContentPagination(id_block, page, interval);
    })


    function appendContent(id_block)
    {
        var arr_post = [];
        arr_post.push({"id" : 1, "value":id_block});
        $.post('../../views/includes/append_content.php', {arr_post}, function(data){
            $('#'+id_block + '_append').prepend(data.result_content);

            $('#'+id_block + '_append tr:first').addClass('active');

            setTimeout(function()
            {
              $('#'+id_blokc + '_append tr:first').removeClass('active');
            }, 3000);

        }, 'json');

    }



    function modalClick()
    {
        var idModal = $(this).attr('data-target');
        var titleModal = $(this).children('a').html();
        $(idModal).find('h5').html(titleModal);

        var arr_post = [];
        arr_post.push({"id" : 1, "value":idModal});

        $.post('../../views/includes/modals_form_content.php', {arr_post}, function(data){
            $(idModal).find('.modal-body').html(data.result_body);
            $(idModal).find('.modal-footer').html(data.result_footer);
        }, 'json');

    }

    $('li.modal-li').click(modalClick);



    //Функция вывода информации при загрузке страницы
    function getViewContent(id_blokc)
    {
        var arr_post = [];
        arr_post.push({"id" : 1, "value":id_blokc});
        $.post('../../views/includes/view_content.php', {arr_post}, function(data){
           $('#'+id_blokc).html(data.result_content);
        }, 'json');
    }

    function getDataFullCalendar(path)
    {
      var arr_post = [];
      arr_post.push({"id" : 1, "value":path});
      $.post('../../views/includes/fullcalendar/fullcalendar.php', {arr_post}, function(data){

      }, 'json');
    }


    //Вывод информации при загрузке страницы
    if(window.location.pathname === '/technics/management')
    {
        getDataFullCalendar('/technics/management');
    }
    if(window.location.pathname === '/technics/counterparty')
    {
        getViewContent('table_counterpartys');
        getViewContent('table_counterpartyDocs');
    }
    else if(window.location.pathname === '/administration/management')
    {
        getViewContent('table_organizations');
        getViewContent('table_sectors');
    }
    else if(window.location.pathname === '/administration/access')
    {
        getViewContent('table_roles');
    }
    else if(window.location.pathname === '/administration/users')
    {
        getViewContent('table_users');
    }

})
