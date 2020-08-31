/* ------------------------------------------------------------------------------
*
*  # Fullcalendar basic options
*
*  Demo JS code for extra_fullcalendar_views.html and 
*  extra_fullcalendar_styling.html pages
*
* ---------------------------------------------------------------------------- */

document.addEventListener('DOMContentLoaded', function() {


    // Add events
    // ------------------------------

    // Default events
    var events = [
        {
            title: '!',
            start: '2014-11-01'
        }
    ];



    // Initialization
    // ------------------------------

    // Basic view
    $('.fullcalendar-basic').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        defaultDate: '2014-11-12',
        eventLimit: true,
        events: events,
        isRTL: $('html').attr('dir') == 'rtl' ? true : false
    });


   
});