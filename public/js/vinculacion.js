var cuentas = document.querySelectorAll('.econoscope_cuenta');

function guardar(){
    cuentas.forEach((cuenta) => {
        if(cuenta.value != ''){
            fetch(`/vinculacion/guardar?cuenta=${cuenta.value}&cuenta_sistema_id=${cuenta.getAttribute('sistema')}`)
            // .then((response) => response.json())
            // .then((data) => ()=>{
            //     console.log(data);
            // });

            console.log('hola');
        }
    });
    
    // setTimeout(()=>{
    //     location.reload();
    // }, 2000)

    location.reload();
}