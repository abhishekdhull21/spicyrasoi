// // fetch category

// $(document).ready(function () {
//   $.ajax({
//     url: constant.url + "/product/fetch.php",
//     method: "POST",

//     contentType: "application/json",
//     dataType: "json",
//     success: function (result) {
//       // console.log(result.success);

//       const json = result;
//       console.log(json);
//       if (json.success) {
//         $("#allProductTable").remove();
//         $.each(json.data, (i, d) => {
//           //   j = $.parseJSON(d);
//           console.log(d.product_name);
//           var html = '<tr class="odd">';
//           html += '<td class="dtr-control">' + i + "</td>";
//           html += '<td class="sorting_1">' + d.product_name + "</td>";
//           html += "<td>" + d.category + "</td>";
//           //     html += '<td><?php echo $user['store_price']; ?></td>'
//           //     html += '<td><?php echo $user['swiggy_price']; ?></td>'
//           //     html += '<td><?php echo $user['zomato_price']; ?></td>'
//           //     html += '<td><?php echo $user['local_price']; ?></td>'
//           //     html += '<td><?php echo $user['gst']; ?></td>'
//           //     html += '<td><?php echo $user['discount']; ?></td>'
//           //     html += '<td><?php echo $user['unit_name']; ?></td>'
//           //   html += '<td><?php echo $user['hsn_code']; ?></td>';
//           //   h         <i class="fas fa-trash">                    </i>                    Delete                  </a>                  <a class="btn btn-info btn-sm" href="#">                    <i class="fas fa-pencil-alt">                    </i>                    Edit                  </a>                </td>'tml += '<td>                  <a class="btn btn-danger btn-sm" href="#">           ;
//           html += "</tr>";
//           $("#allProductTable").append(html);
//         });
//       }

//       console.info(json.success);
//     },
//   });
//   $(document).ajaxError((res) => {
//     console.error(res);
//     swal({ title: "Error Occured", text: res, icon: "error" });
//   });
// });
$(document).ready(function () {
  var json;
  $.ajax({
    url: constant.url + "/product/fetch.php",
    method: "POST",

    contentType: "application/json",
    dataType: "json",
    success: function (result) {
      console.log(result.success);
      if (result.success) {
        json = result.data;
        $("#example1").DataTable({
          data: json,
          paging: true,
          destroy: true,
          "autoWidth": false,
          searching: false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
          columns: [
            { data: "product_name" },
            { data: "store_price" },
            { data: "swiggy_price" },     
            { data: "zomato_price" },
            { data: "local_price" },
            { data: "gst_type"},
            { data: "food_type"},
            { data: "gst" },
            { data: "discount" },
            { data: "unit_name" },
            { data: "hsn_code" },
          ],
        });
      }
    },
  });
});
