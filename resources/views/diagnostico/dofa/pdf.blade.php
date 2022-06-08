<head>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            width: 100%;
        }

        td, h2{
            font-family: Arial, Helvetica, sans-serif !important;
        }

        .verde__card {
            background: #92D14D !important;
            color: #000;
            font-weight: 300;
            text-transform: uppercase;
        }

        .verde__content {
            background: #D8E4BC !important;
        }

        .naranja__card {
            background: #E36B0A !important;
            color: #000;
            font-weight: 300;
            text-transform: uppercase;
        }

        .naranja__content {
            background: #F9BF8F !important;
        }

        .azul__card {
            background: #96B3D6 !important;
            color: #000;
            font-weight: 300;
            text-transform: uppercase;
        }

        .azul__content {
            background: #DCE6F0 !important;
        }

        .purpura__card {
            background: #E3DFED !important;
            color: #000;
            font-weight: 300;
            text-transform: uppercase;
        }

        .purpura__content {
            background: #E3DFED !important;
        }

        .amarillo__card {
            background: #FFFF01 !important;
            color: #000;
            font-weight: 300;
            text-transform: uppercase;
        }

        .amarillo__content {
            background: #FFFF67 !important;
        }

        .table-bordered {
            border: 2px solid #000 !important;
        }

        .table__modal td {
            width: 33.3%;
            min-height: 250px !important;
        }
        li{
            display: block;
        }
    </style>
</head>

<body>
    <main>
        <div class="container">
            
            <table>
                <h1>Matriz DOFA</h1>
                <tr><td>Razón social: {{$dofa->razon_social}}</td></tr>
                <tr><td>Nit: {{$dofa->nit}}</td></tr>
                <tr><td>Municipio: {{$dofa->municipio}}</td></tr>
            </table>
            <table class="table__modal table-bordered mt-2" style="width: 100%">
                <tbody>
                    <tr>
                        <th class="bg-primary text-white">--</td>
                        <th class="verde__card">Fortalezas</td>
                        <th class="naranja__card">Debilidades</td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>
                            <h2 style="text-align: center">Matriz DOFA</h2>
                        </td>
                        <td class="verde__content">
                            <ol>
                                <li>{{ $dofa == '' ? '' : $dofa->fortaleza1 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->fortaleza2 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->fortaleza3 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->fortaleza4 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->fortaleza5 }}</li>
                            </ol>
                        </td>
                        <td class="naranja__content">
                            <ol>
                                <li>{{ $dofa == '' ? '' : $dofa->debilidad1 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->debilidad2 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->debilidad3 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->debilidad4 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->debilidad5 }}</li>
                            </ol>
                        </td>
                    </tr>
                </tbody>
                <tbody>
                    <tr class="text-center">
                        <th class="azul__card">Oportunidades</td>
                        <th class="purpura__card">Estrategias FO</td>
                        <th class="purpura__card">Estrategias DO</td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td class="azul__content">
                            <ol>
                                <li>{{ $dofa == '' ? '' : $dofa->oportunidad1 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->oportunidad2 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->oportunidad3 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->oportunidad4 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->oportunidad5 }}</li>
                            </ol>
                        </td>
                        <td class="purpura__content">
                            <ol>
                                <li>{{ $dofa == '' ? '' : $dofa->estrategiafo1 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->estrategiafo2 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->estrategiafo3 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->estrategiafo4 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->estrategiafo5 }}</li>
                            </ol>
                        </td>
                        <td class="purpura__content">
                            <ol>
                                <li>{{ $dofa == '' ? '' : $dofa->estrategiado1 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->estrategiado2 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->estrategiado3 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->estrategiado4 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->estrategiado5 }}</li>
                            </ol>
                        </td>
                    </tr>
                </tbody>
                <tbody>
                    <tr class="text-center">
                        <th class="amarillo__card">Amenazas</td>
                        <th class="purpura__card">Estrategias FA</td>
                        <th class="purpura__card">Estrategias DA</td>
                    </tr>
                    </thead>
                <tbody>
                    <tr>
                        <td class="amarillo__content">
                            <ol>
                                <li>{{ $dofa == '' ? '' : $dofa->amenaza1 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->amenaza2 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->amenaza3 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->amenaza4 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->amenaza5 }}</li>
                            </ol>
                        </td>
                        <td class="purpura__content">
                            <ol>
                                <li>{{ $dofa == '' ? '' : $dofa->estrategiafa1 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->estrategiafa2 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->estrategiafa3 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->estrategiafa4 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->estrategiafa5 }}</li>
                            </ol>
                        </td>
                        <td class="purpura__content">
                            <ol>
                                <li>{{ $dofa == '' ? '' : $dofa->estrategiada1 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->estrategiada2 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->estrategiada3 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->estrategiada4 }}</li>
                                <li>{{ $dofa == '' ? '' : $dofa->estrategiada5 }}</li>
                            </ol>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
