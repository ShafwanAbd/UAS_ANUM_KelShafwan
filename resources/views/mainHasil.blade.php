@extends('layouts.layout')

@section('content')
    <div class="container_main background-main py-4 px-3">
        
        <div class="row d-flex justify-content-end mx-0">

            <div class="position-fixed top-0 start-0 py-4 px-3 col-3">

                    <div class="card shadow p-3 mb-3 animate__animated animate__fadeInLeft">
                        <p class="mb-0">Kembali ke Home</p>                            
                        <div class="mt-1 fs-c-10">Tekan 'Kembali' untuk Kembali ke Menu Utama.</div>
                        <a href="{{ url('/main') }}" type="submit" class="btn btn1 w-100 rounded mt-3">Kembali</a>
                    </div>

                    <div class="card shadow p-3 animate__animated animate__fadeInLeft"> 
                        <div class="mb-1">
                            <label for="exampleFormControlInput1" class="form-label">Ganti Cara</label>
                            <select id="inptCara" name="cara" class="form-control background-input">
                                <option value="1" {{ $data['cara'] == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ $data['cara'] == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ $data['cara'] == '3' ? 'selected' : '' }}>3</option>
                            </select>
                            <div class="mt-1 fs-c-10">Silahkan Pilih Cara Keberapa untuk Cara Pengerjaannya.</div>
                        </div>
                        <input type="hidden" name="berapaInput" value="{{ $data['berapaInput'] }}"> 
                        <button id="caraBtn" type="button" class="btn btn1 w-100 rounded mt-2">Ganti</button> 
                    </div>
            </div>

            <div class="col-9 card shadow px-5 py-3 animate__animated animate__fadeIn">
                <p class="title h2 text-center my-3 t-primary">HASIL</p>
                <div>
                    <p class="mx-5 my-4">Berdasarkan Data Sebelumnya, Maka Dihasilkan Tabel Sebagai Berikut:</p>
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
                    <p class="mx-5 mb-4">Berdasarkan Cara ke-1, Maka Proses Pengerjaan Dapat Diuraikan Seperti Berikut: </p>
                    <div class="d-flex justify-content-evenly w-75 mx-auto">
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
                                    <mi>{{ number_format((($hasil['ytotal'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xytotal'])) / (($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal'])), 2) }}</mi>
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
                                    <mi>{{ number_format((($data['berapaInput'] * $hasil['xytotal']) - ($hasil['xtotal'] * $hasil['ytotal'])) / (($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal'])), 2) }}</mi>
                                </math>
                            </div>
                        </div> 
                    </div>
                </div>

                <!-- CARA KE-2 -->
                <div id="carake2" class="my-4 hidden text-center">
                    <p class="mx-5 mb-4 text-start">Berdasarkan Cara ke-2, Maka Proses Pengerjaan Dapat Diuraikan Seperti Berikut: </p>
                    <div class="w-50 mx-auto">
                        <math>
                            <mrow>
                                <mo class="fst-normal">(</mo>
                                    <mfrac linethickness="0" class="px-2">
                                        <mn class="mb-2">{{ $data['berapaInput'] }}</mn>
                                        <mn>{{ $hasil['xtotal'] }}</mn>
                                    </mfrac>
                                    <mfrac linethickness="0" class="px-2">
                                        <mn class="mb-2">{{ $hasil['xtotal'] }}</mn>
                                        <mn>{{ $hasil['x2total'] }}</mn>
                                    </mfrac>
                                <mo class="fst-normal">)</mo>
                            </mrow>
                            <mrow>
                                <mo class="fst-normal">(</mo>
                                    <mfrac linethickness="0" class="px-2 py-1">
                                        <mi class="mb-2">a</mi>
                                        <mi>b</mi>
                                    </mfrac>
                                <mo class="fst-normal">)</mo>
                            </mrow>
                            <mo>=</mo>
                            <mrow>
                                <mo class="fst-normal">(</mo>
                                    <mfrac linethickness="0" class="px-2 py-1">
                                        <mo class="mb-2">{{ $hasil['ytotal'] }}</mo>
                                        <mo>{{ $hasil['xytotal'] }}</mo>
                                    </mfrac>
                                <mo class="fst-normal">)</mo>
                            </mrow>
                        </math>
                    </div>

                    <div class="my-4 w-75 mx-auto">
                        <math>
                            
                            <mrow>
                                <mo>A</mo><mo>=</mo>
                                <mo class="fst-normal">(</mo>
                                    <mfrac linethickness="0" class="px-2">
                                        <mn class="mb-2">{{ $data['berapaInput'] }}</mn>
                                        <mn>{{ $hasil['xtotal'] }}</mn>
                                    </mfrac>
                                    <mfrac linethickness="0" class="px-2">
                                        <mn class="mb-2">{{ $hasil['xtotal'] }}</mn>
                                        <mn>{{ $hasil['x2total'] }}</mn>
                                    </mfrac>
                                <mo class="fst-normal">)</mo>
                            </mrow>

                            <mrow class="px-5">
                                <msub>                                                                   
                                    <mi>A</mi>
                                    <mn>1</mn>
                                </msub>
                                <mo>=</mo>
                                <mo class="fst-normal">(</mo>
                                    <mfrac linethickness="0" class="px-2">
                                        <mn class="mb-2">{{ $hasil['ytotal'] }}</mn>
                                        <mn>{{ $hasil['xytotal'] }}</mn>
                                    </mfrac>
                                    <mfrac linethickness="0" class="px-2">
                                        <mn class="mb-2">{{ $hasil['xtotal'] }}</mn>
                                        <mn>{{ $hasil['x2total'] }}</mn>
                                    </mfrac>
                                <mo class="fst-normal">)</mo>
                            </mrow>

                            <mrow>
                                <msub>                                                                   
                                    <mi>A</mi>
                                    <mn>2</mn>
                                </msub>
                                <mo>=</mo>
                                <mo class="fst-normal">(</mo>
                                    <mfrac linethickness="0" class="px-2">
                                        <mn class="mb-2">{{ $data['berapaInput'] }}</mn>
                                        <mn>{{ $hasil['xtotal'] }}</mn>
                                    </mfrac>
                                    <mfrac linethickness="0" class="px-2">
                                        <mn class="mb-2">{{ $hasil['ytotal'] }}</mn>
                                        <mn>{{ $hasil['xytotal'] }}</mn>
                                    </mfrac>
                                <mo class="fst-normal">)</mo>
                            </mrow>
                        </math>
                    </div>

                    <div class="w-50 mx-auto text-start">

                        <div>
                            <math>                                                                        
                                <mo>det A</mo> 
                                <mo>=</mo>
                                <mo>(</mo><mn>{{ $data['berapaInput'] }}</mn><mo>)</mo>
                                <mo>(</mo><mn>{{ $hasil['x2total'] }}</mn><mo>)</mo>
                                <mo>-</mo>
                                <mo>(</mo><mn>{{ $hasil['xtotal'] }}</mn><mo>)</mo>
                                <mo>(</mo><mn>{{ $hasil['xtotal'] }}</mn><mo>)</mo>
                                <mo>=</mo>
                                <mn>{{ ($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal']) }}</mn>
                            </math>
                        </div>

                        <div>
                            <math>                                                                   
                                <msub>                                                                   
                                    <mi>det A</mi>
                                    <mn>1</mn>
                                </msub>
                                <mo>=</mo>
                                <mo>(</mo><mn>{{ $hasil['ytotal'] }}</mn><mo>)</mo>
                                <mo>(</mo><mn>{{ $hasil['x2total'] }}</mn><mo>)</mo>
                                <mo>-</mo>
                                <mo>(</mo><mn>{{ $hasil['xtotal'] }}</mn><mo>)</mo>
                                <mo>(</mo><mn>{{ $hasil['xytotal'] }}</mn><mo>)</mo>
                                <mo>=</mo>
                                <mn>{{ ($hasil['ytotal'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xytotal']) }}</mn>
                            </math>
                        </div>

                        <div>
                            <math>
                                <msub>                                                                   
                                    <mi>det A</mi>
                                    <mn>2</mn>
                                </msub>
                                <mo>=</mo>
                                <mo>(</mo><mn>{{ $data['berapaInput'] }}</mn><mo>)</mo>
                                <mo>(</mo><mn>{{ $hasil['xytotal'] }}</mn><mo>)</mo>
                                <mo>-</mo>
                                <mo>(</mo><mn>{{ $hasil['ytotal'] }}</mn><mo>)</mo> 
                                <mo>(</mo><mn>{{ $hasil['xtotal'] }}</mn><mo>)</mo>
                                <mo>=</mo>
                                <mn>{{ ($data['berapaInput'] * $hasil['xytotal']) - ($hasil['ytotal'] * $hasil['xtotal']) }}</mn>
                            </math>
                        </div>
                    </div>

                    <div class="d-flex justify-content-evenly w-50 mx-auto mt-4">
                        <div class="">
                            <math>
                                <mi>a</mi>
                                <mo>=</mo>
                                <mfrac>
                                    <mi>{{ ($hasil['ytotal'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xytotal']) }}</mi>
                                    <mi>{{ ($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal']) }}</mi>
                                </mfrac>
                                <mo>=</mo>
                                <mn>{{ number_format((($hasil['ytotal'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xytotal'])) / (($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal'])), 2) }}</mn>
                            </math>
                        </div>
                        <div class="">
                            <math>
                                <mi>b</mi>
                                <mo>=</mo>
                                <mfrac>
                                    <mi>{{ ($data['berapaInput'] * $hasil['xytotal']) - ($hasil['ytotal'] * $hasil['xtotal']) }}</mi>
                                    <mi>{{ ($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal']) }}</mi>
                                </mfrac>
                                <mo>=</mo>
                                <mn>{{ number_format((($data['berapaInput'] * $hasil['xytotal']) - ($hasil['ytotal'] * $hasil['xtotal'])) / (($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal'])), 2) }}</mn>
                            </math>
                        </div> 
                    </div>
                </div>

                <!-- CARA KE-3 -->
                <div id="carake3" class="my-4 hidden">
                    <p class="mx-5 mb-4">Berdasarkan Cara ke-3, Maka Proses Pengerjaan Dapat Diuraikan Seperti Berikut: </p>
                    <div class="d-flex justify-content-evenly w-75 mx-auto">
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
                                    <mi>{{ number_format((($data['berapaInput'] * $hasil['xytotal']) - ($hasil['xtotal'] * $hasil['ytotal'])) / (($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal'])), 2) }}</mi>
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
                                    <mi>{{ number_format($hasil['yrata'] - ($hasil['b'] * $hasil['xrata']), 2) }}</mi>
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
                    <p class="mx-5 mb-4">Sehingga Dapat Diperoleh Nilai Sebagai Berikut:</p>
                    <div class="d-flex justify-content-evenly w-75 mx-auto">
                        <p><math><mi>a</mi><mo>=</mo><mi>{{ number_format($hasil['a'], 2) }}</mi></math></p>
                        <p><math><mi>b</mi><mo>=</mo><mi>{{ number_format($hasil['b'], 2) }}</mi></math></p>
                    </div>
                </div>

                <div class="my-4">
                    <p class="mx-5 mb-4">Persamaan Regresi Linearnya Adalah: </p>
                    <p class="text-center fst-italic"><math><mi>Y</mi><mo>=</mo><mi>{{ number_format($hasil['a'], 2) }} + {{ number_format($hasil['b'], 2) }}x</mi></math></p>
                </div>

                <div class="my-4">
                    <p class="mx-5 mb-4">Koefisien Determinasinya Adalah:</p>

                    <div class="d-flex justify-content-evenly w-75 mx-auto">
                        <div class="">
                            <div>
                                <math>
                                    <mi>R</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <msup>
                                            <mrow>                                        
                                                <mi>(({{ $data['berapaInput'] }})({{ $hasil['xytotal'] }})-({{ $hasil['xtotal'] }})({{ $hasil['ytotal'] }}))</mi>
                                            </mrow>
                                            <mn>2</mn>
                                        </msup>
                                        <msup>
                                            <mrow> 
                                                <mn>({{ $data['berapaInput'] }}({{ $hasil['x2total'] }})-</mn>  
                                                <msup><mn>({{ $hasil['xtotal'] }})</mn><mn>2</mn></msup> 
                                                <mn>)</mn> 

                                                <mn>({{ $data['berapaInput'] }}({{ $hasil['y2total'] }})-</mn>  
                                                <msup><mn>({{ $hasil['ytotal'] }})</mn><mn>2</mn></msup> 
                                                <mn>)</mn>
                                            </mrow>
                                        </msup>
                                    </mfrac>
                                </math>
                            </div>

                            <div class="my-4">
                                <math> 
                                    <mi>R</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <msup>
                                            <mrow>                                        
                                                <mi>({{ $data['berapaInput'] * $hasil['xytotal'] }}-{{ $hasil['xtotal'] * $hasil['ytotal'] }})</mi>
                                            </mrow>
                                            <mn>2</mn>
                                        </msup>
                                        <msup>
                                            <mrow> 
                                                <mn>({{ $data['berapaInput'] * $hasil['x2total'] }}-</mn>  
                                                <mn>{{ $hasil['xtotal'] * $hasil['xtotal'] }})</mn> 

                                                <mn>({{ $data['berapaInput'] * $hasil['y2total'] }}-</mn>  
                                                <mn>{{ $hasil['ytotal'] * $hasil['ytotal'] }})</mn> 
                                            </mrow>
                                        </msup>
                                    </mfrac>                                
                                </math>
                            </div>

                            <div class="my-4">
                                <math> 
                                    <mi>R</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <msup>
                                            <mrow>                                        
                                                <mi>({{ ($data['berapaInput'] * $hasil['xytotal']) - ($hasil['xtotal'] * $hasil['ytotal']) }})</mi>
                                            </mrow>
                                            <mn>2</mn>
                                        </msup>
                                        <msup>
                                            <mrow> 
                                                <mn>({{ ($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal']) }})</mn> 

                                                <mn>({{ ($data['berapaInput'] * $hasil['y2total']) - ($hasil['ytotal'] * $hasil['ytotal']) }})</mn> 
                                            </mrow>
                                        </msup>
                                    </mfrac>                                
                                </math>
                            </div>

                            <div class="my-4">
                                <math> 
                                    <mi>R</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <msup>
                                            <mrow>
                                                <mi>{{ (($data['berapaInput'] * $hasil['xytotal']) - ($hasil['xtotal'] * $hasil['ytotal'])) * (($data['berapaInput'] * $hasil['xytotal']) - ($hasil['xtotal'] * $hasil['ytotal'])) }}</mi>
                                            </mrow> 
                                        </msup>
                                        <msup>
                                            <mrow>
                                                <mn>{{ (($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal'])) * (($data['berapaInput'] * $hasil['y2total']) - ($hasil['ytotal'] * $hasil['ytotal'])) }}</mn> 
                                            </mrow>
                                        </msup>
                                    </mfrac>
                                </math>
                            </div>

                            <div class="my-4">
                                <math> 
                                    <mi>R</mi>
                                    <mo>=</mo>
                                    <mn>{{ number_format(((($data['berapaInput'] * $hasil['xytotal']) - ($hasil['xtotal'] * $hasil['ytotal'])) * (($data['berapaInput'] * $hasil['xytotal']) - ($hasil['xtotal'] * $hasil['ytotal']))) / ((($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal'])) * (($data['berapaInput'] * $hasil['y2total']) - ($hasil['ytotal'] * $hasil['ytotal']))), 4) }}</mn> 
                                </math>
                            </div>
                        </div> 
                    </div>

                    @php $r2 = number_format(((($data['berapaInput'] * $hasil['xytotal']) - ($hasil['xtotal'] * $hasil['ytotal'])) * (($data['berapaInput'] * $hasil['xytotal']) - ($hasil['xtotal'] * $hasil['ytotal']))) / ((($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal'])) * (($data['berapaInput'] * $hasil['y2total']) - ($hasil['ytotal'] * $hasil['ytotal']))), 4) @endphp

                <p class="mx-5 px-5">Nilai determinasi (<math><msup><mn>R</mn><mn>2</mn></msup></math>) sebesar {{ $r2 }}, artinya pengaruh X terhadap naik
                turunnya Y adalah sebesar {{ $r2 * 100 }}%. Sisanya {{ 100 - ($r2 * 100) }}% Disebabkan oleh faktor lain.</p>

                </div>

                <div class="my-4">
                    <p class="mx-5 mb-4">Untuk Grapiknya Didapatkan Sebagai Berikut: </p>
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
                    <p class="mx-5 mb-0">Perkiraan nilai Y, jika X = <span>
                    <input id="inptEnd" type="text" style="width: 40px;">
                    </span>  adalah Y = {{ number_format($hasil['a'], 2) }}+{{ number_format($hasil['b'], 2) }}X, maka:</p>
                    <div class="mx-5 mt-1 mb-3 fs-c-10">Untuk Mendapatkan Nilai Y, Silahkan Masukkan Nilai X (Bilangan Bulat / Bilangan Desimal).</div>

                    <div id="awarning" class="mx-5 alert alert-warning p-2 px-3 hidden animate__animated animate__fadeIn" role="alert">
                        Masukkan hanya angka (-6, 0, 2, 6.5, ...)
                    </div>

                    <div id="show1">
                        <div class="fst-italic w-50 mx-auto">
                            <p>Y = {{ number_format($hasil['a'], 2) }}+{{ number_format($hasil['b'], 2) }}( ? )</p> 
                            <p>Y = ( ? )</p>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button id="btnEndInput1" type="button" class="btn btn1 px-5 rounded text-end">Submit</button>
                        </div>
                    </div>

                    <div id="hidden1" class="hidden">
                        <div class="fst-italic w-50 mx-auto ">
                            <p id="outptEnd1">Y = {{ number_format($hasil['a'], 2) }}+{{ number_format($hasil['b'], 2) }}(  )</p>
                            <p id="outptEnd2">Y = {{ number_format($hasil['a'], 2) }}+{{ number_format($hasil['b'], 2) * 3.5}}</p>
                            <p id="outptEnd3">Y = {{ number_format($hasil['a'], 2) + number_format($hasil['b'], 2) * 3.5 }}</p>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button id="btnEndInput2" type="button" class="btn btn1 px-5 rounded text-end">Submit</button>
                        </div>
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

                                    $('#outptEnd1').html('Y = {{ number_format($hasil["a"], 2) }}+{{ number_format($hasil["b"], 2) }}(' + inptEndVal + ')');
                                    $('#outptEnd2').html('Y = {{ number_format($hasil["a"], 2) }}+ ' + ('{{ number_format($hasil["b"], 2) }}' * inptEndVal));
                                    $('#outptEnd3').html('Y = ' + ({{ number_format($hasil["a"], 2) }} + ({{ number_format($hasil["b"], 2) }} * inptEndVal)));
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
                                    
                                    $('#outptEnd1').html('Y = {{ number_format($hasil["a"], 2) }}+{{ number_format($hasil["b"], 2) }}(' + inptEndVal + ')');
                                    $('#outptEnd2').html('Y = {{ number_format($hasil["a"], 2) }}+ ' + ('{{ number_format($hasil["b"], 2) }}' * inptEndVal));
                                    $('#outptEnd3').html('Y = ' + ({{ number_format($hasil["a"], 2) }} + ({{ number_format($hasil["b"], 2) }} * inptEndVal)));
                                }                
                            });
                        });
                    </script>
                </div> 

                <div class="d-flex justify-content-end">
                        <a href="#" type="submit" class="py-1 text-decoration-none fs-c-10 text-end mt-2 mb-3">Back To Top</a>
                </div>
            </div>
        </div>
    </div>
@endsection