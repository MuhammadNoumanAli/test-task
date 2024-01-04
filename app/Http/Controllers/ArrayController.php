<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArrayController extends Controller
{

    public function mergeArrays(Request $request)
    {
        if ($request->has('array1') && $request->has('array2') && !empty($request->array1) && !empty($request->array2)){
            $array1 = explode(',', $request->array1);
            $array2 = explode(',', $request->array2);
            $data = [
                'success' => true,
                'mergedArray' => array_merge($array1, $array2),
            ];
            return $this->returnSuccessResponse($data);
        }else{
            return $this->returnErrorResponse('Missing Parameters or Value');
        }
    }

    public function filterOddNumbers(Request $request){

        if ($request->has('numbers') && !empty($request->numbers)){
            $array1 = explode(',', $request->numbers);
            $oddsNumbers = [];
            foreach($array1 as $val) {
                if($val % 2 != 0) {
                    $oddsNumbers[] = $val;
                }
            }

            $data = [
                'success' => true,
                'oddNumbers' => $oddsNumbers,
            ];
            return $this->returnSuccessResponse($data);
        }else{
            return $this->returnErrorResponse('Missing Parameters or Value');
        }

    }

    public function calculateAverage(Request $request)
    {
        if ($request->has('numbers') && !empty($request->numbers)){
            $array1 = explode(',', $request->numbers);
            $average = array_sum($array1)/count($array1);

            $data = [
                'success' => true,
                'averageOfArray' => $average,
            ];
            return $this->returnSuccessResponse($data);
        }else{
            return $this->returnErrorResponse('Missing Parameters or Value');
        }
    }

    public function findCommonElements(Request $request){
        if ($request->has('array1') && $request->has('array2') && !empty($request->array1)  && !empty($request->array2)){
            $array1 = explode(',', $request->array1);
            $array2 = explode(',', $request->array2);

            $data = [
                'success' => true,
                'commonArrayElements' => array_values(array_intersect($array1, $array2)),
            ];
            return $this->returnSuccessResponse($data);
        }else{
            return $this->returnErrorResponse('Missing Parameters or Value');
        }
    }

}
