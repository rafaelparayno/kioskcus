function goTo(selector, cb) {
  const $el = $(selector);
  if (!$el[0]) return;
  let $par = $el.parent();
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

  setTimeout(scrolls, 20000);
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
        const obj = jQuery.parseJSON(result);
        $("#tableContainer").empty();
        for (let key in obj) {
          let val = obj[key];
          $("#tableContainer").append(`<tr>
                                    <td >${val.container_number}</td>
                                    <td>${val.consignee}</td>
                                    <td >${val.broker}</td>
                                    <td >${val.status}</td>
                                </tr>`);
        }
      },
      complete: load,
    });
  }, 5000);
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
        let obj = jQuery.parseJSON(result);
        $("#precautions").empty();
        for (let key in obj) {
          let val = obj[key];
          $("#precautions").append(`<p>${val.precaution_msg}</p>`);
        }
      },
      complete: load2,
    });
  }, 10000);
}
load2();

function getmonthName(dt) {
  mlist = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ];
  return mlist[dt.getMonth()];
}

function showTime() {
  var date = new Date();
  var h = date.getHours();
  var m = date.getMinutes();
  var s = date.getSeconds();
  let month = getmonthName(date);
  let day = date.getDate();
  let year = date.getFullYear();
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

  var time =
    month +
    " " +
    day +
    "," +
    year +
    " " +
    h +
    ":" +
    m +
    ":" +
    s +
    " " +
    session;

  document.getElementById("MyClockDisplay").innerText = time;
  document.getElementById("MyClockDisplay").textContent = time;

  setTimeout(showTime, 1000);
}

showTime();

let my_time;
$(document).ready(function () {
  pageScroll();
  $("#contain")
    .mouseover(function () {
      clearTimeout(my_time);
    })
    .mouseout(function () {
      pageScroll();
    });
});

function pageScroll() {
  const objDiv = document.getElementById("contain");
  objDiv.scrollTop = objDiv.scrollTop + 2;
  if (objDiv.scrollTop + objDiv.offsetHeight >= objDiv.scrollHeight) {
    objDiv.scrollTop = 0;
  }

  my_time = setTimeout(pageScroll, 50);
}

$(function () {
  $(document).scroll(function () {
    const $nav = $(".display-clock");
    $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height() + 100);
  });
});
