		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: '第46屆世界兒童畫展'
        },
        subtitle: {
            text: '<?php echo $class_note[0]['class_note']."(共".$total."件)";?>'
        },
        xAxis: {
            categories: ['<?php echo implode('\',\'',$statistics['school_name']);?>'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '件數',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' 件'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }             
            }
        },
        legend: {
            layout: 'vertical',
//            align: 'right',
//            verticalAlign: 'top',
//            x: -40,
//            y: 100,
            floating: false,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: true
        },
        series: [{
            name: '參賽件數',
            data: [<?php echo implode(',',$statistics['count']);?>]
        }]
    });
});
		</script>
<div class="main-content">
<div id="container" style="min-width: 310px; max-width: 650px;min-height: 400px; ; height: <?php echo count($statistics['count'])*36;?>px; margin: 0 auto"></div>
</div>
