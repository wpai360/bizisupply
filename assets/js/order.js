// Remove product
$("body").on('click', '.removeOutdoor', function() {
  var curRow = $(this).parents('div.add-row-outdoor');
  curRow.remove();
  n--;
  $('.productCount').text("you can add " + (11 - n) + " more products");
});


$('.cancel').click(function() {
  var checkstr = confirm('are you sure you want to cancel this?');
  if (checkstr == true) {
    // do your code
  } else {
    return false;
  }
});

//restore camera image
$("#image1").click(function() {
  document.getElementById("1").value = null;
  $("#cu1").attr("src",domain + "Hawkiweb/assets/images/camera.png");
});
$("#image2").click(function() {
  document.getElementById("2").value = null;
  $("#cu2").attr("src",domain + "Hawkiweb/assets/images/camera.png");
});
$("#image3").click(function() {
  document.getElementById("3").value = null;
  $("#cu3").attr("src",domain + "Hawkiweb/assets/images/camera.png");
});
$("#image4").click(function() {
  document.getElementById("4").value = null;
  $("#cu4").attr("src",domain + "Hawkiweb/assets/images/camera.png");
});
$("#image5").click(function() {
  document.getElementById("5").value = null;
  $("#cu5").attr("src",domain + "Hawkiweb/assets/images/camera.png");
});
$("#image6").click(function() {
  document.getElementById("6").value = null;
  $("#cu6").attr("src",domain + "Hawkiweb/assets/images/camera.png");
});
$("#image7").click(function() {
  document.getElementById("7").value = null;
  $("#cu7").attr("src",domain + "Hawkiweb/assets/images/camera.png");
});
$("#image8").click(function() {
  document.getElementById("8").value = null;
  $("#cu8").attr("src",domain + "Hawkiweb/assets/images/camera.png");
});
$("#image9").click(function() {
  document.getElementById("9").value = null;
  $("#cu9").attr("src",domain + "Hawkiweb/assets/images/camera.png");
});
$("#image10").click(function() {
  document.getElementById("10").value = null;
  $("#cu10").attr("src",domain + "Hawkiweb/assets/images/camera.png");
});



function getcategory(elem, order_name, category, product_assign_category) {

  order_namestr = order_name.replace(/[_]/g, " ");
  categorystr = category.replace(/[_]/g, " ");

  $(elem).parent().prev().prev().val(order_namestr);
  $('.rg').hide();
}
$(function() {
  $('input[type=file]').change(function() {
    var val = $(this).val();
    switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
      case 'jpg':
      case 'png':
        showimagepreview(this);
        break;
      case 'gif':
      case 'jpeg':
        showimagepreview(this);
        break;
      default:
        $('#errorimg').html("Invalid Photo");
        break;
    }
  });

  function showimagepreview(input) {
    if (input.files && input.files[0]) {
      var filerdr = new FileReader();
      filerdr.onload = function(e) {
        $('#cu' + input.id).attr('src', e.target.result);
        $('#pop' + input.id).attr('src', e.target.result);
      };
      filerdr.readAsDataURL(input.files[0]);
    }
  }
});

//Preview function
$('#Preview').click(function() {
  $(".previewBorder").empty();
  $(".bn").text("");
  $('.pr').text("");
  $('.pn').text("");
  $('.qt').text("");
  $('.nt').text("");
  $('#dt').text("");
  $('#de').text("");
  $('#ct').html("");

  var Category = $("#Category").val();
  var prefer_delivery_date = $('#prefer_delivery_date').val();
  var description = $('#description').val();
  var Category1 = $("#Category option:selected").text();

  var valid;

  var today = new Date();
  var date = today.getFullYear() + '-' + ("0" + (today.getMonth() + 1)) + '-' + today.getDate();

  let d1 = Date.parse(date);
  let d2 = Date.parse(prefer_delivery_date);

  if (prefer_delivery_date == "") {

    $('.abc').attr('data-target', '');
    $('#dt').text("Prefer delivery date field is required");
    valid = false;

  };

  // d1 today, d2 prefer date
  if (d1 > d2) {
    $('.abc').attr('data-target', '');
    $('#dt').text("Please select a date after or equal today");
    valid = false;
  }


  if (description == "") {

    $('.abc').attr('data-target', '');
    $('#de').text("Description field is required");
    valid = false;
  }
  if (Category1 == "" || Category1 == null) {

    $('.abc').attr('data-target', '');
    $('#ct').text("Category field is required");
    valid = false;
  }

  for (var z = 1; z < 11; z++) {
    let c = z - 1;
    if ($('#product_' + z).val() == '') {
      $('.abc').attr('data-target', '');
      $('.pr').eq(c).text("Product name is required");
      valid = false;
    }

    if ($('#brand_name_' + z).val() == '') {
      $('.abc').attr('data-target', '');
      $(".bn").eq(c).text("Brand name is required");
      valid = false;
    }

    if ($('#partNumber_' + z).val() == '') {
      $('.abc').attr('data-target', '');
      $('.pn').eq(c).text("id/serial/model no. is required");
      valid = false;
    }

    if ($('#quantity_' + z).val() == '') {
      $('.abc').attr('data-target', '');
      $('.qt').eq(c).text("Quantity field is required");
      valid = false;
    }

  }



  if (valid !== false) {
    let j = 1;
    var productCount = $('.product').length;
    for (var i = 0; i < 11; i++) {
      if ($(".product").eq(i).val() != undefined) {

        var newProductPreview = "<label for='state' class='control-label'>Product " + j + "</label><label for='state' class='control-label'>Product Name</label><div class='sg-select-container' id='pname_" + j + "' >" + "</div> <label for='state' class='control-label'>Brand Name</label><div class='sg-select-container' id='bname_" + j + "' >" + "</div><label for='state' class='control-label'>id/serial/model no.</label><div class='sg-select-container' id='partname_" + j + "' >" + "</div> <label for='state' class='control-label'>Quantity</label><div class='sg-select-container' id='q_" + j + "' >" + "</div> " + "<label for='state' class='control-label'>Note</label><div class='sg-select-container' id='noteP_" + j + "' >" + "</div> ";
        var newPreview = $('<div class="border-bottom">' + newProductPreview + '</div>');
        //$(".row-outdoor-container").attach(newTxt);
        $(".previewBorder").append($(newPreview));
        $('#pname_' + j).text($("#product_" + j).val());
        $('#bname_' + j).text($("#brand_name_" + j).val());
        $('#partname_' + j).text($("#partNumber_" + j).val());
        $('#q_' + j).text($("#quantity_" + j).val());
        $('#noteP_' + j).text($("#note_" + j).val());
        j++;
      }
    }


    $('#cate').text(Category1);
    $('#date').text(prefer_delivery_date);
    $('#dis').text(description);
    $('.abc').attr('data-target', '#myModal');
  }


});

function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});



// search feature
$(document).on('keyup', '.product', function(e) {

  const search = $(this).next().next();

  $.ajax({
    type: "GET",
    url: domain + 'Hawkiweb/buyer/product/Category',
    data: {
      Category1: $(this).val()
    },
    error: function() {
      alert('Something is wrong');
    },
    success: function(data) {
      $(search).html(data);
    }
  });

  return false;
});

$(document).ready(function() {
  $("#masterTable").DataTable({});
});
