@extends('layouts.layout')

@section('content')
    <div class="container_main background-main py-4 px-3">
        <div class="row d-flex justify-content-end mx-0">
            <div class="position-fixed top-0 start-0 py-4 px-3 col-3">
                    <div class="card shadow p-2 mb-3 ">
                        <p>Kembali ke Home</p>
                        <a href="{{ url('/main') }}" type="submit" class="btn btn1 w-100 rounded mt-2">Kembali</a>
                    </div>
                    <div class="card shadow p-2">
                        <form method="GET" action="{{ url('/main/input') }}">
                        @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Ganti Cara</label>
                                <select name="cara" class="form-control background-input">
                                    <option value="" selected disabled>-- Select --</option>
                                    <option value="1" {{ $data['cara'] == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $data['cara'] == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $data['cara'] == '3' ? 'selected' : '' }}>3</option>
                                </select>
                            </div>
                            <input type="hidden" name="berapaInput" value="{{ $data['berapaInput'] }}"> 
                            <button type="submit" class="btn btn1 w-100 rounded mt-2">Ganti</button>
                        </form>
                    </div>
            </div>
            <div class="col-9 card shadow px-5">
                <p class="h2 text-center my-3">HASIL</p>
                <div>
                    <p>Berdasarkan data sebelumnya, maka dihasilkan tabel sebagai berikut:</p>
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

                <div class="my-4">
                    <p>Berdasarkan Cara ke-1, maka proses pengerjaan dapat diuraikan seperti berikut: </p>
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

                <div class="my-4">
                    <p>Sehingga dapat diperoleh nilai sebagai berikut:</p>
                    <div class="d-flex justify-content-between w-50 mx-auto">
                        <p class="fst-italic">a = {{ $hasil['a'] }}</p>
                        <p class="fst-italic">b = {{ $hasil['b'] }}</p>
                    </div>
                </div>

                <div class="my-4">
                    <p>Persamaan regresi linearnya adalah: </p>
                    <p class="text-center fst-italic">Y = {{ $hasil['a'] }} + {{ $hasil['b'] }}x</p>
                </div>

                <div class="my-4 card p-3 background3">
                    <form method="GET" action="{{ url('/main/input') }}">
                        @csrf
                        <p>Perkiraan nilai Y, jika X = <span>
                            <input type="number" style="width: 45px;">
                        </span>  adalah Y = {{ $hasil['a'] }}+{{ $hasil['b'] }}X, maka:</p>
                        <div class="fst-italic w-50 mx-auto">
                            <p>Y = {{ $hasil['a'] }}+{{ $hasil['b'] }}(3.5)</p>
                            <p>Y = {{ $hasil['a'] }}+{{ $hasil['b'] }}</p>
                            <p>Y = 7.625</p>
                            <button type="submit" class="btn btn1 py-1 px-5 rounded text-end mt-4 mb-3">Submit</button>
                        </div>
                    </form>
                </div>


                <div class="d-flex justify-content-end">
                        <a href="#" type="submit" class="btn btn1 py-1 px-5 rounded text-end mt-4 mb-3">Back To Top</a>
                </div>
            </div>
        </div>
    </div>
@endsection