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
    var radius = Math.floor($('#wheel').width() / 2);
    var slots = $('#wheel li');
    var center = [(radius - ($(slots[0]).outerWidth() / 2)), -350];
    // Angle separation between slots in degrees
    var separation = Math.floor(360 / slots.length);
    var num_rotations = 10;
    var spin_duration = 10000; // in ms
    var selected_slot = 0;
    var start_offset = 0;
    var spinning = false;

    function rotate_slots(slot_offset, time, callback_func) {
      slots.each(function(slot_idx) {
        var start_angle = (slot_idx * separation) + start_offset;
        var arc_params = {
          center: center,
          radius: radius,
          dir: 1,
          start: start_angle,
          end: start_angle + (360 * num_rotations) + (slot_offset * separation)
        };
        $(this).animate({ path: new $.path.arc(arc_params) }, time, callback_func);
      });
      // If we spin again make sure that we start the slots from the correct places
      start_offset += (slot_offset * separation);
    }

    function spin_stopped() {
      // This function gets called when each slot stops its animation. Make sure we only replace
      // the text once.
      if (spinning === false) {
        $('#last-spin h3 span').text($(slots.get(selected_slot)).text());
        $('#spin').removeClass('inactive');
      } else {
        spinning = false;
      }
    }

    // Initialize slot positions
    rotate_slots(0, 0, null);

    $('#spin').click(function() {
      if (spinning === false) {
        // TODO: Replace with ajax call
        var get_slot_id = Math.floor(Math.random() * slots.length);
        slot_offset = selected_slot - get_slot_id;
        selected_slot = get_slot_id;
        rotate_slots(slot_offset, spin_duration, spin_stopped);
        $(this).addClass('inactive');
        spinning = true;
      }
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
