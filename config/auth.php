<?php

return [

    /*
    |---------------------------------------------------------------------------
    | Authentication Defaults
    |---------------------------------------------------------------------------
    |
    | Esta opción define el "guard" predeterminado de autenticación y el "broker" 
    | de restablecimiento de contraseñas para tu aplicación. Puedes cambiar 
    | estos valores según sea necesario, pero son un buen punto de partida para
    | la mayoría de las aplicaciones.
    |
    */

    'defaults' => [
        'guard' => 'web',  // El guard predeterminado será 'web'
        'passwords' => 'users',  // El broker de contraseñas será 'users'
    ],

    /*
    |---------------------------------------------------------------------------
    | Authentication Guards
    |---------------------------------------------------------------------------
    |
    | Aquí defines los diferentes guards de autenticación para tu aplicación.
    | El guard predeterminado utiliza almacenamiento de sesión y el proveedor 
    | de usuarios Eloquent.
    |
    | Todos los guards de autenticación tienen un proveedor de usuarios, que 
    | define cómo se recuperan los usuarios de tu base de datos o almacenamiento 
    | utilizado por la aplicación. La opción predeterminada es "eloquent".
    |
    | Soportado: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',  // Utiliza 'session' como driver para el guard
            'provider' => 'users',  // El proveedor de usuarios será 'users'
        ],
    ],

    /*
    |---------------------------------------------------------------------------
    | User Providers
    |---------------------------------------------------------------------------
    |
    | Todos los guards de autenticación tienen un proveedor de usuarios, que 
    | define cómo los usuarios son recuperados de tu base de datos u otro 
    | sistema de almacenamiento utilizado por la aplicación. Por defecto, se 
    | usa el modelo Eloquent.
    |
    | Soportado: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',  // Utiliza el driver 'eloquent' para obtener usuarios desde la base de datos
            'model' => App\Models\User::class,  // Define el modelo de usuario a utilizar (se usa la clase User predeterminada)
        ],
    ],

    /*
    |---------------------------------------------------------------------------
    | Resetting Passwords
    |---------------------------------------------------------------------------
    |
    | Estas opciones de configuración especifican el comportamiento de la 
    | funcionalidad de restablecimiento de contraseñas de Laravel, incluyendo 
    | la tabla utilizada para almacenar los tokens y el proveedor de usuarios 
    | que se invoca para recuperar usuarios.
    |
    | El tiempo de expiración es el número de minutos que cada token de restablecimiento 
    | será considerado válido. Esta característica de seguridad mantiene los tokens 
    | con vida corta para que sea menos probable que sean adivinados.
    |
    | La configuración de "throttle" es el número de segundos que un usuario 
    | debe esperar antes de generar más tokens de restablecimiento de contraseñas.
    | Esto previene que un usuario genere rápidamente una gran cantidad de tokens.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',  // El proveedor de usuarios para los restablecimientos de contraseñas es 'users'
            'table' => 'password_resets',  // Tabla para almacenar los tokens de restablecimiento de contraseñas
            'expire' => 60,  // Los tokens expirarán después de 60 minutos
            'throttle' => 60,  // Los usuarios deben esperar 60 segundos antes de generar un nuevo token
        ],
    ],

    /*
    |---------------------------------------------------------------------------
    | Password Confirmation Timeout
    |---------------------------------------------------------------------------
    |
    | Aquí puedes definir la cantidad de segundos antes de que venza la ventana 
    | de confirmación de la contraseña y los usuarios tengan que volver a ingresar 
    | su contraseña a través de la pantalla de confirmación. El valor por defecto 
    | es de tres horas (10800 segundos).
    |
    */

    'password_timeout' => 10800,  // Tiempo de expiración predeterminado para la confirmación de contraseña (3 horas)
];