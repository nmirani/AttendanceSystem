

	<link rel='stylesheet' type='text/css' href='<?php echo $this->base; ?>/js/fullcalendar-1.6.4/fullcalendar/fullcalendar.css' />
    <script type='text/javascript' src='<?php echo $this->base; ?>/js/date.js'></script>
	<script type='text/javascript' src='<?php echo $this->base; ?>/js/jquery.min.js'></script>
    <script type='text/javascript' src='<?php echo $this->base; ?>/js/fullcalendar-1.6.4/fullcalendar/fullcalendar.js'></script>
    
    
<script>

var weekday=new Array(7);
weekday[0]="Sunday";
weekday[1]="Monday";
weekday[2]="Tuesday";
weekday[3]="Wednesday";
weekday[4]="Thursday";
weekday[5]="Friday";
weekday[6]="Saturday";



$(document).ready(function() {

$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			timeFormat: '',//h:mm{ - h:mm}' ,
			defaultView: 'agendaWeek'
	});

$('#calendar').fullCalendar( 'addEventSource',        
    function(start, end, callback) {
        // When requested, dynamically generate a
        // repeatable event for every monday.
        var events = [];
        var monday = 1;
        var one_day = (24 * 60 * 60 * 1000);

        for (loop = start.getTime();
             loop <= end.getTime();
             loop = loop + one_day) {

            var column_date = new Date(loop);
			
			
			<?php foreach($time_tables as $timetable): ?>
			
            	var n = weekday[column_date.getDay()];
				<?php if($timetable['StudentClass']['frequency'] == 'Every alternate week'){?> 
					var w_n = column_date.getWeek();
					if(w_n%2)
				<?php } ?>
				if (n == '<?php echo $timetable['StudentClass']['day_of_week']; ?>') {
					// we're in Moday, create the event
					events.push({
						title: '<?php echo substr($timetable['StudentClass']['start_time'], 0, 5); ?> - <?php echo substr($timetable['StudentClass']['end_time'], 0, 5); ?>\n<?php echo $timetable['StudentClass']['Course']['course_id']; ?> \n <?php echo $timetable['StudentClass']['Course']['course_name']; ?>',
						start: new Date(column_date.setHours(<?php echo substr($timetable['StudentClass']['start_time'], 0, 2); ?>, <?php echo substr($timetable['StudentClass']['start_time'], 3, 2); ?>)),
						end: new Date(column_date.setHours(<?php echo substr($timetable['StudentClass']['end_time'], 0, 2); ?>, <?php echo substr($timetable['StudentClass']['end_time'], 3, 2); ?>)),
						allDay: false
					});
				}
			
			<?php endforeach; ?>
			
        } // for loop

        // return events generated
        callback( events );
    }
);




});
</script>




<div class="time_table view">

	<div id='calendar'></div>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link('View Courses Taught', '/teacher/user_courses'); ?></li>
        <li><?php echo $this->Html->link('#View Student Attendance', '#'); ?></li>
        <li><?php echo $this->Html->link('View List of Students', '/teacher/users/student'); ?></li>
        <li><?php echo $this->Html->link('#Add/Edit Attendance', '#'); ?></li>
        <li><?php echo $this->Html->link('View All Courses', '/teacher/courses/'); ?></li>

	</ul>
</div>



<?php //debug($time_tables); ?>