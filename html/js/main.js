$(function(){
    $('#today-date-text').html(moment().format('dddd'));
    $('#today-date-number').html(moment().format('D'));
    $('#today-month').html(moment().format('MMMM'));
    $('#today-time').html(moment().format('h:mm a'));

    // auto resize textarea
    autosize(document.getElementById('getTodayMinuts'));





// get Goals Ev

    $('#getGoals').on('keyup', function getGoalsEv (key) {
    	if(key.keyCode == 13) {
		   $('<li class="goal">'+this.value+'</li>').insertBefore($(this).parent());
		   this.value = '';
		 }
    });

    $('#goalsList').on('click', '.goal', function RmvGoals (argument) {
        $(this).remove();
    });

// get Tags EV

    $('#getTags').on('keyup', function getGoalsEv (key) {
    	if(key.keyCode == 13) {
		   $('<li class="tag">'+this.value+'</li>').insertBefore($(this).parent());
		   this.value = '';
		 }
    });

    $('#tagList').on('click', '.tag', function RmvGoals (argument) {
        $(this).remove();
    });







































});