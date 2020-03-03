//allows submitting form without page refresh
function SubmitForm(){
	var input = $("input").val();
	$.post("translate.php", {input: input},
		function(data){
			$('#results').html(data);
			$('#myForm')[0].reset();
		});
}