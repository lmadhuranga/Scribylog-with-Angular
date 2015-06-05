$(function(){
    $('#today-date-text').html(moment().format('dddd'));
    $('#today-date-number').html(moment().format('D'));
    $('#today-month').html(moment().format('MMMM'));
    $('#today-time').html(moment().format('h:mm a'));

    // auto resize textarea
    autosize(document.getElementById('getTodayMinuts'));





// getGoalsEv


    $('#getGoals').on('keyup', function getGoalsEv (key) {
    	if(key.keyCode == 13) { 
		   $('<li class="goal">'+this.value+'</li>').insertBefore($(this).parent());
		   this.value = '';
		 }
    });

    $('#goalsList').on('click', function RmvGoals (argument) {
    	// body...
    })
});