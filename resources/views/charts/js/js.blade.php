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
                    'rgb(51, 102, 204)',
                    'rgb(220, 57, 18)',
                    'rgb(255, 153, 0)',
                ],
                borderColor: [
                    'rgb(51, 102, 204)',
                    'rgb(220, 57, 18)',
                    'rgb(255, 153, 0)',
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
                    'rgb(51, 102, 204)',
                        'rgb(220, 57, 18)',
                        'rgb(255, 153, 0)',
                        'rgb(16, 150, 24)',
                        'rgb(153, 0, 153)',
                        'rgb(0, 153, 198)',
                        'rgb(0, 0, 255)',
                        'rgb(138, 43, 226)',
                ],
                borderColor: [
                    'rgb(51, 102, 204)',
                        'rgb(220, 57, 18)',
                        'rgb(255, 153, 0)',
                        'rgb(16, 150, 24)',
                        'rgb(153, 0, 153)',
                        'rgb(0, 153, 198)',
                        'rgb(0, 0, 255)',
                        'rgb(138, 43, 226)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
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
                        'rgb(220, 57, 18)',
                        'rgb(255, 153, 0)',
                        'rgb(16, 150, 24)',
                        'rgb(153, 0, 153)',
                        'rgb(0, 153, 198)',
                        'rgb(0, 0, 255)',
                        'rgb(138, 43, 226)',
                ],
                borderColor: [
                        'rgb(220, 57, 18)',
                        'rgb(255, 153, 0)',
                        'rgb(16, 150, 24)',
                        'rgb(153, 0, 153)',
                        'rgb(0, 153, 198)',
                        'rgb(0, 0, 255)',
                        'rgb(138, 43, 226)',    
                ],
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
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
                    'rgb(255, 153, 0)',
                ],
                borderWidth: 1
            }]
        },
        options: {

        }
    });
</script>