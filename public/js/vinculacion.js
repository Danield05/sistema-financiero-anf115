var cuentas = document.querySelectorAll('.econoscope_cuenta');

function guardar(){
    let promises = [];
    let successCount = 0;
    let errorCount = 0;

    // Mostrar indicador de carga
    iziToast.info({
        title: 'Guardando...',
        message: 'Procesando vinculaciones, por favor espere.',
        timeout: false,
        close: false
    });

    cuentas.forEach((cuenta) => {
        if(cuenta.value != ''){
            let promise = fetch(`/vinculacion/guardar?cuenta=${encodeURIComponent(cuenta.value)}&cuenta_sistema_id=${cuenta.getAttribute('sistema')}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        successCount++;
                        console.log('Vinculación guardada:', data.message);
                    } else {
                        errorCount++;
                        console.error('Error:', data.error);
                    }
                })
                .catch(error => {
                    errorCount++;
                    console.error('Error de red:', error);
                });

            promises.push(promise);
        }
    });

    Promise.all(promises).then(() => {
        // Ocultar indicador de carga
        iziToast.hide({}, document.querySelector('.iziToast'));

        // Mostrar resultado
        if (errorCount === 0) {
            iziToast.success({
                title: '¡Éxito!',
                message: `Se guardaron ${successCount} vinculaciones correctamente.`,
                position: 'topRight',
                timeout: 3000
            });
        } else {
            iziToast.warning({
                title: 'Advertencia',
                message: `Se guardaron ${successCount} vinculaciones, pero hubo ${errorCount} errores. Revisa la consola para más detalles.`,
                position: 'topRight',
                timeout: 5000
            });
        }

        // Recargar página después de mostrar el mensaje
        setTimeout(() => {
            location.reload();
        }, 2000);
    });
}