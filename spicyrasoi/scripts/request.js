// fetch category
const constant = {
  //url: "http://apis.spicyrasoi.com/",
  url: "http://localhost/projects/spicyrasoi/website/spicyrasoi/",
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
  // add restaurant
  $("#btnAddRestaurant").click(function (e) {
    e.preventDefault();
    // alert();
    const restaurant = {
      admin_id: admin_id,
      name: $("#rname").val() != null ? $("#rname").val() : "",
      mobile: $("#rmobile").val(),
      phone: $("#rphone").val(),
      email: $("#remail").val(), //("#addCategoryInput").val();
      gst: $("#rgst_no").val(),
      country: $("#rcountry").val(),
      state: $("#rstate").val(), //("#addCategoryInput").val();
      district: $("#rdistrict").val(), //("#addCategoryInput").val();
      city: $("#rcity").val(),
    };
    if (restaurant == null && restaurant.length == 0) return;

    $(document).ajaxSend(() => {
      $("#btnAddRestaurant").attr("disabled", true);
      $("#btnAddRestaurant").html("Processing...");
    });
    $.ajax({
      url: constant.url + "/restaurant/add.php",
      method: "POST",
      data: JSON.stringify(restaurant),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        // console.log(result.success);

        const json = result;
        if (json.success)
          swal("Good Job", "New Restaurant Created!!", "success");
        else swal({ title: "Error Occured", text: json.error, icon: "error" });
        console.info(json.success);
        // $("#btnAddCategory").attr("disabled");
        $("#btnAddRestaurant").html("Submit");
      },
    });
    $(document).ajaxError((res) => {
      console.error(res);

      $("#btnAddRestaurant").attr("disabled", false);
      $("#btnAddRestaurant").html("Submit");
    });
    $(document).ajaxComplete((res) => {
      $("#btnAddRestaurant").attr("disabled", false);
      $("#btnAddRestaurant").html("Submit");
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
    if ($("#restaurant").val() < 1) {
      swal("Make Sure", "you select correct restaurant", "info");
      return;
    }
    const user = {
      username: $("#username").val(),
      mobile: $("#mobile").val(),
      email: $("#email").val(),
      password: $("#password").val(),
      restaurant: $("#restaurant").val(),
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
    const urestaurant = {
      admin_id: admin_id,
      restaurant: restaurant,
      name: $("#name").val() != null ? $("#name").val() : "",
      mobile: $("#mobile").val(),
      phone: $("#phone").val(),
      email: $("#email").val(),
      gst: $("#gst_no").val(),
      country: $("#country").val(),
      state: $("#state").val(),
      district: $("#district").val(),
      city: $("#city").val(),
    };
    // console.log(urestaurant);
    // console.log("cate: " + user);
    if (urestaurant == "") {
      swal("Warning", "Please fill all field", "warning");
      return;
    }

    $(document).ajaxSend(() => {
      $("#btnUpdateProfile").prop("disabled", true);
      $("#btnUpdateProfile").html("Logining...");
    });
    $.ajax({
      url: constant.url + "/restaurant/update.php",
      method: "POST",
      data: JSON.stringify(urestaurant),
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
            location.reload();
            // $(location).prop("href", "./login.php");
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
  //add customer
  $("#btnAddCustomer").click(function (e) {
    e.preventDefault();
    const urestaurant = {
      admin_id: admin_id,
      restaurant: restaurant,
      name: $("#name").val() != null ? $("#name").val() : "",
      sex: $("#sex").val(),
      mobile: $("#mobile").val(),
      phone: $("#phone").val(),
      email: $("#email").val(), //("#addCategoryInput").val();
      gst: $("#gst_no").val(),
      country: $("#country").val(),
      state: $("#state").val(), //("#addCategoryInput").val();
      district: $("#district").val(), //("#addCategoryInput").val();
      city: $("#city").val(),
      pincode: $("#pincode").val(), //("#addCategoryInput").val();
      id_proof: $("#id_proof").val(), //("#addCategoryInput").val();
      whereto: $("#whereto").val(),
      wherefrom: $("#wherefrom").val(),
      checkin: $("#checkin").val(),
      checkout: $("#checkout").val(),
    };
    // console.log("cate: " + user);
    if (restaurant == "") {
      swal("Warning", "Please fill all field", "warning");
      return;
    }

    $(document).ajaxSend(() => {
      $("#btnAddCustomer").prop("disabled", true);
      $("#btnAddCustomer").html("Logining...");
    });
    $.ajax({
      url: constant.url + "/customer/add.php",
      method: "POST",
      data: JSON.stringify(urestaurant),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        console.log(result);

        const json = result;
        if (json.success)
          swal(
            "Good Job",
            "You have successfully added new Customer",
            "success",
            {
              buttons: ["Reload", "OK"],
            }
          ).then(() => {
            location.reload();
            // $(location).prop("href", "./login.php");
          });
        else swal({ title: "Error Occured", text: json.error, icon: "error" });
        console.info(json.success);
        // $("#btnAddCategory").attr("disabled");
        $("#btnAddCustomer").html("Submit");
      },
    });
    $(document).ajaxError((res) => {
      console.error(res);

      $("#btnAddCustomer").attr("disabled", false);
      $("#btnAddCustomer").html("Submit");
    });
    $(document).ajaxComplete((res) => {
      $("#btnAddCustomer").attr("disabled", false);
      $("#btnAddCustomer").html("Submit");
    });
  });
  //add short customer
  $("#btnAddShortCustomer").click(function (e) {
    e.preventDefault();
    const urestaurant = {
      admin_id: admin_id,
      restaurant: restaurant,
      name: $("#customer_name").val() != null ? $("#customer_name").val() : "",
      mobile: $("#customer_mob_no").val(),
    };
    // console.log("cate: " + user);
    if (restaurant == "") {
      swal("Warning", "Please fill all field", "warning");
      return;
    }

    $(document).ajaxSend(() => {
      $("#btnAddShortCustomer").prop("disabled", true);
      $("#btnAddShortCustomer").html("Logining...");
    });
    $.ajax({
      url: constant.url + "/customer/shortadd.php",
      method: "POST",
      data: JSON.stringify(urestaurant),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        console.log(result);

        const json = result;
        if (json.success) {
          products.customerName = json.data[0].user_name;
          products.customerID = json.data[0].user_id;
          swal(
            "Good Job",
            "You have successfully added new Customer",
            "success"
          );
          // $(location).prop("href", "./login.php");
        } else
          swal({ title: "Error Occured", text: json.error, icon: "error" });
        console.info(json.success);
        // $("#btnAddCategory").attr("disabled");
        $("#btnAddShortCustomer").html("Submit");
      },
    });
    $(document).ajaxError((res) => {
      console.error(res);

      $("#btnAddShortCustomer").attr("disabled", false);
      $("#btnAddShortCustomer").html("Submit");
    });
    $(document).ajaxComplete((res) => {
      $("#btnAddShortCustomer").attr("disabled", false);
      $("#btnAddShortCustomer").html("Submit");
    });
  });

  // add into product object
  $("#btnCustomerSelect").on("click", (e) => {
    e.preventDefault();
  });

  // add customer on genbill mobile no change
  $("#customer_mob_no").on("change", (e) => {
    console.log("changed");
    $.ajax({
      url: constant.url + "/customer/fetchwithmobile.php",
      method: "POST",
      data: JSON.stringify({
        restaurant: restaurant,
        mobile: $("#customer_mob_no").val(),
      }),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        console.log(result);
        // console.info(json.success);
        const json = result;
        if (json.success) {
          $("#customer_name").val(json.data[0].user_name);
          $("#btnCustomerSelect").prop("disabled", false);
          $("#btnAddShortCustomer").prop("disabled", true);
        } else $("#btnAddShortCustomer").prop("disabled", false);
        // $("#btnAddCategory").attr("disabled");
      },
    });
  });
});
