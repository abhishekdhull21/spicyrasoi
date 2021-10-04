// fetch category

$(document).ready(function () {
  $.ajax({
    url: constant.url + "/category/fetch.php",
    method: "POST",

    contentType: "application/json",
    dataType: "json",
    success: function (result) {
      // console.log(result.success);

      const json = result;
      if (json.success) {
        $.each(json.data, (i, d) => {
          //   j = $.parseJSON(d);

          $("#dropdownCategory").append(
            "<option value=" + d.cat_id + " >" + d.cat_name + "</option>"
          );
        });
      }

      console.info(json.success);
      // $("#btnAddCategory").attr("disabled");
      $("#btnAddCategory").html("Submit");
    },
  });
  $(document).ajaxError((res) => {
    console.error(res);
    swal({ title: "Error Occured", text: res, icon: "error" });
  });
});
