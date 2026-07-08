<button
    {{ $attributes->merge([
        'class' => 'btn-auth'
    ]) }}>
    {{ $slot }}
</button>

<style>
.btn-auth {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 160px;
    padding: 12px 0;
    border: none;
    border-radius: 30px;
    background-color: #ffffff; /* Botón blanco resalta perfectamente en fondo oscuro */
    color: #0d0e12; /* Texto oscuro interno */
    font-size: 16px;
    font-weight: bold;
    font-family: inherit;
    cursor: pointer;
    transition: background-color .25s ease, transform .2s ease;
}

.btn-auth:hover {
    background-color: #e5e7eb; /* Gris muy claro al pasar el cursor */
    transform: translateY(-1px);
}

.btn-auth:active {
    transform: scale(.98);
}

.btn-auth:disabled {
    opacity: .5;
    cursor: not-allowed;
}
</style>