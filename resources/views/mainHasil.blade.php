@extends('layouts.layout')

@section('content')
    <div class="row px-3 mx-0 my-4">
        <div class="col-2">
                <div class="card shadow p-2">
                    <p>Kembali ke Home</p>
                    <button type="submit" class="btn btn1 w-100 rounded mt-3">Kembali</button>
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
                        <button type="submit" class="btn btn1 w-100 rounded mt-3">Ganti</button>
                    </form>
                </div>
        </div>
        <div class="col-10 card shadow px-5">
            <p class="h2 text-center my-3">HASIL</p>
            <div>
                <p>Berdasarkan data sebelumnya, maka dihasilkan tabel sebagai berikut:</p>
                <table class="table w-50 mx-auto background-table1 text-center">
                    <thead class="">
                        <tr>
                            <th scope="col">X</th>
                            <th scope="col">Y</th>
                            <th scope="col">X2</th>
                            <th scope="col">Y2</th>
                            <th scope="col">XY</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>

                        <!-- row paling bawah -->
                        <tr class="background-table2">
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
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
                                    <mi>(56)(96)-(24)(198)</mi>
                                    <msup>
                                        <mrow>
                                            <mi>(8)(96)-(24)</mi>
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
                                    <mi>5376-4752</mi>
                                    <mi>768-576</mi>
                                </mfrac>
                            </math>
                        </div>
                        <div>
                            <math>
                                <mi>a</mi>
                                <mo>=</mo>
                                <mfrac>
                                    <mi>5376</mi>
                                    <mi>768</mi>
                                </mfrac>
                            </math>
                        </div>
                        <div class="mt-4">
                            <math>
                                <mi>a</mi>
                                <mo>=</mo>
                                <mi>5376</mi>
                            </math>
                        </div>
                    </div>

                    <div>
                    <div>
                            <math>
                                <mi>b</mi>
                                <mo>=</mo>
                                <mfrac>
                                    <mi>(56)(96)-(24)(198)</mi>
                                    <msup>
                                        <mrow>
                                            <mi>(8)(96)-(24)</mi>
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
                                    <mi>5376-4752</mi>
                                    <mi>768-576</mi>
                                </mfrac>
                            </math>
                        </div>
                        <div>
                            <math>
                                <mi>b</mi>
                                <mo>=</mo>
                                <mfrac>
                                    <mi>5376</mi>
                                    <mi>768</mi>
                                </mfrac>
                            </math>
                        </div>
                        <div class="mt-4">
                            <math>
                                <mi>b</mi>
                                <mo>=</mo>
                                <mi>5376</mi>
                            </math>
                        </div>
                    </div>

                </div>
            </div>

            <div class="my-4">
                <p>Sehingga dapat diperoleh nilai sebagai berikut:</p>
                <div class="d-flex justify-content-between w-25 mx-auto">
                    <p class="fst-italic">a = 5</p>
                    <p class="fst-italic">b = 6</p>
                </div>
            </div>

            <div class="my-4">
                <p>Persamaan regresi linear: </p>
                <p class="text-center fst-italic">Y = 300 + 69x</p>
            </div>

            <div class="my-4 card p-3 background3">
                <p>Perkiraan nilai Y, jika X = O  adalah Y = 3.25+1.25X, maka:</p>
                <div class="fst-italic w-25 mx-auto">
                    <p>Y = 3.25+1.25(3.5)</p>
                    <p>Y = 3.25+4.375</p>
                    <p>Y = 7.625</p>
                    <button type="submit" class="btn btn1 py-1 px-5 rounded text-end mt-4 mb-3">Submit</button>
                </div>
            </div>


            <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn1 py-1 px-5 rounded text-end mt-4 mb-3">Back To Top</button>
            </div>
        </div>
    </div>
@endsection