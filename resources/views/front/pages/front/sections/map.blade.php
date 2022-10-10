<div style="overflow: auto;width: 100%">
    <div id="regions_div" style="width: 100%; height: 500px;"></div>
</div>
<div class="card">
    <div class="card-body">
        <ol>
            @foreach ($data as $item_country)
                <li>{{ $item_country[0]  }} => {{ $item_country[1] }}</li>
            @endforeach
        </ol>
    </div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['geochart'],
    });
    google.charts.setOnLoadCallback(drawRegionsMap);

    function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable({!! json_encode($data)!!});

        var options = {};

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
    }
</script>
