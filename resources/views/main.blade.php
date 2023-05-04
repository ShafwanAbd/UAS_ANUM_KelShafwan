@extends('layouts.layout')

@section('content')
    <div class="container_main">
        <div class="container_berapaInput flex"> 
            <form method="GET" action="{{ url('/main/input') }}">
            @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Banyak Input</label>
                    <input name="berapaInput" type="number" value="{{ $data['berapaInput'] }}" class="form-control" id="exampleFormControlInput1" placeholder="0" min="0">
                </div>        
                    <input type="hidden" name="cara" value="{{ $data['cara'] }}"> 
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
            </form>

            <form method="GET" action="{{ url('/main/input') }}">
            @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Cara Ke</label>
                    <select name="cara" class="form-control">
                        <option value="" selected disabled>-- Select --</option>
                        <option value="1" {{ $data['cara'] == '1' ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $data['cara'] == '2' ? 'selected' : '' }}>2</option>
                        <option value="3" {{ $data['cara'] == '3' ? 'selected' : '' }}>3</option>
                    </select>
                </div>
                <input type="hidden" name="berapaInput" value="{{ $data['berapaInput'] }}"> 
                <button type="submit" class="btn btn-primary">SUBMIT</button>
            </form>
        </div>

        <br>

        <form method="POST" action="{{ url('/main/hasil/'.$data['berapaInput'].'/'.$data['cara']) }}">
        @csrf
            <div class="container_input flex">
                <div class=""> 
                    <h3>X Input</h3>
                    @for ($i = 1; $i <= $data['berapaInput']; $i++)
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Input {{ $i }}</label>
                        <input name="xinput{{ $i }}" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Number">
                    </div>
                    @endfor
                </div> 
                <div class=""> 
                    <h3>Y Input</h3>
                    @for ($i = 1; $i <= $data['berapaInput']; $i++)
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Input {{ $i }}</label>
                        <input name="yinput{{ $i }}" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Number">
                    </div>
                    @endfor
                </div> 
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection