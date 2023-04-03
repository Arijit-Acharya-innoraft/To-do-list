// $(document).ready(function(){
  $("#button").click(function(){
    var inputValue = $("#exampleFormControlInput1").val();
    if((inputValue.trim()).length >0){
      $(".post-section").load("post.php",{text:inputValue}, function(responseTxt, statusTxt, xhr){
      });
    }
    $("#exampleFormControlInput1").val("");
  });

// });