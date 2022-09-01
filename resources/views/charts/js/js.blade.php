<script type="text/javascript">
    //graficoDiagnostico
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Empresa', 'Puntaje'],
          <?php foreach($diagnosticos as $diagnostico){ echo "['".$diagnostico->razon_social."',".$diagnostico->total."],"; }  ?>
        ]);

        var options = {
          legend: { position: 'bottom' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('graficoDiagnostico'));
        chart.draw(data, options);
      }
    //grafico usuario
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChartUsuario);
    function drawChartUsuario() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([<?php foreach($usuarios as $usuario){ echo "['".$usuario->nombre_rol."',".$usuario->total."],"; }?>]);
        var options = {
            'title': '',
        };
        var chartUsuario = new google.visualization.PieChart(document.getElementById('graficoUsuario'));
        chartUsuario.draw(data, options);
    }
    //grafico empresa tipo
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChartMunicipio);
    function drawChartMunicipio() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([<?php foreach($empresasCharts as $municipio){ echo "['".$municipio->municipio."',".$municipio->total."],"; }?>]);
        var options = {
            'title': '',
        };
        var chartMunicipio = new google.visualization.PieChart(document.getElementById('graficoMunicipio'));
        chartMunicipio.draw(data, options);
    }
</script>
