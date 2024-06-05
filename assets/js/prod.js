function nompvalidation() {
    var nomp = document.getElementById('nomp').value;
    if(nomp.length < 5) {
        document.getElementById('nomp').innerHTML = "<p style='color:red'>Veuillez saisir un nom valide</p>";
        e.preventDefault();
        return false;
    }
    else {
        document.getElementById('nomperr').innerHTML = "<p style='color:green'>nom valide</p>";
        return true;
    }
  }
  
  document.getElementById('addprod').addEventListener('submit', function(e) {
    if(nompvalidation() == false) {
        document.getElementById('nomperr').innerHTML = "<p style='color:red'>Ce champ est requis</p>";
        e.preventDefault;
    }
  });