$(document).ready(function() {
	showNotification();
	setInterval(function(){ showNotification(); }, 20000);
});
function showNotification() {
	
	if (!Notification) {
		alert('*Browser does not support Web Notification');
		$('body').append('<h4 style="color:red">*Browser does not support Web Notification</h4>');
		return;
	}
	if (Notification.permission !== "granted") {		
		alert('Request Permission!');
		Notification.requestPermission();
	} else {
		$.ajax({
			url : "notification.php",
			type: "POST",
			success: function(data, textStatus, jqXHR) {
				var data = jQuery.parseJSON(data);
				if(data.result == true) {
					var data_notif = data.notif;
					for (var i = data_notif.length - 1; i >= 0; i--) {
						var theurl = data_notif[i]['kipindFk'];
						var notifikasi = new Notification(data_notif[i]['adFk'], {
							icon: data_notif[i]['kipindFk'],
							body: data_notif[i]['msg'],
						});
						notifikasi.onclick = function () {
							window.open(theurl); 
							notifikasi.close();     
						};
						setTimeout(function(){
							notifikasi.close();
						}, 5000);
					};
				} else {
				}
			},
			error: function(jqXHR, textStatus, errorThrown)	{}
		}); 
	}
};