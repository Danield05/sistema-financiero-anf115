var cuentas = document.querySelectorAll('.econoscope_cuenta');

function guardar(){
    let promises = [];
    let successCount = 0;
    let errorCount = 0;

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
        // Mostrar resultado
        if (errorCount === 0) {
            alert(`¡Éxito! Se guardaron ${successCount} vinculaciones correctamente.`);
        } else {
            alert(`Se guardaron ${successCount} vinculaciones, pero hubo ${errorCount} errores. Revisa la consola para más detalles.`);
        }

        // Recargar página después de un breve delay
        setTimeout(() => {
            location.reload();
        }, 1000);
    });
}