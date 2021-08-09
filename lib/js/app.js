function guardarDatos(){
    datos = $('#form_register').serialize();

    $.ajax({
        url: 'controllers/aspirants_controller.php',
        type: 'POST',
        data: datos,
        beforeSend: function(){
            showSpiner();
        },
        success: function(data){
            hideSpiner();
            respuesta = JSON.parse(data);
            if(respuesta.msj !== ''){
                swali('Error en el procesamiento del formulario', respuesta.msj, 'volver a intentarlo');
            }
            else if(respuesta.checkByEmail){
                swali('Correo Electrónico en uso', 'El Correo Electrónico ingresado: "'+ respuesta.checkByEmail +'" ya ha sido registrado. \n\n Por favor, ingrese uno diferente.', 'Continuar');
            }
            else if(respuesta.checkByDni){
                swali('Número de cédula en uso', 'El Número de Cédula ingresado: "'+ respuesta.checkByDni +'" ya ha sido registrado. \n\n Por favor, ingrese uno diferente.', 'Continuar');
            }
            else if(respuesta.success){
                swals('¡Listo, tus datos han sido guardados!', "Pronto estaremos en contacto contigo", 'Continuar');
                setTimeout(() => {
                    window.location = "index.php";
                }, 3000)
            }
            
            //console.log(respuesta.var);
            
        },
        error: function(){
            swale('Ingreso al sistema', 'Error. No se pudo conectar con el sistema', 'Volver a internarlo');
            console.log('error en el directorio del sistema');
        }
    });
}

function showSpiner(){
    $('#modal_spinner').css('display','block');
}


function hideSpiner(){
    $('#modal_spinner').css('display','none');
}

/* *********************************** */
// sweet alert
/* *********************************** */

// sucess
function swals(title, text, button){
    swal({
        title : title,
        text : text,
        icon : 'success',
        button : button
    });
}


// error
function swale(title, text, button){
    swal({
        title : title,
        text : text,
        icon : 'error',
        button : button
    });
}

// advertencia
function swalw(title, text, button){
    swal({
        title : title,
        text : text,
        icon : 'warning',
        button : button
    });
}

// informacion
function swali(title, text, button){
    swal({
        title : title,
        text : text,
        icon : 'info',
        button : button
    });
}
/* *********************************** */
