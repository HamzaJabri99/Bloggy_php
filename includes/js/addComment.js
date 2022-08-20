var data;
$("#addComment").on("submit", function (e) {
  e.preventDefault();
  var id = $("#article_id").val();
  data = $(this).serializeArray();
  data.push({ name: "article_id", value: id });
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
