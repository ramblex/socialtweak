// Assumes that jquery and jquery.history have been loaded

$(document).ready(function() {

  // Javascript that affects #content
  function init_content(page) {
    $("#nav a, #thumbnails a, #reward-items a").click(function() {
      var url = $(this).attr('href');
      url = url.replace(/^\//, '');
      $('#content').prepend('<div id="loading"><img src="images/ajax-loader.gif" width="40">Loading...</div>');
      $.history.load(url);
      $('#loading').fadeOut();
      return false;
    });

    $('#slidedeck dd').wrapInner('<div class="content" />');
    $("#slidedeck dl").slidedeck();

    // Highlight the correct link
    if (page != '') {
      $('#nav a').removeClass('selected');
      $('#nav a[href="/'+page+'"]').addClass('selected');
    }

    // Countdown clock
    if ($("#counter").length != 0) {
      setInterval(function countDown() {
          var current_mins = parseInt($("#minutes").text());
          if (current_mins == 0) {
            var current_hours = parseInt($("#hours").text());
            $("#hours").text(current_hours - 1);
            $("#minutes").text(59);
          } else {
            $("#minutes").text(current_mins - 1);
          }
        }, 60000);
    }
  }

  $.history.init(function(page) {
    $('#content').load(page + ' #content', function() {
      init_content(page);
    }).hide().fadeIn(300);
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

  // Progress bar
  function set_progress(percentage) {
    var total_width = 185;
    $("#current-progress").width((percentage / 100) * total_width);
  }

  set_progress(70);

  // Default text
  $('#quick-post-content').val('Enter text...').click(function() {
    $(this).val('');
    $(this).unbind('click');
  });

  // Background chooser
  $("#choose-background a").click(function() {
    var name = $(this).attr('id');
    var options = "";
    if (name == "white") {
      options += " no-repeat";
    }
    $('body').css('background-image', 'url(images/backgrounds/'+name+'.png)' + options);
    return false;
  });

});
