(function($) {
    "use strict";

    var book_novf = document.getElementById("book_novf").value + 9;
    var book_nove = document.getElementById("book_nove").value +9;
    var book_dece = document.getElementById("book_dece").value +9;
    var book_decf = document.getElementById("book_decf").value +9;
    var percentp2 = document.getElementById("percentp2").value;

    // Morris bar chart
    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: 'June',
            a: 75,
            b: 20
        }, {
            y: 'July',
            a: 75,
            b: 50
        }, {
            y: 'Aug',
            a: 50,
            b: 96
        }, {
            y: 'Sept',
            a: 75,
            b: 49
        }, {
            y: 'Oct',
            a: 50,
            b: 39
        }, {
            y: 'Nov',
            a: book_novf,
            b: book_nove,
        }, {
            y: 'Dec',
            a: book_decf,
            b: book_dece    
        }],
        xkey: 'y',
        ykeys: ['a','b'],
        labels: ['Positive','Negative'],
        barColors: ['#343957', '#5873FE'],
        hideHover: 'auto',
        gridLineColor: '#eef0f2',
        resize: true
    });

    $('#info-circle-card').circleProgress({
        value: percentp2,
        size: 100,
        fill: {
            gradient: ["#7fe06c"]
        }
    });

    $('.testimonial-widget-one .owl-carousel').owlCarousel({
        singleItem: true,
        loop: true,
        autoplay: false,
        //        rtl: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true,
        margin: 10,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    $('#vmap13').vectorMap({
        map: 'usa_en',
        backgroundColor: 'transparent',
        borderColor: 'rgb(88, 115, 254)',
        borderOpacity: 0.25,
        borderWidth: 1,
        color: 'rgb(88, 115, 254)',
        enableZoom: true,
        hoverColor: 'rgba(88, 115, 254)',
        hoverOpacity: null,
        normalizeFunction: 'linear',
        scaleColors: ['#b6d6ff', '#005ace'],
        selectedColor: 'rgba(88, 115, 254, 0.9)',
        selectedRegions: null,
        showTooltip: true,
        // onRegionClick: function(element, code, region) {
        //     var message = 'You clicked "' +
        //         region +
        //         '" which has the code: ' +
        //         code.toUpperCase();

        //     alert(message);
        // }
    });

    var nk = document.getElementById("sold-product");
    // nk.height = 50
    new Chart(nk, {
        type: 'pie',
        data: {
            defaultFontFamily: 'Poppins',
            datasets: [{
                data: [45, 25, 20, 10, 50, 10, 10],
                borderWidth: 0,
                backgroundColor: [
                    "rgba(40, 226, 188)",
                    "rgba(8, 99, 117)",
                    "rgba(60, 22, 66)",
                    "rgba(248, 90, 62)",
                    "rgba(255, 119, 51)",
                    "rgba(228, 108, 78)",
                    "rgba(186, 34, 34)"
                ],
                hoverBackgroundColor: [
                    "rgba(29, 211, 176)",
                    "rgba(11, 129, 153)",
                    "rgba(84, 31, 92)",
                    "rgba(249, 120, 98)",
                    "rgba(255, 133, 71)",
                    "rgba(231, 122, 95)",
                    "rgba(217, 52, 52)"
                ]

            }],
            labels: [
                "Faculty Of Computer & Mathematical Sciences",
                "Faculty Of Business And Management",
                "Faculty Of Applied Sciences",
                "Faculty Of Plantation & Agrotechnology",
                "Faculty Of Accountancy",
                "Faculty Of Architecture, Planning And Surveying",
                "Faculty Of Sports Science And Recreation"
            ],
        },
        options: {
            responsive: true,
            legend: false,
            maintainAspectRatio: false
        },
    });



})(jQuery);

(function($) {
    "use strict";

    var data = [],
        totalPoints = 300;

    function getRandomData() {

        if (data.length > 0)
            data = data.slice(1);

        // Do a random walk

        while (data.length < totalPoints) {

            var prev = data.length > 0 ? data[data.length - 1] : 50,
                y = prev + Math.random() * 10 - 5;

            if (y < 0) {
                y = 0;
            } else if (y > 100) {
                y = 100;
            }

            data.push(y);
        }

        // Zip the generated y values with the x values

        var res = [];
        for (var i = 0; i < data.length; ++i) {
            res.push([i, data[i]])
        }

        return res;
    }

    // Set up the control widget

    var updateInterval = 30;
    $("#updateInterval").val(updateInterval).change(function() {
        var v = $(this).val();
        if (v && !isNaN(+v)) {
            updateInterval = +v;
            if (updateInterval < 1) {
                updateInterval = 1;
            } else if (updateInterval > 3000) {
                updateInterval = 3000;
            }
            $(this).val("" + updateInterval);
        }
    });

    var plot = $.plot("#cpu-load", [getRandomData()], {
        series: {
            shadowSize: 0 // Drawing is faster without shadows
        },
        yaxis: {
            min: 0,
            max: 100
        },
        xaxis: {
            show: false
        },
        colors: ["#007BFF"],
        grid: {
            color: "transparent",
            hoverable: true,
            borderWidth: 0,
            backgroundColor: 'transparent'
        },
        tooltip: true,
        tooltipOpts: {
            content: "Y: %y",
            defaultTheme: false
        }


    });

    function update() {

        plot.setData([getRandomData()]);

        // Since the axes don't change, we don't need to call plot.setupGrid()

        plot.draw();
        setTimeout(update, updateInterval);
    }

    update();


})(jQuery);


const wt = new PerfectScrollbar('.widget-todo');
const wtl = new PerfectScrollbar('.widget-timeline');