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

    var event = [
      {
        'title' : 'событие',
        'start' : '2020-09-23'
      }
    ]

    // Initialization
    // ------------------------------

    // Basic view
    var now = new Date();
    var calendar = $('.fullcalendar-basic').fullCalendar({
        editable: true,
        header: {
            left: 'prev,next today',
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
            }, 600);
            $('#fullcalendar_button').click(function(){
              alert();
            })
          })





        }

    });



});
</script>
<span  id="hidden_modal" data-toggle="modal" data-target="#modal_add_work_technic_wariation" ></span>
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
