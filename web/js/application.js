jQuery(document).ready(function(){

$("#zipsearch").autocomplete({
		source: "/suggest_zip.php",
		focus: function(event, ui) {
			// prevent autocomplete from updating the textbox
			event.preventDefault();
			// manually update the textbox
			$(this).val(ui.item.label);
		},
		select: function(event, ui) {
			// prevent autocomplete from updating the textbox
			event.preventDefault();
			// manually update the textbox and hidden field
			$(this).val(ui.item.label);
			$("#zipsearch").val(ui.item.value);
			$redirect = "http://symfony.scurtin.org/app_dev.php/?term=" + ui.item.value;
			console.log("http://symfony.scurtin.com/term=" + ui.item.value );
			window.location = $redirect;
		}
	});
	
		$(function() {
		$( "#tabs" ).tabs();
		});
});
