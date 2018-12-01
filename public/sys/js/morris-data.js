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
var cropInfo=[
    {
        label: 'Crop Information',
        value: 0
    }
];
var issued=0;
var surviving=0;
var dried=0;
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
$.ajax({
    url:"/statistics/cropInfo",
    type:'get',
    dataType:'json',
    success:function(data){
        if(Object.keys(data).length>0){
            colors=[];
            cropInfo=[];
        }
        $.each(data,function(i,j){
            cropInfo.push({
                label:i,
                value:j
            });
            colors.push(getRandomColor());
        });
        Morris.Donut({
            element: 'cropinfo-donut-chart',
            data: cropInfo,
            resize: true,
            colors:colors
        });
    }
});

function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

function getCropStats(){
    var rows='';
    $.ajax({
        url:"/statistics/cropStats",
        type:'get',
        dataType:'json',
        success:function(data){
            $.each(data,function(i,j){
                rows+=
                    '<tr>' +
                    '    <td>'+i+'</td>' +
                    '    <td>'+j.registeredFarmers+'</td>' +
                    '    <td>'+j.SeedlingsIssued+'</td>' +
                    '    <td>'+j.SurvivingSeedlings+'</td>' +
                    '    <td>'+j.DiedSeedlings+'</td>' +
                    '    <td>'+j.Success.toFixed(2)+'%</td>' +
                    '</tr>';
            });
            $('#dashtable tbody').html(rows);
            var dashtable=$('#dashtable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ]
            });
        }
    });
}

