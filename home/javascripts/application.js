// Assumes that jquery and jquery.history have been loaded

$(document).ready(function() {

  // Javascript that affects #content
  function init_content(page) {
    $("nav a, #thumbnails a, #reward-items a").click(function() {
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
      $('nav a').removeClass('selected');
      $('nav a[href="/'+page+'"]').addClass('selected');
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

    // Wheel
    function getXPos(angle) {
      return left_offset + (radius * Math.cos(angle * (Math.PI / 180)));
    }
    function getYPos(angle) {
      return bottom_offset + (radius * Math.sin(angle * (Math.PI / 180)));
    }

    function rotate(items, stopIdx) {
      var speed = 30;
      var num_rotations_to_do = Math.random() * 450;
      var num_rotations_done = 0;
      var intervalId = setInterval(function() {
        num_rotations_done += 1;
        items.each(function() {
          var angle = parseInt($(this).attr('angle'));
          var bottom = parseInt(getYPos(angle));
          $(this).css({
            'left': getXPos(angle)+'px',
            'bottom': bottom+'px',
            '-webkit-transform': 'rotate('+-(angle + 90)+'deg)',
            '-moz-transform': 'rotate('+-(angle + 90)+'deg)'
          });
          $(this).attr('angle', angle + 5);
          if (items.index(this) == stopIdx) {
            if (num_rotations_done > num_rotations_to_do && bottom == 50) {
              clearInterval(intervalId);
              $('#last-spin h3 span').text($(this).text());
            }
          }
        });
      }, 13);
    }

    var wheel_width = $('#wheel').width();
    var items = $('#wheel li');
    var radius = (wheel_width / 2);
    var left_offset = radius - ($(items[0]).outerWidth() / 2);
    var bottom_offset = radius + 50;
    var angle = -90;
    items.each(function() {
      $(this).attr('angle', angle);
      $(this).css({
        'position': 'absolute',
        'left': getXPos(angle),
        'bottom': getYPos(angle),
        '-webkit-transform': 'rotate('+-(angle + 90)+'deg)',
        '-moz-transform': 'rotate('+-(angle + 90)+'deg)',
        'z-index': 0
      });
      angle += (360 / items.length);
    });
    $('#spin').click(function() {
      rotate(items, Math.floor(Math.random() * items.length));
      return false;
    });
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
