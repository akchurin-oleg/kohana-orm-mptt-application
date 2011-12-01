(function($) {

  $(document).ready(function(){
    $("a[rel=boxed]").fancybox({
      "overlayOpacity":     0,
      "hideOnOverlayClick": false,
      "showCloseButton":    false,
      "width":              300,
      "speedIn":            100,
      "speedOut":           100,
      "onComplete":         function(){
        $(document).trigger("fancybox_ready")
      }
    });

    $("#verify a").click(function(){
      $("#verify-ok").hide();
      $("#verify-bad").hide();

      $.getJSON(
        this.href,
        function(data) {
          if (data.verify) {
            $("#verify-ok").show();
          } else {
            var error = data.error;

            $("#verify-bad .error")
              .text(error.title)
              .attr("title", error.description)
              .tipsy();

            $("#verify-bad").show();
          }
        });

      return false
    })
  })

})(jQuery);