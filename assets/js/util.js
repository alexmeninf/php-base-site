/**
 * Checks if it is an iOS device
 */
is_apple = () => {
  const isIOS = /Mac|iPad|iPhone|iPod/.test(navigator.userAgent);
  const isMacOS = navigator.platform.indexOf("Mac") != -1;
  const isSafari = navigator.platform.indexOf("Safari") != -1;

  if (isIOS || isMacOS || isSafari) {
    return true;
  }

  return false;
};

/**
 * Checks if it is an mobile device
 */
is_mobile = () => {
  if (
    /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
      navigator.userAgent
    )
  ) {
    return true;
  }
  return false;
};

/**
 *
 * @param selectorItem Class or ID selector
 * @param breakpoint  Resolution at which the breakpoint happens
 */
autoHeight = (selectorItem, breakpoint) => {
  $(window)
    .on("load resize", function () {
      let proposalHeight = 0;

      $(selectorItem).each(function () {
        if ($(this).innerHeight() > proposalHeight) {
          proposalHeight = $(this).innerHeight();
        }
      });

      if ($(document).innerWidth() >= breakpoint) {
        $(selectorItem).css("height", proposalHeight + "px");
      } else {
        $(selectorItem).css("height", "auto");
      }
    })
    .trigger("resize");
};
