<script type="text/javascript">
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
            'title': 'Usuarios registrados en plataforma',
            'width': 500,
            'height': 300
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
            'title': 'Empresas por municipio',
            'width': 500,
            'height': 300
        };
        var chartMunicipio = new google.visualization.PieChart(document.getElementById('graficoMunicipio'));
        chartMunicipio.draw(data, options);
    }
</script>
