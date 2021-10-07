// fetch category
const constant = {
  url: "http://api.spicyrasoi.com/",
};
$(document).ready(function () {
  $("#btnAddCategory").click(function (e) {
    e.preventDefault();
    const category = $("#addCategoryInput").val();
    console.log("cate: " + category);
    if (category == null && category === "") {
      console.log($("#addCategoryInput").val());
      return;
    }

    $(document).ajaxSend(() => {
      $("#btnAddCategory").prop("disabled", true);
      $("#btnAddCategory").html("Processing...");
    });
    $.ajax({
      url: constant.url + "/category/add.php",
      method: "POST",
      data: JSON.stringify({
        admin: "2", //TODO: change with admin id
        category: category,
      }),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        // console.log(result.success);

        const json = result;
        if (json.success) swal("Good Job", "New Category Created", "success");
        else swal({ title: "Error Occured", text: json.error, icon: "error" });
        console.info(json.success);
        // $("#btnAddCategory").attr("disabled");
        $("#btnAddCategory").html("Submit");
      },
    });
    $(document).ajaxError((res) => {
      console.error(res);

      $("#btnAddCategory").attr("disabled", false);
      $("#btnAddCategory").html("Submit");
    });
    $(document).ajaxComplete((res) => {
      $("#btnAddCategory").attr("disabled", false);
      $("#btnAddCategory").html("Submit");
    });
  });
  // add product
  $("#addProductSubmit").click(function (e) {
    e.preventDefault();
    // alert();
    const product = $("#productName").val();
    const category = $("#dropdownCategory").val();
    const storePrice = $("#productStorePrice").val(); //("#addCategoryInput").val();
    const localPrice = $("#localPrice").val(); //("#addCategoryInput").val();
    const swiggyPrice = $("#productSwiggyPrice").val(); //("#addCategoryInput").val();
    const zomatoPrice = $("#productZomatoPrice").val(); //("#addCategoryInput").val();
    const gstProduct = $("#gstProduct").val();
    const hsnCode = $("#hsnCode").val();
    const discount = $("#productDiscount").val();
    const unitName = $("#productUnitName").val();

    if (category == null && category === "") return;

    $(document).ajaxSend(() => {
      $("#addProductSubmit").attr("disabled", true);
      $("#addProductSubmit").html("Processing...");
    });
    $.ajax({
      url: constant.url + "/product/add.php",
      method: "POST",
      data: JSON.stringify({
        product: product,
        category: category,
        discount: discount,
        gst: gstProduct,
        "unit-name": unitName,
        "hsn-code": hsnCode,
        "store-price": storePrice,
        "zomato-price": zomatoPrice,
        "swiggy-price": swiggyPrice,
        "local-price": localPrice,
      }),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        // console.log(result.success);

        const json = result;
        if (json.success) swal("Good Job", "New Product added", "success");
        else swal({ title: "Error Occured", text: json.error, icon: "error" });
        console.info(json.success);
        // $("#btnAddCategory").attr("disabled");
        $("#addProductSubmit").html("Submit");
      },
    });
    $(document).ajaxError((res) => {
      console.error(res);

      $("#addProductSubmit").attr("disabled", false);
      $("#addProductSubmit").html("Submit");
    });
    $(document).ajaxComplete((res) => {
      $("#addProductSubmit").attr("disabled", false);
      $("#addProductSubmit").html("Submit");
    });
  });

  console.log($("#dropdownCategory").val());
});
