function goTo(selector, cb) {
    var $el = $(selector);
    if (!$el[0]) return;
    var $par = $el.parent();
    if ($par.is("body")) $par = $("html, body");
    setTimeout(() => {
        $par.stop().animate({ scrollTop: $el.offset().top }, 1000, cb && cb.call($el[0]));
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



