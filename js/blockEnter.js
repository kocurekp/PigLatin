//block enter key from submitting form
$(document).keypress(
  function(event){
    if (event.which == '13') {
      event.preventDefault();
    }
});
