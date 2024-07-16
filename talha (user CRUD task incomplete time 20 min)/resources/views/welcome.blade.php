<body>

<h1>Show Email Fields</h1>

<h3>Show an email field (allows only one email address):</h3>
<form>
  <label for="email">Enter your naem:</label>
  <input type="email" id="name" name="email">
</form>

<h3>Show an email field (allows multiple email addresses). Separate each email address with a comma:</h3>
<form>
  <label for="emails">Enter email:</label>
  <input type="email" id="email" name="emails" multiple>
  <input type="submit">
</form>

</body>

<script>
    $(document).ready(function () {
  $("form").submit(function (event) {
    var formData = {
      name: $("#name").val(),
      email: $("#email").val(),
      superheroAlias: $("#superheroAlias").val(),
    };

    $.ajax({
      type: "POST",
      url: "/create",
      data: formData,
      dataType: "json",
      encode: true,
    }).done(function (data) {
      console.log(data);
    });

    event.preventDefault();
  });
});
</script>
