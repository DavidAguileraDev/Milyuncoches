<input {{ 
    $attributes->merge([
    'class' => 'input-auth'])
}} >

<style>
.input-auth {
    width: 100%;
    padding: 10px 0px;
    border: none;
    border-bottom: 2px solid #4b5563; /* Línea gris en reposo */
    font-size: 16px;
    outline: none;
    background: transparent;
    color: #ffffff; /* Texto que escribe el usuario en blanco */
    transition: border-color .2s ease;
}

.input-auth::placeholder {
    color: #6b7280; /* Color gris suave para el placeholder */
    font-weight: 400;
}

.input-auth:focus {
    border-bottom-color: #ffffff; /* Se ilumina en blanco al clickar */
}
</style>