$(function () {
    var current = 1,
        current_step,
        next_step,
        steps;
		
	//Hide Questionnaire forme:
	$('fieldset:eq(1)').hide();

    steps = $("fieldset").length;
    $(".next").on("click",function () {
        current_step = $(this).parent();
        next_step = $(this).parent().next();
        next_step.show();
        current_step.hide();
        
    });

    $(".previous").on("click",function () {
        current_step = $(this).parent();
        next_step = $(this).parent().prev();
        next_step.show();
        current_step.hide();
        
    });

    // Stor formulaire data :
    $(".submit").on("click",function () {
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url:"/store",
            type:"POST",
            data: $('#id-cv-Form').serialize(),

            success:function(response){
               modal.css('display' , "none");
                if(response.status == 'success') {
                    Swal.fire("oui!", "Email bien envoyee !", "success");
                   
                }
                else
                    Swal.fire("Non!", "Erreur d'envoi d'email !","error" );

            },
            error: function(error) {
                console.log(error);
            }
        });

    });
 });

   
 


