var cuentas = document.querySelectorAll('.econoscope_balance');

function guardar(){
    cuentas.forEach((cuenta) => {
        if(cuenta.value != ''){
            fetch(`/balance/guardar?total=${cuenta.value}&ids=${cuenta.getAttribute('id')}&periodo_id=${cuenta.getAttribute('periodo_id')}&cuenta_id=${cuenta.getAttribute('cuenta_id')}`)
            // .then((response) => response.json())
            // .then((data) => ()=>{
            //     console.log(data);
            // });

            console.log('hola');
        }
    });
    
    setTimeout(()=>{
        location.reload();
    },1000)
}