$('.plus').click(function(){
	$( ".add" ).toggle( "slow" );
});

 $('.sum').each(function(index){
 	if($('.sum').eq(index).text() > 0){
 		$('.color').eq(index).css('color', '#67ce0a');
 	}
 })
 
 $('.sum').each(function(index){
	if($('.sum').eq(index).text() < 0){
		$('.color').eq(index).css('color', '#c30e15');
 	}
 })
