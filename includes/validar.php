<?php
// Lee los datos del formulario y devuelve [contacto, errores]
function leerFormulario(): array
{
    $contacto = [
        'nombre'    => trim($_POST['nombre'] ?? ''),
        'apellidos' => trim($_POST['apellidos'] ?? ''),
        'telefono'  => trim($_POST['telefono'] ?? ''),
        'email'     => trim($_POST['email'] ?? ''),
        'direccion' => trim($_POST['direccion'] ?? ''),
    ];

    $errores = [];
    if ($contacto['nombre'] === '')    $errores[] = 'El nombre es obligatorio.';
    if ($contacto['apellidos'] === '') $errores[] = 'Los apellidos son obligatorios.';
    if ($contacto['telefono'] === '') {
        $errores[] = 'El teléfono es obligatorio.';
    } elseif (!preg_match('/^[0-9 +()\-]{7,20}$/', $contacto['telefono'])) {
        $errores[] = 'El teléfono solo puede contener números, espacios y los signos + ( ) -';
    }
    if ($contacto['email'] !== '' && !filter_var($contacto['email'], FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'El correo electrónico no es válido.';
    }

    return [$contacto, $errores];
}
