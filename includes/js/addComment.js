var data;
$("#addComment").on("submit", function (e) {
  e.preventDefault();
  data = $(this).serializeArray();
  sendData();
});
function sendData() {
  $.ajax({
    url: "http://localhost/bloggy_php/addComment.php ",
    data: data,
    type: "POST",
    success: function (response) {
      $("#results").html(response);
      $("#addComment")[0].reset();
    },
    error: function () {
      $("#results").html(
        "<div class='alert alert-danger'>error! try another time</div>"
      );
    },
  });
}
