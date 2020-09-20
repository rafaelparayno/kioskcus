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
  }, 5000);
}
load();

// $('#searchBtnCurriculim').on('click', () => {
//     let code = $('#searchCourseCur').val();

//     $.ajax({
//         type: "post",
//         url: "Students/ajax.php",
//         data: {
//             searchCode: code,
//         },
//         success: function(data) {
//             var obj = jQuery.parseJSON(data);

//             $("#table3Cur").empty();
//             $("#table2Cur").empty();
//             $("#table1Cur").empty();
//             for (var key in obj) {
//                 var val = obj[key];
//                 if (val.subyr == 1) {
//                     $('#table1Cur').append(`<tr>
//                             <td>${val.subjectcode}</td>
//                             <td>${val.subjectname}</td>
//                             <td>${val.subject_units}</td>
//                             <td>${val.schoolterm}</td>
//                         </tr>`)
//                 }
//                 if (val.subyr == 2) {
//                     $('#table2Cur').append(`<tr>
//                             <td>${val.subjectcode}</td>
//                             <td>${val.subjectname}</td>
//                             <td>${val.subject_units}</td>
//                             <td>${val.schoolterm}</td>
//                         </tr>`)
//                 }

//                 if (val.subyr == 3) {
//                     $('#table3Cur').append(`<tr>
//                             <td>${val.subjectcode}</td>
//                             <td>${val.subjectname}</td>
//                             <td>${val.subject_units}</td>
//                             <td>${val.schoolterm}</td>
//                         </tr>`)
//                 }

//             }

//         }

//     });

// });
