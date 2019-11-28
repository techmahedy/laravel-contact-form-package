<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-offset-3 col-md-6">

<h1>Contact Us</h1>
<p id="txt"></p>
<p style="color:green; font-size: 20px;" id="success"></p>

 <form action="">

  <div class="form-group">
    <label for="name">Your name:</label>
    <input type="text" id="name" class="form-control" placeholder="Your name">
     <p class="name_error_text"></p>
  </div>

  <div class="form-group">
    <label for="pwd">Email:</label>
    <input type="email" id="email" class="form-control" placeholder="Your email">
     <p class="email_error_text"></p>
  </div>

   <div class="form-group">
    <label for="pwd">Subject:</label>
    <input type="text" id="subject" class="form-control" placeholder="Your subject">
    <p class="subject_error_text"></p>
  </div>

  <div class="form-group">
    <label for="pwd">Subject:</label>
    <textarea cols="30" id="message" rows="10" class="form-control"></textarea>
    <p class="message_error_text"></p>
  </div>

  <div class="checkbox">
    <label><input type="checkbox" id="status" value="1"> Send me a copy of this message ?</label>
  </div>

  <button type="submit" id="submit" class="btn btn-default">Submit</button>
</form>
 
            </div>
        </div>
    </div>
  
  <script type="text/javascript">

   $(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

     //Validation before submit
    $(".name_error_text").hide();
    $(".email_error_text").hide();
    $(".subject_error_text").hide();
    $(".message_error_text").hide();

    var error_name = false;
    var error_email = false;
    var error_subject = false;
    var error_message = false;

    $("#name").focusout(function () {
       check_name();
    });

    $("#email").focusout(function () {
       check_email();
    });
    
    $("#subject").focusout(function () {
       check_subject();
    });

    $("#message").focusout(function () {
       check_message();
    });


   function check_name(){
    $("#txt").hide(); 
    var name_length = $("#name").val().length;
    if(name_length == ''){
         $(".name_error_text").html("Name field is required");
         $(".name_error_text").show().css("color", "red");
         $("#txt").hide();
         return true;
      }else{
         $(".name_error_text").hide();
         return false;
      }
    }

    function check_email(){

          $("#txt").hide(); 
          var pattern = new RegExp(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/);

          if(pattern.test($("#email").val())){
             $(".email_error_text").hide(); 
             return false;      
          }else{
             $(".email_error_text").html("Invalid email address");
             $(".email_error_text").show().css("color", "red");
             return true;
          }
    }

    function check_subject(){
    $("#txt").hide(); 
    var subject_length = $("#subject").val().length;
    if(subject_length == ''){
         $(".subject_error_text").html("Subject field is required");
         $(".subject_error_text").show().css("color", "red");
         $("#txt").hide();
         return true;
      }else{
         $(".subject_error_text").hide();
         return false;
      }
    }

    function check_message(){
    $("#txt").hide(); 
    var name_length = $("#message").val().length;
    if(name_length < 10){
         $(".message_error_text").html("Message should be at least 10 characters ");
         $(".message_error_text").show().css("color", "red");
         $("#txt").hide();
         return true;
      }else{
         $(".message_error_text").hide();
         return false;
      }
    }

    //Submit Data
    $("#submit").click(function(e){

        e.preventDefault();
        console.log("click")

        var name = $("#name").val();
        var email = $("#email").val();
        var subject = $("#subject").val();
        var message = $("#message").val();
        var status = $("#status").val();

        var url = '{{ url('contact') }}';

        if (check_name() || check_email() || check_subject() || check_message()){

        check_name();
        check_email();
        check_subject();
        check_message();
       
        }else {
     
            $.ajax({

               url:url,
               method:'POST',
               data:{
                      name:name, 
                      email:email,
                      subject:subject,
                      message:message,
                      status:status
                    },
               success:function(response){

                 $("#success").html(response.status)

               },
            });
          }
       });
});
  
</script>

</body>
</html>