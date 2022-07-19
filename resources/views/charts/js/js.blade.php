<script>
    
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
                borderWidth: 2
            }]
        },
        options: {

        }
    });
</script>