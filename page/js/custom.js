jQuery(function($) {
    "use strict";
	
	$('body').on('change', '#nin', function(e) {
        e.preventDefault();
		var id = $("#nin").val();
        $.ajax({
        	type : "POST",
        	url  : "data.php?page=saldo",
        	data :  {id : id},
        	success : function(data){
                console.log(data);
				$("#saldo").val(data);
        	}
        });
    });
	
	
	
});
