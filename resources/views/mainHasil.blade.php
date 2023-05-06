@extends('layouts.layout')

@section('content')
    <div class="container_main background-main py-4 px-3">
        <div class="row d-flex justify-content-end mx-0">
            <div class="position-fixed top-0 start-0 py-4 px-3 col-3">

                    <div class="card shadow p-3 mb-3 animate__animated animate__fadeInLeft">
                        <p>Kembali ke Home</p>
                        <a href="{{ url('/main') }}" type="submit" class="btn btn1 w-100 rounded mt-2">Kembali</a>
                    </div>

                    <div class="card shadow p-3 animate__animated animate__fadeInLeft"> 
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Ganti Cara</label>
                            <select id="inptCara" name="cara" class="form-control background-input">
                                <option value="1" {{ $data['cara'] == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ $data['cara'] == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ $data['cara'] == '3' ? 'selected' : '' }}>3</option>
                            </select>
                        </div>
                        <input type="hidden" name="berapaInput" value="{{ $data['berapaInput'] }}"> 
                        <button id="caraBtn" type="button" class="btn btn1 w-100 rounded mt-2">Ganti</button> 
                    </div>
            </div>
            <div class="col-9 card shadow px-5 animate__animated animate__fadeIn">
                <p class="title h2 text-center my-3">HASIL</p>
                <div>
                    <p class="mb-4">Berdasarkan data sebelumnya, maka dihasilkan tabel sebagai berikut:</p>
                    <table class="table w-50 mx-auto background-table2 text-center">
                        <thead class="">
                            <tr>
                                <th scope="col">X</th>
                                <th scope="col">Y</th>
                                <th scope="col">X2</th>
                                <th scope="col">Y2</th>
                                <th scope="col">XY</th>
                            </tr>
                        </thead>
                        <tbody class="background-table1">
                            @for ($i = 1; $i <= $data['berapaInput']; $i++)
                            <tr>
                                <td>{{ $hasil['xinput'][$i] }}</td>
                                <td>{{ $hasil['yinput'][$i] }}</td>
                                <td>{{ $hasil['x2input'][$i] }}</td>
                                <td>{{ $hasil['y2input'][$i] }}</td>
                                <td>{{ $hasil['xyinput'][$i] }}</td> 
                            </tr> 
                            @endfor

                            <!-- row paling bawah -->
                            <tr class="background-table2">
                                <td>{{ $hasil['xtotal'] }}</td>
                                <td>{{ $hasil['ytotal'] }}</td>
                                <td>{{ $hasil['x2total'] }}</td>
                                <td>{{ $hasil['y2total'] }}</td>
                                <td>{{ $hasil['xytotal'] }}</td> 
                            </tr>
                        </tbody>
                        </table>
                </div>

                <!-- CARA KE-1 -->
                <div id="carake1" class="my-4">
                    <p class="mb-4">Berdasarkan Cara ke-1, maka proses pengerjaan dapat diuraikan seperti berikut: </p>
                    <div class="d-flex justify-content-between w-75 mx-auto">
                        <div class="">
                            <div>
                                <math>
                                    <mi>a</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <mi>({{ $hasil['ytotal'] }})({{ $hasil['x2total'] }})-({{ $hasil['xtotal'] }})({{ $hasil['xytotal'] }})</mi>
                                        <msup>
                                            <mrow>
                                                <mi>({{ $data['berapaInput'] }})({{ $hasil['x2total'] }})-({{ $hasil['xtotal'] }})</mi>
                                            </mrow>
                                            <mn>2</mn>
                                        </msup>
                                    </mfrac>
                                </math>
                            </div>
                            <div class="my-4">
                                <math>
                                    <mi>a</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <mi>{{ $hasil['ytotal'] * $hasil['x2total'] }}-{{ $hasil['xtotal'] * $hasil['xytotal'] }}</mi>
                                        <mi>{{ $data['berapaInput'] * $hasil['x2total'] }}-{{ $hasil['xtotal'] * $hasil['xtotal'] }}</mi>
                                    </mfrac>
                                </math>
                            </div>
                            <div>
                                <math>
                                    <mi>a</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <mi>{{ ($hasil['ytotal'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xytotal'])}}</mi>
                                        <mi>{{ ($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal']) }}</mi>
                                    </mfrac>
                                </math>
                            </div>
                            <div class="mt-4">
                                <math>
                                    <mi>a</mi>
                                    <mo>=</mo>
                                    <mi>{{ (($hasil['ytotal'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xytotal'])) / (($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal'])) }}</mi>
                                </math>
                            </div>
                        </div>

                        <div>
                            <div>
                                <math>
                                    <mi>b</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <mi>({{ $data['berapaInput'] }})({{ $hasil['xytotal'] }})-({{ $hasil['xtotal'] }})({{ $hasil['ytotal'] }})</mi>
                                        <msup>
                                            <mrow>
                                                <mi>({{ $data['berapaInput'] }})({{ $hasil['x2total'] }})-({{ $hasil['xtotal'] }})</mi>
                                            </mrow>
                                            <mn>2</mn>
                                        </msup>
                                    </mfrac>
                                </math>
                            </div>
                            <div class="my-4">
                                <math>
                                    <mi>b</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <mi>{{ $data['berapaInput'] * $hasil['xytotal'] }}-{{ $hasil['xtotal'] * $hasil['ytotal'] }}</mi>
                                        <mi>{{ $data['berapaInput'] * $hasil['x2total'] }}-{{ $hasil['xtotal'] * $hasil['xtotal'] }}</mi>
                                    </mfrac>
                                </math>
                            </div>
                            <div>
                                <math>
                                    <mi>b</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <mi>{{ ($data['berapaInput'] * $hasil['xytotal']) - ($hasil['xtotal'] * $hasil['ytotal']) }}</mi>
                                        <mi>{{ ($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal']) }}</mi>
                                    </mfrac>
                                </math>
                            </div>
                            <div class="mt-4">
                                <math>
                                    <mi>b</mi>
                                    <mo>=</mo>
                                    <mi>{{ (($data['berapaInput'] * $hasil['xytotal']) - ($hasil['xtotal'] * $hasil['ytotal'])) / (($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal'])) }}</mi>
                                </math>
                            </div>
                        </div> 
                    </div>
                </div>

                <!-- CARA KE-2 -->
                <div id="carake2" class="my-4 hidden">
                    <p class="mb-4">Berdasarkan Cara ke-2, maka proses pengerjaan dapat diuraikan seperti berikut: </p>
                    <div class="d-flex justify-content-between w-75 mx-auto">
                        <div class="">
                            <div>
                                <math>
                                    <mi>a</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <mi>({{ $hasil['ytotal'] }})({{ $hasil['x2total'] }})-({{ $hasil['xtotal'] }})({{ $hasil['xytotal'] }})</mi>
                                        <msup>
                                            <mrow>
                                                <mi>({{ $data['berapaInput'] }})({{ $hasil['x2total'] }})-({{ $hasil['xtotal'] }})</mi>
                                            </mrow>
                                            <mn>2</mn>
                                        </msup>
                                    </mfrac>
                                </math>
                            </div>
                            <div class="my-4">
                                <math>
                                    <mi>a</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <mi>{{ $hasil['ytotal'] * $hasil['x2total'] }}-{{ $hasil['xtotal'] * $hasil['xytotal'] }}</mi>
                                        <mi>{{ $data['berapaInput'] * $hasil['x2total'] }}-{{ $hasil['xtotal'] * $hasil['xtotal'] }}</mi>
                                    </mfrac>
                                </math>
                            </div>
                            <div>
                                <math>
                                    <mi>a</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <mi>{{ ($hasil['ytotal'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xytotal'])}}</mi>
                                        <mi>{{ ($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal']) }}</mi>
                                    </mfrac>
                                </math>
                            </div>
                            <div class="mt-4">
                                <math>
                                    <mi>a</mi>
                                    <mo>=</mo>
                                    <mi>{{ (($hasil['ytotal'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xytotal'])) / (($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal'])) }}</mi>
                                </math>
                            </div>
                        </div>

                        <div>
                            <div>
                                <math>
                                    <mi>b</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <mi>({{ $data['berapaInput'] }})({{ $hasil['xytotal'] }})-({{ $hasil['xtotal'] }})({{ $hasil['ytotal'] }})</mi>
                                        <msup>
                                            <mrow>
                                                <mi>({{ $data['berapaInput'] }})({{ $hasil['x2total'] }})-({{ $hasil['xtotal'] }})</mi>
                                            </mrow>
                                            <mn>2</mn>
                                        </msup>
                                    </mfrac>
                                </math>
                            </div>
                            <div class="my-4">
                                <math>
                                    <mi>b</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <mi>{{ $data['berapaInput'] * $hasil['xytotal'] }}-{{ $hasil['xtotal'] * $hasil['ytotal'] }}</mi>
                                        <mi>{{ $data['berapaInput'] * $hasil['x2total'] }}-{{ $hasil['xtotal'] * $hasil['xtotal'] }}</mi>
                                    </mfrac>
                                </math>
                            </div>
                            <div>
                                <math>
                                    <mi>b</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <mi>{{ ($data['berapaInput'] * $hasil['xytotal']) - ($hasil['xtotal'] * $hasil['ytotal']) }}</mi>
                                        <mi>{{ ($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal']) }}</mi>
                                    </mfrac>
                                </math>
                            </div>
                            <div class="mt-4">
                                <math>
                                    <mi>b</mi>
                                    <mo>=</mo>
                                    <mi>{{ (($data['berapaInput'] * $hasil['xytotal']) - ($hasil['xtotal'] * $hasil['ytotal'])) / (($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal'])) }}</mi>
                                </math>
                            </div>
                        </div> 
                    </div>
                </div>

                <!-- CARA KE-3 -->
                <div id="carake3" class="my-4 hidden">
                    <p class="mb-4">Berdasarkan Cara ke-3, maka proses pengerjaan dapat diuraikan seperti berikut: </p>
                    <div class="d-flex justify-content-between w-75 mx-auto">
                        <div class="">
                            <div>
                                <math>
                                    <mi>b</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <mi>({{ $data['berapaInput'] }})({{ $hasil['xytotal'] }})-({{ $hasil['xtotal'] }})({{ $hasil['ytotal'] }})</mi>
                                        <msup>
                                            <mrow>
                                                <mi>({{ $data['berapaInput'] }})({{ $hasil['x2total'] }})-({{ $hasil['xtotal'] }})</mi>
                                            </mrow>
                                            <mn>2</mn>
                                        </msup>
                                    </mfrac>
                                </math>
                            </div>
                            <div class="my-4">
                                <math>
                                    <mi>b</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <mi>{{ $data['berapaInput'] * $hasil['xytotal'] }}-{{ $hasil['xtotal'] * $hasil['ytotal'] }}</mi>
                                        <mi>{{ $data['berapaInput'] * $hasil['x2total'] }}-{{ $hasil['xtotal'] * $hasil['xtotal'] }}</mi>
                                    </mfrac>
                                </math>
                            </div>
                            <div>
                                <math>
                                    <mi>b</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <mi>{{ ($data['berapaInput'] * $hasil['xytotal']) - ($hasil['xtotal'] * $hasil['ytotal'])}}</mi>
                                        <mi>{{ ($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal']) }}</mi>
                                    </mfrac>
                                </math>
                            </div>
                            <div class="mt-4">
                                <math>
                                    <mi>b</mi>
                                    <mo>=</mo>
                                    <mi>{{ (($data['berapaInput'] * $hasil['xytotal']) - ($hasil['xtotal'] * $hasil['ytotal'])) / (($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal'])) }}</mi>
                                </math>
                            </div>
                        </div>

                        <div>
                            <div>
                                <math>
                                    <mi>a</mi>
                                    <mo>=</mo>
                                    <mi>{{ $hasil['yrata'] }}-{{ $hasil['b'] }}({{ $hasil['xrata'] }})</mi>
                                </math>
                            </div>
                            <div class="my-4">
                                <math>
                                    <mi>a</mi>
                                    <mo>=</mo>
                                    <mi>{{ $hasil['yrata'] }}-{{ $hasil['b'] * $hasil['xrata'] }}</mi>
                                </math>
                            </div>
                            <div>
                                <math>
                                    <mi>a</mi>
                                    <mo>=</mo>
                                    <mi>{{ $hasil['yrata'] - ($hasil['b'] * $hasil['xrata']) }}</mi>
                                </math>
                            </div> 
                        </div> 
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        const caraBtn = $('#caraBtn');
                        const caraBtnVal = $('#inptCara').val(); 

                        const carake1 = $('#carake1');
                        const carake2 = $('#carake2');
                        const carake3 = $('#carake3');

                        if (caraBtnVal === '1'){ 
                            carake1.removeClass('hidden');
                            carake2.addClass('hidden');
                            carake3.addClass('hidden');
                        } else if (caraBtnVal === '2'){ 
                            carake1.addClass('hidden');
                            carake2.removeClass('hidden');
                            carake3.addClass('hidden');
                        } else if (caraBtnVal === '3'){  
                            carake1.addClass('hidden');
                            carake2.addClass('hidden');
                            carake3.removeClass('hidden');
                        }

                        $('#caraBtn').on('click', function() { 
                            const caraBtn = $('#caraBtn');
                            const caraBtnVal = $('#inptCara').val(); 

                            const carake1 = $('#carake1');
                            const carake2 = $('#carake2');
                            const carake3 = $('#carake3');
                            
                            if (caraBtnVal === '1'){ 
                                carake1.removeClass('hidden');
                                carake2.addClass('hidden');
                                carake3.addClass('hidden');
                            } else if (caraBtnVal === '2'){ 
                                carake1.addClass('hidden');
                                carake2.removeClass('hidden');
                                carake3.addClass('hidden');
                            } else if (caraBtnVal === '3'){ 
                                carake1.addClass('hidden');
                                carake2.addClass('hidden');
                                carake3.removeClass('hidden');
                            }
                        })
                    })
                </script>

                <div class="my-4">
                    <p class="mb-4">Sehingga dapat diperoleh nilai sebagai berikut:</p>
                    <div class="d-flex justify-content-between w-50 mx-auto">
                        <p><math><mi>a</mi><mo>=</mo><mi>{{ $hasil['a'] }}</mi></math></p>
                        <p><math><mi>b</mi><mo>=</mo><mi>{{ $hasil['b'] }}</mi></math></p>
                    </div>
                </div>

                <div class="my-4">
                    <p class="mb-4">Persamaan regresi linearnya adalah: </p>
                    <p class="text-center fst-italic"><math><mi>Y</mi><mo>=</mo><mi>{{ $hasil['a'] }} + {{ $hasil['b'] }}x</mi></math></p>
                </div>

                <div class="my-4">
                    <p class="mb-4">Sehingga didapatkan grapiknya sebagai berikut: </p>
                    <canvas id="myChart"></canvas>
                </div>

                <script>
                    const ctx = document.getElementById('myChart');

                    // Calculate the regression line values
                    const a = {{ $hasil["a"] }}; // Intercept
                    const b = {{ $hasil["b"] }}; // Slope
                    const regressionLine = []; // Array to store the regression line values
                    const xArray = [];

                    for (let i = -20; i <= 20; i++) {
                        const x = i;
                        const y = a + b * x;
                        regressionLine.push(y);
                    }

                    for (let i = -20; i <= 20; i++){
                        xArray.push(i);
                    }

                    // Chart configuration
                    let delayed;
                    const chartConfig = {
                        type: 'line',
                        data: {
                            labels: xArray, // X-axis labels
                            datasets: [{
                                label: 'Regresi Linear',
                                data: regressionLine, // Regression line data
                                backgroundColor: 'rgba(146, 203, 255, 0.5)',
                                borderColor: 'rgb(146, 203, 255)',
                                borderWidth: 2,
                                fill: false,
                                pointStyle: 'circle',
                                pointRadius: 3,
                            }]
                        }, 
                        options: { 
                            animation: {
                                onComplete: () => {
                                    delayed = true;
                                },
                                delay: (context) => {
                                    let delay = 0;
                                    if (context.type === 'data' && context.mode === 'default' && !delayed) {
                                    delay = context.dataIndex * 150 + context.datasetIndex * 25;
                                    }
                                    return delay;
                                },
                            },
                            responsive: true,   
                            plugins: { 
                                tooltip: {
                                    usePointStyle: true,
                                }
                            },
                            scales: {
                                x: {
                                    min: -20,
                                    max: 20,
                                    title: {
                                        display: true,
                                        text: 'X Value'
                                    },
                                    grid: {
                                        display: true, 
                                        color: function(context){
                                            if (context.tick.value == 20){
                                                return '#555';
                                            }
                                            return '#ccc';
                                        }
                                    }
                                },
                                y: {
                                    min: -20,
                                    max: 20, 
                                    title: {
                                        display: true,
                                        text: 'Y Value'
                                    },
                                    grid: {
                                        display: true, 
                                        color: function(context){
                                            if (context.tick.value == 0){
                                                return '#555';
                                            }
                                            return '#ccc';
                                        }
                                    }
                                }
                            }
                        }
                    }; 
 
                    const chartObserver = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            // Run chart animation
                            chartConfig.options.animation.duration = 2000;  
                            new Chart(ctx, chartConfig); 
                            chartObserver.unobserve(ctx);
                            }
                        });
                    });
                    chartObserver.observe(ctx);
                </script>


                <div class="my-4 card p-3 background3"> 
                <p>Perkiraan nilai Y, jika X = <span>
                <input id="inptEnd" type="text" style="width: 40px;">
                </span>  adalah Y = {{ $hasil['a'] }}+{{ $hasil['b'] }}X, maka:</p>

                <div id="awarning" class="alert alert-warning p-2 px-3 hidden animate__animated animate__fadeIn" role="alert">
                Masukkan hanya angka (0, 1.5, 2, ...)
                </div>

                <div id="show1" class="fst-italic w-50 mx-auto">
                    <p>Y = {{ $hasil['a'] }}+{{ $hasil['b'] }}( ? )</p> 
                    <p>Y = ( ? )</p>
                    <button id="btnEndInput1" type="button" class="btn btn1 py-1 px-5 rounded text-end mt-4 mb-3">Submit</button>
                </div>

                <div id="hidden1" class="fst-italic w-50 mx-auto hidden">
                    <p id="outptEnd1">Y = {{ $hasil['a'] }}+{{ $hasil['b'] }}(  )</p>
                    <p id="outptEnd2">Y = {{ $hasil['a'] }}+{{ $hasil['b'] * 3.5}}</p>
                    <p id="outptEnd3">Y = {{ $hasil['a'] + $hasil['b'] * 3.5 }}</p>
                    <button id="btnEndInput2" type="button" class="btn btn1 py-1 px-5 rounded text-end mt-4 mb-3">Submit</button>
                </div>

                <script>
                    $(document).ready(function() {
                        $('#btnEndInput1').on('click', function() {   
                            const inptEnd = $('#inptEnd');
                            const inptEndVal = $('#inptEnd').val(); 
                            const awarning = $('#awarning');

                            if (!/^[-]?\d*\.?\d+$/.test(inptEndVal)){
                                awarning.removeClass('hidden');
                            } else { 
                                awarning.addClass('animate__animated animate__fadeOut').on('animationend', function() { 
                                    if (awarning.hasClass('animate__fadeOut')){
                                        awarning.addClass('hidden');
                                    }
                                    awarning.toggleClass('animate__animated');
                                    awarning.removeClass('animate__fadeOut');
                                }) 
                                $('#show1').addClass('hidden'); 
                                $('#hidden1').removeClass('hidden');  

                                $('#outptEnd1').html('Y = {{ $hasil["a"] }}+{{ $hasil["b"] }}(' + inptEndVal + ')');
                                $('#outptEnd2').html('Y = {{ $hasil["a"] }}+ ' + ('{{ $hasil["b"] }}' * inptEndVal));
                                $('#outptEnd3').html('Y = ' + ({{ $hasil["a"] }} + ({{ $hasil["b"] }} * inptEndVal)));
                            }
                        });

                        $('#btnEndInput2').on('click', function() { 
                            const inptEnd = $('#inptEnd');
                            const inptEndVal = $('#inptEnd').val();  
                            const awarning = $('#awarning');

                            if (!/^[-]?\d*\.?\d+$/.test(inptEndVal)){
                                if (awarning.hasClass('animate__fadeIn')){
                                    awarning.removeClass('hidden');
                                }
                                awarning.removeClass('animate__animated');
                                awarning.removeClass('animate__fadeOut');
                                awarning.addClass('animate__animated'); 
                                awarning.addClass('animate__fadeIn'); 
                            } else {                                  
                                awarning.addClass('animate__animated animate__fadeOut').on('animationend', function() { 
                                    if (awarning.hasClass('animate__fadeOut')){
                                        awarning.addClass('hidden');
                                    }
                                    awarning.removeClass('animate__animated');
                                    awarning.removeClass('animate__fadeOut');
                                })   
                                
                                $('#outptEnd1').html('Y = {{ $hasil["a"] }}+{{ $hasil["b"] }}(' + inptEndVal + ')');
                                $('#outptEnd2').html('Y = {{ $hasil["a"] }}+ ' + ('{{ $hasil["b"] }}' * inptEndVal));
                                $('#outptEnd3').html('Y = ' + ({{ $hasil["a"] }} + ({{ $hasil["b"] }} * inptEndVal)));
                            }                
                        });
                    });
                </script>
                </div> 

                <div class="d-flex justify-content-end">
                        <a href="#" type="submit" class="btn btn1 py-1 px-5 rounded text-end mt-4 mb-3">Back To Top</a>
                </div>
            </div>
        </div>
    </div>
@endsection