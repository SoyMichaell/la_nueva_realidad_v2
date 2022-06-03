@extends('layouts.app')

@section('content')
    <main>
        <div class="container">
            <div class="alert alert-info">
                <h1 class="mt-4">Muestra 374 microempresas</h1>
                <p>Listado de empresas seleccionadas para aplicación del instrumento de recolección de la información para
                    el
                    diagnostico</p>
            </div>
            <hr>
            <a class="btn btn-primary btn-sm mt-2 mb-2" href="{{url("diagnostico/{$empresa->nit}/pdf")}}">Generar pdf</a>
            <div class="card mb-3">
                <div class="card-header"><i class="fas fa-info-circle"></i> Información empresa</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nit</th>
                                <td>{{ $empresa->nit_empresa }}</td>
                            </tr>
                            <tr>
                                <th>Razón social</th>
                                <td>{{ $empresa->razon_social }}</td>
                            </tr>
                            <tr>
                                <th>Telefono</th>
                                <td>{{ $empresa->telefono1 }}</td>
                            </tr>
                            <tr>
                                <th>Dirección</th>
                                <td>{{ $empresa->direccion }}</td>
                            </tr>
                            <tr>
                                <th>Municipio</th>
                                <td>{{ $empresa->municipio }}</td>
                            </tr>
                            <tr>
                                <th>CIIU Principal</th>
                                <td>{{ $empresa->ciiu_1 }}</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!--Resultado diagnostico global-->
            <div class="card mb-3">
                <div class="card-header"><i class="fas fa-poll"></i> Puntaje aplicación encuesta</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>COMPONENTE</th>
                                    <th>PORCENTAJE</th>
                                    <th>MÁXIMO</th>
                                </tr>
                                <tr>
                                    <td>Perspectiva de crecimiento y desarrollo</td>
                                    <td
                                        class="@if ($empresa->perspectiva_c_d >= 0 and $empresa->perspectiva_c_d <= 7) bg-danger text-white 
                                            @elseif($empresa->perspectiva_c_d > 7 and $empresa->perspectiva_c_d <= 16) bg-warning text-white 
                                            @elseif($empresa->perspectiva_c_d > 16 and $empresa->perspectiva_c_d <= 25) bg-success text-white @endif">
                                        {{ $empresa->perspectiva_c_d . '%' }}</td>
                                    <td>25%</td>
                                </tr>
                                <tr>
                                    <td>Perspectiva de clientes</td>
                                    <td
                                        class="@if ($empresa->perspectiva_c >= 0 and $empresa->perspectiva_c <= 7) bg-danger text-white 
                                            @elseif($empresa->perspectiva_c > 7 and $empresa->perspectiva_c <= 16) bg-warning text-white 
                                            @elseif($empresa->perspectiva_c > 16 and $empresa->perspectiva_c <= 25) bg-success text-white @endif">
                                        {{ $empresa->perspectiva_c . '%' }}</td>
                                    <td>25%</td>
                                </tr>
                                <tr>
                                    <td>Perspectiva procesos internos</td>
                                    <td
                                        class="@if ($empresa->perspectiva_p_i >= 0 and $empresa->perspectiva_p_i <= 7) bg-danger text-white 
                                            @elseif($empresa->perspectiva_p_i > 7 and $empresa->perspectiva_p_i <= 16) bg-warning text-white 
                                            @elseif($empresa->perspectiva_p_i > 16 and $empresa->perspectiva_p_i <= 25) bg-success text-white @endif">
                                        {{ $empresa->perspectiva_p_i . '%' }}</td>
                                    <td>25%</td>
                                </tr>
                                <tr>
                                    <td>Perspectiva financiera</td>
                                    <td
                                        class="@if ($empresa->perspectiva_f >= 0 and $empresa->perspectiva_f <= 7) bg-danger text-white 
                                                    @elseif($empresa->perspectiva_f > 7 and $empresa->perspectiva_f <= 16) bg-warning text-white 
                                                    @elseif($empresa->perspectiva_f > 16 and $empresa->perspectiva_f <= 25) bg-success text-white @endif">
                                        {{ $empresa->perspectiva_f . '%' }}</td>
                                    <td>25%</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td
                                        class="@if ($empresa->total >= 0 and $empresa->total <= 40) bg-danger text-white @elseif($empresa->total > 40 and $empresa->total <= 70) bg-warning text-white @elseif($empresa->total > 70 and $empresa->total <= 100) bg-success text-white @endif">
                                        {{ $empresa->total . '%' }}</td>
                                    <td>100%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--Fin diagnostico global-->
            <div class="card mb-3">
                <div class="card-header"><i class="fas fa-book-open"></i> Respuesta a la encuesta</div>
                <div class="card-body">
                    <!--Perspectiva de crecimiento y desarrollo-->
                    <!--pregunta1-->
                    <div class="alert alert-info"><strong>PERSPECTIVA DE CRECIMIENTO Y DESARROLLO</strong></div>
                    <div class="alert alert-">
                        <p>1. ¿Realizo procesos de capacitación durante el año 2020?</p>
                        <p>Respuesta: {{ $empresa->pre1_pcd }}</p>
                    </div>
                    <!--pregunta1.1-->
                    <div class="alert alert-light">
                        <p>1.1. ¿Si su respuesta a la anterior pregunta fue POSITIVA en que área? Si
                            su
                            respuesta
                            fue NO, omita está pregunta.?</p>
                        <p>Respuesta: {{ $empresa->pre1_1_pcd }}</p>
                    </div>
                    <!--pregunta2-->
                    <div class="alert alert-light">
                        <p>2. ¿En el año 2020 como consecuencia del covid-19, sus empleados
                            realizaron
                            trabajo en
                            casa?</p>
                        <p>Respuesta: {{ $empresa->pre2_pcd }}</p>
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
                                <th>Ajuste de jornada laboral</th>
                                <td>{{ $empresa->pre3_1_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Ajuste o reducción de la producción</th>
                                <td>{{ $empresa->pre3_2_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Implementación de ventas en línea</th>
                                <td>{{ $empresa->pre3_3_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Introducción de Nuevos Productos y/o servicios.</th>
                                <td>{{ $empresa->pre3_4_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Cambios en la Presentación del Producto (Tamaño y Empaque)</th>
                                <td>{{ $empresa->pre3_5_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Ajustes a procesos y procedimientos</th>
                                <td>{{ $empresa->pre3_6_pcd }}</td>
                            </tr>
                        </table>
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
                                <th>Circular 021 del 2020 (Medidas de protección al empleo)</th>
                                <td>{{ $empresa->pre4_1_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Ajuste o reducción de la producción</th>
                                <td>{{ $empresa->pre4_2_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Implementación de ventas en línea</th>
                                <td>{{ $empresa->pre4_3_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Introducción de Nuevos Productos y/o servicios.</th>
                                <td>{{ $empresa->pre4_4_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Cambios en la Presentación del Producto (Tamaño y Empaque)</th>
                                <td>{{ $empresa->pre4_5_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Distribución de productos a domicilio</th>
                                <td>{{ $empresa->pre4_6_pcd }}</td>
                            </tr>
                        </table>
                    </div>
                    <!--pregunta5-->
                    <div class="alert alert-light">
                        <p>5. Durante el Primer año de convivencia con el Covid–19, usted se vio en
                            la
                            necesidad de
                            prescindir de los servicios de algún colaborador?</p>
                        <p>Respuesta: {{ $empresa->pre5_pcd }}</p>
                    </div>
                    <!--pregunta5.1-->
                    <div class="alert alert-light">
                        <p>5.1 Si su respuesta anterior fue SI, señale ¿Cuantos?</p>
                        <p>Respuesta: {{ $empresa->pre5_1_pcd }}</p>
                    </div>
                    <!--pregunta6-->
                    <div class="alert alert-light">
                        <p>6. ¿Cuál ha sido el tipo de reinvención ó innovación realizada en su
                            empresa
                            para
                            enfrentar los efectos de la pandemia?</p>
                        <p>Respuesta: {{ $empresa->pre6_pcd }}</p>
                    </div>
                    <!--pregunta7-->
                    <div class="alert alert-light">
                        <p>7. Durante el primer año de convivencia con el COVID-19 su empresa
                            presento
                            un:</p>
                        <p>Respuesta: {{ $empresa->pre7_pcd }}</p>
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
                                <th>Disminución en las Ventas</th>
                                <td>{{ $empresa->pre8_1_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Incremento de Costos operacionales</th>
                                <td>{{ $empresa->pre8_2_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Endeudamiento y difícil acceso al crédito</th>
                                <td>{{ $empresa->pre8_3_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Falta de Capital de Trabajo</th>
                                <td>{{ $empresa->pre8_4_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Altos gastos administrativos</th>
                                <td>{{ $empresa->pre8_5_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Desconocimiento de herramientas efectivas para afrontar el
                                    cambio
                                </th>
                                <td>{{ $empresa->pre8_6_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Falta de adopción de nuevas tecnologías</th>
                                <td>{{ $empresa->pre8_7_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Falta de adopción de nuevos canales de distribución</th>
                                <td>{{ $empresa->pre8_8_pcd }}</td>
                            </tr>
                        </table>
                    </div>
                    <!--pregunta9-->
                    <div class="alert alert-light">
                        <p>9. ¿Cómo califica usted la gestión del gobierno nacional, departamental y
                            local para
                            atender las necesidades apremiantes de la microempresa Casanareña?</p>
                        <p>Respuesta: No Hubo acompañamiento del gobierno.</p>
                        <table class="table">
                            <tr>
                                <th>Gobierno Nacional</th>
                                <td>{{ $empresa->pre9_1_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Gobierno Departamental</th>
                                <td>{{ $empresa->pre9_2_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Gobierno Municipal</th>
                                <td>{{ $empresa->pre9_3_pcd }}</td>
                            </tr>
                        </table>
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
                                <th>Cámara de comercio</th>
                                <td>{{ $empresa->pre10_1_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Sena</th>
                                <td>{{ $empresa->pre10_2_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Fundaciones</th>
                                <td>{{ $empresa->pre10_3_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Banca comercial</th>
                                <td>{{ $empresa->pre10_4_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Entes gremiales</th>
                                <td>{{ $empresa->pre10_5_pcd }}</td>
                            </tr>
                        </table>
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
                                <th>Pago nomina</th>
                                <td>{{ $empresa->pre11_1_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Compra a proveedores</th>
                                <td>{{ $empresa->pre11_2_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Pago de impuestos</th>
                                <td>{{ $empresa->pre11_3_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Pago de obligaciones financieras</th>
                                <td>{{ $empresa->pre11_4_pcd }}</td>
                            </tr>
                        </table>
                    </div>
                    <!--pregunta12-->
                    <div class="alert alert-light">
                        <p>12. ¿Cuál ha sido la modalidad de trabajo más adoptada por su empresa,
                            transcurrido el
                            primer año de convivencia con la pandemia covid-19? </p>
                        <p>Respuesta: {{ $empresa->pre12_pcd }}</p>
                    </div>
                    <!--pregunta13-->
                    <div class="alert alert-light">
                        <p>13. Desde su punto de vista, el trabajo en casa este ha generado en el
                            grupo
                            de
                            colaboradores de su empresa:</p>
                        <p>Respuesta: {{ $empresa->pre13_pcd }}</p>
                    </div>
                    <!--pregunta14-->
                    <div class="alert alert-light">
                        <p>14.¿Su microempresa ha dado algún tipo de compensación, por los recursos
                            utilizados por
                            el trabajador que se encuentra realizando teletrabajo?</p>
                        <p>Respuesta: {{ $empresa->pre14_pcd }}</p>
                    </div>
                    <!--pregunta15-->
                    <div class="alert alert-light">
                        <p>15. ¿En que ha estado representada esta compensación?</p>
                        <p>Respuesta: {{ $empresa->pre15_pcd }}</p>
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
                                <th>Adquirir conocimientos</th>
                                <td>{{ $empresa->pre16_1_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Conocer y manejar herramientas efectivas que ofrece el mercado
                                </th>
                                <td>{{ $empresa->pre16_2_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Acceso eficiente a información que oriente a su microempresa
                                </th>
                                <td>{{ $empresa->pre16_3_pcd }}</td>
                            </tr>
                            <tr>
                                <th>Desarrollar capacidades de Innovación</th>
                                <td>{{ $empresa->pre16_4_pcd }}</td>
                            </tr>
                        </table>
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
                    </div>
                    <!--pregunta7-->
                    <div class="alert alert-light">
                        <p>17.1. ¿Si contestó a la anterior pregunta SI, tuvo que ajustar su modelo
                            de
                            negocio
                            durante el primer año de convivencia con el Covid-19 ?</p>
                        <p>Respuesta: {{ $empresa->pre17_2_pcd }}</p>
                    </div>
                    <!--Fin-->
                    <!--Perspectiva clientes-->
                    <div class="alert alert-info"><strong>PERSPECTIVA DE CLIENTES</strong></div>
                    <!--preguntapc1-->
                    <div class="alert alert-light">
                        <p>1. Considera que el mejoramiento del servicio y atención al cliente a
                            representado para su microempresa un factor de:</p>
                        <p>Respuesta: {{ $empresa->pre1_pc }}</p>
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
                                <th>Cambio en su portafolio de productos</th>
                                <td>{{ $empresa->pre2_1_pc }}</td>
                            </tr>
                            <tr>
                                <th>Servicio personalizado</th>
                                <td>{{ $empresa->pre2_2_pc }}</td>
                            </tr>
                            <tr>
                                <th>Nuevos canales de comunicación con los clientes</th>
                                <td>{{ $empresa->pre2_3_pc }}</td>
                            </tr>
                            <tr>
                                <th>Diferentes alternativas de medios de pago</th>
                                <td>{{ $empresa->pre2_4_pc }}</td>
                            </tr>
                        </table>
                    </div>
                    <!--preguntapc3-->
                    <div class="alert alert-light">
                        <p>3. ¿Considera que la adopción de los protocolos de bioseguridad durante
                            el
                            primer año de convivencia con el Covid-19, generaron confianza en los
                            clientes , provocando un aumento en las ventas?</p>
                        <p>Respuesta: {{ $empresa->pre3_pc }}</p>
                    </div>
                    <!--preguntapc4-->
                    <div class="alert alert-light">
                        <p>4. ¿Realiza usted alguna innovación para lograr una mejor la satisfacción
                            al
                            cliente ?</p>
                        <p>Respuesta: {{ $empresa->pre4_1_pc }}</p>
                    </div>
                    <!--preguntapc4.1-->
                    <div class="alert alert-light">
                        <p>4.1 Si su respuesta a la anterior pregunta fue SI, mencione que
                            innovación ha
                            realizado para lograr mejorar la satisfacción del cliente.</p>
                        <p>Respuesta: {{ $empresa->pre4_2_pc }}</p>
                    </div>
                    <!--preguntapc5-->
                    <div class="alert alert-light">
                        <p>5. ¿En qué porcentaje ha crecido el número de clientes de su negocio?</p>
                        <p>Respuesta: {{ $empresa->pre5_pc }}</p>
                    </div>
                    <!--preguntapc6-->
                    <div class="alert alert-light">
                        <p>6. ¿Qué porcentaje de los gastos totales de su negocio a direccionado
                            para
                            captar nuevos clientes?</p>
                        <p>Respuesta: {{ $empresa->pre6_pc }}</p>
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
                                <th>Atención al cliente</th>
                                <td>{{ $empresa->pre7_1_pc }}</td>
                            </tr>
                            <tr>
                                <th>Servicio al cliente</th>
                                <td>{{ $empresa->pre7_2_pc }}</td>
                            </tr>
                            <tr>
                                <th>Producto</th>
                                <td>{{ $empresa->pre7_3_pc }}</td>
                            </tr>
                            <tr>
                                <th>Protocolos bioseguridad</th>
                                <td>{{ $empresa->pre7_4_pc }}</td>
                            </tr>
                            <tr>
                                <th>Precios</th>
                                <td>{{ $empresa->pre7_5_pc }}</td>
                            </tr>
                            <tr>
                                <th>Horarios atención</th>
                                <td>{{ $empresa->pre7_6_pc }}</td>
                            </tr>
                        </table>
                    </div>
                    <!--preguntapc8-->
                    <div class="alert alert-light">
                        <p>8. ¿Considera importante dar respuesta al buzón de sugerencias
                            oportunamente?
                        </p>
                        <p>Respuesta: {{ $empresa->pre8_pc }}</p>
                    </div>
                    <!--preguntapc9-->
                    <div class="alert alert-light">
                        <p>9. ¿Qué estrategia de medición del nivel satisfacción del cliente o PQRs
                            ha
                            implementado en su microempresa?</p>
                        <p>Respuesta: {{ $empresa->pre9_pc }}</p>
                    </div>
                    <!--Fin-->
                    <!--Perspectiva procesos internos-->
                    <div class="alert alert-info"><strong>PERSPECTIVA DE PROCESOS INTERNOS</strong></div>
                    <!--preguntappi1-->
                    <div class="alert alert-light">
                        <p>1. ¿Su empresa tiene identificados claramente sus procesos internos?</p>
                        <p>Respuesta: {{ $empresa->pre1_pi }}</p>
                    </div>
                    <!--preguntappi2-->
                    <div class="alert alert-light">
                        <p>2. ¿La empresa tiene documentados sus procesos internos?</p>
                        <p>Respuesta: {{ $empresa->pre2_pi }}</p>
                    </div>
                    <!--preguntappi3-->
                    <div class="alert alert-light">
                        <p>3. ¿La empresa cuenta con alguna certificación reglamentaria para su
                            sector?
                        </p>
                        <p>Respuesta: {{ $empresa->pre3_1_pi }}</p>
                    </div>
                    <!--preguntappi3.1-->
                    <div class="alert alert-light">
                        <p>3.1 Si su respuesta a la anterior pregunta fue SI, mencione ¿Cual?</p>
                        <p>Respuesta: {{ $empresa->pre3_2_pi }}</p>
                    </div>
                    <!--preguntappi4-->
                    <div class="alert alert-light">
                        <p>4. ¿La empresa cuenta con alguna certificación de Calidad?</p>
                        <p>Respuesta: {{ $empresa->pre4_1_pi }}</p>
                    </div>
                    <!--preguntappi4_1-->
                    <div class="alert alert-light">
                        <p>4.1 Si su respuesta a la anterior pregunta fue SI, mencione ¿Cual?</p>
                        <p>Respuesta: {{ $empresa->pre4_2_pi }}</p>
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
                                <th>Gerenciales</th>
                                <td>{{ $empresa->pre5_1_pi }}</td>
                            </tr>
                            <tr>
                                <th>Administrativos</th>
                                <td>{{ $empresa->pre5_2_pi }}</td>
                            </tr>
                            <tr>
                                <th>Operativos</th>
                                <td>{{ $empresa->pre5_3_pi }}</td>
                            </tr>
                            <tr>
                                <th>Comerciales</th>
                                <td>{{ $empresa->pre5_4_pi }}</td>
                            </tr>
                            <tr>
                                <th>Talento humano</th>
                                <td>{{ $empresa->pre5_5_pi }}</td>
                            </tr>
                            <tr>
                                <th>Productivos</th>
                                <td>{{ $empresa->pre5_6_pi }}</td>
                            </tr>
                            <tr>
                                <th>No tiene identificados los procesos</th>
                                <td>{{ $empresa->pre5_7_pi }}</td>
                            </tr>
                        </table>
                    </div>
                    <!--preguntappi6-->
                    <div class="alert alert-light">
                        <p>6. ¿Cuáles han sido los cambios más importantes que ha tenido con sus
                            proveedores durante el primer año de convivencia con el Covid-19?</p>
                        <p>Respuesta: {{ $empresa->pre6_1_pi }}</p>
                    </div>
                    <!--preguntappi6_1-->
                    <div class="alert alert-light">
                        <p>6.1 Si su selección a la pregunta anterior fue CAMBIOS EN LOS MEDIOS DE
                            PAGO,
                            INDIQUE CUALES</p>
                        <p>Respuesta: {{ $empresa->pre6_2_pi }}</p>
                    </div>
                    <!--preguntappi7-->
                    <div class="alert alert-light">
                        <p>7. ¿Identifique cuáles han sido los cambios más importantes que ha tenido
                            con
                            sus clientes?</p>
                        <p>Respuesta: {{ $empresa->pre7_pi }}</p>
                    </div>
                    <!--preguntappi8-->
                    <div class="alert alert-light">
                        <p>8. Considera que el grado de rentabilidad de los nuevos productos
                            lanzados al
                            mercado durante el primer año de convivencia con el Covid-19 ha sido:
                        </p>
                        <p>Respuesta: {{ $empresa->pre8_pi }}</p>
                    </div>
                    <!--Fin-->
                    <!--Perspectiva financiera-->
                    <div class="alert alert-info"><strong>PERSPECTIVA FINANCIERA</strong></div>
                    <!--preguntapf1-->
                    <div class="alert alert-light">
                        <p>1. ¿La empresa se sujetó al subsidio de Nómina (PAEF) decretado por el
                            Gobierno Nacional?</p>
                        <p>Respuesta: {{ $empresa->pre1_pf }}</p>
                    </div>
                    <!--preguntapf_1.1-->
                    <div class="alert alert-light">
                        <p>1.1 . Si contestó No a la anterior pregunta marque alguna(s) de las
                            siguientes razones:</p>
                        <p>Respuesta: {{ $empresa->pre1_1_pf }}</p>
                    </div>
                    <!--preguntapf2-->
                    <div class="alert alert-light">
                        <p>2. ¿Recibió algún beneficio de las entidades financieras como empresario
                            a
                            raíz de la contingencia por el Covid–19?</p>
                        <p>Respuesta: {{ $empresa->pre2_pf }}</p>
                    </div>
                    <!--preguntapf2.1-->
                    <div class="alert alert-light">
                        <p>2.1 Si su respuesta a la anterior pregunta fue SI, mencione ¿Cual?</p>
                        <p>Respuesta: {{ $empresa->pre2_1_pf }}</p>
                    </div>
                    <!--preguntapf3-->
                    <div class="alert alert-light">
                        <p>3. ¿Realizó reliquidaciones de sus obligaciones financieras originadas
                            principalmente por la pandemia?</p>
                        <p>Respuesta: {{ $empresa->pre3_1_pf }}</p>
                    </div>
                    <!--preguntapf3_1-->
                    <div class="alert alert-light">
                        <p>3.1 Si respondió SI a la anterior pregunta, ¿ésta reliquidación de las
                            obligaciones financieras le permitió generar flujo de caja mejorando la
                            situación de su empresa?</p>
                        <p>Respuesta: {{ $empresa->pre3_2_pf }}</p>
                    </div>
                    <!--preguntapf4-->
                    <div class="alert alert-light">
                        <p>4. Su empresa lleva Contabilidad de:</p>
                        <p>Respuesta: {{ $empresa->pre4_pf }}</p>
                    </div>
                    <!--preguntapf5-->
                    <div class="alert alert-light">
                        <p>5. ¿La facturación relacionada con esta área Contable es generada y
                            archivada adecuadamente?</p>
                        <p>Respuesta: {{ $empresa->pre5_pf }}</p>
                    </div>
                    <!--preguntapf6-->
                    <div class="alert alert-light">
                        <p>6. ¿La empresa realiza control mensual de sus costos y gastos?</p>
                        <p>Respuesta: {{ $empresa->pre6_pf }}</p>
                    </div>
                    <!--preguntapf7-->
                    <div class="alert alert-light">
                        <p>7. ¿Cuál ha sido el nivel de afectación de sus costos y gastos durante el
                            primer año de convivencia con el Covid-19?</p>
                        <p>Respuesta: {{ $empresa->pre7_pf }}</p>
                    </div>
                    <!--preguntapf8-->
                    <div class="alert alert-light">
                        <p>8. ¿Realiza una planificación presupuestal de sus ingresos y egresos?
                        </p>
                        <p>Respuesta: {{ $empresa->pre8_pf }}</p>
                    </div>
                    <!--preguntapf9-->
                    <div class="alert alert-light">
                        <p>9. ¿Tiene usted conocimiento de que son los Indicadores financieros?</p>
                        <p>Respuesta: {{ $empresa->pre9_1_pf }}</p>
                    </div>
                    <!--preguntapf9_1-->
                    <div class="alert alert-light">
                        <p>9.1 Si respondió SI a la anterior pregunta, su empresa tiene definidos e
                            interpreta los indicadores financieros?</p>
                        <p>Respuesta: {{ $empresa->pre9_2_pf }}</p>
                    </div>
                    <!--preguntapf10-->
                    <div class="alert alert-light">
                        <p>10. ¿Le fueron aprobados préstamos de la banca comercial durante la
                            pandemia?</p>
                        <p>Respuesta: {{ $empresa->pre10_1_pf }}</p>
                    </div>
                    <!--preguntapf10_1-->
                    <div class="alert alert-light">
                        <p>10.1 Si respondió Sí a la anterior pregunta ¿Mencione qué montos?</p>
                        <p>Respuesta: $ {{ $empresa->pre10_2_pf }}</p>
                    </div>
                    <!--preguntapf11-->
                    <div class="alert alert-light">
                        <p>11. ¿Cómo ha financiado sus actividades a lo largo de la pandemia del
                            Covid-19?</p>
                        <p>Respuesta: {{ $empresa->pre11_pf }}</p>
                    </div>
                    <!--preguntapf12-->
                    <div class="alert alert-light">
                        <p>12. La liquidez o la disponibilidad de efectivo de su empresa durante el
                            primer año de convivencia con la pandemia por el Covid-19 ha sido:</p>
                        <p>Respuesta: {{ $empresa->pre12_pf }}</p>
                    </div>
                    <!--preguntapf13-->
                    <div class="alert alert-light">
                        <p>13. Considera que las ganancias de su negocio durante el primer año de
                            covid-19 en comparación al año anterior:</p>
                        <p>Respuesta: {{ $empresa->pre13_pf }}</p>
                    </div>
                    <!--preguntapf14-->
                    <div class="alert alert-light">
                        <p>14. Reconoce que la pérdida de sus ganancias en el primer año del
                            covid-19 obedeció principalmente a:</p>
                        <p>Respuesta: {{ $empresa->pre14_pf }}</p>
                    </div>
                    <!--preguntapf15-->
                    <div class="alert alert-light">
                        <p>15. ¿Durante la pandemia los ingresos que ha recibido su negocio o
                            empresa le han permitido sostenerse económicamente? </p>
                        <p>Respuesta: {{ $empresa->pre15_pf }}</p>
                    </div>
                    <!--Fin-->
                </div>
            </div>
    </main>
@endsection
