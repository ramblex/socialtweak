// Assumes that jquery and jquery.history have been loaded

$(document).ready(function() {

  // Javascript that affects #content
  function init_content(page) {
    $("#slidedeck dl").slidedeck();

    // Highlight the correct link
    if (page != '') {
      $('#nav a').removeClass('selected');
      $('#nav a[href="'+page+'"]').addClass('selected');
    }
  }

  $.history.init(function(page) {
    $('#content').hide().load(page + ' #content', function() {
      init_content(page);
    }).fadeIn('slow');
  });

  $("#nav a").click(function() {
    var url = $(this).attr('href');
    url = url.replace(/^.*#/, '');
    $('#content').prepend('<div id="loading">Loading...</div>');
    $.history.load(url);
    $('#loading').fadeOut();
    return false;
  });

  $("#open-footer").hide();
  $("#settings").click(function() {
    $("#open-footer").slideToggle('fast', function() {
      // Switch the footer arrow
      if ($(this).is(':hidden')) {
        $("#settings").css('background-image', 'url(images/footer-arrow.png)');
      } else {
        $("#settings").css('background-image', 'url(images/footer-arrow-down.png)');
      }
    });
    return false;
  });

  // Background chooser
  $("#choose-background a").click(function() {
    var name = $(this).attr('name');
    var options = "";
    if (name == "white") {
      options += " no-repeat";
    }
    $('body').css('background-image', 'url(images/backgrounds/'+$(this).attr('name')+'.png)' + options);
    return false;
  });
});
