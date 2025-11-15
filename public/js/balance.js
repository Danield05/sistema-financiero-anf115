function guardar(){
    var balanceInputs = document.querySelectorAll('.balance-input');

    balanceInputs.forEach((input) => {
        if(input.value != '' && input.value != '0' && input.value != '0.00'){
            var cuentaId = input.getAttribute('data-cuenta-id');
            var periodoId = input.getAttribute('data-periodo-id');
            var total = input.value;

            // Enviar petición GET a la ruta balance/guardar
            fetch(`/balance/guardar?total=${total}&cuenta_id=${cuentaId}&periodo_id=${periodoId}`)
            .then((response) => {
                if(response.ok) {
                    console.log('Guardado:', cuentaId, total);
                } else {
                    console.error('Error al guardar:', cuentaId);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
    });

    setTimeout(()=>{
        location.reload();
    },1500);
}