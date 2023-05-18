@extends('layouts.layout')

@section('content')
    <div class="container_main py-4 background-main">
        <div class="container_berapaInput flex row px-3 mx-0 d-flex justify-content-end">  
            <div class="col-3 px-3 position-fixed top-0 start-0 py-4">
                
                    <div class="mb-3 card shadow p-3 animate__animated animate__fadeInLeft">
                        <form method="GET" action="{{ url('/main/input') }}">
                        @csrf
                            <div class="mb-1">
                                <label for="exampleFormControlInput1" class="form-label">Banyak Input</label>
                                <input name="berapaInput" type="number" value="{{ $data['berapaInput'] }}" min="2" class="background-input form-control" id="exampleFormControlInput1" placeholder="0"  required>
                                <div class="mt-1 fs-c-10">Silahkan Masukkan Berapa Inputan untuk Variabel X dan Y (2 - ∞).</div>
                            </div>           
                                <input id="inptHiddenCara" type="hidden" name="cara" value="{{ $data['cara'] }}"> 
                                <button type="submit" class="btn btn1 w-100 rounded mt-2">Submit</button>
                        </form>
                    </div>
                    
                    <div class="mb-3 card shadow p-3 animate__animated animate__fadeInLeft"> 
                        <div class="mb-1">
                            <label for="exampleFormControlInput1" class="form-label">Cara Ke</label>
                            <select id="inptMain" name="cara" class="form-control background-input" required>
                                <option value="1" {{ $data['cara'] == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ $data['cara'] == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ $data['cara'] == '3' ? 'selected' : '' }}>3</option>
                            </select>
                            <div class="mt-1 fs-c-10">Silahkan Pilih Cara Keberapa untuk Cara Pengerjaannya.</div>
                        </div>
                        <input type="hidden" name="berapaInput" value="{{ $data['berapaInput'] }}"> 
                        <button type="submit" class="btn btn1 w-100 rounded mt-2">Submit</button> 
                    </div> 
            </div>
            <div class="col-9 card shadow animate__animated animate__fadeIn">
                <form id="formMainEnd" method="POST" action="{{ url('/main/hasil/'.$data['berapaInput'].'/'.$data['cara']) }}">
                @csrf 

                <script>
                    $(document).ready(function() {
                        $('#inptMain').on('change', function() { 
                            const cara = $(this).val();
                            const berapaInput = $('input[name="berapaInput"]').val();
                            const newAction = '{{ url('/main/hasil') }}/' + berapaInput + '/' + cara;
                            $('#formMainEnd').attr('action', newAction);

                            $('#inptHiddenCara').val(cara);
                        });
                    });
                </script>

                <div class="container_input flex row px-3 pt-3">
                     <h2 class="text-center fw-bolder t-primary mb-3">Aplikasi Regresi Linear</h2>
                    <div class="col"> 
                        <h4 class="text-center mb-3">X Input</h4>
                        @for ($i = 1; $i <= $data['berapaInput']; $i++)
                        <div class="mb-3">
                            <!-- <label for="exampleFormControlInput1" class="form-label">Input {{ $i }}</label> -->
                            <input name="xinput{{ $i }}" value="{{ isset($xinput) ? $xinput[$i] : '' }}[$i]" type="number" class="background-input form-control" id="exampleFormControlInput1" placeholder="Input Ke-{{ $i }}" required>
                        </div>
                        @endfor
                    </div> 
                    <div class="col"> 
                        <h4 class="text-center mb-3">Y Input</h4>
                        @for ($i = 1; $i <= $data['berapaInput']; $i++)
                        <div class="mb-3">
                            <!-- <label for="exampleFormControlInput1" class="form-label">Input {{ $i }}</label> -->
                            <input name="yinput{{ $i }}" type="number" class="background-input form-control" id="exampleFormControlInput1" placeholder="Input ke-{{ $i }}" required>
                        </div>
                        @endfor
                    </div> 
                </div>
                <div class="px-3 mt-1 fs-c-10">Silahkan Masukkan Masing-Masing Nilai untuk Variabel X dan Y, Nilai yang Di-inputkan Harus Bilangan Bulat.</div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn1 py-2 px-5 rounded text-end mt-4 mb-3 mx-3">Submit</button>
                </div>
                </form>
            </div>
        </div>

    </div>
@endsection