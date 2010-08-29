var interval = null;

$(document).ready(function(){

	colourExpired();
	setRefreshInterval();

});


function setRefreshInterval(){
	clearInterval(interval);
	interval = setInterval('pageReload()', 1000 * document.getElementById('refresh_rate').value);
}

function pageReload(){

	$("img#loading_gif").removeClass("hidden");
	$("div#content").load("viewer.php", colourExpired);
	setTimeout(function(){$("img#loading_gif").addClass("hidden")}, 100);

}

function colourExpired(){

        $("div#content table tr td.expires_in").each(function(){
                if ($(this).text() == 'expired'){
                        $(this).addClass('expired');
                }
        });

}
