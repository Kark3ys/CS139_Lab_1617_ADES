$( document ).ready(function() {
	$( "table tbody" ).on( "click", "tr td input[type='checkbox']", function() {
		var iid = $( this ).attr( "name" ); //Get the item ID of the selected checkbox.
		var ch = $( this ).prop( "checked" );
		$( "#holder" ).html( "Check Change: " + iid + " " + ch );
		$.post( "check_process.php", {itemID: iid, checked: ch}, function(data, status){
			$( "#result" ).html( "Page Data: <br \> " + data + "<br \>Status: " + status );
		});
	});
});