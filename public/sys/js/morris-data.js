
        
    Morris.Donut({
        element: 'cropinfo-donut-chart',
        data: [{
            label: "Hass Avocado",
            value: 1237620,

        }, {
            label: "Fuerte Avocado",
            value: 346780
        }, {
            label: "Macadamia",
            value: 856030
        }],
        resize: true,
        colors:['#99d683', '#13dafe', '#6164c1']
    });

    Morris.Donut({
        element: 'farmerinfo-donut-chart',
        data: [{
            label: "Hass Avocado",
            value: 812000,

        }, {
            label: "Fuerte Avocado",
            value: 103000
        }, {
            label: "Macadamia",
            value: 342000
        }],
        resize: true,
        colors:['#99d683', '#13dafe', '#6164c1']
    });

    Morris.Donut({
        element: 'countyinfo-donut-chart',
        data: [{
            label: "Download Sales",
            value: 12,

        }, {
            label: "In-Store Sales",
            value: 30
        }, {
            label: "Mail-Order Sales",
            value: 20
        }],
        resize: true,
        colors:['#99d683', '#13dafe', '#6164c1']
    });