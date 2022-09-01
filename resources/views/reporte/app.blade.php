<head>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }

        .container{
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 10px;
        }

        th,
        td {
            text-align: left;
            padding: 10px;
            border: 0.8px solid #000;
        }

        .title{
            text-align: center;
            text-transform: uppercase;
        }

        strong {
            border-bottom: 1px solid black;
        }

        h1 {
            text-align: center;
        }

        .logo{
            width: 60px;
        }

        .contenido{
            font-size: 14px;
            text-align: justify;
        }
        
        .footer{
                position: absolute;
                bottom: 10px;
            width: 100%;
        }

    </style>
</head>

<body>
    <main class="container">
        <div class="header">
            <?php 
                $ruta = "image/logoSena.png"; 
                $base64 = "data:image/png;base64," . base64_encode(file_get_contents($ruta));
            ?>
            <img class="logo" src="<?php echo $base64; ?>" alt="" srcset="">
        </div>
        @yield('content')
        <div class="footer">
            <p>Pie de pagina</p>
        </div>
    </main>
</body>
