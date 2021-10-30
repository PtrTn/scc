$(document).ready(function() {
    $('.datepicker').pickadate({
        clear: false,
        min: +1,
        disable: [6],
        formatSubmit: 'yyyy-mm-dd',
        onSet: function(context) {
            if (context.select === undefined) {
                return;
            }
            var date = new Date(context.select);
            var times = getTimesForDate(date);
            $('#participation_participationTime').val(times);
        }
    })
});

function getTimesForDate(date)
{
    var dayOfWeek = date.getDay();
    var timeMapping = {
        0: '12:00 - 15:00',
        1: '18:30 - 20:30',
        2: '18:30 - 20:30',
        3: '18:30 - 20:30',
        4: '18:30 - 20:30',
        5: '18:30 - 20:30',
        6: '-'
    };
    return timeMapping[dayOfWeek];
}
