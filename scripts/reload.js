$(document).ready(function(){

	colourExpired();
	setInterval('pageReload()', 1000);

});


function pageReload(){

	$("div#content").load("viewer.php", colourExpired);

}

function colourExpired(){

        $("div#content table tr td.expires_in").each(function(){
                if ($(this).text() == 'expired'){
                        $(this).addClass('expired');
                }
        });

}
