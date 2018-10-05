// get count for acreage
var acreage=[
    {
        label:'acreage',
        value:0
    }
];
var colors=['#6164c1'];
var farmers=[
    {
        label:'farmers',
        value:0
    }];
$.ajax({
    url:"/statistics/acreage",
    type:'get',
    dataType:'json',
    success:function(data){
        if(Object.keys(data).length>0){
            colors=[];
            acreage=[];
        }
        $.each(data,function(i,j){
            acreage.push({
                label:i,
                value:j
            });
            colors.push(getRandomColor());
        });
        Morris.Donut({
            element: 'acreageinfo-donut-chart',
            data: acreage,
            resize: true,
            colors:colors
        });
    }
});
$.ajax({
    url:"/statistics/farmers",
    type:'get',
    dataType:'json',
    success:function(data){
        if(Object.keys(data).length>0){
            colors=[];
            farmers=[];
        }
        $.each(data,function(i,j){
            farmers.push({
                label:i,
                value:j
            });
            colors.push(getRandomColor());
        });
        Morris.Donut({
            element: 'farmerinfo-donut-chart',
            data: farmers,
            resize: true,
            colors:colors
        });
    }
});
Morris.Donut({
        element: 'cropinfo-donut-chart',
        data: [{
            label: "Seedlings Issued",
            value: 1200000,

        }, {
            label: "Surviving Seedlings",
            value: 1100000
        }, {
            label: "Dried Seedlings",
            value: 100000
        },
            {
            label: "Replaced Seedlings",
            value: 80000
        }],

        resize: true,
        colors:['#99d683', '#13dafe', '#ff6644', '#6164c1']
    });

function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

