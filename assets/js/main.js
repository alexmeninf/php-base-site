jQuery(function () {
  // animation
  // new WOW().init();

  //lazyload images
  new LazyLoad({
    elements_selector: ".lazy",
  });


  headerAnimate = () => {
    $(document).ready(function () {
      $(".fix-header").animate({
          top: 0,
        },
        800
      );
    });

    var lastScrollTop = 0;
    $(window).scroll(function (event) {
      var st = $(this).scrollTop();
      if (st > lastScrollTop) {
        // downscroll code
        $(".fix-header").css({
          top: "-100%",
          transition: ".8s all",
        });
      } else {
        // upscroll code
        $(".fix-header").css({
          top: 0,
          transition: ".8s all",
        });
      }
      lastScrollTop = st;
    });
  };

  drawerMobile = () => {
    let drawer = ".drawer-mobile",
      drawerButton = ".drawerButton",
      drawerClose = ".close-menu",
      listMenu = ".drawer-mobile ul",
      swipeTouch = {};

    // Open
    $(drawerButton).click(function (e) {
      e.preventDefault();

      $("body").css("overflow", "hidden");
      $(drawer).removeClass("drawerClosed");
      $(drawer).addClass("drawerOpen");
      $(listMenu).animate({
        left: "0",
      });
      setTimeout(() => {
        $(drawerClose).addClass("open");
      }, 200);
    });

    // close
    $(".drawer-mobile ul li a, .close-menu").click(function () {
      $("body").css("overflow-y", "scroll");
      $(drawerClose).removeClass("open");
      $(listMenu).animate({
        left: "-100%",
      });
      setTimeout(() => {
        $(drawer).addClass("drawerClosed");
        $(drawer).removeClass("drawerOpen");
      }, 600);
    });

    swipeTouch = document;
    swipeTouch.addEventListener("swiped-right", function (e) {
      $("body").css("overflow", "hidden");
      $(drawer).removeClass("drawerClosed");
      $(drawer).addClass("drawerOpen");
      $(listMenu).animate({
        left: "0",
      });
      setTimeout(() => {
        $(drawerClose).addClass("open");
      }, 200);
    });

    document
      .getElementById("drawer")
      .addEventListener("swiped-left", function (e) {
        $("body").css("overflow-y", "scroll");
        $(drawerClose).removeClass("open");
        $(listMenu).animate({
          left: "-100%",
        });
        setTimeout(() => {
          $(drawer).addClass("drawerClosed");
          $(drawer).removeClass("drawerOpen");
        }, 600);
      });
  };

  smoothClick = () => {
    $('a[href*="#"]')
      .not('[href="#"]')
      .not('[href="#0"]')
      .not('[href*="#v-pills-"]')
      .click(function (event) {
        if (
          location.pathname.replace(/^\//, "") ==
          this.pathname.replace(/^\//, "") &&
          location.hostname == this.hostname
        ) {
          var target = $(this.hash);
          target = target.length ?
            target :
            $("[name=" + this.hash.slice(1) + "]");

          if (target.length) {
            event.preventDefault();
            $("html, body").animate({
                scrollTop: target.offset().top,
              },
              900,
              function () {
                var $target = $(target);
                $target.focus();
                if ($target.is(":focus")) {
                  // Checking if the target was focused
                  return false;
                } else {
                  $target.attr("tabindex", "-1"); // Adding tabindex for elements not focusable
                  $target.focus(); // Set focus again
                }
              }
            );
          }
        }
      });
  }

  headerAnimate();
  drawerMobile();
  smoothClick();
});