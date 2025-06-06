const apiBase = './api/index.php';

// Stat Numbers
function fetchStat(endpoint, elementId) {
    $.getJSON(apiBase + endpoint).done(function(data) {
        $('#' + elementId).text(data);                      //getElementById(-).innerHTML(-)
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.error(`Error fetching ${endpoint}:`, textStatus, errorThrown);
        $('#' + elementId).text('Error');
    });
}

fetchStat('/nbInstallations', 'nbInstallation');
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
      // First element is the data response
        const yearData = dataYear[0];
        const regionData = dataRegion[0];

        const years = yearData.map(item => item.year);
        const yearCounts = yearData.map(item => item.count);

        const regions = regionData.map(item => item.region);
        const regionCounts = regionData.map(item => item.count);

        // Destroy old charts if they exist
        if(chartYear) chartYear.destroy();
        if(chartRegion) chartRegion.destroy();

        // Year Chart
        chartYear = new Chart(ctxYear, {
            type: 'bar',
            data: {
              labels: years,
              datasets: [{
                label: 'Installations',
                data: yearCounts,
                backgroundColor: '#198754'
            }]
            }, options: {
                responsive: true
            }
        });

        // Region Chart
        chartRegion = new Chart(ctxRegion, {
            type: 'bar',
            data: {
                labels: regions,
                datasets: [{
                    label: 'Installations',
                    data: regionCounts,
                    backgroundColor: '#0d6efd'
                }]
            }, options: {
                responsive: true
            }
        });

    }).fail(function(jqXHR, textStatus, errorThrown) {
      console.error('Error loading chart data:', textStatus, errorThrown);
    });
}

fetchChartData();