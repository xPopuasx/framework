<div class="row">
  <div class="col-md-12">
      <div class="panel panel-flat">
          <div class="panel-heading">
              <h5 class="panel-title">График работы техники</h5>
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
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    var calendar = $('.fullcalendar-basic').fullCalendar({
        editable: true,
        header: {
            left: 'prev, next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        events: '../../views/includes/fullcalendar/fullcalendar.php',
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay)
        {
          $('#hidden_modal').click();

          var start = $.fullCalendar.formatDate(start, 'DD.MM.Y');
          $('.prev-modal-li').click(function(){
            setTimeout(function(){
              $('input[name="deliver_date"]').val(start)
            }, 800);
            $(document).on("click", "#fullcalendar_button", function (e) {
              setTimeout(function(){
                calendar.fullCalendar('refetchEvents');
              }, 400);
            })
          })
        },
        eventLimit: true,
        eventDrop: function(event)
        {
          var start = $.fullCalendar.formatDate(event.start, 'DD.MM.Y');
          var id = event.id;
          var action = 'Drop';

          $.ajax({
            url:'../../views/includes/fullcalendar/fullcalendar.php',
            type: 'POST',
            data: {action:action, id:id, start:start},
            success: function()
            {
              calendar.fullCalendar('refetchEvents');
              swal({
                  title: "Выполнено",
                  text: "Событие успешно перенесено",
                  confirmButtonColor: "#66BB6A",
                  type: "success"
              });
            }
          })

        },
        eventClick: function(event)
        {
            var id = event.id;
          swal({
              title: "Работа с событием",
              type: "info",
              text: "<a href = 'event/"+id+"' class='btn btn-primary'><i class='icon-eye2'></i> Прейти к событию</a><br> <hr>так же вы можете удалить данное событие",
              html: true,
              showCancelButton: true,
              confirmButtonColor: "#EF5350",
              confirmButtonText: `Удалить событие`,
              cancelButtonText: "Отмена",
              closeOnConfirm: false
          },
          function(isConfirm){
              if (isConfirm) {
                  var action = 'Deleted';
                $.ajax({
                  url:'../../views/includes/fullcalendar/fullcalendar.php',
                  type: 'POST',
                  data: {action:action, id:id},
                  success: function()
                  {
                    calendar.fullCalendar('refetchEvents');
                    swal({
                        title: "Выполнено",
                        text: "Событие успешно удалено",
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                    });
                  }
                })
              }
          });
        },
        isRTL: $('html').attr('dir') == 'rtl' ? true : false
    });
});
</script>
<span id="hidden_modal" data-toggle="modal" data-target="#modal_add_work_technic_wariation" ></span>
<div id="modal_add_work_technic_wariation" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Добавить договор</h5>
            </div>

            <div class="modal-body">
              <div class="sidebar-content">
                  <div class="sidebar-category">
                      <div class="category-content no-padding">
                          <ul class="navigation navigation-alt navigation-accordion" >
                              <li  class="prev-modal-li"  ><a style="color:#000000;"><i class="icon-add"></i> Добавить технику</a></li>
                              <li style="display:none" class = "modal-li" data-toggle="modal" data-target="#modal_add_work_technic" ><i class="icon-add"></i> Добавить технику</a></li>
                              <li  class="prev-modal-li"  ><a style="color:#000000;"><i class="icon-alignment-align"></i> Добавить доставку</a></li>
                              <li style="display:none" class = "modal-li" data-toggle="modal" data-target="#modal_add_work_technic_deliver"><i class="icon-alignment-align"></i> Добавить доставку</a></li>
                          </ul>
                      </div>
                  </div>
               </div>
            </div>

        </div>
    </div>
</div>
