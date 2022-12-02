"use strict";
const S = "success";
const W = "warning";
let control = {
  globalShow: function (e) {
    document.getElementById(e).style.display = "initial";
  },
  globalShowFlex: function (e) {
    document.getElementById(e).style.display = "flex";
  },
  globalShowGrid: function (e) {
    document.getElementById(e).style.display = "grid";
  },
  globalHide: function (e) {
    document.getElementById(e).style.display = "none";
  },
  getInput: function (e) {
    let value;
    value = document.getElementById(e).value;
    return value;
  },
  getintInput: function (e) {
    let value;
    value = parseInt(document.getElementById(e).value);
    return value;
  },
  putValue: function (e, k) {
    document.getElementById(e).value = k;
  },
  html: function (e, tml) {
    document.getElementById(e).innerHTML = tml;
  },
  reload: function () {
    window.location.href = window.location;
  },
  readonly: function (e) {
    document.getElementById(e).setAttribute("readonly", true);
  },
  disable: function (e) {
    document.getElementById(e).setAttribute("disabled", true);
  },
  enable: function (e) {
    document.getElementById(e).setAttribute("disabled", false);
  },
  popup: function (e, state = "") {
    if (state == "") {
      swal(e);
    } else {
      swal(e, "", state);
    }
  },
  get: (e) => {
    return document.getElementById(e);
  },
};
function test() {
  control.popup("new popup");
}
function show_userpanel() {
  let div = control.get("userpanel");
  let show = div.getAttribute("show");
  if (!show) {
    div.style.display = "initial";
    div.setAttribute("show", true);
  } else {
    div.style.display = "none";
    div.removeAttribute("show");
  }
}
function show_location() {
  let div = control.get("lcnpnl");
  let show = div.getAttribute("show");
  if (!show) {
    div.style.display = "initial";
    div.setAttribute("show", true);
  } else {
    div.style.display = "none";
    div.removeAttribute("show");
  }
}
function show_cat() {
  let div = control.get("ctcnpnl");
  let show = div.getAttribute("show");
  if (!show) {
    div.style.display = "initial";
    div.setAttribute("show", true);
  } else {
    div.style.display = "none";
    div.removeAttribute("show");
  }
}
function search_city() {
  let value = control.getInput("location_search");
  let all = document.querySelectorAll(".lcn-search");
  all.forEach((e) => {
    if (e.innerHTML.toLowerCase().includes(value.toLowerCase())) {
      e.parentElement.style.display = "";
    } else {
      e.parentElement.style.display = "none";
    }
  });
}

function search_cat() {
  let value = control.getInput("cat_search");
  let all = document.querySelectorAll(".cn-search");
  all.forEach((e) => {
    if (e.innerHTML.toLowerCase().includes(value.toLowerCase())) {
      e.parentElement.style.display = "";
    } else {
      e.parentElement.style.display = "none";
    }
  });
}
function sidebar() {
  let div = control.get("sidebar");
  let open = div.getAttribute("on");
  if (open) {
    div.style.transform = "translateX(-100%)";
    div.removeAttribute("on");
  } else {
    div.style.transform = "translateX(0%)";
    div.setAttribute("on", true);
  }
}

function expand(e) {
  let current = e.parentElement;
  let ul = current.getElementsByClassName("inner-ul");
  let open = ul[0].getAttribute("on");
  if (open) {
    ul[0].style.height = "0";
    ul[0].removeAttribute("on");
  } else {
    ul[0].style.height = "auto";
    ul[0].setAttribute("on", true);
  }
}
function closerss() {
  let div = control.get("rss");
  div.style.display = "none";
}
function openrss() {
  let div = control.get("rss");
  div.style.display = "flex";
}
function view(e) {
  let div = control.get("mi");
  div.src = e.src;
}
function show_promo() {
  let div = control.get("promoform");
  let open = div.getAttribute("on");
  if (open) {
    div.style.display = "none";
    div.removeAttribute("on");
  } else {
    div.style.display = "flex";
    div.setAttribute("on", true);
  }
}
$(function () {
  $(".all-cat-sr li").click(function () {
    $(this)
      .addClass("active-search-li")
      .siblings()
      .removeClass("active-search-li");
  });
});
function set(e) {
  let ul = e.getElementsByTagName("a");
  control.putValue("cat", ul[0].innerHTML);
}
function open_address(e) {
  e.setAttribute("onclick", "close_address(this)");
  let span = control.get("chekout_address");
  span.style.overflow = "visible";
  span.style.minHeight = 0;
  span.style.removeProperty("height");
  close_dvt(control.get("ct-dt"));
  close_pt(control.get("ct-pt"));
}
function close_address(e) {
  e.setAttribute("onclick", "open_address(this)");
  let span = control.get("chekout_address");
  span.style.overflow = "hidden";
  span.style.height = 0;
}
function open_dvt(e) {
  e.setAttribute("onclick", "close_dvt(this)");
  let span = control.get("chekout_dvt");
  span.style.overflow = "visible";
  span.style.minHeight = 0;
  span.style.removeProperty("height");
  close_address(control.get("ct-ad"));
  close_pt(control.get("ct-pt"));
}
function close_dvt(e) {
  e.setAttribute("onclick", "open_dvt(this)");
  let span = control.get("chekout_dvt");
  span.style.overflow = "hidden";
  span.style.height = 0;
}
function open_pt(e) {
  e.setAttribute("onclick", "close_pt(this)");
  let span = control.get("chekout_pt");
  span.style.overflow = "visible";
  span.style.minHeight = 0;
  span.style.removeProperty("height");
  close_address(control.get("ct-ad"));
  close_address(control.get("ct-ad"));
}
function close_pt(e) {
  e.setAttribute("onclick", "open_pt(this)");
  let span = control.get("chekout_pt");
  span.style.overflow = "hidden";
  span.style.height = 0;
}

function nex_pt() {
  open_pt(control.get("ct-pt"));
}

function myAjax(user_id = "", product_id = "") {
  var qty = 1;
  if (user_id == 0) {
    swal("Login First To Access Cart.", "", "warning").then(function () {
      window.location.href = "login.php";
    });
  } else {
    $.ajax({
      type: "POST",
      url: "Backend/manage_cart.php",
      data: "user_id=" + user_id + "&product_id=" + product_id + "&qty=" + qty,
      success: function (html) {
        if (html == "Product is already in cart.") {
          swal(html, "", "warning");
        } else {
          swal(html, "", "success").then(function () {
            control.reload();
          });
        }
      },
    });
  }
}
function Delmart(cart_user_id = "", cart_product_id = "") {
  $.ajax({
    type: "POST",
    url: "Backend/delcart.php",
    data:
      "cart_user_id=" + cart_user_id + "&cart_product_id=" + cart_product_id,
    success: function (html) {
      swal(html, "", "success").then(function () {
        window.location.href = "cart.php";
      });
    },
  });
}

function Upmart(up_user_id = "", up_product_id = "") {
  var up_qty = 1;
  $.ajax({
    type: "POST",
    url: "Backend/update_my_cart.php",
    data:
      "up_user_id=" +
      up_user_id +
      "&up_product_id=" +
      up_product_id +
      "&up_qty=" +
      up_qty,
    success: function (html) {
      console.log(html);
      swal(html).then(function () {
        window.location.href = "cart.php";
      });
    },
  });
}
function addorder(addtotal) {
  var addname = jQuery("#addname").val();
  var addhouse = jQuery("#addhouse").val();
  var addroad = jQuery("#addroad").val();
  var addpin = jQuery("#addpin").val();
  var addnum = jQuery("#addnum").val();
  var addcity = jQuery("#addcity").val();
  var addstate = jQuery("#addstate").val();
  var addpay = jQuery("#ch-select").val();

  if (addname == "") {
    swal("Enter Name", "", "warning");
    checkoutshow();
  } else if (addhouse == "") {
    swal("Enter House,Bulding Name", "", "warning");
    checkoutshow();
  } else if (addroad == "") {
    swal("Enter Road Name", "", "warning");
    checkoutshow();
  } else if (addpin == "") {
    swal("Enter Pincode", "", "warning");
    checkoutshow();
  } else if (addnum == "") {
    swal("Enter Mobile Number", "", "warning");
    checkoutshow();
  } else if (addcity == "") {
    swal("Enter City", "", "warning");
    checkoutshow();
  } else if (addstate == "") {
    swal("Enter State Name", "", "warning");
    checkoutshow();
  } else if (addpay == "Select Payment Method") {
    swal("Select Payment Method", "", "warning");
    checkoutshow1();
  } else {
    if (addpay == "PayU") {
      $.ajax({
        type: "POST",
        url: "set_session.php",
        data:
          "addname=" +
          addname +
          "&addhouse=" +
          addhouse +
          "&addroad=" +
          addroad +
          "&addpin=" +
          addpin +
          "&addnum=" +
          addnum +
          "&addcity=" +
          addcity +
          "&addstate=" +
          addstate +
          "&addpay=" +
          addpay +
          "&addtotal=" +
          addtotal,
        success: function () {
          window.location.href = "insert.php";
        },
      });
    } else {
      $.ajax({
        type: "POST",
        url: "order_place.php",
        data:
          "addname=" +
          addname +
          "&addhouse=" +
          addhouse +
          "&addroad=" +
          addroad +
          "&addpin=" +
          addpin +
          "&addnum=" +
          addnum +
          "&addcity=" +
          addcity +
          "&addstate=" +
          addstate +
          "&addpay=" +
          addpay +
          "&addtotal=" +
          addtotal,
        success: function (html) {
          swal(html, "", "success").then(function () {
            window.location.href = "myorders.php";
          });
        },
      });
    }
  }
}
