/*
 * 	Additional function for forms.html
 *	Written by ThemePixels	
 *	http://themepixels.com/
 *
 *	Copyright (c) 2012 ThemePixels (http://themepixels.com)
 *	
 *	Built for Amanda Premium Responsive Admin Template
 *  http://themeforest.net/category/site-templates/admin-templates
 */

jQuery(document).ready(function(){
	
	///// FORM TRANSFORMATION /////
	jQuery('input:checkbox, input:radio, select, input:file').uniform();


	///// DUAL BOX /////
	var db = jQuery('#dualselect').find('.ds_arrow .arrow');	//get arrows of dual select
	var sel1 = jQuery('#dualselect select:first-child');		//get first select element
	var sel2 = jQuery('#dualselect select:last-child');			//get second select element
	
	sel2.empty(); //empty it first from dom.
	
	db.click(function(){
		var t = (jQuery(this).hasClass('ds_prev'))? 0 : 1;	// 0 if arrow prev otherwise arrow next
		if(t) {
			sel1.find('option').each(function(){
				if(jQuery(this).is(':selected')) {
					jQuery(this).attr('selected',false);
					var op = sel2.find('option:first-child');
					sel2.append(jQuery(this));
				}
			});	
		} else {
			sel2.find('option').each(function(){
				if(jQuery(this).is(':selected')) {
					jQuery(this).attr('selected',false);
					sel1.append(jQuery(this));
				}
			});		
		}
	});
	
	
	
	///// FORM VALIDATION /////
	jQuery("#userform").validate({
		rules: {
			fullname: "required",
			userid: "required",
			password :"required", 
			password2: {
				equalTo: "#password" 
			},
			
		},
		messages: {
			fullname: "Please enter your full name",
			userid: "Please enter your ID",
			password: "Please enter your password"
		}
	});
	
	jQuery("#workcodeform").validate({
		rules: {
			workcodeid: "required",
			workcode: "required"
		},
		messages: {
			workcodeid: "Please enter workcode ID",
			workcode: "Please enter workcode"
		}
	});
	
	jQuery("#deviceform").validate({
		rules: {
			ip: "required",
			port: "required"
		},
		messages: {
			ip: "Please enter IP (i.e. 192.168.7.102)",
			port: "Please enter port"
		}
	});
	
	jQuery("#userform").submit(function() {
		// validate and process form
		// first hide any error messages
		jQuery('#message').hide();
			
		//var userid = jQuery("input#userid").val();
		//var fullname = jQuery("input#fullname").val();
		//var csn = jQuery("input#csn").val();
		var url_ajax = jQuery(this).attr('action');
		
		if(jQuery("input#userid").val() == "" | jQuery("input#fullname").val() == "") {
			return false;
		} else {
			jQuery.ajax({
			type: "POST",
			url: url_ajax,
			data: jQuery(this).serialize(),
			success: function(data) {
				var response = JSON.parse(data);
				if(response.status == 'success') {
					jQuery('#message').html("<div class=\"notibar msgsuccess smallinput\"><a class=\"close\"></a><p>User " + response.iditem + " berhasil disimpan!</p></div>")
					.hide()
					.fadeIn(100, function() {
						jQuery('input.reset').click();
					});
				} else if(response.status == 'error') {
					jQuery('#message').html("<div class=\"notibar msgerror smallinput\"><a class=\"close\"></a><p>User " + response.iditem + " terdeteksi ganda!</p></div>")
					.hide()
					.fadeIn(100, function() {
						//jQuery('input.reset').click();
					});
				}
				
			}
			});
			return false;
		}
	});
	
	jQuery("#workcodeform").submit(function() {
		jQuery('#message').hide();;
		var url_ajax = jQuery(this).attr('action');
		
		if(jQuery("input#workcodeid").val() == "" | jQuery("input#workcode").val() == "") {
			return false;
		} else {
			jQuery.ajax({
			type: "POST",
			url: url_ajax,
			data: jQuery(this).serialize(),
			success: function(data) {
				var response = JSON.parse(data);
				if(response.status == 'success') {
					jQuery('#message_workcode').html("<div class=\"notibar msgsuccess smallinput\"><a class=\"close\"></a><p>Lesson Code " + response.iditem + " berhasil disimpan!</p></div>")
					.hide()
					.fadeIn(100, function() {
						jQuery('input.reset').click();
					});
				} else if(response.status == 'error') {
					jQuery('#message_workcode').html("<div class=\"notibar msgerror smallinput\"><a class=\"close\"></a><p>Device " + response.iditem + " terdeteksi ganda!</p></div>")
					.hide()
					.fadeIn(100, function() {
						//jQuery('input.reset').click();
					});
				}
				}
			});
				return false;
		}
	});
	
	jQuery("#deviceform").submit(function() {
		jQuery('#message').hide();
		var url_ajax = jQuery(this).attr('action');
		
		if(jQuery("input#deviceno").val() == "" | jQuery("input#ip").val() == "" | jQuery("input#port").val() == "") {
			return false;
		} else {
			jQuery.ajax({
			type: "POST",
			url: url_ajax,
			data: jQuery(this).serialize(),
			success: function(data) {
				var response = JSON.parse(data);
				if(response.status == 'success') {
					jQuery('#message_device').html("<div class=\"notibar msgsuccess smallinput\"><a class=\"close\"></a><p>Device Conf " + response.iditem+ " berhasil disimpan!</p></div>")
					.hide()
					.fadeIn(25, function() {
						jQuery('input.reset').click();
					});
				} else if(response.status == 'error') {
					jQuery('#message_device').html("<div class=\"notibar msgerror smallinput\"><a class=\"close\"></a><p>Terjadi kesalahan dalam menyimpan device " + response.iditem+ "!</p></div>")
					.hide()
					.fadeIn(25, function() {
						jQuery('input.reset').click();
					});
				}				
			}
			});
			return false;
		}
	});
	
	jQuery(".delete_button").click(function() {
		var currentObj = jQuery(this);
		var url_ajax = currentObj.attr('href');
		jQuery.ajax({
			type: "POST",
			url: url_ajax,
			success: function(data) {
				var response = JSON.parse(data);
				if(response.status == 'success') {
					jQuery('.message').html("<div class=\"notibar msgsuccess smallinput\"><a class=\"close\"></a><p>ID " + response.iditem+ " berhasil dihapus!</p></div>")
					.hide()
					.fadeIn(25, function() {
						jQuery('table.stdtable').animate();
					});
					currentObj.parent().parent().remove();
				} else if(response.status == 'error') {
					jQuery('.message').html("<div class=\"notibar msgerror smallinput\"><a class=\"close\"></a><p>Terjadi kesalahan dalam menghapus ID " + response.iditem+ "!</p></div>")
					.hide()
					.fadeIn(25, function() {
						jQuery('input.reset').click();
					});
				}				
			}
			});
		return false;
	});
	
	

	
	
	///// TAG INPUT /////
	
	jQuery('#tags').tagsInput();

	
	///// SPINNER /////
	
	jQuery("#spinner").spinner({min: 0, max: 100, increment: 2});
	
	
	///// CHARACTER COUNTER /////
	
	jQuery("#textarea2").charCount({
		allowed: 120,		
		warning: 20,
		counterText: 'Characters left: '	
	});
	
	
	/*jQuery.ajax({
      type: "POST",
      url: "bin/process.php",
      data: dataString,
      success: function() {
        jQuery('#contact_form').html("<div id='message'></div>");
        jQuery('#message').html("<h2>Contact Form Submitted!</h2>")
        .append("<p>We will be in touch soon.</p>")
        .hide()
        .fadeIn(1500, function() {
          jQuery('#message').append("<img id='checkmark' src='images/check.png' />");
        });
      }
    });*/
    return false;
	
});