$(document).ready(function () {
  $(".form-check-input").click(function () {
    var filter = $(".select").val();
    var element = $(this).attr("id");
    var target_element = "#t-" + element;
    if (filter == 3) {
      if ($(target_element).css('text-decoration') == 'line-through') {
        $(target_element).css("text-decoration", "none");
      }
      else {
        $(target_element).css("text-decoration", "line-through");
      }
    }
    if (filter == 2) {
      $(".post-section").load("post.php", { wish: filter, id: element }, function (responseTxt, statusTxt, xhr) {

      });
    }
    if (filter == 1) {
      $("#pop-up").css("display", "flex");

      $("#pop-button").click(function () {
        $("#pop-up").css("display", "none");
        var editInp = $(".pop-inp").val();
        if ((editInp.trim()).length > 0) {
          $(".post-section").load("post.php", { edit: editInp, id: element }, function (responseTxt, statusTxt, xhr) {
          });
        }
      });

    }

  });
});