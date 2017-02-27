
$(document).ready(function () {

	$("#addItemButton").click(function() {
		//alert("Form has been submitted. ");//Testing alert
		//Data retrieval (input, list):
		var input = $("input[name='newItem']").val();//Retrieve the new item input from the form
		var list = $("input[name='lid']").attr('value');//Retrieve the list to be submitted to the processing file
		//alert(input +  " " + list);
		if (input) {
		//Sending this data to the processing file:
		$.post( "addItemAJAX.php",
			{lid:list, newItem:input},
			function ( data, status ) {//Action to be carried out on processing script completion, to update the page to include the item
				$("#listView table tbody").append("<tr id='" + data + "'><td><input type='checkbox' name='" + data + "' ></td><td>" + input + "</td></tr>");
				$("input[name='newItem']").val("");

			});//.done(function(){alert("Post Done");}).fail(function(){alert("Post Fail");});
		}
		return false;
		});



});
