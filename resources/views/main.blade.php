@extends('layouts.layout')

@section('content')
    <div class="container_main py-4 background-main">
        <div class="container_berapaInput flex row px-3 mx-0 d-flex justify-content-end">  
            <div class="col-3 px-3 position-fixed top-0 start-0 py-4">
                    <div class="mb-3 card shadow p-2 ">
                        <form method="GET" action="{{ url('/main/input') }}">
                        @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Banyak Input</label>
                                <input name="berapaInput" type="number" value="{{ $data['berapaInput'] }}" min="2" class="background-input form-control" id="exampleFormControlInput1" placeholder="0"  required>
                            </div>           
                                <input type="hidden" name="cara" value="{{ $data['cara'] }}"> 
                                <button type="submit" class="btn btn1 w-100 rounded mt-2">Submit</button>
                        </form>
                    </div>
                    
                    <div class="card shadow p-2">
                        <form method="GET" action="{{ url('/main/input') }}">
                        @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Cara Ke</label>
                                <select name="cara" class="form-control background-input" required>
                                    <option value="" selected disabled>-- Select --</option>
                                    <option value="1" {{ $data['cara'] == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $data['cara'] == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $data['cara'] == '3' ? 'selected' : '' }}>3</option>
                                </select>
                            </div>
                            <input type="hidden" name="berapaInput" value="{{ $data['berapaInput'] }}"> 
                            <button type="submit" class="btn btn1 w-100 rounded mt-2">Submit</button>
                        </form>
                    </div>
            </div>
            <div class="col-9 card shadow">
                <form method="POST" action="{{ url('/main/hasil/'.$data['berapaInput'].'/'.$data['cara']) }}">
                @csrf
                <div class="container_input flex row">
                    <div class="col px-5"> 
                        <h3 class="text-center">X Input</h3>
                        @for ($i = 1; $i <= $data['berapaInput']; $i++)
                        <div class="mb-3">
                            <!-- <label for="exampleFormControlInput1" class="form-label">Input {{ $i }}</label> -->
                            <input name="xinput{{ $i }}" value="{{ isset($xinput) ? $xinput : '' }}[$i]" type="number" class="background-input form-control" id="exampleFormControlInput1" placeholder="Input Ke-{{ $i }}">
                        </div>
                        @endfor
                    </div> 
                    <div class="col px-5"> 
                        <h3 class="text-center">Y Input</h3>
                        @for ($i = 1; $i <= $data['berapaInput']; $i++)
                        <div class="mb-3">
                            <!-- <label for="exampleFormControlInput1" class="form-label">Input {{ $i }}</label> -->
                            <input name="yinput{{ $i }}" type="number" class="background-input form-control" id="exampleFormControlInput1" placeholder="Input ke-{{ $i }}">
                        </div>
                        @endfor
                    </div> 
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn1 py-2 px-5 rounded text-end mt-4 mb-3">Submit</button>
                </div>
                </form>
            </div>
        </div>

    </div>
@endsection