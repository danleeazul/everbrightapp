// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation')

    // Loop over them and prevent submission
    Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  }, false)
}())


function GetSelectedValue(){
  var e = document.getElementById("unittype");
  var result = e.options[e.selectedIndex].value;
  
  var x = document.getElementById("city")
  var resultx = x.options[x.selectedIndex].value;

  var final = result + resultx  

  document.getElementById("result").innerHTML = final;
}

var unitchange = document.getElementById("unittype");
unitchange.addEventListener("change", GetSelectedValue, false);

window.onload = function() {

}







