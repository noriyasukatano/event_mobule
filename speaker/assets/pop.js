/*
* 名前空間
*/
var sp = sp || {};

sp.setSpeckerModal = function() {
  "use strict";
  var closeButtonDom = '<button class="mfp-close themify-popup-close" type="button" style="color:#ddd !important;">×</button>';
  jQuery('.sp-list-item').each(function(){
    var jQueryitem = jQuery(this);
    jQuery(this).find('.sp-list-itemInner').on('click', function() {
      var jQueryitemLink = jQuery(this);
      var itemHtml = jQueryitemLink.html();

      var addHtml;
      addHtml = closeButtonDom + '<div class="sp-list-itemInner -modalItem">' + itemHtml + '</div>'

      jQueryitemLink.after(addHtml);
      jQueryitem.addClass('-modal');
      jQuery('html').css('overflow', 'hidden');
      /*
      jQuery(window).on('touchmove.noScroll', function (e) {
        e.preventDefault();
      });*/
      jQuery('.-modalItem').find('.sp-list-itemBox').removeAttr('style');
    });
  });
  jQuery(document).on('click', '.mfp-close', function() {
    jQuery('.sp-list-itemInner.-modalItem').remove();
    jQuery('.sp-list-item.-modal').removeClass('-modal');
    jQuery(window).off('touchmove.noScroll');
    jQuery('html').css('overflow', 'auto');
    jQuery(this).remove();
  });
};

/**
* 処理の実行
*/
jQuery(function(jQuery){
  'use strict';
  sp.setSpeckerModal(jQuery);
});
