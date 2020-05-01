(function() {

  var items = ["webdesigner-freelance-nantes",
  "developpeur-freelance-nantes",
  "portfolio-développeur-front-end"];

  function insertSeo(i){
    var insert = '<a style="display:none" href="https://e-lechat.com" target="_blank" title="Manu Lechat '+items[i]+'">Manu Lechat '+items[i]+'</a>';
    document.getElementsByTagName("body")[0].insertAdjacentHTML('beforeend', insert);
  }

  for(var i = 0; i<=items.length; i++){
    insertSeo(i);
  }

})();
