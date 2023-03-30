
// A $( document ).ready() block.
$( document ).ready(function() {

    console.log( "ready!" );

    $("body").on("click", ".btn-enviar", function(){

        $('.btn-enviar').hide();
        $('.load').css('display', 'block');
        
        var name = $("#name-5a14").val();
        var email = $("#email-5a14").val();
        var fono = $("#phone-c7c6").val();

        if ( email == "" || name == "" || fono == ""){

            Swal.fire({
              title: 'Oops .. !',
              text: 'Por favor ingrese todos los campos',
              icon: 'error',
              confirmButtonText: 'Cerrar'
            });

            mostarBtn();

        }else{

            if(!isEmail(email)) {

                Swal.fire({
                  title: 'Oops .. !',
                  text: 'Por favor ingrese un email valido',
                  icon: 'error',
                  confirmButtonText: 'Cerrar'
                });

                mostarBtn();

            } else{


                  grecaptcha.ready(function () {

                    grecaptcha.execute(rec_v3_dite_key, {action: 'submit'}).then(function (token) {  


                        $.ajax({
                            data:   {
                                'name' : name,
                                'fono' : fono,
                                'email' : email,
                                'g-recaptcha-response' : token
                            }, 
                            url:   './include/registro.php', 
                            type:  'post', 
                           
                            success:  function (response) { 
                                   
                              
                              if ( response == "error"){

                                Swal.fire({
                                  title: 'Oops .. !',
                                  text: 'No es posible realizar el registro, por favor intentar mas tarde',
                                  icon: 'error',
                                  confirmButtonText: 'Cerrar'
                                });

                                mostarBtn();

                              }else{

                                Swal.fire({
                                  title: 'Gracias',
                                  text: 'Pronto un ejecutivo se contactará contigo.',
                                  icon: 'success',
                                  confirmButtonText: 'Cerrar'
                                });

                                $("#name-5a14").val("");
                                $("#email-5a14").val("");
                                $("#phone-c7c6").val("");

                                mostarBtn();

                              }
                                 
                                 
                            },
                            error: function(response) {

                                Swal.fire({
                                  title: 'Oops .. !',
                                  text: 'No es posible realizar el registro, por favor intentar mas tarde',
                                  icon: 'error',
                                  confirmButtonText: 'Cerrar'
                                });

                                mostarBtn();
                                 
                            }

                        });

                    });
                });

            }

        }

    });


});


function isEmail(email) {
  var EmailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return EmailRegex.test(email);
}

function mostarBtn()
{
    $('.btn-enviar').show();
    $('.load').css('display', 'none');

}