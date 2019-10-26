
$(document).ready(function () {
    $("#login").on('click',function () {
        $('#form01 h3').html('Login');
        $("#action").val("login");
      });

    $('#register').on('click', function () {
        $("#form01 h3").html("Register");
        $("#action").val("register");
    });

     $('.menu-item').on('click', function () {
        // alert($(this).attr("data-target"))
        $('.helement').hide();
        var target = " #"+$(this).data("target");
        // console.log(target);
        $(target).show();
        
        
     });

     $("#alphabets").on('change',function(){
       var char = $(this).val().toLowerCase();

       if('all' == char){
         $(".words tr").show();
         return true;
       }

       $(".words tr:gt(0)").hide();

       $(".words td").filter(function(){
         return $(this).text().toLowerCase().indexOf(char)==0;
       }).parent().show();
      // var word = $(".words td").filter(function(){
      //   if ($(this).text().toLowerCase().indexOf(char)==0){
      //      return $(this).parent();
      // }});
      // console.log(word);
     })

 

});