<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculationController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function calculate(Request $request) {

        $in1 = $request->in1;
        $in2 = $request->in2;
        $op = $request->op;

        $result = null;

        if ($op == '+') {
            $result = $in1 + $in2;
        } else if ($op == '-') {
            $result = $in1 - $in2;
        } else if ($op == '*') {
            $result = $in1 * $in2;
        } else if ($op == '/') {
            if ($in2 == 0) {
                return response()->json([
                    'result' => $result,
                    'message' => 'Can not divide by zero'
                ], 400);
            }

            $result = $in1 / $in2;
        }

        return response()->json([
            'result' => $result,
        ]);
    }
}
