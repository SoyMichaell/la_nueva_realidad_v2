<script>
    //Grafico1 
    const ctx1 = document.getElementById('charts1');
    const myChart1 = new Chart(ctx1, {
        type: 'doughnut',
        data: {

            labels: [<?php foreach($grafico1 as $grafico){?><?php echo "'" . $grafico->pre1_pcd . "'"; ?>, <?php } ?>],
            datasets: [{
                label: 'Total',
                data: [<?php foreach($grafico1 as $grafico){?><?php echo $grafico->total; ?>, <?php } ?>],
                backgroundColor: [
                    'rgb(51, 102, 204)',
                    'rgb(220, 57, 18)',
                ],
                borderColor: [
                    'rgb(51, 102, 204)',
                    'rgb(220, 57, 18)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    });
    //Grafico2
    const ctx2 = document.getElementById('charts2');
    const myChart2 = new Chart(ctx2, {
        type: 'doughnut',
        data: {

            labels: [<?php foreach($grafico2 as $grafico){?><?php echo "'" . $grafico->pre2_pcd . "'"; ?>, <?php } ?>],
            datasets: [{
                label: 'Total',
                data: [<?php foreach($grafico2 as $grafico){?><?php echo $grafico->total; ?>, <?php } ?>],
                backgroundColor: [
                    'rgb(51, 102, 204)',
                    'rgb(220, 57, 18)',
                ],
                borderColor: [
                    'rgb(51, 102, 204)',
                    'rgb(220, 57, 18)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    });
    //Grafico3
    const ctx3_1 = document.getElementById('charts3');
    const myChart3_1 = new Chart(ctx3_1, {
        type: 'bar',
        data: {
            labels: [<?php foreach($grafico3_1 as $grafico){?><?php echo "'" . $grafico->pre3_1_pcd . "'"; ?>, <?php } ?>],
            datasets: [{
                    label: 'Ajuste de jornada laboral',
                    data: [<?php foreach($grafico3_1 as $grafico){?><?php echo $grafico->ajustejornada; ?>, <?php } ?>],
                    backgroundColor: [
                        'rgb(51, 102, 204)',
                    ],
                    borderColor: [
                        'rgb(51, 102, 204)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Ajuste o reducción de la producción',
                    data: [<?php foreach($grafico3_2 as $grafico){?><?php echo $grafico->ajustereduccion; ?>, <?php } ?>],
                    backgroundColor: [
                        'rgb(220, 57, 18)',
                    ],
                    borderColor: [
                        'rgb(220, 57, 18)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Implementación de ventas en línea',
                    data: [<?php foreach($grafico3_3 as $grafico){?><?php echo $grafico->implementacion; ?>, <?php } ?>],
                    backgroundColor: [
                        'rgb(255, 153, 0)',
                    ],
                    borderColor: [
                        'rgb(255, 153, 0)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Introducción de nuevos productos y/o servicios',
                    data: [<?php foreach($grafico3_4 as $grafico){?><?php echo $grafico->introduccion; ?>, <?php } ?>],
                    backgroundColor: [
                        'rgb(16, 150, 24)',
                    ],
                    borderColor: [
                        'rgb(16, 150, 24)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Cambios en la presentación del producto (Tamaño y empaque)',
                    data: [<?php foreach($grafico3_5 as $grafico){?><?php echo $grafico->cambio; ?>, <?php } ?>],
                    backgroundColor: [
                        'rgb(153, 0, 153)',
                    ],
                    borderColor: [
                        'rgb(153, 0, 153)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Ajustes a procesos y procedimientos',
                    data: [<?php foreach($grafico3_6 as $grafico){?><?php echo $grafico->ajustes; ?>, <?php } ?>],
                    backgroundColor: [
                        'rgb(0, 153, 198)',
                    ],
                    borderColor: [
                        'rgb(0, 153, 198)',
                    ],
                    borderWidth: 1
                },
            ]
        },
        options: {
            responsive: true
        }
    });
    //Grafico4
    const ctx4 = document.getElementById('charts4');
    const myChart4 = new Chart(ctx4, {
        type: 'bar',
        data: {
            labels: [<?php foreach($grafico4_1 as $grafico){?><?php echo "'" . $grafico->pre4_1_pcd . "'"; ?>, <?php } ?>],
            datasets: [{
                    label: 'Circular 021 del 2020 (Medidas de protección al empleo)',
                    data: [<?php foreach($grafico4_1 as $grafico){?><?php echo $grafico->circular; ?>, <?php } ?>],
                    backgroundColor: [
                        'rgb(51, 102, 204)',
                    ],
                    borderColor: [
                        'rgb(51, 102, 204)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Ajuste o reducción de la producción',
                    data: [<?php foreach($grafico4_2 as $grafico){?><?php echo $grafico->ajuste; ?>, <?php } ?>],
                    backgroundColor: [
                        'rgb(220, 57, 18)',
                    ],
                    borderColor: [
                        'rgb(220, 57, 18)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Implementación de ventas en linea',
                    data: [<?php foreach($grafico4_3 as $grafico){?><?php echo $grafico->implementacion; ?>, <?php } ?>],
                    backgroundColor: [
                        'rgb(255, 153, 0)',
                    ],
                    borderColor: [
                        'rgb(255, 153, 0)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Introducción de nuevos productos y/o servicios',
                    data: [<?php foreach($grafico4_4 as $grafico){?><?php echo $grafico->introduccion; ?>, <?php } ?>],
                    backgroundColor: [
                        'rgb(16, 150, 24)',
                    ],
                    borderColor: [
                        'rgb(16, 150, 24)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Cambios en la presentación del producto (Tamaño y empaque)',
                    data: [<?php foreach($grafico4_5 as $grafico){?><?php echo $grafico->presentacion; ?>, <?php } ?>],
                    backgroundColor: [
                        'rgb(153, 0, 153)',
                    ],
                    borderColor: [
                        'rgb(153, 0, 153)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Distribución de productos a domicilio',
                    data: [<?php foreach($grafico4_6 as $grafico){?><?php echo $grafico->distribucion; ?>, <?php } ?>],
                    backgroundColor: [
                        'rgb(0, 153, 198)'
                    ],
                    borderColor: [
                        'rgb(0, 153, 198)'
                    ],
                    borderWidth: 1
                },
            ]
        },
        options: {
            responsive: true
        }
    });
    //Grafico5 
    const ctx5 = document.getElementById('charts5');
    const myChart5 = new Chart(ctx5, {
        type: 'doughnut',
        data: {

            labels: [<?php foreach($grafico5 as $grafico){?><?php echo "'" . $grafico->pre5_pcd . "'"; ?>, <?php } ?>],
            datasets: [{
                label: 'Total',
                data: [<?php foreach($grafico5 as $grafico){?><?php echo $grafico->total; ?>, <?php } ?>],
                backgroundColor: [
                    'rgb(51, 102, 204)',
                    'rgb(220, 57, 18)',
                ],
                borderColor: [
                    'rgb(51, 102, 204)',
                    'rgb(220, 57, 18)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    });
    //Grafico5_1
    const ctx5_1 = document.getElementById('charts5_1');
    const myChart5_1 = new Chart(ctx5_1, {
        type: 'doughnut',
        data: {

            labels: [<?php foreach($grafico5_1 as $grafico){?><?php echo "'" . $grafico->pre5_1_pcd . "'"; ?>, <?php } ?>],
            datasets: [{
                label: 'Total',
                data: [<?php foreach($grafico5_1 as $grafico){?><?php echo $grafico->total; ?>, <?php } ?>],
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
            responsive: true
        }
    });
    //Grafico6
    const ctx6 = document.getElementById('charts6');
    const myChart6 = new Chart(ctx6, {
        type: 'bar',
        data: {
            labels: [<?php foreach($grafico6 as $grafico){?><?php echo "'" . $grafico->pre6_pcd . "'"; ?>, <?php } ?>],
            datasets: [{
                label: 'Datos',
                data: [<?php foreach($grafico6 as $grafico){?><?php echo $grafico->total; ?>, <?php } ?>],
                backgroundColor: [
                    'rgb(51, 102, 204)',
                    'rgb(220, 57, 18)',
                    'rgb(255, 153, 0)',
                    'rgb(16, 150, 24)',
                    'rgb(153, 0, 153)',
                    'rgb(0, 153, 198)'
                ],
                borderColor: [
                    'rgb(51, 102, 204)',
                    'rgb(220, 57, 18)',
                    'rgb(255, 153, 0)',
                    'rgb(16, 150, 24)',
                    'rgb(153, 0, 153)',
                    'rgb(0, 153, 198)'
                ],
                borderWidth: 1
            }, ]
        },
        options: {
            responsive: true,
            indexAxis: 'y',
        }
    });
    //Grafico7
    const ctx7 = document.getElementById('charts7');
    const myChart7 = new Chart(ctx7, {
        type: 'doughnut',
        data: {

            labels: [<?php foreach($grafico7 as $grafico){?><?php echo "'" . $grafico->pre7_pcd . "'"; ?>, <?php } ?>],
            datasets: [{
                label: 'Total',
                data: [<?php foreach($grafico7 as $grafico){?><?php echo $grafico->total; ?>, <?php } ?>],
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
            responsive: true
        }
    });
    //Grafico8
    const ctx8 = document.getElementById('charts8');
    const myChart8 = new Chart(ctx8, {
        type: 'bar',
        data: {
            labels: [<?php foreach($grafico8_1 as $grafico){?><?php echo "'" . $grafico->pre8_1_pcd . "'"; ?>, <?php } ?>],
            datasets: [{
                    label: 'Disminución en las Ventas',
                    data: [<?php foreach($grafico8_1 as $grafico){?><?php echo $grafico->total; ?>, <?php } ?>],
                    backgroundColor: [
                        'rgb(51, 102, 204)',
                    ],
                    borderColor: [
                        'rgb(51, 102, 204)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Incremento de costos operacionales',
                    data: [<?php foreach($grafico8_2 as $grafico){?><?php echo $grafico->total; ?>, <?php } ?>],
                    backgroundColor: [
                        'rgb(220, 57, 18)',
                    ],
                    borderColor: [
                        'rgb(220, 57, 18)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Endeudamiento y difícil acceso al crédito',
                    data: [<?php foreach($grafico8_3 as $grafico){?><?php echo $grafico->total; ?>, <?php } ?>],
                    backgroundColor: [
                        'rgb(255, 153, 0)',
                    ],
                    borderColor: [
                        'rgb(255, 153, 0)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Falta de capital de trabajo',
                    data: [<?php foreach($grafico8_4 as $grafico){?><?php echo $grafico->total; ?>, <?php } ?>],
                    backgroundColor: [
                        'rgb(16, 150, 24)',
                    ],
                    borderColor: [
                        'rgb(16, 150, 24)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Altos gastos administrativos',
                    data: [<?php foreach($grafico8_5 as $grafico){?><?php echo $grafico->total; ?>, <?php } ?>],
                    backgroundColor: [
                        'rgb(153, 0, 153)',
                    ],
                    borderColor: [
                        'rgb(153, 0, 153)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Desconocimiento de herramientas efectivas para afrontar el cambio',
                    data: [<?php foreach($grafico8_6 as $grafico){?><?php echo $grafico->total; ?>, <?php } ?>],
                    backgroundColor: [
                        'rgb(0, 153, 198)'
                    ],
                    borderColor: [
                        'rgb(0, 153, 198)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Falta de adopción de nuevas tecnologías',
                    data: [<?php foreach($grafico8_7 as $grafico){?><?php echo $grafico->total; ?>, <?php } ?>],
                    backgroundColor: [
                        'rgb(138, 43, 226)',
                    ],
                    borderColor: [
                        'rgb(138, 43, 226)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Falta de adopción de nuevos canales de distribución',
                    data: [<?php foreach($grafico8_8 as $grafico){?><?php echo $grafico->total; ?>, <?php } ?>],
                    backgroundColor: [
                        'rgb(0, 0, 255)',
                    ],
                    borderColor: [
                        'rgb(0, 0, 255)',
                    ],
                    borderWidth: 1
                },
            ]
        },
        options: {
            responsive: true
        }
    });

    //Descarga grafico
    //Download Chart Image
    document.getElementById("download1").addEventListener('click', function() {
        var url_base64jp = document.getElementById("charts1").toDataURL("image/jpg");
        var a = document.getElementById("download1");
        a.href = url_base64jp;
    });
    document.getElementById("download2").addEventListener('click', function() {
        var url_base64jp = document.getElementById("charts2").toDataURL("image/jpg");
        var a = document.getElementById("download2");
        a.href = url_base64jp;
    });
    document.getElementById("download3").addEventListener('click', function() {
        var url_base64jp = document.getElementById("charts3").toDataURL("image/jpg");
        var a = document.getElementById("download3");
        a.href = url_base64jp;
    });
    document.getElementById("download4").addEventListener('click', function() {
        var url_base64jp = document.getElementById("charts4").toDataURL("image/jpg");
        var a = document.getElementById("download4");
        a.href = url_base64jp;
    });
    document.getElementById("download5").addEventListener('click', function() {
        var url_base64jp = document.getElementById("charts5").toDataURL("image/jpg");
        var a = document.getElementById("download5");
        a.href = url_base64jp;
    });
</script>
