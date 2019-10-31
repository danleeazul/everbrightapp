</div>
</main>
</div>

<script>
               function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}



function closeNav() {
    if ($(window).width() < 768) {
            document.getElementById("mySidenav").style.width = "0";

    }
    else{
        document.getElementById("mySidenav").style.width = "250px";

    }

    function clickSingleA(a)
{
    items = document.querySelectorAll('mdc-list-item mdc-list-item--activated');

    if(items.length) 
    {
        items[0].className = 'mdc-list-item';
    }
    else{
          a.className = 'mdc-list-item mdc-list-item--activated';
    }

}

}

</script>



  <!-- Required MDC Web JavaScript library -->
<script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
<!-- Instantiate single textfield component rendered in the document -->

 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://everbright.com.ph/everbrightapp//libs/js/form-validation.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



  </body>
</html>