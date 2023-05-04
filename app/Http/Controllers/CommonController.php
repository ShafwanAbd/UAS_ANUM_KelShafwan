<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function main_index(){

        $data['berapaInput'] = '3';
        $data['cara'] = '';

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

        $xtotal = 0;
        $ytotal = 0; 
        $x2total = 0;
        $y2total = 0; 
        $xytotal = 0;

        for ($i = 1; $i <= $berapaInput; $i++){  
            $xtotal += $request->input('xinput'.$i); 
        }  

        for ($i = 1; $i <= $berapaInput; $i++){  
            $ytotal += $request->input('yinput'.$i); 
        } 

        for ($i = 1; $i <= $berapaInput; $i++){  
            $x2total += ($request->input('xinput'.$i) * $request->input('xinput'.$i)); 
        } 

        for ($i = 1; $i <= $berapaInput; $i++){  
            $y2total += ($request->input('yinput'.$i) * $request->input('yinput'.$i)); 
        } 

        for ($i = 1; $i <= $berapaInput; $i++){  
            $xytotal += ($request->input('xinput'.$i) * $request->input('yinput'.$i)); 
        }  

        $a = (($ytotal * $x2total) - ($xtotal * $xytotal)) / (($berapaInput * $x2total) - ($xtotal * $xtotal));
        $b = (($berapaInput * $xytotal) - ($xtotal * $ytotal)) / (($berapaInput * $x2total) - ($xtotal * $xtotal)); 

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
