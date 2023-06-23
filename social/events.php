<?php $pageName = 'events'; ?>

<?php include 'partials/header.php'; ?>

<?php include 'partials/body-top.php'; ?>

<style>
div.fc-cell-shaded {
	background-color: grey;
}
.kink-event {
	background-color: darkred;
	border-color: maroon;
}
</style>

<!-- Events START -->
<div class="card">
	<!-- Card header START -->
	<div class="card-header d-sm-flex align-items-center justify-content-between border-0 pb-0">
		<h5 class="card-title mb-sm-0">Upcoming events</h5>
	</div>
	<!-- Card header END -->
	<!-- Card body START -->
	<div class="card-body">
		<div id='calendar'></div>
	</div>
</div>
<div class="card">
	<div class="card-header d-sm-flex align-items-center justify-content-between border-0 pb-0">
		<h5 class="card-title mb-sm-0">Recurring & past events</h5>
	</div>
	<div class="card-body">
		<div class="row mb-4">
			<div class="list-group">
				<a href="https://www.clubantichrist.co.uk/" class="kink d-none list-group-item list-group-item-action">Club Antichrist</a>
				<a href="https://www.bizarre-events.com/club-labrys" class="kink d-none list-group-item list-group-item-action">Club Labrys</a>
				<a href="https://londonalternativemarket.com/" class="kink d-none list-group-item list-group-item-action">LAM</a>
				<a href="https://klubverboten.com/dates" class="kink d-none list-group-item list-group-item-action">Klub Verboten</a>
				<a href="#" class="kink d-none list-group-item list-group-item-action">Le Boutique Bazaar</a>
				<a href="#" class="kink d-none list-group-item list-group-item-action">Naughties</a>
				<a href="#" class="kink d-none list-group-item list-group-item-action">DEBAUCHERY</a>
			</div>
		</div>
	</div>
	<!-- Card body END -->
</div>
<!-- Events START -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/google-calendar@6.1.8/index.global.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
	var calendarEl = document.getElementById('calendar');
	var calendar = new FullCalendar.Calendar(calendarEl, {
		firstDay: 1, // Monday
		headerToolbar: { center: 'listYear,timeGridWeek,dayGridMonth' },
		initialView: 'listYear',
		nowIndicator: true,
		googleCalendarApiKey: 'AIzaSyCrg7JZIhKZIgTgef_3MTOjer0lG72WXPY',
		events: {
			googleCalendarId: 'c_1460e43f6b02ba57b9ed14513b3c4b12123a355995514ead248d94f709515471@group.calendar.google.com',
			className: 'kink-event',
		},
		eventClick: function(info) {
			info.jsEvent.preventDefault();

			if (info.event.extendedProps.description) {
				const el = document.createElement('html');
				el.innerHTML = info.event.extendedProps.description;
				const a = el.getElementsByTagName('a')[0];

				window.open(a.href, '_blank');
			}
		},
	});

	if (!url.has('kink')) {
		const sources = calendar.getEventSources();

		for (const source of sources) {
			if (source.context.calendarOptions.events.className === 'kink-event') {
				source.remove();
			}
		}
	}

	calendar.render();
});

</script>
<?php include 'partials/body-bottom.php'; ?>
