// fetch category
const constant = {
  url: "http://api.spicyrasoi.com/",
};
$(document).ready(function () {
  //add new category
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

  //login userAgent
  $("#btnLogin").click(function (e) {
    e.preventDefault();

    const mobile = $("#mobile").val();
    const password = $("#password").val();
    console.log("cate: " + mobile);
    if (mobile == "" || password == "") {
      alert("Please fill all field");
    }

    $(document).ajaxSend(() => {
      $("#btnLogin").prop("disabled", true);
      $("#btnLogin").html("Logining...");
    });
    $.ajax({
      url: constant.url + "/user/fetch.php",
      method: "POST",
      data: JSON.stringify({
        mobile: mobile,
        password: password,
      }),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        console.log(result);

        const json = result;
        if (json.success) $(location).prop("href", "../../index.php");
        else swal({ title: "Error Occured", text: json.error, icon: "error" });

        // $("#btnAddCategory").attr("disabled");
        $("#btnLogin").html("Login");
      },
    });
    $(document).ajaxError((res) => {
      console.error(res);

      $("#btnLogin").attr("disabled", false);
      $("#btnLogin").html("Submit");
    });
    $(document).ajaxComplete((res) => {
      $("#btnLogin").attr("disabled", false);
      $("#btnLogin").html("Submit");
    });
  });

  //register userAgent
  $("#btnRegister").click(function (e) {
    e.preventDefault();
    const user = {
      username: $("#username").val(),
      mobile: $("#mobile").val(),
      email: $("#mobile").val(),
      password: $("#password").val(),
    };
    // console.log("cate: " + user);
    if (
      user.mobile == "" ||
      user.password == "" ||
      user.email == "" ||
      user.username == ""
    ) {
      swal("Warning", "Please fill all field", "warning");
      return;
    }

    $(document).ajaxSend(() => {
      $("#btnRegister").prop("disabled", true);
      $("#btnRegister").html("Logining...");
    });
    $.ajax({
      url: constant.url + "/user/add.php",
      method: "POST",
      data: JSON.stringify(user),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        console.log(result);

        const json = result;
        if (json.success)
          swal("Good Job", "You have successfully created account", "success", {
            button: true,
          }).then(() => {
            $(location).prop("href", "./login.php");
          });
        else swal({ title: "Error Occured", text: json.error, icon: "error" });
        console.info(json.success);
        // $("#btnAddCategory").attr("disabled");
        $("#btnRegister").html("Submit");
      },
    });
    $(document).ajaxError((res) => {
      console.error(res);

      $("#btnRegister").attr("disabled", false);
      $("#btnRegister").html("Submit");
    });
    $(document).ajaxComplete((res) => {
      $("#btnRegister").attr("disabled", false);
      $("#btnRegister").html("Submit");
    });
  });
});
