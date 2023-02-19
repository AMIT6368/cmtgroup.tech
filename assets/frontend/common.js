var base_url = 'https://cmtgroup.tech/';
function info_notification(message) {
    Lobibox.notify('info', {
        pauseDelayOnHover: true,
        continueDelayOnInactiveTab: false,
        size: 'mini',
        icon: 'bx bx-x-circle',
        position: 'center top',
        width: 300,
        img: base_url+'assets/frontend/notifications/img/4.jpg',
        msg: message
    });
}

function warning_notification(message) {
    Lobibox.notify('warning', {
        pauseDelayOnHover: true,
        continueDelayOnInactiveTab: false,
        size: 'mini',
        icon: 'bx bx-x-circle',
        position: 'center top',
        width: 300,
        img: base_url+'assets/frontend/notifications/img/4.jpg',
        msg: message
    });
}

function error_notification(message) {
    Lobibox.notify('error', {
        pauseDelayOnHover: true,
        continueDelayOnInactiveTab: false,
        size: 'mini',
        icon: 'bx bx-x-circle',
        position: 'center top',
        width: 300,
        img: base_url+'assets/frontend/notifications/img/error3.png',
        msg: message
    });
}

function success_notification(message) {
    Lobibox.notify('success', {
        pauseDelayOnHover: true,
        continueDelayOnInactiveTab: false,
        size: 'mini',
        position: 'center top',
        icon: 'bx bx-check-circle',
        width: 300,
        img: base_url+'assets/frontend/notifications/img/right1.png',
        msg: message
    });
}




