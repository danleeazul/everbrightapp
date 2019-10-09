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

var val=form.year1.options[form.year1.options.selectedIndex].value;


function GetSelectedValue(){
  //var e = document.getElementById("unittype");
  var e = form.unittype.options[form.unittype.selectedIndex].value
  var result = e.options[e.selectedIndex].value;

  //var x = document.getElementById("city")
  var x = form.city.options[form.city.selectedIndex].value

  var resultx = x.options[x.selectedIndex].value;

  var final = result + resultx  

  document.getElementById("result").innerHTML = final;
}


window.onload = function() {

}







