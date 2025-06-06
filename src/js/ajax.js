function ajaxRequest(method, url, callback) {
    const xhr = new XMLHttpRequest();
    xhr.open(method, url);
    xhr.onload = () => {
        if (xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);
            callback(data);
        } else {
            console.error('Erreur de chargement : ' + xhr.status);
        }
    };
    xhr.send();
}
