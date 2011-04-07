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
      var slots = $('#wheel li');
      var separation = Math.floor(360 / slots.length);
      var num_rotations = 10;

      function rotate_slot(slot_idx, slot_offset, time) {
        var start_angle = slot_idx * separation;
        var arc_params = {
          center: [250,-25],
          radius: 150,
          dir: 1,
          start: start_angle,
          end: start_angle + (360 * num_rotations) + (slot_offset * separation)
        };
        $(slots.get(slot_idx)).animate({ path: new $.path.arc(arc_params) }, time);
      }

      slots.each(function(slot_idx) {
        rotate_slot(slot_idx, 0, 0);
      });

      $('#wheel').click(function() {
        var selected_slot = Math.floor(Math.random() * slots.length);
        slots.each(function(slot_idx) {
          rotate_slot(slot_idx, selected_slot, 10000);
        });
        $(this).unbind();
      });
    }

    function init_spin(items) {
      $("#spin").unbind();
      $("#spin").removeClass('inactive');
      $('#spin').click(function() {
        rotate(items, Math.floor(Math.random() * items.length));
        $(this).addClass('inactive');
        $(this).unbind();
        $(this).click(function() {
          return false;
        });
        return false;
      });
    }

    var wheel_width = $('#wheel').width();
    var items = $('#wheel li');
    var radius = Math.floor(wheel_width / 2);
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
    init_spin(items);
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
