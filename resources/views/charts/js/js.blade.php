<script>
    //Grafico personas
    const ctx1 = document.getElementById('chartsperson');
    const myChart1 = new Chart(ctx1, {
        type: 'doughnut',
        data: {

            labels: [<?php foreach($usuarios as $usuario){?><?php echo "'" . $usuario->nombre_rol . "'"; ?>, <?php } ?>],
            datasets: [{
                label: 'Total',
                data: [<?php foreach($usuarios as $usuario){?><?php echo $usuario->total; ?>, <?php } ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {

        }
    });
    //Grafico empresas
    const ctx2 = document.getElementById('chartsbussines');
    const myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {

            labels: [<?php foreach($empresasCharts as $empresa){?><?php echo "'" . $empresa->municipio . "'"; ?>, <?php } ?>],
            datasets: [{
                label: 'Total',
                data: [<?php foreach($empresasCharts as $empresa){?><?php echo $empresa->total; ?>, <?php } ?>],
                backgroundColor: [
                    'rgb(240, 248, 255)',
                    'rgb(250, 235, 215)',
                    'rgb(127, 255, 212)',
                    'rgb(138, 43, 226)',
                    'rgb(100, 149, 237)',
                    'rgb(255, 127, 80)',
                    'rgb(0, 139, 139)',
                    'rgb(255, 20, 147)',
                    'rgb(255, 215, 0)',
                    'rgb(255, 240, 245)'
                ],
                borderColor: [
                    'rgb(240, 248, 255)',
                    'rgb(250, 235, 215)',
                    'rgb(127, 255, 212)',
                    'rgb(138, 43, 226)',
                    'rgb(100, 149, 237)',
                    'rgb(255, 127, 80)',
                    'rgb(0, 139, 139)',
                    'rgb(255, 20, 147)',
                    'rgb(255, 215, 0)',
                    'rgb(255, 240, 245)',
                ],
                borderWidth: 1
            }]
        },
        options: {

        }
    });
    //Grafico empresas 374
    const ctx3 = document.getElementById('chartsbussinesx');
    const myChart3 = new Chart(ctx3, {
        type: 'bar',
        data: {

            labels: [<?php foreach($empresasCharts374 as $empresa){?><?php echo "'" . $empresa->municipio . "'"; ?>, <?php } ?>],
            datasets: [{
                label: 'Total',
                data: [<?php foreach($empresasCharts374 as $empresa){?><?php echo $empresa->total; ?>, <?php } ?>],
                backgroundColor: [
                    'rgb(0, 0, 255)',
                    'rgb(138, 43, 226)',
                    'rgb(127, 255, 0)',
                    'rgb(220, 20, 60)',
                    'rgb(255, 215, 0)',
                    'rgb(255, 69, 0)',
                    'rgb(255, 0, 0)'
                ],
                borderColor: [
                    'rgb(0, 0, 255)',
                    'rgb(138, 43, 226)',
                    'rgb(127, 255, 0)',
                    'rgb(220, 20, 60)',
                    'rgb(255, 215, 0)',
                    'rgb(255, 69, 0)',
                    'rgb(255, 0, 0)'
                ],
                borderWidth: 1
            }]
        },
        options: {

        }
    });
    //Grafico empresas puntaje 35
    const ctx4 = document.getElementById('chartspuntaje');
    const myChart4 = new Chart(ctx4, {
        type: 'line',
        data: {

            labels: [<?php foreach($empresasChartsPuntaje as $empresa){?><?php echo "'" . $empresa->municipio . "'"; ?>, <?php } ?>],
            datasets: [{
                label: 'Total',
                data: [<?php foreach($empresasChartsPuntaje as $empresa){?><?php echo $empresa->promedio; ?>, <?php } ?>],
                borderColor: [
                    'rgb(75, 192, 192)',
                ],
                borderWidth: 1
            }]
        },
        options: {

        }
    });
</script>