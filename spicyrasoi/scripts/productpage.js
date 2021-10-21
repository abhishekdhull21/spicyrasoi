// fetch category
$(document).ready(function () {
  $.ajax({
    url: constant.url + "/category/fetch.php",
    method: "POST",
    data: JSON.stringify({ admin_id: admin_id, restaurant: restaurant }),
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
  //on gst select
  $("#gstProduct").on("change", () => {
    const gst = $("#gstProduct").val();
    const price = $("#productStorePrice").val();
    $("#gstlabel").attr("hidden", false);

    $("#priceAfterGST").html(parseInt(price) + (price * gst) / 100);
  });
  //on discount select
  $("#productDiscount").on("input", () => {
    const discount = $("#productDiscount").val();
    var price = $("#productStorePrice").val();
    const gst = (price * $("#gstProduct").val()) / 100;
    $("#discountlabel").attr("hidden", false);

    $("#priceAfterDiscount").html(
      gst + parseInt(price) - (price * discount) / 100
    );
  });
});
