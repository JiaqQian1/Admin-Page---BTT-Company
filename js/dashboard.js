//CHARTS

//Bar Chart
var barChartOption = {
    series:[{
        data:[8, 6, 5],
        name:"Products",
    }],
    chart:{
        type:"bar",
        background:"transparent",
        height:350,
        toolbar:{
            show:false,
        },
    },
    colors:[
        "#2962ff",
        "#d50000",
        "#2e7d32",
    ],
    plotOptions:{
      bar:{
        distributed:true,
        borderRadius:4,
        horizontal:false,
        columnWidth:"40%",
      }
    },

    dataLabels:{
        enabled:false,
    },
    fill:{
        opacity:1,
    },
    grid:{
        borderColor:"#55596e",
        yaxis:{
            lines:{
                show:true,
            },
        },
        xaxis:{
            lines:{
                show:true,
            },
        },
    },
    legend:{
        labels:{
            colors:"black",
        },
        show:true,
        position:"top",
    },
    stroke:{
        colors:["transparent"],
        show:true,
        width:2,
    },
    tooltip:{
        shared:true,
        intersect:false,
        theme:"dark",
    },
    xaxis:{
        categories:["BlackPink Concert", "Xue ZhiQian Concert", "Maneskin Live Band"],
        title:{
            style:{
                color:"black",
            },
        },
        axisBorder:{
            show:true,
            color:"#55596e",
        },
        axisTicks:{
            show:true,
            color:"#55596e",
        },
        labels:{
            style:{
                colors:"black",
            },
        },
    },

    yaxis:{
        title:{
            text:"Count",
            style:{
                color:"black",
            },
        },

        axisBorder:{
            color:"#55596e",
            show:true,
        },
        axisTicks:{
            color:"#55596e",
            show:true,
        },
        labels:{
            style:{
                colors:"black",
            },
        },
    },
};

var barChart = new ApexCharts(document.querySelector("#bar-chart"), barChartOption);
barChart.render();

//Area Chart
var areaChartOptions = {
    series:[{
        name:"Purchase Orders",
        data:[31, 40, 28, 51, 42, 109, 100, 52],
    },{
    name:"Sales Orders",
    data:[11, 32, 45, 32, 34, 52, 41, 55],
    }],
    chart:{
        type:"area",
        background:"transparent",
        height:350,
        stacked:false,
        toolbar:{
            show:false,
        },
    },
    colors:["#00ab57", "#d50000"],
    labels:["Jan","Feb","Mar","Apr","May","Jun","July","Aug"],
    dataLabels:{
        enabled:false,
    },
    fill:{
        gradient:{
            opacityFrom: 0.4,
            opacityTo: 0.1,
            shadeIntensity: 1,
            stops:[0, 100],
            type:"vertical",
        },
        type:"gradient",
    },
    grid:{
        borderColor:"#55596e",
        yaxis:{
            lines:{
                show:true,
            },
        },
        xaxis:{
            lines:{
                show:true,
            },
        },
    },
    legend:{
        labels:{
            colors:"black",
        },
        show:true,
        position:"top",
    },
    markers:{
        size:6,
        strokeColors:"#1b2635",
        strokeWidth:3,
    },
    stroke:{
        curve:"smooth",
    },
    xaxis:{
        axisBorder:{
            color:"#55596e",
            show:true,
        },
        axisTicks:{
            color:"#55596e",
            show:true,
        },
        labels:{
            offsetY:5,
            style:{
                colors:"black",
            },
        },
    },
    yaxis:
    [
        {
            title:{
              text:"Purchase Orders",
              style:{
                colors:"black",
              },
            },
            labels:{
                style:{
                    colors:["black"],
                },
            },
        },
        {
            opposite:true,
            title:{
                text:"Sales Orders",
                style:{
                    color:"black",
                },
            },
            labels:{
                style:{
                    colors:["black"],
                },
            },
        },
    ],
    tooltip:{
        shared:true,
        intersect:false,
        theme:"dark",
    }
    
};

var areaChart = new ApexCharts(document.querySelector("#area-chart"), areaChartOptions);
areaChart.render();