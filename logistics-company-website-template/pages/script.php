<script src="assets/js/jquery-3.6.1.js"></script>
<script src="assets/js/bootstrap.bundle.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>

<script>
    $(document).ready(function() {
        // $(".owl-carousel").owlCarousel();
        $("#owl-demo").owlCarousel({

            autoPlay: 2000, //Set AutoPlay to 2 seconds

            items : 3,
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [979,3]

        });

    });
</script>

<script>
    // Get the button
    let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
</body>
</html>
