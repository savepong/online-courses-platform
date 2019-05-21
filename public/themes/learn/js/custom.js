	function checkTexts(str,obj){  
	    var orgi_text="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789 ";  
	    var str_length=str.length;  
	    var str_length_end=str_length-1;  
	    var iseng=true;  
	    var Char_At="";  
	    for(i=0;i<str_length;i++){  
	        Char_At=str.charAt(i);  
	        if(orgi_text.indexOf(Char_At)==-1){  
	            iseng=false;  
	        }     
	    }  
	    if(str_length>=1){  
	        if(iseng==false){  
	            obj.value=str.substr(0,str_length_end);  
	        }  
	    }  
	    return iseng; 
	}
	$('input[name="email"]').on('change', function() {
        var email = $(this).val();
        var filter = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/igm;
        if (filter.test(email)) {
            $('.msgs').html("A valid email address!").addClass('email_success').removeClass('email_error');
        } else if (!filter.test(email)) {
            alert('Email Not Valid')
            $('#email').val('').focus() 
        }
    });


    $('#register-password, #register-re-password').keyup(checkPasswordMatch);
    function checkPasswordMatch() {
        var password = $('#register-password').val();
        var re_password = $('#register-re-password').val();

        if (password != re_password) {
            $('#register-password').addClass('border-red');
            $('#register-re-password').addClass('border-red');
        } else {
            $('#register-password').removeClass('border-red');
            $('#register-re-password').removeClass('border-red');
        }
    }

    var typingTimer;              //timer identifier
    var doneTypingInterval = 50;  //time in ms (5 seconds)
    var dataUnique = '';
    var type = '';



    $('#username').blur(checkUsername)
                            

    function checkUsername() {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(checkuser, doneTypingInterval);
    }

    function checkuser() {

        var username = $('#username').val();
        $.ajax({
            type: "POST",
            url: url + 'session/ajax',
            data: {
                username: username
            },
            beforeSend: function() {
              $("#pageloader").show();
            },
            success: function(data) {
             $("#pageloader").hide();
                if(data == true){
                    $('#username').focus()  
                    	alert('Username นี้ถูกใช้แล้ว')
                    $('#username').val('')
                }
            }
        });
    }

    $('#email').blur(checkEmail)
                            

    function checkEmail() {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(checkemail, doneTypingInterval);
    }

    function checkemail() {

        var email = $('#email').val();
        if(email != ''){
            $.ajax({
                type: "POST",
                url: url + 'session/ajax',
                data: {
                    email: email
                },
                beforeSend: function() {
                  $("#pageloader").show();
                },
                success: function(data) {
                 $("#pageloader").hide();
                    if(data == true){
                        $('#email').focus()  
                        	alert('Email นี้ถูกใช้แล้ว')
                        $('#email').val('')
                    }
                }
            });
        }
    }

    $('#regisSubmit').on('click', function() {
        var password = $('#register-password').val();
        var re_password = $('#register-re-password').val();
        var username = $('#username').val();
        var email = $('#email').val();

        if( password != re_password || username == '' || password == '' || re_password == '' || email == ''){
            alert('ท่านกรอกข้อมูลไม่ถูกต้อง');
        }else{
           	$('#signupForm').submit();
        }
    });


    $('#signinSubmit').on('click', function() {
        var signinUsername = $('#signinUsername').val();
        var signinPassword = $('#signinPassword').val();

        $.ajax({
            type: "POST",
            url: url + 'session/checklogin',
            data: {
                username: signinUsername,
                password: signinPassword
            },
            beforeSend: function() {
              $("#pageloader").show();
            },
            success: function(data) {
            console.log(data);
             $("#pageloader").hide();
                if(data == true){
                    $('#signinUsername').focus()  
                    alert('Username หรือ Password ไม่ถูกต้อง');
                    $('#signinUsername').val('')
                    $('#signinPassword').val('')
                }else{
                    window.location.href = url + nextPage
                }
            }
        });
        
    });

    $("#signinUsername, #signinPassword").on('keyup', function (e) {
        if (e.keyCode == 13) {
            $('#signinSubmit').trigger('click');
        }
    });