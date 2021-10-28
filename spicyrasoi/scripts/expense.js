// import constant from "./constant.js";
//add new category
$("#btnAddExpenseCategory").click(function (e) {
  e.preventDefault();
  const category = $("#addExpenseCategoryInput").val();
  console.log("cate: " + category);
  if (category == null && category === "") {
    console.log($("#addExpenseCategoryInput").val());
    return;
  }

  $(document).ajaxSend(() => {
    $("#btnAddExpenseCategory").prop("disabled", true);
    $("#btnAddExpenseCategory").html("Processing...");
  });
  $.ajax({
    url: constant.url + "/expense/add.php",
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
      $("#btnAddExpenseCategory").html("Submit");
    },
  });
  $(document).ajaxError((res) => {
    console.error(res);

    $("#btnAddExpenseCategory").attr("disabled", false);
    $("#btnAddExpenseCategory").html("Submit");
  });
  $(document).ajaxComplete((res) => {
    $("#btnAddExpenseCategory").attr("disabled", false);
    $("#btnAddExpenseCategory").html("Submit");
  });
});

//add new category
$("#btnAddSubExpense").click(function (e) {
  e.preventDefault();
  const category = $("#addSubExpenseID").val();
  const amount = $("#addSubExpenseAmount").val();
  const remarks =
    $("#addSubExpenseRemarks").val() != null
      ? $("#addSubExpenseRemarks").val()
      : "";
  //   console.log("cate: " + category);
  if (category == null && amount === "") {
    // console.log($("#addExpenseCategoryInput").val());
    return;
  }
  var btntext = $("#btnAddSubExpense").html();

  $(document).ajaxSend(() => {
    $("#btnAddSubExpense").prop("disabled", true);
    $("#btnAddSubExpense").html("Processing...");
  });
  $.ajax({
    url: constant.url + "/expense/subadd.php",
    method: "POST",
    data: JSON.stringify({
      admin_id: admin_id,
      restaurant: restaurant,
      remarks: remarks,
      amount: amount,
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
      $("#btnAddSubExpense").html(btntext);
    },
  });
  $(document).ajaxError((res) => {
    console.error(res);

    $("#btnAddSubExpense").attr("disabled", false);
    $("#btnAddSubExpense").html(btntext);
  });
  $(document).ajaxComplete((res) => {
    $("#btnAddSubExpense").attr("disabled", false);
    $("#btnAddSubExpense").html(btntext);
  });
});
