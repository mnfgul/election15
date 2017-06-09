$(document).ready(function () {

    //Flip Cards
    //Product
    if(!navigator.userAgent.match(/iPad|iPhone|Android/i)) 
    {
	   $('.rotation').hover(function(event) 
        {
		  event.preventDefault(); $(this).addClass('hover');
	    }, function(event) {
		  event.preventDefault(); $(this).removeClass('hover');
	    });
        
        $('.hover').hover(function(){
        	$(this).find('.show-on-hover').removeClass('hide');
        }, function(){
            $(this).find('.show-on-hover').addClass('hide');
        });
    }
    
    /*-------------- Tooltip ----------------*/
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    

});

function afterVoteMsg()
{
	$("#afterVoteModal").modal();
}
