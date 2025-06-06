function ajaxRequest(method, url, callback) {
    fetch(url, { method })
        .then(response => {
            if (!response.ok) {
                throw new Error("Erreur HTTP : " + response.status);
            }
            return response.json();
        })
        .then(data => callback(data))
        .catch(error => console.error("Erreur AJAX :", error));
}