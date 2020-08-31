/* ------------------------------------------------------------------------------
*
*  # Date and time pickers
*
*  Specific JS code additions for picker_date.html page
*
*  Version: 1.1
*  Latest update: Aug 10, 2016
*
* ---------------------------------------------------------------------------- */

$(function() {


    // Date range picker
    // ------------------------------

    // Basic initialization
    $('.daterange-basic').daterangepicker({
        applyClass: 'bg-slate-600',
        cancelClass: 'btn-default'
    });


    // Display week numbers
    $('.daterange-weeknumbers').daterangepicker({
        showWeekNumbers: true,
        applyClass: 'bg-slate-600',
        cancelClass: 'btn-default'
    });


    // Button class options
    $('.daterange-buttons').daterangepicker({
        applyClass: 'btn-success',
        cancelClass: 'btn-danger'
    });


    // Display time picker
    $('.daterange-time').daterangepicker({
        timePicker: true,
        applyClass: 'bg-slate-600',
        cancelClass: 'btn-default',
        locale: {
            format: 'MM/DD/YYYY h:mm a'
        }
    });


    // Show calendars on left
    $('.daterange-left').daterangepicker({
        opens: 'left',
        applyClass: 'bg-slate-600',
        cancelClass: 'btn-default'
    });


    // Single picker
    $('.daterange-single').daterangepicker({ 
        singleDatePicker: true
    });


    // Display date dropdowns
    $('.daterange-datemenu').daterangepicker({
        showDropdowns: true,
        opens: "left",
        applyClass: 'bg-slate-600',
        cancelClass: 'btn-default'
    });


    // 10 minute increments
    $('.daterange-increments').daterangepicker({
        timePicker: true,
        opens: "left",
        applyClass: 'bg-slate-600',
        cancelClass: 'btn-default',
        timePickerIncrement: 10,
        locale: {
            format: 'MM/DD/YYYY h:mm a'
        }
    });


    // Localization
    $('.daterange-locale').daterangepicker({
        applyClass: 'bg-slate-600',
        cancelClass: 'btn-default',
        opens: "left",
        ranges: {
            'Сегодня': [moment(), moment()],
            'Вчера': [moment().subtract('days', 1), moment().subtract('days', 1)],
            'Последние 7 дней': [moment().subtract('days', 6), moment()],
            'Последние 30 дней': [moment().subtract('days', 29), moment()],
            'Этот месяц': [moment().startOf('month'), moment().endOf('month')],
            'Прошедший месяц': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
        },
        locale: {
            applyLabel: 'Вперед',
            cancelLabel: 'Отмена',
            startLabel: 'Начальная дата',
            endLabel: 'Конечная дата',
            customRangeLabel: 'Выбрать дату',
            daysOfWeek: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт','Сб'],
            monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
            firstDay: 1
        }
    });


    //
    // Pre-defined ranges and callback
    //

    // Initialize with options
    $('.daterange-predefined').daterangepicker(
        {
            startDate: moment().subtract('days', 29),
            endDate: moment(),
            minDate: '01/01/1900',
            maxDate: '12/31/2016',
            dateLimit: { days: 60 },
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                'Last 7 Days': [moment().subtract('days', 6), moment()],
                'Last 30 Days': [moment().subtract('days', 29), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
            },
            opens: 'left',
            applyClass: 'btn-small bg-slate',
            cancelClass: 'btn-small btn-default'
        },
        function(start, end) {
            $('.daterange-predefined span').html(start.format('MMMM D, YYYY') + ' &nbsp; - &nbsp; ' + end.format('MMMM D, YYYY'));
            $.jGrowl('Date range has been changed', { header: 'Update', theme: 'bg-primary', position: 'center', life: 1500 });
        }
    );

    // Display date format
    $('.daterange-predefined span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' &nbsp; - &nbsp; ' + moment().format('MMMM D, YYYY'));


    //
    // Inside button
    //

    // Initialize with options
    $('.daterange-ranges').daterangepicker(
        {
            startDate: moment().subtract('days', 29),
            endDate: moment(),
            minDate: '01/01/1900',
            maxDate: '12/31/2016',
            dateLimit: { days: 60 },
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                'Last 7 Days': [moment().subtract('days', 6), moment()],
                'Last 30 Days': [moment().subtract('days', 29), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
            },
            opens: 'left',
            applyClass: 'btn-small bg-slate-600',
            cancelClass: 'btn-small btn-default'
        },
        function(start, end) {
            $('.daterange-ranges span').html(start.format('MMMM D, YYYY') + ' &nbsp; - &nbsp; ' + end.format('MMMM D, YYYY'));
        }
    );

    // Display date format
    $('.daterange-ranges span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' &nbsp; - &nbsp; ' + moment().format('MMMM D, YYYY'));


    
    // Pick-a-date picker
    // ------------------------------


    // Basic options
    $('.pickadate').pickadate();


    // Change day names
    $('.pickadate-strings').pickadate({
        weekdaysShort: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
        showMonthsShort: true
    });


    // Button options
    $('.pickadate-buttons').pickadate({
        today: '',
        close: '',
        clear: 'Clear selection'
    });


    // Accessibility labels
    $('.pickadate-accessibility').pickadate({
        labelMonthNext: 'Go to the next month',
        labelMonthPrev: 'Go to the previous month',
        labelMonthSelect: 'Pick a month from the dropdown',
        labelYearInput: 'Pick a year from the dropdown',
        selectMonths: true,
        selectYears: true
    });


    // Localization
    $('.pickadate-translated').pickadate({
        monthsFull: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
        weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
        today: 'aujourd\'hui',
        clear: 'effacer',
        formatSubmit: 'yyyy/mm/dd'
    });


    // Format options
    $('.pickadate-format').pickadate({

        // Escape any “rule” characters with an exclamation mark (!).
        format: 'dd.mm.yyyy',
        formatSubmit: 'yyyy/mm/dd',
        hiddenPrefix: 'prefix__',
        hiddenSuffix: '__suffix'
    });


    // Editable input
    var $input_date = $('.pickadate-editable').pickadate({
        editable: true,
        onClose: function() {
            $('.datepicker').focus();
        }
    });

    var picker_date = $input_date.pickadate('picker');
    $input_date.on('click', function(event) { // register events (https://github.com/amsul/pickadate.js/issues/542)
        if (picker_date.get('open')) {
            picker_date.close();
        } else {
            picker_date.open();
        }                        
        event.stopPropagation();
    });


    // Dropdown selectors
    $('.pickadate-selectors').pickadate({
        selectYears: true,
        selectMonths: true
    });


    // Year selector
    $('.pickadate-year').pickadate({
        selectYears: 4
    });


    // Set first weekday
    $('.pickadate-weekday').pickadate({
        firstDay: 1
    });


    // Date limits
    $('.pickadate-limits').pickadate({
        min: [2014,3,20],
        max: [2014,7,14]
    });


    // Disable certain dates
    $('.pickadate-disable').pickadate({
        disable: [
            [2015,8,3],
            [2015,8,12],
            [2015,8,20]
        ]
    });


    // Disable date range
    $('.pickadate-disable-range').pickadate({
        disable: [
            5,
            [2013, 10, 21, 'inverted'],
            { from: [2014, 3, 15], to: [2014, 3, 25] },
            [2014, 3, 20, 'inverted'],
            { from: [2014, 3, 17], to: [2014, 3, 18], inverted: true }
        ]
    });


    // Events
    $('.pickadate-events').pickadate({
        onStart: function() {
            console.log('Hello there :)')
        },
        onRender: function() {
            console.log('Whoa.. rendered anew')
        },
        onOpen: function() {
            console.log('Opened up')
        },
        onClose: function() {
            console.log('Closed now')
        },
        onStop: function() {
            console.log('See ya.')
        },
        onSet: function(context) {
            console.log('Just set stuff:', context)
        }
    });
    
});
