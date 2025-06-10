function ajaxRequest(method, url, callback, data = null) {
    let options = {
        method: method,
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        }
    };

    if (method === 'POST' && data) {
        options.body = data;
    }

    fetch(url, options)
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.text();  // on récupère le texte brut pour debug
        })
        .then(text => {
            console.log('Réponse brute du serveur:', text);
            try {
                const json = JSON.parse(text);
                callback(json);
            } catch (e) {
                console.error('Erreur JSON.parse:', e);
                // Optionnel : afficher un message utilisateur
                alert('Erreur dans la réponse du serveur. Voir console.');
            }
        })
        .catch(error => {
            console.error('Erreur fetch:', error);
        });
}
