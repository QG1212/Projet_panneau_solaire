function showAlert(message, type = 'info') {
    let alertConfig = {
        title: '',
        text: message,
        icon: '',
        showConfirmButton: true,
        confirmButtonText: 'OK',
        timer: 5000,
        customClass: {
            confirmButton: 'btn-confirm'
        },
    };

    switch (type) {
        case 'success':
            alertConfig.icon = 'success';
            alertConfig.title = 'Succès!';
            break;
        case 'error':
            alertConfig.icon = 'error';
            alertConfig.title = 'Erreur!';
            break;
        case 'warning':
            alertConfig.icon = 'warning';
            alertConfig.title = 'Attention!';
            break;
        case 'info':
        default:
            alertConfig.icon = 'info';
            alertConfig.title = 'Information';
            break;
    }

    Swal.fire(alertConfig);

    if (type === 'warning') {
        $('.btn-confirm').css({
            'background-color': '#ffc107',
            'border-color': '#ffc107',
            'color': '#fff',
        });
    } else if (type === 'success') {
        $('.btn-confirm').css({
            'background-color': '#28a745',
            'border-color': '#28a745',
            'color': '#fff',
        });
    } else if (type === 'error') {
        $('.btn-confirm').css({
            'background-color': '#dc3545',
            'border-color': '#dc3545',
            'color': '#fff',
        });
    }
}