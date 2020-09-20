function goTo(selector, cb) {
  var $el = $(selector);
  if (!$el[0]) return;
  var $par = $el.parent();
  if ($par.is("body")) $par = $("html, body");
  setTimeout(() => {
    $par
      .stop()
      .animate({ scrollTop: $el.offset().top }, 1000, cb && cb.call($el[0]));
  }, 0);
}

let count = 1;
let index = 1;
let currentSection = "";
let nextSection = "";

(function scrolls() {
  if (count === 3) {
    count = 1;
  }

  currentSection = `#Section${count}`;
  nextSection = `#Section${index}`;
  index++;
  goTo(nextSection);

  if (currentSection === nextSection) {
    count++;
    index = 1;
  }

  setTimeout(scrolls, 10000);
})();

function load() {
  setTimeout(function () {
    $.ajax({
      type: "post",
      url: "ajax.php",
      data: {
        searchCode: 1,
      },
      success: function (result) {
        var obj = jQuery.parseJSON(result);
        $("#tableContainer").empty();
        for (var key in obj) {
          var val = obj[key];
          $("#tableContainer").append(`<tr>
                                    <td>${val.container_number}</td>
                                    <td>${val.consignee}</td>
                                    <td>${val.broker}</td>
                                    <td>${val.status}</td>
                                </tr>`);
        }
      },
      complete: load,
    });
  }, 10000);
}
load();

function load2() {
  setTimeout(function () {
    $.ajax({
      type: "post",
      url: "ajax.php",
      data: {
        searchCode2: 1,
      },
      success: function (result) {
        var obj = jQuery.parseJSON(result);
        $("#precautions").empty();
        for (var key in obj) {
          var val = obj[key];
          $("#precautions").append(`<p>${val.precaution_msg}</p>`);
        }
      },
      complete: load2,
    });
  }, 10000);
}
load2();

function showTime() {
  var date = new Date();
  var h = date.getHours();
  var m = date.getMinutes();
  var s = date.getSeconds();
  var session = "AM";

  if (h == 0) {
    h = 12;
  }
  if (h > 12) {
    h = h - 12;
    session = "PM";
  }

  h = h < 10 ? "0" + h : h;
  m = m < 10 ? "0" + m : m;
  s = s < 10 ? "0" + s : s;

  var time = h + ":" + m + ":" + s + " " + session;

  document.getElementById("MyClockDisplay").innerText = time;
  document.getElementById("MyClockDisplay").textContent = time;

  setTimeout(showTime, 1000);
}

showTime();
