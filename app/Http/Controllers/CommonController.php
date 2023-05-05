<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function main_index(){

        $data['berapaInput'] = '4';
        $data['cara'] = '1';

        return view('main', compact(
            'data'
        ));
    }
    
    public function mainInput(Request $request){

        $data['berapaInput'] = '';
        $data['cara'] = '';
        
        if ($request->berapaInput){
            $data['berapaInput'] = $request->berapaInput;
        }

        if ($request->cara){
            $data['cara'] = $request->cara;
        }

        return view('main', compact(
            'data'
        ));
    }
    
    public function mainInputHasil(Request $request, int $berapaInput, int $cara){
        
        $data['berapaInput'] = $berapaInput;
        $data['cara'] = $cara; 

        // Initializing Variable
        $xtotal = 0;
        $ytotal = 0;
        $x2total = 0;
        $y2total = 0;
        $xytotal = 0;

        // Initializing Arrays
        $xinput = [];
        $yinput = [];
        $x2input = [];
        $y2input = [];
        $xyinput = [];

        for ($i = 1; $i <= $berapaInput; $i++){  
            $xinput[$i] = $request->input('xinput'.$i);
            $xtotal += $request->input('xinput'.$i); 
        }   
 

        for ($i = 1; $i <= $berapaInput; $i++){  
            $yinput[$i] = $request->input('yinput'.$i);
            $ytotal += $request->input('yinput'.$i); 
        } 

        for ($i = 1; $i <= $berapaInput; $i++){  
            $x2input[$i] = ($request->input('xinput'.$i) * $request->input('xinput'.$i));
            $x2total += ($request->input('xinput'.$i) * $request->input('xinput'.$i)); 
        } 

        for ($i = 1; $i <= $berapaInput; $i++){  
            $y2input[$i] = ($request->input('yinput'.$i) * $request->input('yinput'.$i)); 
            $y2total += ($request->input('yinput'.$i) * $request->input('yinput'.$i)); 
        } 

        for ($i = 1; $i <= $berapaInput; $i++){  
            $xyinput[$i] = ($request->input('xinput'.$i) * $request->input('yinput'.$i)); 
            $xytotal += ($request->input('xinput'.$i) * $request->input('yinput'.$i)); 
        }  

        $a = (($ytotal * $x2total) - ($xtotal * $xytotal)) / (($berapaInput * $x2total) - ($xtotal * $xtotal));
        $b = (($berapaInput * $xytotal) - ($xtotal * $ytotal)) / (($berapaInput * $x2total) - ($xtotal * $xtotal)); 

        $hasil['xinput'] = $xinput;
        $hasil['yinput'] = $yinput;
        $hasil['x2input'] = $x2input;
        $hasil['y2input'] = $y2input;
        $hasil['xyinput'] = $xyinput; 
        $hasil['xtotal'] = $xtotal;
        $hasil['ytotal'] = $ytotal;
        $hasil['x2total'] = $x2total;
        $hasil['y2total'] = $y2total;
        $hasil['xytotal'] = $xytotal; 
        $hasil['a'] = $a; 
        $hasil['b'] = $b;  

        return view('mainHasil', compact(
            'data', 'hasil'
        )); 
    }
}
