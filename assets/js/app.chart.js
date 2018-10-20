function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}

function showChart(_data){
    // line char        
    var lineData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul","Agu", "Sep", "Okt",
         "Nop", "Des"],
        datasets: [
            {
                label: "Jml : ",
                borderColor: 'rgba(213,217,219, 1)',
                pointBorderColor: "#fff",
                data: _data,
                borderWidth: 4,
                pointBorderWidth: 2,
                fill: true,
                //lineTension: .1
            }
        ]
    };
    var lineOptions = {
        defaultFontFamily:'Poppins',
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            display: false
        },
        tooltips: {
            callbacks: {
                label: function(tooltipItem, chart){
                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                    return datasetLabel + ' ' + tooltipItem.yLabel;
                }
            }
        },         
        scales: {
              xAxes: [{
                  gridLines: {
                      display: false,
                      color: 'rgba(255,255,255,.3)',
                  },
                  ticks: {
                      fontColor: '#eee'
                  }
              }],
              yAxes: [{
                  gridLines: {
                      color: 'rgba(255,255,255,.3)'
                  },
                  ticks: {
                      fontColor: '#eee',
                      callback: function (value) {
                        return value
                      } ,
                      stepSize: 1                     
                  }
              }]
        },
    };
    var ctx = document.getElementById("line_chart").getContext("2d");
    new Chart(ctx, {type: 'line', data: lineData, options: lineOptions}); 

     
};
