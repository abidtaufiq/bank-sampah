jQuery(function($) {
    "use strict";
		
	
	$('body').on('change', '.pengirim', function(e) {
        e.preventDefault();
		getJenis();
    });
	
	$('body').on('change', '.provinsi', function(e) {
        e.preventDefault();
		var id = $("#provinsi").val();
        $.ajax({
        	type : "POST",
        	url  : "data.php?page=cari-kota",
        	data :  {id : id},
        	success : function(data){
				$("#kota").html(data);
				
				getJenis();
        	}
        });
    });
		
	$('body').on('change', '.kota', function(e) {
        e.preventDefault();
		document.getElementById("kurir").disabled = false;
    });
	
	
	
	$('body').on('change', '.kurir', function(e) {
        e.preventDefault();
		var id = $("#kurir").val();
        $.ajax({
        	type : "POST",
        	url  : "data.php?page=jenis-kurir",
        	data :  {id : id},
        	success : function(data){
				$("#jenis").html(data);
				
				getJenis();
        	}
        });
    });
	
	$('body').on('change', '.jenis', getJenis);
	function getJenis(){
 
		var pengirim = $("#pengirim").val();
		var kurir = $("#kurir").val();
		var jenis = $("#jenis").val();
		var kota  = $("#kota").val();
		console.log(kurir);
		console.log(jenis);
		console.log(kota);
		console.log(pengirim);
        $.ajax({
        	type : "POST",
        	url  : "data.php?page=ongkir",
        	data :  {kurir : kurir, jenis : jenis, kota : kota, pengirim : pengirim},
        	success : function(data){
				console.log(data);
				$("#ongkir").val(data);
        	}
        });
		
	}
	
	
	
});