<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mensajes para validaciones de campos de formularios
    |--------------------------------------------------------------------------
    |
    | Las siguientes lineas contienen los mensajes de error predeterminados   
    | usados por la clase validator.
    |
    */

    'alpha' => 'El campo :attribute solo puede contener letras.',
    'alpha_num' => 'El campo :attribute solo puede tener letras y números.',
    'date' => 'El campo :attribute no es una fecha válida.',
    'email' => 'El :attribute debe ser un email válido.',
    'integer' => 'El campo :attribute debe ser un número.',
    'max' => [
        'numeric' => 'El campo :attribute puede tener como máximo :max dígitos.',
        'string' => 'El campo :attribute no puede tener más de :max caracteres.',
    ],
    'min' => [
        'numeric' => 'El campo :attribute debe tener al menos :min dígitos.',
        'string' => 'El campo :attribute debe tener al menos :min caracteres.',
    ],
    'numeric' => 'El campo :attribute solo puede contener números.',
    'regex' => 'El formato del campo :attribute es inválido.',
    'required' => 'El campo :attribute es obligatorio.',
    'size' => [
        'numeric' => 'El campo :attribute debe tener :size dígitos.',
        'string' => 'El campo :attribute debe tener :size caracteres.',
    ],
    'string' => 'El campo :attribute debe ser una cadena de texto.',
    'unique' => 'El campo :attribute ya existe, introduzca otro.',
];
