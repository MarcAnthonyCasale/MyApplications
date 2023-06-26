<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class FibonacciController extends Controller
{

    public function start(Request $request)
    {
        $num = $request->number;  
        echo "<h3>Fibonacci series up to:".$num."</h3>";  
        echo "\n";  
        function series($num){  
            if($num == 0){  
            return 0;  
            }else if( $num == 1){  
        return 1;  
        }  else {  
        return (series($num-1) + series($num-2));  
        }   
        }  
        /* Call Function. */  
        for ($i = 0; $i < $num; $i++){  
        echo series($i);  
        echo "\n";  
        }  
    }   
   
  

}