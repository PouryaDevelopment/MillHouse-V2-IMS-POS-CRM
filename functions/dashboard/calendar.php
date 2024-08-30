
<html lang="en">
<head>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <style type="text/css">
        :root {
  --fc-border-color: rgba(120 113 108);
  --fc-button-text-color: #fff;
  --fc-button-bg-color: rgba(245 158 11);
  --fc-button-border-color: rgba(250 204 21);
  --fc-button-hover-bg-color: rgba(250 204 21);
  --fc-button-hover-border-color: rgba(245 158 11);
  --fc-button-active-bg-color: rgba(250 204 21);
  --fc-button-active-border-color: rgba(146 64 14);
  --fc-daygrid-event-dot-width: 14px;

}
    </style>
</head>
<body class="relative -z-1">
     <div class="flex justify-center ">
        <img class="h-[200px] w-[200px]  "  src="./UI/calendar.png">
    </div>
    <div class="h-[630px] p-2  " id='calendar'></div>
</body>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: 'functions/dashboard/calendar_events.php' 
    });
    calendar.render();
});
</script>

</html>
