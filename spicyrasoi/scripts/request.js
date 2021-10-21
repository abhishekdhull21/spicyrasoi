// fetch category
const constant = {
  url: "http://api.spicyrasoi.com/",
  // url: "http://localhost/projects/spicyrasoi/website/spicyrasoi/",
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
        admin_id: admin_id,
        restaurant: restaurant,
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
  //add new Subcategory
  $("#btnAddSubCategory").on("click", function (e) {
    e.preventDefault();
    const title = $("#addSubCategoryInput").val();
    const category = $("#cat_id").val();
    // console.log("cate: " + category);
    if (category == null && category === "") {
      console.log($("#addSubCategoryInput").val());
      return;
    }

    $(document).ajaxSend(() => {
      $("#btnAddSubCategory").prop("disabled", true);
      $("#btnAddSubCategory").html("Processing...");
    });
    $.ajax({
      url: constant.url + "/category/subadd.php",
      method: "POST",
      data: JSON.stringify({
        admin_id: admin_id,
        title: title,
        restaurant: restaurant,
        category: category,
      }),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        // console.log(result.success);

        const json = result;
        if (json.success)
          swal("Good Job", "New Sub-Category Created", "success");
        else swal({ title: "Error Occured", text: json.error, icon: "error" });
        console.info(json.success);
        // $("#btnAddCategory").attr("disabled");
        $("#btnAddSubCategory").html("Submit");
      },
    });
    $(document).ajaxError((res) => {
      console.error(res);

      $("#btnAddSubCategory").attr("disabled", false);
      $("#btnAddSubCategory").html("Submit");
    });
    $(document).ajaxComplete((res) => {
      $("#btnAddSubCategory").attr("disabled", false);
      $("#btnAddSubCategory").html("Submit");
    });
  });
  //load Subcategory on change category
  $("#dropdownCategory").on("change", function (e) {
    e.preventDefault();
    const category = $("#dropdownCategory").val();
    // const category = $("#cat_id").val();

    $.ajax({
      url: constant.url + "/category/subfetch.php",
      method: "POST",
      data: JSON.stringify({
        category: category,
        admin_id: admin_id,
        restaurant: restaurant,
      }),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        // console.log(result.success);
        const json = result;
        $("#dropdownSubCategory").children().remove();
        if (json.success) {
          json.data.map((d, i) => {
            var option = "<option value='" + d.id + "'>" + d.name + "</option>";
            $("#dropdownSubCategory").append(option);
          });
        } else {
          var option = "<option value='0'> No Sub-Category </option>";
          $("#dropdownSubCategory").append(option);
          swal({ title: "Error Occured", text: json.error, icon: "error" });
        }
      },
    });
  });
  // add product
  $("#addProductSubmit").click(function (e) {
    e.preventDefault();
    // alert();
    const product = $("#productName").val();
    const category = $("#dropdownCategory").val();
    const subcategory = $("#dropdownSubCategory").val();
    const storePrice = $("#productStorePrice").val(); //("#addCategoryInput").val();
    const localPrice = $("#localPrice").val(); //("#addCategoryInput").val();
    const gst_type = $("#gst_type").val();
    const food_type = $("#food_type").val();
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
        admin_id: admin_id,
        restaurant: restaurant,
        category: category,
        subcategory: subcategory,
        discount: discount,
        gst: gstProduct,
        gst_type: gst_type,
        food_type: food_type,
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
        if (json.success) {
          localStorage.setItem("token", json.token);
          $(location).prop("href", "../index.php?user=" + result["token"]);
        } else
          swal({ title: "Error Occured", text: json.error, icon: "error" });

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
      email: $("#email").val(),
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

  //Update Profile
  $("#btnUpdateProfile").click(function (e) {
    e.preventDefault();
    const user = {
      username: $("#username").val(),
      mobile: $("#mobile").val(),
      sex: $("#sex").val(),
      address: $("#address").val(),
    };
    // console.log("cate: " + user);
    if (user.mobile == "" || user.username == "") {
      swal("Warning", "Please fill all field", "warning");
      return;
    }

    $(document).ajaxSend(() => {
      $("#btnUpdateProfile").prop("disabled", true);
      $("#btnUpdateProfile").html("Logining...");
    });
    $.ajax({
      url: constant.url + "/user/update.php",
      method: "POST",
      data: JSON.stringify(user),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        console.log(result);

        const json = result;
        if (json.success)
          swal(
            "Good Job",
            "You have successfully updated your profile",
            "success",
            {
              button: true,
            }
          ).then(() => {
            $(location).prop("href", "./login.php");
          });
        else swal({ title: "Error Occured", text: json.error, icon: "error" });
        console.info(json.success);
        // $("#btnAddCategory").attr("disabled");
        $("#btnUpdateProfile").html("Submit");
      },
    });
    $(document).ajaxError((res) => {
      console.error(res);

      $("#btnUpdateProfile").attr("disabled", false);
      $("#btnUpdateProfile").html("Submit");
    });
    $(document).ajaxComplete((res) => {
      $("#btnUpdateProfile").attr("disabled", false);
      $("#btnUpdateProfile").html("Submit");
    });
  });
});
