@extends('layouts.app')

@section('content')

    <head>
        <style>
            .static {
                position: fixed;
                bottom: 40px;
                right: 40px;
                z-index: 99;
            }

            .btn-rounded {
                border: 1px solid #667AEF;
                border-radius: 100%;
            }

            .btn-rounded:hover {
                background-color: #667AEF;
                color: #fff;
            }
        </style>
    </head>
    <main>
        <div class="w-75 mx-auto">
            <h1 class="mt-4">Formato de Diagnóstico Empresarial</h1>
            <p>Realizar el diagnóstico de la empresa analizando cada una de las perspectivas desarrolladas desde el proyecto
                La Nueva Realidad.</p>
            <hr>
            <!--Información empresa-->
            <div class="card mb-3 mt-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <i class="fas fa-info-circle"></i> Información empresa
                        </div>
                        @foreach ($permisos as $permiso)
                            @if ($permiso->permiso == 'eliminar-asignacion')
                                <div class="col-md-4">
                                    @if ($exist_diagnostico_empresa)
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-eraser"></i></button>
                                            <a class="btn btn-rounded"
                                                href="{{ url("diagnostico/{$empresa->nit}/pdfAnalisis") }}"
                                                title="Descargar información" target="_blank"><i
                                                    class="fas fa-file-download"></i></a>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Nit</td>
                                <td>{{ $empresa->nit }}</td>
                            </tr>
                            <tr>
                                <td>Razón social</td>
                                <td>{{ $empresa->razon_social }}</td>
                            </tr>
                            <tr>
                                <td>Telefono</td>
                                <td>{{ $empresa->telefono1 }}</td>
                            </tr>
                            <tr>
                                <td>Dirección</td>
                                <td>{{ $empresa->direccion }}</td>
                            </tr>
                            <tr>
                                <td>Municipio</td>
                                <td>{{ $empresa->municipio }}</td>
                            </tr>
                            <tr>
                                <td>CIIU Principal</td>
                                <td>{{ $empresa->ciiu_1 }}</td>
                            </tr>
                        </thead>
                    </table>
                    <form action="{{ url('diagnostico') }}" method="post">
                        @csrf
                        <div class="row">
                            <input class="form-control" type="hidden" name="nit_empresa" id="nit_empresa"
                                value="{{ $empresa->nit }}" readonly>
                            <div class="col-md-10">
                                <select class="form-select" name="id_persona" id="id_persona">
                                    <option value="">---- SELECCIONE ----</option>
                                    @if ($exist_diagnostico_empresa)
                                        @foreach ($usuarios as $usuario)
                                            <option value="{{ $usuario->id }}"
                                                {{ $usuario->id == $exist_diagnostico_empresa->id_persona ? 'selected' : '' }}>
                                                {{ $usuario->nombre . ' ' . $usuario->apellido }}</option>
                                        @endforeach
                                    @else
                                        @foreach ($usuarios as $usuario)
                                            <option value="{{ $usuario->id }}">
                                                {{ $usuario->nombre . ' ' . $usuario->apellido }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-2">
                                @foreach ($permisos as $permiso)
                                    @if ($permiso->permiso == 'crear-asignacion')
                                        <button class="btn btn-primary" type="submit">Asignar</button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--Fin-->
            <!--fin-->
            @if ($exist_diagnostico_empresa)
                <form action="{{ url("diagnostico/{$empresa->nit}/guardarAnalisis") }}" method="post">
                    @csrf
                    @method('PUT')
                    <!--Empresa-->
                    <div class="static">
                        @foreach ($permisos as $permiso)
                            @if ($permiso->permiso == 'guardar-analisis')
                                <button class="btn btn-primary btn-sm mt-2 mb-2" type="submit">Guardar</button>
                            @endif
                        @endforeach
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">Empresa</div>
                        <div class="card-body">
                            <label for="">Misión</label>
                            <textarea class="form-control mt-3 mb-3" name="mision" id="mision">{{ $exist_diagnostico_empresa->mision }}</textarea>
                            <label for="">Visión</label>
                            <textarea class="form-control mt-3 mb-3" name="vision" id="vision">{{ $exist_diagnostico_empresa->vision }}</textarea>
                        </div>
                    </div>
                    <!--Fin a todos-->
                    <div class="card card-primary">
                        <div class="card-header">Preguntas diagnostico / análisis microempresa</div>
                        <div class="card-body">
                            <p>El presente instrumento fué diseñado y estructurado por SENNOVA como parte del proyecto La
                                Nueva
                                Realidad, la información obtenida será utilizada para efectos académicos y su divulgación
                                estará
                                orientada a la Comunidad Académica SENA.</p>
                            <!--Perspectiva de crecimiento y desarrollo-->
                            <div class="alert alert-info">PERSPECTIVA DE CRECIMIENTO Y DESARROLLO <br> <strong>Realizar
                                    observación por cada pregunta.</strong></div>
                            <!--pregunta1-->
                            <div class="alert alert-light">
                                <p>1. ¿Realizo procesos de capacitación durante el año 2020?</p>
                                <p>Respuesta: {{ $empresa->pre1_pcd }}</p>
                                <textarea class="form-control" name="preguntacd1" id="preguntacd1">{{ $exist_diagnostico_empresa->preguntacd1 }}</textarea>
                            </div>
                            <!--pregunta1.1-->
                            <div class="alert alert-light">
                                <p>1.1. ¿Si su respuesta a la anterior pregunta fue POSITIVA en que área? Si
                                    su
                                    respuesta
                                    fue NO, omita está pregunta.?</p>
                                <p>Respuesta: {{ $empresa->pre1_1_pcd }}</p>
                                <textarea class="form-control" name="preguntacd1_1" id="preguntacd1_1">{{ $exist_diagnostico_empresa->preguntacd1_1 }}</textarea>
                            </div>
                            <!--pregunta2-->
                            <div class="alert alert-light">
                                <p>2. ¿En el año 2020 como consecuencia del covid-19, sus empleados
                                    realizaron
                                    trabajo en
                                    casa?</p>
                                <p>Respuesta: {{ $empresa->pre2_pcd }}</p>
                                <textarea class="form-control" name="preguntacd2" id="preguntacd2">{{ $exist_diagnostico_empresa->preguntacd2 }}</textarea>
                            </div>
                            <p><strong>Evalúe de 1 a 5 siendo 1 el menor ajuste realizado y 5 el mayor
                                    ajuste
                                    realizado.</strong></p>
                            <!--pregunta3-->
                            <div class="alert alert-light">
                                <p>3. ¿Qué tipo de reformas debió realizar la empresa para ajustarse a los
                                    cambios generados
                                    por la pandemia? </p>
                                <p>Respuesta:</p>
                                <table class="table">
                                    <tr>
                                        <td>Ajuste de jornada laboral</td>
                                        <td>{{ $empresa->pre3_1_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Ajuste o reducción de la producción</td>
                                        <td>{{ $empresa->pre3_2_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Implementación de ventas en línea</td>
                                        <td>{{ $empresa->pre3_3_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Introducción de Nuevos Productos y/o servicios.</td>
                                        <td>{{ $empresa->pre3_4_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Cambios en la Presentación del Producto (Tamaño y Empaque)</td>
                                        <td>{{ $empresa->pre3_5_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Ajustes a procesos y procedimientos</td>
                                        <td>{{ $empresa->pre3_6_pcd }}</td>
                                    </tr>
                                </table>
                                <textarea class="form-control" name="preguntacd3" id="preguntacd3">{{ $exist_diagnostico_empresa->preguntacd3 }}</textarea>
                            </div>
                            <!--pregunta4-->
                            <div class="alert alert-light">
                                <p>4. De acuerdo a las reformas que debió realizar la empresa para ajustarse
                                    a
                                    los cambios
                                    generados por el Covid-19 durante el primer año, marque con una X sobre
                                    la
                                    reforma en la
                                    que haya generado más impacto sobre las ventas y/o empleo</p>
                                <p>Respuesta:</p>
                                <table class="table">
                                    <tr>
                                        <td>Circular 021 del 2020 (Medidas de protección al empleo)</td>
                                        <td>{{ $empresa->pre4_1_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Ajuste o reducción de la producción</td>
                                        <td>{{ $empresa->pre4_2_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Implementación de ventas en línea</td>
                                        <td>{{ $empresa->pre4_3_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Introducción de Nuevos Productos y/o servicios.</td>
                                        <td>{{ $empresa->pre4_4_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Cambios en la Presentación del Producto (Tamaño y Empaque)</td>
                                        <td>{{ $empresa->pre4_5_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Distribución de productos a domicilio</td>
                                        <td>{{ $empresa->pre4_6_pcd }}</td>
                                    </tr>
                                </table>
                                <textarea class="form-control" name="preguntacd4" id="preguntacd4">{{ $exist_diagnostico_empresa->preguntacd4 }}</textarea>
                            </div>
                            <!--pregunta5-->
                            <div class="alert alert-light">
                                <p>5. Durante el Primer año de convivencia con el Covid–19, usted se vio en
                                    la
                                    necesidad de
                                    prescindir de los servicios de algún colaborador?</p>
                                <p>Respuesta: {{ $empresa->pre5_pcd }}</p>
                                <textarea class="form-control" name="preguntacd5" id="preguntacd5">{{ $exist_diagnostico_empresa->preguntacd5 }}</textarea>
                            </div>
                            <!--pregunta5.1-->
                            <div class="alert alert-light">
                                <p>5.1 Si su respuesta anterior fue SI, señale ¿Cuantos?</p>
                                <p>Respuesta: {{ $empresa->pre5_1_pcd }}</p>
                                <textarea class="form-control" name="preguntacd5_1" id="preguntacd5_1">{{ $exist_diagnostico_empresa->preguntacd5_1 }}</textarea>
                            </div>
                            <!--pregunta6-->
                            <div class="alert alert-light">
                                <p>6. ¿Cuál ha sido el tipo de reinvención ó innovación realizada en su
                                    empresa
                                    para
                                    enfrentar los efectos de la pandemia?</p>
                                <p>Respuesta: {{ $empresa->pre6_pcd }}</p>
                                <textarea class="form-control" name="preguntacd6" id="preguntacd6">{{ $exist_diagnostico_empresa->preguntacd6 }}</textarea>
                            </div>
                            <!--pregunta7-->
                            <div class="alert alert-light">
                                <p>7. Durante el primer año de convivencia con el COVID-19 su empresa
                                    presento
                                    un:</p>
                                <p>Respuesta: {{ $empresa->pre7_pcd }}</p>
                                <textarea class="form-control" name="preguntacd7" id="preguntacd7">{{ $exist_diagnostico_empresa->preguntacd7 }}</textarea>
                            </div>
                            <!--pregunta8-->
                            <div class="alert alert-light">
                                <p>8. Evalúe de 1 a 5, siendo 1 menos importante y 5 más importante, con
                                    relación a los
                                    principales factores que usted considera han afectado su actividad
                                    productiva, durante
                                    el primer año de convivencia con el Covid-19.</p>
                                <p>Respuesta:</p>
                                <table class="table">
                                    <tr>
                                        <td>Disminución en las Ventas</td>
                                        <td>{{ $empresa->pre8_1_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Incremento de Costos operacionales</td>
                                        <td>{{ $empresa->pre8_2_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Endeudamiento y difícil acceso al crédito</td>
                                        <td>{{ $empresa->pre8_3_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Falta de Capital de Trabajo</td>
                                        <td>{{ $empresa->pre8_4_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Altos gastos administrativos</td>
                                        <td>{{ $empresa->pre8_5_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Desconocimiento de herramientas efectivas para afrontar el
                                            cambio
                                        </td>
                                        <td>{{ $empresa->pre8_6_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Falta de adopción de nuevas tecnologías</td>
                                        <td>{{ $empresa->pre8_7_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Falta de adopción de nuevos canales de distribución</td>
                                        <td>{{ $empresa->pre8_8_pcd }}</td>
                                    </tr>
                                </table>
                                <textarea class="form-control" name="preguntacd8" id="preguntacd8">{{ $exist_diagnostico_empresa->preguntacd8 }}</textarea>
                            </div>
                            <!--pregunta9-->
                            <div class="alert alert-light">
                                <p>9. ¿Cómo califica usted la gestión del gobierno nacional, departamental y
                                    local para
                                    atender las necesidades apremiantes de la microempresa Casanareña?</p>
                                <p>Respuesta: No Hubo acompañamiento del gobierno.</p>
                                <table class="table">
                                    <tr>
                                        <td>Gobierno Nacional</td>
                                        <td>{{ $empresa->pre9_1_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Gobierno Departamental</td>
                                        <td>{{ $empresa->pre9_2_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Gobierno Municipal</td>
                                        <td>{{ $empresa->pre9_3_pcd }}</td>
                                    </tr>
                                </table>
                                <textarea class="form-control" name="preguntacd9" id="preguntacd9">{{ $exist_diagnostico_empresa->preguntacd9 }}</textarea>
                            </div>
                            <!--pregunta10-->
                            <div class="alert alert-light">
                                <p>10. ¿Cómo califica usted la gestión de las diferentes entidades para
                                    atender
                                    las
                                    necesidades apremiantes de la microempresa Casanareña?</p>
                                <p>Respuesta: En cámara de comercio No hubo acompañamiento. en bancos
                                    recibió
                                    crédito </p>
                                <table class="table">
                                    <tr>
                                        <td>Cámara de comercio</td>
                                        <td>{{ $empresa->pre10_1_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Sena</td>
                                        <td>{{ $empresa->pre10_2_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Fundaciones</td>
                                        <td>{{ $empresa->pre10_3_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Banca comercial</td>
                                        <td>{{ $empresa->pre10_4_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Entes gremiales</td>
                                        <td>{{ $empresa->pre10_5_pcd }}</td>
                                    </tr>
                                </table>
                                <textarea class="form-control" name="preguntacd10" id="preguntacd10">{{ $exist_diagnostico_empresa->preguntacd10 }}</textarea>
                            </div>
                            <!--pregunta11-->
                            <div class="alert alert-light">
                                <p>11. ¿Evalúe de 1 a 5, siendo 1 la dificultad menos importante y 5 la
                                    dificultad más
                                    importante, que ha presentado en su empresa a raíz de los efectos del
                                    primer
                                    año de
                                    convivencia con el COVID -19?</p>
                                <p>Respuesta:</p>
                                <table class="table">
                                    <tr>
                                        <td>Pago nomina</td>
                                        <td>{{ $empresa->pre11_1_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Compra a proveedores</td>
                                        <td>{{ $empresa->pre11_2_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pago de impuestos</td>
                                        <td>{{ $empresa->pre11_3_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pago de obligaciones financieras</td>
                                        <td>{{ $empresa->pre11_4_pcd }}</td>
                                    </tr>
                                </table>
                                <textarea class="form-control" name="preguntacd11" id="preguntacd11">{{ $exist_diagnostico_empresa->preguntacd11 }}</textarea>
                            </div>
                            <!--pregunta12-->
                            <div class="alert alert-light">
                                <p>12. ¿Cuál ha sido la modalidad de trabajo más adoptada por su empresa,
                                    transcurrido el
                                    primer año de convivencia con la pandemia covid-19? </p>
                                <p>Respuesta: {{ $empresa->pre12_pcd }}</p>
                                <textarea class="form-control" name="preguntacd12" id="preguntacd12">{{ $exist_diagnostico_empresa->preguntacd12 }}</textarea>
                            </div>
                            <!--pregunta13-->
                            <div class="alert alert-light">
                                <p>13. Desde su punto de vista, el trabajo en casa este ha generado en el
                                    grupo
                                    de
                                    colaboradores de su empresa:</p>
                                <p>Respuesta: {{ $empresa->pre13_pcd }}</p>
                                <textarea class="form-control" name="preguntacd13" id="preguntacd13">{{ $exist_diagnostico_empresa->preguntacd13 }}</textarea>
                            </div>
                            <!--pregunta14-->
                            <div class="alert alert-light">
                                <p>14.¿Su microempresa ha dado algún tipo de compensación, por los recursos
                                    utilizados por
                                    el trabajador que se encuentra realizando teletrabajo?</p>
                                <p>Respuesta: {{ $empresa->pre14_pcd }}</p>
                                <textarea class="form-control" name="preguntacd14" id="preguntacd14">{{ $exist_diagnostico_empresa->preguntacd14 }}</textarea>
                            </div>
                            <!--pregunta15-->
                            <div class="alert alert-light">
                                <p>15. ¿En que ha estado representada esta compensación?</p>
                                <p>Respuesta: {{ $empresa->pre15_pcd }}</p>
                                <textarea class="form-control" name="preguntacd15" id="preguntacd15">{{ $exist_diagnostico_empresa->preguntacd15 }}</textarea>
                            </div>
                            <!--pregunta16-->
                            <div class="alert alert-light">
                                <p>16. Con respecto a su estilo de dirección de su microempresa, ¿qué
                                    competencias y
                                    habilidades más importantes ha debido implementar durante el primer año
                                    de
                                    contingencia
                                    por el Covid-19? Evalúe de 1 a 5, siendo 1 la menos importante y 5 la
                                    más
                                    importante.
                                </p>
                                <p>Respuesta:</p>
                                <table class="table">
                                    <tr>
                                        <td>Adquirir conocimientos</td>
                                        <td>{{ $empresa->pre16_1_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Conocer y manejar herramientas efectivas que ofrece el mercado
                                        </td>
                                        <td>{{ $empresa->pre16_2_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Acceso eficiente a información que oriente a su microempresa
                                        </td>
                                        <td>{{ $empresa->pre16_3_pcd }}</td>
                                    </tr>
                                    <tr>
                                        <td>Desarrollar capacidades de Innovación</td>
                                        <td>{{ $empresa->pre16_4_pcd }}</td>
                                    </tr>
                                </table>
                                <textarea class="form-control" name="preguntacd16" id="preguntacd16">{{ $exist_diagnostico_empresa->preguntacd16 }}</textarea>
                            </div>
                            <!--pregunta17-->
                            <div class="alert alert-light">
                                <p>17. ¿Tiene elaborado el modelo de negocio para su microempresa?,
                                    (entiéndase
                                    modelo de
                                    negocio, como una herramienta de análisis que le permite saber cuál es
                                    su
                                    propuesta de
                                    valor o de utilidad, que ofrece al cliente a través de su producto o
                                    servicio, a qué
                                    costos, con qué medios y qué fuentes de ingresos va a tener) </p>
                                <p>Respuesta: {{ $empresa->pre17_1_pcd }}</p>
                                <textarea class="form-control" name="preguntacd17" id="preguntacd17">{{ $exist_diagnostico_empresa->preguntacd17 }}</textarea>
                            </div>
                            <!--pregunta7-->
                            <div class="alert alert-light">
                                <p>17.1. ¿Si contestó a la anterior pregunta SI, tuvo que ajustar su modelo
                                    de
                                    negocio
                                    durante el primer año de convivencia con el Covid-19 ?</p>
                                <p>Respuesta: {{ $empresa->pre17_2_pcd }}</p>
                                <textarea class="form-control" name="preguntacd17_1" id="preguntacd17_1">{{ $exist_diagnostico_empresa->preguntacd17_1 }}</textarea>
                            </div>
                            <hr>
                            <!--Fin-->
                            <!--Perspectiva clientes-->
                            <div class="alert alert-info">PERSPECTIVA DE CLIENTES <br> <strong>Realizar
                                    observación por cada pregunta.</strong></div>
                            <!--preguntapc1-->
                            <div class="alert alert-light">
                                <p>1. Considera que el mejoramiento del servicio y atención al cliente a
                                    representado para su microempresa un factor de:</p>
                                <p>Respuesta: {{ $empresa->pre1_pc }}</p>
                                <textarea class="form-control" name="preguntac1" id="preguntac1">{{ $exist_diagnostico_empresa->preguntac1 }}</textarea>
                            </div>
                            <!--preguntapc2-->
                            <div class="alert alert-light">
                                <p>2. ¿Que tan efectivas considera las siguientes estratégias para recuperar
                                    y/o
                                    mantener los clientes de su microempresa? Evalúe de 1 a 5, siendo 1 la
                                    de
                                    menor importancia y 5 la de mayor importancia.</p>
                                <p>Respuesta:</p>
                                <table class="table">
                                    <tr>
                                        <td>Cambio en su portafolio de productos</td>
                                        <td>{{ $empresa->pre2_1_pc }}</td>
                                    </tr>
                                    <tr>
                                        <td>Servicio personalizado</td>
                                        <td>{{ $empresa->pre2_2_pc }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nuevos canales de comunicación con los clientes</td>
                                        <td>{{ $empresa->pre2_3_pc }}</td>
                                    </tr>
                                    <tr>
                                        <td>Diferentes alternativas de medios de pago</td>
                                        <td>{{ $empresa->pre2_4_pc }}</td>
                                    </tr>
                                </table>
                                <textarea class="form-control" name="preguntac2" id="preguntac2">{{ $exist_diagnostico_empresa->preguntac2 }}</textarea>
                            </div>
                            <!--preguntapc3-->
                            <div class="alert alert-light">
                                <p>3. ¿Considera que la adopción de los protocolos de bioseguridad durante
                                    el
                                    primer año de convivencia con el Covid-19, generaron confianza en los
                                    clientes , provocando un aumento en las ventas?</p>
                                <p>Respuesta: {{ $empresa->pre3_pc }}</p>
                                <textarea class="form-control" name="preguntac3" id="preguntac3">{{ $exist_diagnostico_empresa->preguntac3 }}</textarea>
                            </div>
                            <!--preguntapc4-->
                            <div class="alert alert-light">
                                <p>4. ¿Realiza usted alguna innovación para lograr una mejor la satisfacción
                                    al
                                    cliente ?</p>
                                <p>Respuesta: {{ $empresa->pre4_1_pc }}</p>
                                <textarea class="form-control" name="preguntac4" id="preguntac4">{{ $exist_diagnostico_empresa->preguntac4 }}</textarea>
                            </div>
                            <!--preguntapc4.1-->
                            <div class="alert alert-light">
                                <p>4.1 Si su respuesta a la anterior pregunta fue SI, mencione que
                                    innovación ha
                                    realizado para lograr mejorar la satisfacción del cliente.</p>
                                <p>Respuesta: {{ $empresa->pre4_2_pc }}</p>
                                <textarea class="form-control" name="preguntac4_1" id="preguntac4_1">{{ $exist_diagnostico_empresa->preguntac4_1 }}</textarea>
                            </div>
                            <!--preguntapc5-->
                            <div class="alert alert-light">
                                <p>5. ¿En qué porcentaje ha crecido el número de clientes de su negocio?</p>
                                <p>Respuesta: {{ $empresa->pre5_pc }}</p>
                                <textarea class="form-control" name="preguntac5" id="preguntac5">{{ $exist_diagnostico_empresa->preguntac5 }}</textarea>
                            </div>
                            <!--preguntapc6-->
                            <div class="alert alert-light">
                                <p>6. ¿Qué porcentaje de los gastos totales de su negocio a direccionado
                                    para
                                    captar nuevos clientes?</p>
                                <p>Respuesta: {{ $empresa->pre6_pc }}</p>
                                <textarea class="form-control" name="preguntac6" id="preguntac6">{{ $exist_diagnostico_empresa->preguntac6 }}</textarea>
                            </div>
                            <!--preguntapc7-->
                            <div class="alert alert-light">
                                <p>7. ¿Califique de 1 a 5, siendo 1 donde no ha habido quejas y 5 la opción
                                    que
                                    más quejas ha recibido, en relación con los aspectos que se enumeran a
                                    continuación ?</p>
                                <p>Respuesta:</p>
                                <table class="table">
                                    <tr>
                                        <td>Atención al cliente</td>
                                        <td>{{ $empresa->pre7_1_pc }}</td>
                                    </tr>
                                    <tr>
                                        <td>Servicio al cliente</td>
                                        <td>{{ $empresa->pre7_2_pc }}</td>
                                    </tr>
                                    <tr>
                                        <td>Producto</td>
                                        <td>{{ $empresa->pre7_3_pc }}</td>
                                    </tr>
                                    <tr>
                                        <td>Protocolos bioseguridad</td>
                                        <td>{{ $empresa->pre7_4_pc }}</td>
                                    </tr>
                                    <tr>
                                        <td>Precios</td>
                                        <td>{{ $empresa->pre7_5_pc }}</td>
                                    </tr>
                                    <tr>
                                        <td>Horarios atención</td>
                                        <td>{{ $empresa->pre7_6_pc }}</td>
                                    </tr>
                                </table>
                                <textarea class="form-control" name="preguntac7" id="preguntac7">{{ $exist_diagnostico_empresa->preguntac7 }}</textarea>
                            </div>
                            <!--preguntapc8-->
                            <div class="alert alert-light">
                                <p>8. ¿Considera importante dar respuesta al buzón de sugerencias
                                    oportunamente?
                                </p>
                                <p>Respuesta: {{ $empresa->pre8_pc }}</p>
                                <textarea class="form-control" name="preguntac8" id="preguntac8">{{ $exist_diagnostico_empresa->preguntac8 }}</textarea>
                            </div>
                            <!--preguntapc9-->
                            <div class="alert alert-light">
                                <p>9. ¿Qué estrategia de medición del nivel satisfacción del cliente o PQRs
                                    ha
                                    implementado en su microempresa?</p>
                                <p>Respuesta: {{ $empresa->pre9_pc }}</p>
                                <textarea class="form-control" name="preguntac9" id="preguntac9">{{ $exist_diagnostico_empresa->preguntac9 }}</textarea>
                            </div>
                            <hr>
                            <!--Fin-->
                            <!--Perspectiva procesos internos-->
                            <div class="alert alert-info">PERSPECTIVA DE PROCESOS INTERNOS <br> <strong>Realizar
                                    observación por cada pregunta.</strong></div>
                            <!--preguntappi1-->
                            <div class="alert alert-light">
                                <p>1. ¿Su empresa tiene identificados claramente sus procesos internos?</p>
                                <p>Respuesta: {{ $empresa->pre1_pi }}</p>
                                <textarea class="form-control" name="preguntapi1" id="preguntapi1">{{ $exist_diagnostico_empresa->preguntapi1 }}</textarea>
                            </div>
                            <!--preguntappi2-->
                            <div class="alert alert-light">
                                <p>2. ¿La empresa tiene documentados sus procesos internos?</p>
                                <p>Respuesta: {{ $empresa->pre2_pi }}</p>
                                <textarea class="form-control" name="preguntapi2" id="preguntapi2">{{ $exist_diagnostico_empresa->preguntapi2 }}</textarea>
                            </div>
                            <!--preguntappi3-->
                            <div class="alert alert-light">
                                <p>3. ¿La empresa cuenta con alguna certificación reglamentaria para su
                                    sector?
                                </p>
                                <p>Respuesta: {{ $empresa->pre3_1_pi }}</p>
                                <textarea class="form-control" name="preguntapi3" id="preguntapi3">{{ $exist_diagnostico_empresa->preguntapi3 }}</textarea>
                            </div>
                            <!--preguntappi3.1-->
                            <div class="alert alert-light">
                                <p>3.1 Si su respuesta a la anterior pregunta fue SI, mencione ¿Cual?</p>
                                <p>Respuesta: {{ $empresa->pre3_2_pi }}</p>
                                <textarea class="form-control" name="preguntapi3_1" id="preguntapi3_1">{{ $exist_diagnostico_empresa->preguntapi3_1 }}</textarea>
                            </div>
                            <!--preguntappi4-->
                            <div class="alert alert-light">
                                <p>4. ¿La empresa cuenta con alguna certificación de Calidad?</p>
                                <p>Respuesta: {{ $empresa->pre4_1_pi }}</p>
                                <textarea class="form-control" name="preguntapi4" id="preguntapi4">{{ $exist_diagnostico_empresa->preguntapi4 }}</textarea>
                            </div>
                            <!--preguntappi4_1-->
                            <div class="alert alert-light">
                                <p>4.1 Si su respuesta a la anterior pregunta fue SI, mencione ¿Cual?</p>
                                <p>Respuesta: {{ $empresa->pre4_2_pi }}</p>
                                <textarea class="form-control" name="preguntapi4_1" id="preguntapi4_1">{{ $exist_diagnostico_empresa->preguntapi4_1 }}</textarea>
                            </div>
                            <!--preguntappi5-->
                            <div class="alert alert-light">
                                <p>5. ¿Con relación al grado de afectación de sus procesos internos durante
                                    el
                                    primer año de convivencia con el Covid -19? Evalúe del 1 al 5, siendo 1
                                    el
                                    menor nivel y 5 el mayor nivel de afectación.</p>
                                <p>Respuesta:</p>
                                <table class="table">
                                    <tr>
                                        <td>Gerenciales</td>
                                        <td>{{ $empresa->pre5_1_pi }}</td>
                                    </tr>
                                    <tr>
                                        <td>Administrativos</td>
                                        <td>{{ $empresa->pre5_2_pi }}</td>
                                    </tr>
                                    <tr>
                                        <td>Operativos</td>
                                        <td>{{ $empresa->pre5_3_pi }}</td>
                                    </tr>
                                    <tr>
                                        <td>Comerciales</td>
                                        <td>{{ $empresa->pre5_4_pi }}</td>
                                    </tr>
                                    <tr>
                                        <td>Talento humano</td>
                                        <td>{{ $empresa->pre5_5_pi }}</td>
                                    </tr>
                                    <tr>
                                        <td>Productivos</td>
                                        <td>{{ $empresa->pre5_6_pi }}</td>
                                    </tr>
                                    <tr>
                                        <td>No tiene identificados los procesos</td>
                                        <td>{{ $empresa->pre5_7_pi }}</td>
                                    </tr>
                                </table>
                                <textarea class="form-control" name="preguntapi5" id="preguntapi5">{{ $exist_diagnostico_empresa->preguntapi5 }}</textarea>
                            </div>
                            <!--preguntappi6-->
                            <div class="alert alert-light">
                                <p>6. ¿Cuáles han sido los cambios más importantes que ha tenido con sus
                                    proveedores durante el primer año de convivencia con el Covid-19?</p>
                                <p>Respuesta: {{ $empresa->pre6_1_pi }}</p>
                                <textarea class="form-control" name="preguntapi6" id="preguntapi6">{{ $exist_diagnostico_empresa->preguntapi6 }}</textarea>
                            </div>
                            <!--preguntappi6_1-->
                            <div class="alert alert-light">
                                <p>6.1 Si su selección a la pregunta anterior fue CAMBIOS EN LOS MEDIOS DE
                                    PAGO,
                                    INDIQUE CUALES</p>
                                <p>Respuesta: {{ $empresa->pre6_2_pi }}</p>
                                <textarea class="form-control" name="preguntapi6_1" id="preguntapi6_1">{{ $exist_diagnostico_empresa->preguntapi6_1 }}</textarea>
                            </div>
                            <!--preguntappi7-->
                            <div class="alert alert-light">
                                <p>7. ¿Identifique cuáles han sido los cambios más importantes que ha tenido
                                    con
                                    sus clientes?</p>
                                <p>Respuesta: {{ $empresa->pre7_pi }}</p>
                                <textarea class="form-control" name="preguntapi7" id="preguntapi7">{{ $exist_diagnostico_empresa->preguntapi7 }}</textarea>
                            </div>
                            <!--preguntappi8-->
                            <div class="alert alert-light">
                                <p>8. Considera que el grado de rentabilidad de los nuevos productos
                                    lanzados al
                                    mercado durante el primer año de convivencia con el Covid-19 ha sido:
                                </p>
                                <p>Respuesta: {{ $empresa->pre8_pi }}</p>
                                <textarea class="form-control" name="preguntapi8" id="preguntapi8">{{ $exist_diagnostico_empresa->preguntapi8 }}</textarea>
                            </div>
                            <hr>
                            <!--Fin-->
                            <!--Perspectiva financiera-->
                            <div class="alert alert-info">PERSPECTIVA FINANCIERA <br> <strong>Realizar
                                    observación por cada pregunta.</strong></div>
                            <!--preguntapf1-->
                            <div class="alert alert-light">
                                <p>1. ¿La empresa se sujetó al subsidio de Nómina (PAEF) decretado por el
                                    Gobierno Nacional?</p>
                                <p>Respuesta: {{ $empresa->pre1_pf }}</p>
                                <textarea class="form-control" name="preguntapf1" id="preguntapf1">{{ $exist_diagnostico_empresa->preguntapf1 }}</textarea>
                            </div>
                            <!--preguntapf_1.1-->
                            <div class="alert alert-light">
                                <p>1.1 . Si contestó No a la anterior pregunta marque alguna(s) de las
                                    siguientes razones:</p>
                                <p>Respuesta: {{ $empresa->pre1_1_pf }}</p>
                                <textarea class="form-control" name="preguntapf1_1" id="preguntapf1_1">{{ $exist_diagnostico_empresa->preguntapf1_1 }}</textarea>
                            </div>
                            <!--preguntapf2-->
                            <div class="alert alert-light">
                                <p>2. ¿Recibió algún beneficio de las entidades financieras como empresario
                                    a
                                    raíz de la contingencia por el Covid–19?</p>
                                <p>Respuesta: {{ $empresa->pre2_pf }}</p>
                                <textarea class="form-control" name="preguntapf2" id="preguntapf2">{{ $exist_diagnostico_empresa->preguntapf2 }}</textarea>
                            </div>
                            <!--preguntapf2.1-->
                            <div class="alert alert-light">
                                <p>2.1 Si su respuesta a la anterior pregunta fue SI, mencione ¿Cual?</p>
                                <p>Respuesta: {{ $empresa->pre2_1_pf }}</p>
                                <textarea class="form-control" name="preguntapf2_1" id="preguntapf2_1">{{ $exist_diagnostico_empresa->preguntapf2_1 }}</textarea>
                            </div>
                            <!--preguntapf3-->
                            <div class="alert alert-light">
                                <p>3. ¿Realizó reliquidaciones de sus obligaciones financieras originadas
                                    principalmente por la pandemia?</p>
                                <p>Respuesta: {{ $empresa->pre3_1_pf }}</p>
                                <textarea class="form-control" name="preguntapf3" id="preguntapf3">{{ $exist_diagnostico_empresa->preguntapf3 }}</textarea>
                            </div>
                            <!--preguntapf3_1-->
                            <div class="alert alert-light">
                                <p>3.1 Si respondió SI a la anterior pregunta, ¿ésta reliquidación de las
                                    obligaciones financieras le permitió generar flujo de caja mejorando la
                                    situación de su empresa?</p>
                                <p>Respuesta: {{ $empresa->pre3_2_pf }}</p>
                                <textarea class="form-control" name="preguntapf3_1" id="preguntapf3_1">{{ $exist_diagnostico_empresa->preguntapf3_1 }}</textarea>
                            </div>
                            <!--preguntapf4-->
                            <div class="alert alert-light">
                                <p>4. Su empresa lleva Contabilidad de:</p>
                                <p>Respuesta: {{ $empresa->pre4_pf }}</p>
                                <textarea class="form-control" name="preguntapf4" id="preguntapf4">{{ $exist_diagnostico_empresa->preguntapf4 }}</textarea>
                            </div>
                            <!--preguntapf5-->
                            <div class="alert alert-light">
                                <p>5. ¿La facturación relacionada con esta área Contable es generada y
                                    archivada adecuadamente?</p>
                                <p>Respuesta: {{ $empresa->pre5_pf }}</p>
                                <textarea class="form-control" name="preguntapf5" id="preguntapf5">{{ $exist_diagnostico_empresa->preguntapf5 }}</textarea>
                            </div>
                            <!--preguntapf6-->
                            <div class="alert alert-light">
                                <p>6. ¿La empresa realiza control mensual de sus costos y gastos?</p>
                                <p>Respuesta: {{ $empresa->pre6_pf }}</p>
                                <textarea class="form-control" name="preguntapf6" id="preguntapf6">{{ $exist_diagnostico_empresa->preguntapf6 }}</textarea>
                            </div>
                            <!--preguntapf7-->
                            <div class="alert alert-light">
                                <p>7. ¿Cuál ha sido el nivel de afectación de sus costos y gastos durante el
                                    primer año de convivencia con el Covid-19?</p>
                                <p>Respuesta: {{ $empresa->pre7_pf }}</p>
                                <textarea class="form-control" name="preguntapf7" id="preguntapf7">{{ $exist_diagnostico_empresa->preguntapf7 }}</textarea>
                            </div>
                            <!--preguntapf8-->
                            <div class="alert alert-light">
                                <p>8. ¿Realiza una planificación presupuestal de sus ingresos y egresos?
                                </p>
                                <p>Respuesta: {{ $empresa->pre8_pf }}</p>
                                <textarea class="form-control" name="preguntapf8" id="preguntapf8">{{ $exist_diagnostico_empresa->preguntapf8 }}</textarea>
                            </div>
                            <!--preguntapf9-->
                            <div class="alert alert-light">
                                <p>9. ¿Tiene usted conocimiento de que son los Indicadores financieros?</p>
                                <p>Respuesta: {{ $empresa->pre9_1_pf }}</p>
                                <textarea class="form-control" name="preguntapf9" id="preguntapf9">{{ $exist_diagnostico_empresa->preguntapf9 }}</textarea>
                            </div>
                            <!--preguntapf9_1-->
                            <div class="alert alert-light">
                                <p>9.1 Si respondió SI a la anterior pregunta, su empresa tiene definidos e
                                    interpreta los indicadores financieros?</p>
                                <p>Respuesta: {{ $empresa->pre9_2_pf }}</p>
                                <textarea class="form-control" name="preguntapf9_1" id="preguntapf9_1">{{ $exist_diagnostico_empresa->preguntapf9_1 }}</textarea>
                            </div>
                            <!--preguntapf10-->
                            <div class="alert alert-light">
                                <p>10. ¿Le fueron aprobados préstamos de la banca comercial durante la
                                    pandemia?</p>
                                <p>Respuesta: {{ $empresa->pre10_1_pf }}</p>
                                <textarea class="form-control" name="preguntapf10" id="preguntapf10">{{ $exist_diagnostico_empresa->preguntapf10 }}</textarea>
                            </div>
                            <!--preguntapf10_1-->
                            <div class="alert alert-light">
                                <p>10.1 Si respondió Sí a la anterior pregunta ¿Mencione qué montos?</p>
                                <p>Respuesta: $ {{ $empresa->pre10_2_pf }}</p>
                                <textarea class="form-control" name="preguntapf10_1" id="preguntapf10_1">{{ $exist_diagnostico_empresa->preguntapf10_1 }}</textarea>
                            </div>
                            <!--preguntapf11-->
                            <div class="alert alert-light">
                                <p>11. ¿Cómo ha financiado sus actividades a lo largo de la pandemia del
                                    Covid-19?</p>
                                <p>Respuesta: {{ $empresa->pre11_pf }}</p>
                                <textarea class="form-control" name="preguntapf11" id="preguntapf11">{{ $exist_diagnostico_empresa->preguntapf11 }}</textarea>
                            </div>
                            <!--preguntapf12-->
                            <div class="alert alert-light">
                                <p>12. La liquidez o la disponibilidad de efectivo de su empresa durante el
                                    primer año de convivencia con la pandemia por el Covid-19 ha sido:</p>
                                <p>Respuesta: {{ $empresa->pre12_pf }}</p>
                                <textarea class="form-control" name="preguntapf12" id="preguntapf12">{{ $exist_diagnostico_empresa->preguntapf12 }}</textarea>
                            </div>
                            <!--preguntapf13-->
                            <div class="alert alert-light">
                                <p>13. Considera que las ganancias de su negocio durante el primer año de
                                    covid-19 en comparación al año anterior:</p>
                                <p>Respuesta: {{ $empresa->pre13_pf }}</p>
                                <textarea class="form-control" name="preguntapf13" id="preguntapf13">{{ $exist_diagnostico_empresa->preguntapf13 }}</textarea>
                            </div>
                            <!--preguntapf14-->
                            <div class="alert alert-light">
                                <p>14. Reconoce que la pérdida de sus ganancias en el primer año del
                                    covid-19 obedeció principalmente a:</p>
                                <p>Respuesta: {{ $empresa->pre14_pf }}</p>
                                <textarea class="form-control" name="preguntapf14" id="preguntapf14">{{ $exist_diagnostico_empresa->preguntapf14 }}</textarea>
                            </div>
                            <!--preguntapf15-->
                            <div class="alert alert-light">
                                <p>15. ¿Durante la pandemia los ingresos que ha recibido su negocio o
                                    empresa le han permitido sostenerse económicamente? </p>
                                <p>Respuesta: {{ $empresa->pre15_pf }}</p>
                                <textarea class="form-control" name="preguntapf15" id="preguntapf15">{{ $exist_diagnostico_empresa->preguntapf15 }}</textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!--Fin-->
                </form>
            @endif
        </div>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-info-circle"></i> Información</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="font-size: 15px">
                    <h5>¿Esta de acuerdo con eliminar la asignación del instructor y/o investigador? <br>
                        <span class="text-danger">Nota: Recuerde que eliminando la asignación, borra el análisis realizado
                            a la microempresa</span>
                    </h5>
                </div>
                <div class="modal-footer">
                    <form action="{{ url("diagnostico/{$empresa->nit}") }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-primary" type="submit">Confirmar</button>
                    </form>
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    @endsection
