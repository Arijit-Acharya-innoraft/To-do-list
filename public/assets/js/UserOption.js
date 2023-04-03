$(document).ready(function () {
  $(".form-check-input").click(function () {
    var filter = $(".select").val();
    var element = $(this).attr("id");
    var target_element = "#t-" + element;
    if (filter == 3) {
      if ($(target_element).css('text-decoration') == 'line-through solid rgb(33, 37, 41)') {
        var status ="undone";
        $(".post-section").load("post", { wish: filter, id: element, mark:status }, function (responseTxt, statusTxt, xhr) {
        });
      }
      else {
        var status ="done";
        $(".post-section").load("post", { wish: filter, id: element, mark:status }, function (responseTxt, statusTxt, xhr) {
        });
      }

    }
    if (filter == 2) {
      $(".post-section").load("post", { wish: filter, id: element }, function (responseTxt, statusTxt, xhr) {

      });
    }
    if (filter == 1) {
      if($("#pop-up").css("display")=="flex") {
        $("#pop-up").css("display", "none");
      }
      else{
        $("#pop-up").css("display", "flex");
        $("#pop-button").click(function () {
          var editInp = $(".pop-inp").val();
          if ((editInp.trim()).length > 0) {
            $(".post-section").load("post", { wish: filter,edit: editInp, id: element }, function (responseTxt, statusTxt, xhr) {
              if(statusTxt == "success")
              $("#pop-up").css("display", "none");
            });
          }
        });
      }
    }

  });
});


