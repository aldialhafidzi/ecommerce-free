function readURLMasterImage1(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    // $('#my_proof_payment').removeClass('jangan-muncul');
    reader.onload = function (e) {
      $('#img_p1')
        .attr('src', e.target.result)

        ;
    };
    reader.readAsDataURL(input.files[0]);
  }
}

function readURLMasterImage2(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    // $('#my_proof_payment').removeClass('jangan-muncul');
    reader.onload = function (e) {
      $('#img_p2')
        .attr('src', e.target.result)

        ;
    };
    reader.readAsDataURL(input.files[0]);
  }
}

function readURLMasterImage3(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    // $('#my_proof_payment').removeClass('jangan-muncul');
    reader.onload = function (e) {
      $('#img_p3')
        .attr('src', e.target.result)

        ;
    };
    reader.readAsDataURL(input.files[0]);
  }
}


var base_url = 'http://localhost/e-cap/';

function countdown(endDate) {
  var days, hours, minutes, seconds;

  endDate = new Date(endDate).getTime();

  if (isNaN(endDate)) {
    return;
  }

  setInterval(calculate, 1000);

  function calculate() {
    var startDate = new Date();
    startDate = startDate.getTime();

    var timeRemaining = parseInt((endDate - startDate) / 1000);

    if (timeRemaining >= 0) {
      days = parseInt(timeRemaining / 86400);
      timeRemaining = (timeRemaining % 86400);

      hours = parseInt(timeRemaining / 3600);
      timeRemaining = (timeRemaining % 3600);

      minutes = parseInt(timeRemaining / 60);
      timeRemaining = (timeRemaining % 60);

      seconds = parseInt(timeRemaining);
      console.log('days' + parseInt(days, 10));
      console.log('hourse' + ("0" + hours).slice(-2));
      console.log('minutes' + ("0" + minutes).slice(-2));
      console.log('seconds' + ("0" + seconds).slice(-2));
      var format_time = parseInt(days, 10) + ' Days : ' + ("0" + hours).slice(-2) + ' Hours : ' + ("0" + minutes).slice(-2) + ' Minutes : ' + ("0" + seconds).slice(-2) + ' Seconds';
      $('#time_left_payment').html(format_time);
    } else {
      return;
    }
  }
}


$(document).ready(function () {

  $('.change_password_admin').on('click', function () {
    $('.overlay_admin').fadeIn();
    $('#user_id_cp').val($(this).attr('id'));
  });

  $('.delete_data_admin').on('click', function () {
    $('.overlay_admin').fadeIn();
    $('#hapus_data_id').val($(this).attr('id'));
    $('#form_hapus_data').attr('action', base_url + 'admin/deleteadmin');
  });

  $('.edit_data_admin').on('click', function () {
    $('.overlay_admin').fadeIn();
    $('#modal_adminLabel').html('Edit Admin');
    $('#form_admin').attr('action', base_url + 'admin/updateadmin');
    var user_id = $(this).attr('id');
    $.ajax({
      url: base_url + 'admin/detailadmin',
      method: 'POST',
      data: { 'user_id': user_id },
      dataType: 'JSON',
      success: function (data) {
        $('#u_uname').val(data[0].username);
        $('#u_name').val(data[0].name);
        $('#u_phone').val(data[0].phone_number);
        $('#u_email').val(data[0].email);
        $('#u_access').val(data[0].access_id);
        $('#u_id').val(data[0].id);
        $('#form_password').html('');
      }
    });
  });

  $('#btn_createAdmin').on('click', function () {
    $('.overlay_admin').fadeIn();
    $('#form_admin')[0].reset();
    $('#modal_adminLabel').html('Create Admin');
    $('#form_admin').attr('action', '');
    var form_password = '<div class="col-sm-6"><label class="s-text7 p-l-15" for="">Password</label><div class="col-sm-12 m-b-20"><div class="bo4 size15"><input required class="form-control sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="password" id="u_password" name="u_password" placeholder="Write a password ..."><div class="invalid-feedback">Please write a password ...</div></div><?= form_error("u_password"); ?></div></div><div class="col-sm-6"><label class="s-text7 p-l-15" for="">Re-Type Password</label><div class="col-sm-12 m-b-20"><div class="bo4 size15"><input required class="form-control sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="password" id="u_rpassword" name="u_rpassword" placeholder="Write again a password ..."><div class="invalid-feedback">Please re-type a password ...</div></div><?= form_error("u_rpassword"); ?></div></div>';
    $('#form_password').html(form_password);
  });

  $('.detail_data_user').on('click', function () {
    $('.overlay_admin').fadeIn();
    var user_id = $(this).attr('id');
    $.ajax({
      url: base_url + 'admin/detailuser',
      method: 'POST',
      data: { 'user_id': user_id },
      dataType: 'JSON',
      success: function (data) {
        $('#u_name').val(data[0].u_name);
        $('#u_email').val(data[0].email);
        $('#u_phone').val(data[0].phone_number);

        var list_address = '';

        var i = 1;
        $.each(data, function (index, value) {
          list_address = list_address + '<div class="col-sm-6 s-text7 "><label class="s-text7" for="">Address ' + i + '</label><div class="col-sm-12" style=" border-radius : 1%; border: solid 1px #42b549; min-height : 80px;"><div class="row p-b-15"><div class="col-sm-12"><strong>' + data[index].receipt_name + ' - ' + data[index].phone + '</strong></div><div class="col-sm-12">' + data[index].detail_address + '</div><div class="col-sm-12">' + data[index].district + ', ' + data[index].r_name + ', ' + data[index].p_name + ' - ' + data[index].postcode + '</div></div></div></div>';
          i++;
        });
        console.log(list_address);
        $('#list_address').html(list_address);

      }
    });
  });

  $('.hapus_data_user').on('click', function () {
    $('.overlay_admin').fadeIn();
    $('#hapus_data_id').val($(this).attr('id'));
    $('#form_hapus_data').attr('action', base_url + 'admin/deleteuser');
  });

  $('.lihat_detail').on('click', function () {
    var url = base_url + 'detailproduct/index/' + $(this).find('#product_id').val();
    window.location.href = url;
  });

  $('.hapus_data_product').on('click', function () {
    $('.overlay_admin').fadeIn();
    $('#form_hapus_data').attr('action', base_url + 'master/delete_product');
    $('#hapus_data_id').val($(this).attr('id'));
  });

  $('.add_product').on('click', function () {
    $('.overlay_admin').fadeIn();
    $('#modal_masterLabel').html('Add Product');
    $('#form_product').attr('action', '');
    $('#img_p1').attr('src', '');
    $('#img_p2').attr('src', '');
    $('#img_p3').attr('src', '');
  });

  $("#p_image1").change(function () {
    var file = this.files[0];
    var imagefile = file.type;
    var match = ["image/jpeg", "image/png", "image/jpg"];
    if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
      alert('Please select a valid image file (JPEG/JPG/PNG).');
      $("#p_image1").val('');
      return false;
    }
  });

  $("#p_image3").change(function () {
    var file = this.files[0];
    var imagefile = file.type;
    var match = ["image/jpeg", "image/png", "image/jpg"];
    if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
      alert('Please select a valid image file (JPEG/JPG/PNG).');
      $("#p_image3").val('');
      return false;
    }
  });

  $("#p_image2").change(function () {
    var file = this.files[0];
    var imagefile = file.type;
    var match = ["image/jpeg", "image/png", "image/jpg"];
    if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
      alert('Please select a valid image file (JPEG/JPG/PNG).');
      $("#p_image2").val('');
      return false;
    }
  });

  // $("#form_product").on('submit', function(e){
  //       e.preventDefault();
  //       $.ajax({
  //           type: 'POST',
  //           url: base_url+'master/updateProduct',
  //           data: new FormData(this),
  //           contentType: false,
  //           cache: false,
  //           processData:false,
  //           beforeSend: function(){
  //               $('.submit_form_master').attr("disabled","disabled");
  //               $('#form_product').css("opacity",".5");
  //           },
  //           success: function(msg){
  //               $('.statusMsg').html('');
  //               if(msg == '200OK'){
  //                   $('#form_product')[0].reset();
  //                   $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');
  //                   location.reload();
  //               }else{
  //                   $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
  //               }
  //               $('#fupForm').css("opacity","");
  //               $(".submit_form_master").removeAttr("disabled");
  //           }
  //       });
  //   });


  $('.edit_data_product').on('click', function () {
    $('.overlay_admin').fadeIn();
    // $('#form_add_product').attr('id', 'form_product');
    // $('#form_product').attr('action', '');
    var good_id = $(this).attr('id');
    $.ajax({
      url: base_url + 'master/detailproduct',
      method: 'POST',
      data: { 'good_id': good_id },
      dataType: 'JSON',
      success: function (data) {
        if (data[0].featured == "Y") {
          $('#p_featured').prop('checked', true);
        } else {
          $('#p_featured').prop('checked', false);
        }
        $('#p_name').val(data[0].p_name);
        $('#p_id').val(good_id);
        $('#p_code').val(data[0].code);
        $('#p_price').val(data[0].price);
        $('#p_color').val(data[0].color);
        $('#p_discount').val(data[0].discount);
        $('#p_stock').val(data[0].stock);
        $('#p_description').val(data[0].detail);
        $('#img_p1').attr('src', base_url + 'public/images/products/' + data[0].source);
        $('#img_p2').attr('src', base_url + 'public/images/products/' + data[0].source_1);
        $('#img_p3').attr('src', base_url + 'public/images/products/' + data[0].source_2);
      }
    });
  });

  $('.detail_invoice').on('click', function () {
    $('.overlay_admin').fadeIn();
    var tr_id = $(this).attr('id');
    $.ajax({
      url: base_url + 'successpayment/detail_transaction',
      method: 'POST',
      data: { 'tr_id': tr_id },
      dataType: 'JSON',
      success: function (data) {
        console.log(data);
        $('#n_user').val(data[0].receipt_name);
        $('#phone').val(data[0].phone);
        $('#detail_address').val(data[0].detail_address);
        $('#in_tp_id').val(data[0].tp_id);

        var t_data = '';
        var counter = 1;
        var grandtotal = 0;
        $.each(data, function (index, value) {
          subtotal = parseInt(data[index].qty) * parseInt(data[index].price);
          grandtotal = grandtotal + subtotal;
          t_data = t_data + '<tr><td>' + counter + '</td><td><div class="row"><div class="col-sm-3"><img src="' + base_url + 'public/images/products/' + data[index].source + '" class="image_thumb" alt="' + data[index].name + '" width="50" height="60"></div><div class="col-sm-9">' + data[index].name + '</div></div></td><td>' + data[index].qty + ' x Rp.' + data[index].price + '</td><td align="right">Rp. ' + subtotal + '</td></tr>';
          counter++;
        });

        $('#detail_tr_pending').html(t_data);
        $('#grandtotal_').html('Rp. ' + grandtotal);
      }
    });
  });

  $('.acc_payment').on('click', function () {
    $('.overlay_admin').fadeIn();
    var tp_id = $(this).attr('id');
    $.ajax({
      url: base_url + 'pendingpayment/detail_transaction',
      method: 'POST',
      data: { 'tp_id': tp_id },
      dataType: 'JSON',
      success: function (data) {
        console.log(data);
        $('#n_user').val(data[0].receipt_name);
        $('#phone').val(data[0].phone);
        $('#detail_address').val(data[0].detail_address);
        $('#in_tp_id').val(data[0].tp_id);

        var t_data = '';
        var counter = 1;
        $.each(data, function (index, value) {
          t_data = t_data + '<tr><td>' + counter + '</td><td><div class="row"><div class="col-sm-3"><img src="' + base_url + 'public/images/products/' + data[index].source + '" class="image_thumb" alt="' + data[index].name + '" width="50" height="60"></div><div class="col-sm-9">' + data[index].name + '</div></div></td><td>' + data[index].qty + '</td></tr>';
          counter++;
        });

        $('#detail_tr_pending').html(t_data);
      }
    });
  });

  $('.pop').on('click', function () {
    $('.imagepreview').attr('src', $(this).find('img').attr('src'));
    $('#imagemodal').modal('show');
    $('.overlay_admin').fadeIn();
  });

  $('.bank-transfer').on('click', function () {
    $('#l_bank').removeClass('sprite-bni');
    $('#l_bank').removeClass('sprite-cimb');
    $('#l_bank').removeClass('sprite-mandiri');
    $('#l_bank').removeClass('sprite-bri');
    $('#l_bank').removeClass('sprite-bca');
    var kelas = $(this).attr('kelas');
    var bank = $(this).attr('namabank');
    $('#t_namabank').html('Transfer Bank ' + bank);
    $('#l_bank').addClass('sprite-' + kelas);
  });

  var payment_limit = $('#time_payment').val();
  countdown(payment_limit);

  $('.bank-transfer').on('click', function () {
    var bank_id = $(this).attr('value');
    $('#bank_transfer').val(bank_id);
  });

  $('#btn_paynow').on('click', function () {
    if (($('#courier').val() != "") && ($('#courier_exp').val() != "") && ($('#courier_exp').val() != "Select a service ...")) {
      $('.overlay').fadeIn();
    }
    else {
      $('#cek_exp').html('Please choose your expedition!');
    }
  });

  $('.al-choose-address').on('click', function () {
    $('#modal_select_address').modal('hide');
    $('#exampleModal').modal('show');
  });

  $('#district_new_addr').on('change', function () {
    var district_id = $('#district_new_addr').find(':selected').data('custom-district');
    var regency_id = $('#district_new_addr').find(':selected').data('custom-regency');
    var province_id = $('#district_new_addr').find(':selected').data('custom-province');
    $('#dist_id').val(district_id);
    $('#prov_id').val(province_id);
    $('#reg_id').val(regency_id);
  });


  $('#new_address').on('click', function () {
    $('.overlay').fadeIn();
    $('#form_new_address').trigger("reset");
  });

  $('#select_address').on('click', function () {
    $('.overlay').fadeIn();
  });

  $('.overlay').on('click', function () {
    $(this).fadeOut();
  });

  $('input[type=radio][name=addr_]').change(function (e) {
    $('.color_label').each(function () {
      $(this).removeClass('btn-success');
      $(this).addClass('btn-secondary');
    });
    var div_parent = this.parentNode.parentNode;
    $(div_parent).find('.color_label').removeClass('btn-secondary');
    $(div_parent).find('.color_label').addClass('btn-success');

  });

  $('#change_address').on('click', function (e) {
    e.preventDefault();
    $('#exampleModal').modal('show');
    $('#exampleModalLabel').html('<strong>Change Address</strong>');
    $('.overlay').fadeIn();
    var id_u_addr = $('#id_u_addr').val();
    $.ajax({
      url: base_url + 'cart/getAddres',
      method: 'POST',
      data: { 'id_u_addr': id_u_addr },
      dataType: 'JSON',
      success: function (data) {
        console.log(data);
        $('#n_user').val(data[0].receipt_name);
        $('#phone').val(data[0].phone);
        $('#postcode').val(data[0].postcode);
        $('#detail_address').val(data[0].detail_address);
        var options = '' + data[0].n_prov + ', ' + data[0].n_rege + ', ' + data[0].n_dist + '';
      }
    });

  });


  $('.coeg_modal').on('click', function () {
    $('#exampleModal').modal('hide');
    $('#modal_select_address').modal('hide');
    $('#modal_acc_pending_payment_').modal('hide');
    $('#modal-payment').modal('hide');
    $('#modal_detail_transaction').modal('hide');
    $('#modal_changePassword').modal('hide');
    $('#modal_user').modal('hide');
    $('#modal_hapus').modal('hide');
    $('#modal_admin').modal('hide');
    $('#modal_master').modal('hide');
    $('.overlay').fadeOut();
    $('.overlay_admin').fadeOut();
  });

  $('#courier').on('change', function () {
    var courier_id = $(this).val();
    $.ajax({
      url: base_url + 'cart/getExpedition',
      method: 'POST',
      data: { 'courier_id': courier_id },
      dataType: 'JSON',
      success: function (data) {
        var options = '<option>Select a service ...</option>';
        for (var i = 0; i < data.length; i++) {
          options = options + '<option value="' + data[i].id + '">' + data[i].name + ' (' + data[i].exp_day + ')</option>';
        }
        $('#courier_exp').html(options);
      }
    });
  });

  $('#courier_exp').on('change', function () {
    var exp_id = $(this).val();
    var subtotal = $('#in_subtotal').val();

    $.ajax({
      url: base_url + 'cart/getPriceExpedition',
      method: 'POST',
      data: { 'exp_id': exp_id },
      dataType: 'JSON',
      success: function (data) {
        var gr = parseInt(subtotal) + parseInt(data[0].price);
        var shipping_panel = '<div class="row"><div class="col-sm-6">Shipping</div><div class="col-sm-6" align="right"><strong id="shipping_price">IDR ' + data[0].price + '</strong><input type="hidden" name="in_shipping" id="in_shipping" value=""></div></div>';
        var grandtotal_panel = '<hr><div class="row"><div class="col-sm-6">Grandtotal</div><div class="col-sm-6" align="right"><h4  id="grandtotal">IDR ' + gr + '</h4>  <input form="form_payment" type="hidden" name="in_grandtotal" id="in_grandtotal" value=""></div></div>';
        $('#shipping_panel').html(shipping_panel);
        $('#grandtotal_panel').html(grandtotal_panel);
        $('#in_grandtotal').val(gr);
        $('#btn_paynow').attr('data-toggle', 'modal');
        $('#btn_paynow').attr('data-target', '#modal-payment');
        $('#btn_paynow').attr('data-backdrop', 'static');
        $('#btn_paynow').attr('data-keyboard', 'false');
        $('#cek_exp').html('');
        $('#modal_grandtotal').html('Rp. ' + gr);
      }
    });
  });

  $('input[type=radio][name=address]').change(function () {
    if (this.value == 'my_address') {
      $('#panel_my_address').show();
      $('#panel_other_address').hide();
    }
    else if (this.value == 'other_address') {
      $('#panel_my_address').hide();
      $('#panel_other_address').show();

    }
  });


  $('#btn_shipping').on('click', function () {
    var country = $('#country').val();
    var subtotal = $('#in_subtotal').val();
    $.ajax({
      url: base_url + 'cart/getShipping',
      method: 'POST',
      data: { 'country': country },
      dataType: 'JSON',
      success: function (data) {
        subtotal = parseInt(subtotal) + parseInt(data[0].shipping);
        $('#subtotal').html('IDR ' + subtotal);
        $('#grandtotal').html('IDR ' + subtotal);
        $('#in_grandtotal').val(subtotal);
      }
    });
  });



  $('#province').on('change', function () {
    var id_prov = $(this).val();
    $.ajax({
      url: base_url + 'login/getAllRegency',
      method: 'POST',
      data: { 'id_prov': id_prov },
      dataType: 'JSON',
      success: function (data) {
        var options = '<option>Select a regency...</option>';
        for (var i = 0; i < data.length; i++) {
          options += '<option value="' + data[i].id + '"> ' + data[i].name + '</option>';
        }
        $('#regency').html(options);

      }
    });
  });

  $('#regency').on('change', function () {
    var id_regency = $(this).val();
    $.ajax({
      url: base_url + 'login/getAllDistrict',
      method: 'POST',
      data: { 'id_regency': id_regency },
      dataType: 'JSON',
      success: function (data) {
        var options = '<option>Select a district...</option>';
        for (var i = 0; i < data.length; i++) {
          options += '<option value="' + data[i].id + '"> ' + data[i].name + '</option>';
        }
        $('#district').html(options);
      }
    });
  });

  $('.addtocart').on('click', function () {
    if ($('#user_id').val()) {
      var good_id = $(this).parent().find('#product_id').val();
      var good_name = $(this).parent().find('#product_name').val();
      var user_id = $('#user_id').val();
      $.ajax({
        url: base_url + 'cart/addtoCart',
        method: 'POST',
        data: { 'good_id': good_id, 'good_name': good_name, 'user_id': user_id },
        dataType: 'JSON',
        success: function (data) {
          if (data == '200OK') {
            location.reload();
          }
        }
      });
    }
    else {
      window.location = base_url + 'login';
    }
  });

  $('.btn-addcart-product-detail').on('click', function () {
    if ($('#user_id').val()) {
      var good_id = $(this).parent().find('#product_id').val();
      var good_name = $(this).parent().find('#product_name').val();
      var user_id = $('#user_id').val();
      var qty = $('.num-product').val();
      $.ajax({
        url: base_url + 'cart/addtoCart',
        method: 'POST',
        data: { 'good_id': good_id, 'good_name': good_name, 'user_id': user_id, 'qty': qty },
        dataType: 'JSON',
        success: function (data) {
          if (data == '200OK') {
            location.reload();
          }
        }
      });
    }
    else {
      window.location = base_url + 'login';
    }
  });

  $('#filter_products').on('click', function () {
    var value1 = $('#value-lower').html();
    var value2 = $('#value-upper').html();
    var color = '';
    var i = 0;
    $.each($("input[name='color-filter']:checked"), function () {
      color = color + $(this).val();
      if (i < $("input[name='color-filter']:checked").length - 1) {
        color = color + '-';
      }
      i++;
    });
    if (color == '') {
      window.location = base_url + 'shop/harga/' + value1 + '-' + value2;
    } else {
      window.location = base_url + 'shop/filter/' + value1 + '-' + value2 + '/' + color;
    }

  });

});
