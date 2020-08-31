
// on ready
(function() {
  init_ui();
  init_ContentScrollFx();
})();

function newPageReady(){
  init_ui();
  init_ContentScrollFx();
}



function init_ui() {

  // setTimeout(showTime, 700);
  txtSplash();
  if(document.getElementById("intro")){
    setTimeout(function(){
      document.getElementById("intro").classList.add("appear");
    },2000);
  }


  $('#palette .point').click(function() {
    document.body.classList = $( this ).attr( "body_class" );
    document.getElementById("intro").classList.remove("appear");
    $('#palette .point').removeClass('active');
    $( this ).addClass("active");
    document.getElementById("intro").classList.add("appear");
  });


  // // menu
  if(document.getElementById("bt_menu")){
    document.getElementById('bt_menu').addEventListener('click', function() {
      event.preventDefault();
      document.body.classList.toggle('menuOpen');
      document.body.classList.remove('show_about_screen');
    }, false);
  }

}

function txtSplash() {
  // add span tags entre chaque lettre
  var txt_splash_item = document.querySelectorAll(".txt_splash");
  for (var n = 0; n < txt_splash_item.length; n++) {
    var oldString = txt_splash_item[n].innerHTML;
    var newString = "";
    for ( i = 0; i < oldString.length; i++) {
      if(oldString[i]==" "){
      newString+= "<span class='space'>" + oldString[i] + "</span>";
      }
      else{
      newString+= "<span>" + oldString[i] + "</span>";
      }
    }
    txt_splash_item[n].innerHTML = newString;
  }
}

function showTime() {

  document.getElementById('open_container').setAttribute("class", "open_container viewport_container open_now");
  setTimeout(initInterface, 700);
}

function initInterface() {

  document.getElementById('open_container').style.display = 'none';
}




  /* scrolling functions */

  function init_ContentScrollFx() {

    var apear_items = document.querySelectorAll(".active_on_scroll");
    var active_screen_items = document.querySelectorAll(".active_screen_on_scroll");
    var isScrolling = false;

    window.addEventListener("scroll", throttleScroll, false);

    function throttleScroll(e) {
      if (isScrolling == false) {
        window.requestAnimationFrame(function() {
          scrolling(e);
          isScrolling = false;
        });
      }
      isScrolling = true;
    }

    function scrolling(e) {
      for (var n = 0; n < apear_items.length; n++) {
        var apear_item = apear_items[n];
        if (isPartiallyVisible(apear_item)) {
          apear_item.classList.add("active");
        } else {
          apear_item.classList.remove("active");
        }
      }
      for (var n = 0; n < active_screen_items.length; n++) {
        var active_screen_item = active_screen_items[n];

        if (isPartiallyVisible(active_screen_item)) {
          active_screen_item.classList.add("active");
          if (active_screen_item.querySelectorAll(".ref_video").length > 0) {
            var myVideo = active_screen_item.querySelector(".ref_video");
              if (myVideo.getAttribute("data-is_video") == "nop") {
                load_refVideo(myVideo);
              }
          }
        }

      }
    }

    function isPartiallyVisible(el) {

      var elementBoundary = el.getBoundingClientRect();
      var top = elementBoundary.top;
      var bottom = elementBoundary.bottom;
      var height = elementBoundary.height;
      return ((top + height >= 0) && (height + window.innerHeight >= bottom));
    }
  }

  function load_refVideo(myVideo) {

    // console.log(myVideo);
    myVideo.oncanplay = function() {
      myVideo.play();
    };
    var video_url = myVideo.getAttribute("data-target_video");
    var source = document.createElement('source');
    source.src = video_url;
    myVideo.setAttribute('data-is_video', "yep");
    myVideo.appendChild(source);

  }
