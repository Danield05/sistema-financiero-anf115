async function guardar(){
    var balanceInputs = document.querySelectorAll('.balance-input');
    var promises = [];
    var hasErrors = false;

    balanceInputs.forEach((input) => {
        if(input.value != ''){
            var cuentaId = input.getAttribute('data-cuenta-id');
            var periodoId = input.getAttribute('data-periodo-id');
            var total = input.value;

            // Enviar petición GET a la ruta balance/guardar
            var promise = fetch(`${baseUrl}/balance/guardar?total=${total}&cuenta_id=${cuentaId}&periodo_id=${periodoId}`)
            .then((response) => response.json())
            .then((data) => {
                if(data.success) {
                    console.log('Guardado:', cuentaId, total);
                    return true;
                } else {
                    console.error('Error al guardar:', cuentaId, data.error);
                    hasErrors = true;
                    return false;
                }
            })
            .catch((error) => {
                console.error('Error de red:', error);
                hasErrors = true;
                return false;
            });
            promises.push(promise);
        }
    });

    // Esperar a que todas las peticiones se completen
    await Promise.all(promises);

    if(hasErrors) {
        alert('Hubo errores al guardar algunos valores. Revisa la consola para más detalles.');
    } else {
        // Recargar la página solo si todo fue exitoso
        location.reload();
    }
}