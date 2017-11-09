<link rel="stylesheet" href="/js/chart/jquery.jqplot.css"/>
<script type="text/javascript" src="/js/chart/jquery.min.js"></script>
<script type="text/javascript" src="/js/chart/jquery.jqplot.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
        var dataRender = [];
        var labels = [];

        <?php foreach ($data->Rows AS $subject => $requests) { ?>
            labels.push('<?=$subject;?>');
            dataRender.push(<?=json_encode($requests);?>);
        <?php } ?>


        var ticks = [[1, "January"], [2, "February"], [3, "March"], [4, "April"], [5, "May"], [6, "June"], [7, "July"], [8, "August"], [9, "September"], [10, "October"], [11, "November"], [12, "December"]];
        
        //create chart
        plot = $.jqplot('chart', dataRender, {
            seriesDefaults: {
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                }
            },
            legend: {
                show: true,
                labels: labels,
                location: 'e',
                placement: 'outside'
            }
        });

        <?php
            $k = 0; 
            foreach ($data->Rows AS $subject => $requests) {
                if (isset($chart[$subject]) && !$chart[$subject]) {
        ?>
            plot.series[<?=$k;?>].show = false;
        <?php
            } 
            $k++;
            } 
        ?>
        plot.replot({resetAxes:["yaxis"]});
     
        $("input[type=checkbox][name=dataSeries]").click(function(){
            if ($(this).prop('checked')) {
                plot.series[$(this).val()].show = true;
            } else {
                plot.series[$(this).val()].show = false;
            }

            plot.replot({resetAxes:["yaxis"]});

            var chartData = {};
            $("input[type=checkbox][name=dataSeries]").each(function(){
                chartData[$(this).attr('data-subject')] = $(this).prop('checked') ? 1 : 0;
            });

            $.ajax({
                url: '/chart/setting/',
                type: 'POST',
                data: { chartData:chartData },
                dataType: 'JSON',
                success: function(data) {
                }
            });
        });
    });
</script>

<div id="status"></div>
<div id="setting">
    <div class="table_row">
        <?php 
            $k = 0;
            foreach ($data->Rows AS $subject => $requests) { ?>
            <div class="table_cell">
                <label for="s<?=$subject;?>"><?=$subject;?></label>
                <input id="s<?=$subject;?>" name="dataSeries" type="checkbox" data-subject="<?=$subject;?>" value="<?=$k;?>" <?php if ((isset($chart[$subject]) && $chart[$subject]) or count($chart) == 0 or $chart == null) { ?>checked<?php } ?>>
            </div>
        <?php
            $k++;
            }
        ?>
    </div>
</div>
<div id="chart"></div>