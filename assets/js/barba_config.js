document.addEventListener("DOMContentLoaded", function() {

  Barba.Pjax.init();
  Barba.Prefetch.init();

  Barba.Dispatcher.on('transitionCompleted', function() {
      newPageReady(); // call main.js function for each new page.
  });

  var HideShowTransition = Barba.BaseTransition.extend({
    start: function() {
      this.newContainerLoading.then(this.finish.bind(this));
    },

    finish: function() {
      document.body.scrollTop = 0;
      this.done();
    }
  });

  var SimpleTransition = Barba.BaseTransition.extend({

    start: function() {

      Promise
        .all([this.newContainerLoading, this.animOut()])
        .then(this.animIn.bind(this));
    },



    animOut:function(){
      var deferred = Barba.Utils.deferred();
      document.body.classList.add('anim_out');
      setTimeout(function(){
          deferred.resolve();
      },800);

        return deferred.promise;

    },

    animIn: function() {

      document.body.scrollTop = 0;
      window.scrollTo(0, 0);
      if(this.newContainer.classList.contains("blackstyle") ){
        document.body.classList.add('blackstyle');
      }else{
        document.body.classList.remove('blackstyle');
      }

      this.newContainer.style.visibility = 'visible';
      document.body.classList.remove('anim_out');
      this.done();
    }


  });


  Barba.Pjax.getTransition = function() {

        return SimpleTransition;


  };
});
