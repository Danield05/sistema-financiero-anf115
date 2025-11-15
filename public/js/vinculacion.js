var cuentas = document.querySelectorAll('.econoscope_cuenta');

function guardar(){
    console.log('Iniciando guardado...');

    var vinculaciones = [];
    var cuentasInputs = document.querySelectorAll('.econoscope_cuenta');

    cuentasInputs.forEach(function(input) {
        var cuenta = input.value.trim();
        var row = input.closest('tr');
        var cuentaSistemaId = row.querySelector('input[name="cuenta_sistema_id"]').value;

        if (cuenta !== '' || cuentaSistemaId) {
            vinculaciones.push({
                cuenta_sistema_id: cuentaSistemaId,
                cuenta: cuenta
            });
        }
    });

    if (vinculaciones.length === 0) {
        alert('No hay vinculaciones para guardar.');
        return;
    }

    console.log('Vinculaciones a guardar:', vinculaciones);

    // Obtener CSRF token
    var csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (!csrfToken) {
        alert('Error: CSRF token no encontrado.');
        return;
    }

    // Enviar petición AJAX usando jQuery
    $.ajax({
        url: guardarVinculacionesUrl,
        type: 'POST',
        data: JSON.stringify({
            vinculaciones: vinculaciones
        }),
        contentType: 'application/json',
        headers: {
            'X-CSRF-TOKEN': csrfToken.getAttribute('content')
        },
        success: function(data) {
            console.log('Respuesta del servidor:', data);
            if (data.success) {
                alert('Vinculaciones guardadas correctamente.');
                location.reload();
            } else {
                alert('Error al guardar: ' + (data.error || data.message));
            }
        },
        error: function(xhr, status, error) {
            console.error('Error AJAX:', xhr.responseText);
            alert('Error al guardar vinculaciones: ' + error);
        }
    });
}