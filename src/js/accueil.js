const apiBase = '/Projet_panneau_solaire/src/api/index.php';

// Stat Numbers
function fetchStat(endpoint, elementId) {
    $.getJSON(apiBase + endpoint).done(function(data) {
        if (Array.isArray(data) && data.length > 0) {
            const count = Object.values(data[0])[0];
            $('#' + elementId).text(count);
        } else {
            $('#' + elementId).text('0');
        }
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.error(`Error fetching ${endpoint}:`, textStatus, errorThrown);
        $('#' + elementId).text('Error');
    });
}

fetchStat('/nbInstallation', 'nbInstallation');
fetchStat('/nbInstallateurs', 'nbInstallateurs');
fetchStat('/nbOnduleurs', 'nbOnduleurs');
fetchStat('/nbPanneaux', 'nbPanneaux');

// Charts
const ctxYear = document.getElementById('chartYear').getContext('2d');
const ctxRegion = document.getElementById('chartRegion').getContext('2d');

let chartYear, chartRegion;

function fetchChartData() {
    $.when($.ajax({
        url: apiBase + '/nbInstallationAnnee',
        dataType: 'json'
    }), $.ajax({
        url: apiBase + '/nbInstallationRegion',
        dataType: 'json'
    })).done(function(dataYear, dataRegion) {
        const yearData = dataYear[0];
        const regionData = dataRegion[0];

        // ✅ Use correct key from API response
        const years = yearData.map(item => item.year);
        const yearCounts = yearData.map(item => item.nb_installations);

        const regions = regionData.map(item => item.region);
        const regionCounts = regionData.map(item => item.nb_installations); // Also fixed here if needed

        // Destroy old charts
        if (chartYear) chartYear.destroy();
        if (chartRegion) chartRegion.destroy();

        // Year Chart
        chartYear = new Chart(ctxYear, {
            type: 'bar',
            data: {
                labels: years,
                datasets: [{
                    label: 'Installations par année',
                    data: yearCounts,
                    backgroundColor: '#198754'
                }]
            },
            options: {
                responsive: true
            }
        });

        // Region Chart
        chartRegion = new Chart(ctxRegion, {
            type: 'bar',
            data: {
                labels: regions,
                datasets: [{
                    label: 'Installations par région',
                    data: regionCounts,
                    backgroundColor: '#0d6efd'
                }]
            },
            options: {
                responsive: true
            }
        });

    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.error('Error loading chart data:', textStatus, errorThrown);
    });
}

fetchChartData();