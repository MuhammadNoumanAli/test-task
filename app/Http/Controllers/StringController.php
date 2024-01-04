<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StringController extends Controller
{
    public function reverseString(Request $request)
    {
        if ($request->has('text')&& !empty($request->text)){
            $data = [
                'success' => true,
                'reverseString' => Str::reverse(($request->text)),
            ];
            return $this->returnSuccessResponse($data);
        }else{
            return $this->returnErrorResponse('Missing Parameters or Value');
        }
    }

    public function countVowels(Request $request)
    {
        if ($request->has('text')&& !empty($request->text)){
            $countVowels = preg_match_all('/[aeiou]/i', $request->text);
            $data = [
                'success' => true,
                'countVowels' => $countVowels,
            ];
            return $this->returnSuccessResponse($data);
        }else{
            return $this->returnErrorResponse('Missing Parameters or Value');
        }
    }


    public function truncateText(Request $request)
    {
        if ($request->has('text') && $request->has('length') && !empty($request->text) && !empty($request->length)){
            $text = $request->text;
            $length = $request->length;
            $data = [
                'success' => true,
                'truncateText' => Str::limit($text, $length),
            ];
            return $this->returnSuccessResponse($data);
        }else{
            return $this->returnErrorResponse('Missing Parameters or Value');
        }
    }
}
