<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    "accepted"         => ":attribute debe ser aceptado.",
    "active_url"       => ":attribute no es una URL v&#225;lida.",
    "after"            => ":attribute debe ser una fecha posterior a :date.",
    "alpha"            => ":attribute solo debe contener letras.",
    "alpha_dash"       => ":attribute solo debe contener letras, n&#250;meros y guiones.",
    "alpha_num"        => ":attribute solo debe contener letras y n&#250;meros.",
    "array"            => ":attribute debe ser un conjunto.",
    "before"           => ":attribute debe ser una fecha anterior a :date.",
    "between"          => [
        "numeric" => ":attribute tiene que estar entre :min - :max.",
        "file"    => ":attribute debe pesar entre :min - :max kilobytes.",
        "string"  => ":attribute tiene que tener entre :min - :max caracteres.",
        "array"   => ":attribute tiene que tener entre :min - :max &#237;tems.",
    ],
    "boolean"          => "El campo :attribute debe tener un valor verdadero o falso.",
    "confirmed"        => "La confirmaci&#243;n de :attribute no coincide.",
    "date"             => ":attribute no es una fecha v&#225;lida.",
    "date_format"      => ":attribute no corresponde al formato :format.",
    "different"        => ":attribute y :other deben ser diferentes.",
    "digits"           => ":attribute debe tener :digits d&#237;gitos.",
    "digits_between"   => ":attribute debe tener entre :min y :max d&#237;gitos.",
    "email"            => ":attribute no es un correo v&#225;lido",
    "exists"           => ":attribute es inv&#225;lido.",
    "filled"           => "El campo :attribute es obligatorio.",
    "image"            => ":attribute debe ser una imagen.",
    "in"               => ":attribute es inv&#225;lido.",
    "integer"          => ":attribute debe ser un n&#250;mero entero.",
    "ip"               => ":attribute debe ser una direcci&#243;n IP v&#225;lida.",
    "max"              => [
        "numeric" => ":attribute no debe ser mayor a :max.",
        "file"    => ":attribute no debe ser mayor que :max kilobytes.",
        "string"  => ":attribute no debe ser mayor que :max caracteres.",
        "array"   => ":attribute no debe tener m&#225;s de :max elementos.",
    ],
    "mimes"            => ":attribute debe ser un archivo con formato: :values.",
    "min"              => [
        "numeric" => "El tama&#241;o de :attribute debe ser de al menos :min.",
        "file"    => "El tama&#241;o de :attribute debe ser de al menos :min kilobytes.",
        "string"  => ":attribute debe contener al menos :min caracteres.",
        "array"   => ":attribute debe tener al menos :min elementos.",
    ],
    "not_in"           => ":attribute es inv&#225;lido.",
    "numeric"          => ":attribute debe ser numrico.",
    "regex"            => "El formato de :attribute es inv&#225;lido.",
    "required"         => "El campo :attribute es obligatorio.",
    "required_if"      => "El campo :attribute es obligatorio cuando :other es :value.",
    "required_with"    => "El campo :attribute es obligatorio cuando :values est&#225; presente.",
    "required_with_all" => "El campo :attribute es obligatorio cuando :values est&#225; presente.",
    "required_without" => "El campo :attribute es obligatorio cuando :values no est&#225; presente.",
    "required_without_all" => "El campo :attribute es obligatorio cuando ninguno de :values est&#233;n presentes.",
    "same"             => ":attribute y :other deben coincidir.",
    "size"             => [
        "numeric" => "El tama&#241;o de :attribute debe ser :size.",
        "file"    => "El tama&#241;o de :attribute debe ser :size kilobytes.",
        "string"  => ":attribute debe contener :size caracteres.",
        "array"   => ":attribute debe contener :size elementos.",
    ],
    "timezone"         => "El :attribute debe ser una zona v&#225;lida.",
    "unique"           => ":attribute ya ha sido registrado.",
    "url"              => "El formato :attribute es inv&#225;lido.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'user'=>'Usuario',
        'password'=>'Contrase&#241;a',
        'first_name' => 'Nombres',
        'last_name' => 'Apellidos',
        'email' => 'Correo',
        'type' => 'Tipo',
        'password_confirmation'=>'&#243;n Contrase&#241;a',
        'telephone'=>'Tel&#233;fono',
        'mobile' => 'Celular',
        'gender' => 'Sexo',
        'address' => 'Direeci&#243;n',
        'identification' => 'C&#233;dula',
        'registration_number' => 'Matricula',

        'year' => 'A&#241;o',
        'month' => 'Mes',
        'amount' => 'Monto',
        'description' => 'Nota',
        'lawyer_id' => 'C&#233;dula',
        'new_user'=>'Usuario',
    ],

];