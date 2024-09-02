{{--  <script>
    $(document).ready(function() {
        var salesChartCanvas = $('#salesChart').get(0).getContext('2d')

        const acceptedVisites = @json($nbrAccepterParMois);
        acceptedData = Object.keys(acceptedVisites).map((key) => acceptedVisites[key]);
        console.log(acceptedData);

        const refusedVisites = @json($nbrRefuserParMois);
        refusedData = Object.keys(refusedVisites).map((key) => refusedVisites[key]);
        console.log(refusedData);

        var salesChartData = {
            labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre',
                'Octobre', 'Novembre', 'Décembre'
            ],
            datasets: [{
                    label: 'Digital Goods',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: acceptedData
                },
                {
                    label: 'Electronics',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: refusedData
                }
            ]
        }

        var salesChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false
                    }
                }]
            }
        }

        // This will get the first returned node in the jQuery collection.
        // eslint-disable-next-line no-unused-vars
        var salesChart = new Chart(salesChartCanvas, {
            type: 'line',
            data: salesChartData,
            options: salesChartOptions
        })
    });
</script>  --}}



<script>
    $(document).ready(function() {
        'use strict'

        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }

        var mode = 'index'
        var intersect = true

        // Récupération des données depuis la base de données
        const acceptedVisites = @json($nbrAccepterParMois);
        const acceptedData = Object.keys(acceptedVisites).map((key) => acceptedVisites[key]);

        const refusedVisites = @json($nbrRefuserParMois);
        const refusedData = Object.keys(refusedVisites).map((key) => refusedVisites[key]);

        // Configuration du graphique en barres
        var $salesChart = $('#sales-chart').get(0).getContext('2d');
        var salesChartData = {
            labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre',
                'Octobre', 'Novembre', 'Décembre'
            ],
            datasets: [{
                    backgroundColor: '#007bff',
                    borderColor: '#007bff',
                    data: acceptedData
                },
                {
                    backgroundColor: '#ced4da',
                    borderColor: '#ced4da',
                    data: refusedData
                }
            ]
        }

        var salesChartOptions = {
            maintainAspectRatio: false,
            tooltips: {
                mode: mode,
                intersect: intersect
            },
            hover: {
                mode: mode,
                intersect: intersect
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: true,
                        lineWidth: '4px',
                        color: 'rgba(0, 0, 0, .2)',
                        zeroLineColor: 'transparent'
                    },
                    ticks: $.extend({
                        beginAtZero: true,
                    }, ticksStyle)
                }],
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    },
                    ticks: ticksStyle
                }]
            }
        }

        var salesChart = new Chart($salesChart, {
            type: 'bar',
            data: salesChartData,
            options: salesChartOptions
        })

        // Configuration du graphique en lignes
        var $visitorsChart = $('#visitors-chart').get(0).getContext('2d');
        var visitorsChartData = {
            labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre',
                'Octobre', 'Novembre', 'Décembre'
            ],
            datasets: [{
                    type: 'line',
                    data: acceptedData,
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    pointBorderColor: '#007bff',
                    pointBackgroundColor: '#007bff',
                    fill: false
                },
                {
                    type: 'line',
                    data: refusedData,
                    backgroundColor: 'transparent',
                    borderColor: '#ced4da',
                    pointBorderColor: '#ced4da',
                    pointBackgroundColor: '#ced4da',
                    fill: false
                }
            ]
        }

        var visitorsChartOptions = {
            maintainAspectRatio: false,
            tooltips: {
                mode: mode,
                intersect: intersect
            },
            hover: {
                mode: mode,
                intersect: intersect
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: true,
                        lineWidth: '4px',
                        color: 'rgba(0, 0, 0, .2)',
                        zeroLineColor: 'transparent'
                    },
                    ticks: $.extend({
                        beginAtZero: true,
                    }, ticksStyle)
                }],
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    },
                    ticks: ticksStyle
                }]
            }
        }

        var visitorsChart = new Chart($visitorsChart, {
            type: 'line',
            data: visitorsChartData,
            options: visitorsChartOptions
        })
    });
</script>
