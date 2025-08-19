$(document).ready(function(){
    
    (function($) {
        "use strict";

    
    jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value)
    }, "type the correct answer -_-");

    // validate contactForm form
    $(function() {
        $('#contactForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                subject: {
                    required: true,
                    minlength: 4
                },
                number: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    required: true,
                    minlength: 20
                }
            },
            messages: {
                name: {
                    required: "Введите имя",
                    minlength: "Слишком короткое имя"
                },
                               
                email: {
                    required: "Введите емейл"
                },
                message: {
                    required: "Заполните сообщение",
                    minlength: "Слишком короткое сообщение"
                }
            },
            submitHandler: function(form) {
                $(form).ajaxSubmit({
                    type:"POST",
                    data: $(form).serialize(),
                    url:"/app/post/handle",
                    success: function($data) {
                        console.log($data);
                        $('#response').addClass("text-success");
                         $('#contactForm').hide();
                        $('#response').text('Сообщение добавлено.');
                        setTimeout(() => {
                                window.location.href = '/app/';
                            }, 1500);
                    },
                    error: function($e) {
                      console.log($e);
                        $('#response').addClass("text-danger");
                        $('#response').text('Ошибка!');

                    }
                })
            }
        })
    })
        
 })(jQuery)
})