<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidationController extends Controller
{
    // Valida el payload de usuario y devuelve errores o datos en JSON.
    public function validateUser(Request $request)
    {
        $rules = [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'age' => ['required', 'integer', 'min:18'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validacion fallida',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        return response()->json([
            'message' => 'Payload valido',
            'data' => $data,
        ]);
    }
}
