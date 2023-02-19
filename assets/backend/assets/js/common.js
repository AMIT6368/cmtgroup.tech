// var base_url = '<?php echo  base_url();  ?>';
// var urllink = '<?php echo  base_url();  ?>';
function black_notification(message) {
	Lobibox.notify('default', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		msg: message
	});
}

function info_notification(message) {
	Lobibox.notify('info', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-info-circle',
		msg: message
	});
}

function warning_notification(message) {
	Lobibox.notify('warning', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-error',
		msg: message
	});
}

function error_notification(message) {
	Lobibox.notify('error', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-x-circle',
		msg: message
	});
}

function success_notification(message) {
	Lobibox.notify('success', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-check-circle',
		msg: message
	});
}


// $('body').on('click','#Logout',function(){

// swal({
//     title: "Are you sure?",
//     text: "This will logout from your account.",
//     type: "warning",
//     showCancelButton: true,
//     confirmButtonColor: "#DD6B55",
//     confirmButtonText: "Yes, I Want to logout",
//     closeOnConfirm: false
// }, function() {
	
//       $.ajax({
//              type: 'POST',
//              url: urllink+'LogoutAjax',
//              data: {user_id: 'user_id'},
//              cache: false,
//              success: function(resultdata){
//               var resultdatamess = JSON.parse(resultdata);
              
//                   swal({
//               title: resultdatamess.message,
//               showCancelButton: false,
//               confirmButtonColor: 'LightSeaGreen',
//               confirmButtonText: 'Ok',
//               type: "success",
//               timer: 2000,
//               }, function(){
//                   window.location.href = urllink;
//               });

              
//             }
//         }); 




// });

// });