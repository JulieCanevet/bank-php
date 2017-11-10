$('.plus').click(function(){
	$( ".add" ).toggle( "slow" );
});

 $('.sum').each(function(index){
 	if($('.sum').eq(index).text() > 0){
 		$('.color').eq(index).css('color', 'green');
 	}
 })
 
 $('.sum').each(function(index){
	if($('.sum').eq(index).text() < 0){
		$('.color').eq(index).css('color', 'red');
 	}
 })
