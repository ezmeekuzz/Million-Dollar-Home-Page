        <footer>
            <p>RamBhakts.com © 2024. All rights reserved. I am not responsible for the content of the images. Images featured on homepage are © of their respective owners.</p>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" ></script>
        <script src="<?=base_url();?>assets/js/owl.carousel.min.js"></script>
        <script src="<?=base_url();?>assets/js/jquery.matchHeight.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
        <script src="<?=base_url();?>assets/js/main.js"></script>
        <script src="https://www.paypal.com/sdk/js?client-id=AUGQnX6C6HQFTWNwl7T886HC_EoOHpltUlAphlFNy-I6AaUObwheXJ4qO7qNYdKJRGtRDDYZlHyl0ufT"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var searchIcon = document.getElementById('search-icon');
                var searchInput = document.getElementById('search-input');
                var searchPopup = document.querySelector('.search-popup');

                searchIcon.addEventListener('click', function(event) {
                    event.preventDefault();
                    searchPopup.classList.toggle('active');
                    searchInput.focus();
                });
            });
            function toggleAccordion(header) {
                var content = header.nextElementSibling;
                content.style.maxHeight = content.style.maxHeight ? null : content.scrollHeight + "px";

                // Toggle the 'active' class on the clicked header
                header.classList.toggle('active');

                // Reset the background color of inactive headers
                var headers = document.querySelectorAll('.accordion-header');
                headers.forEach(function(item) {
                    if (item !== header) {
                        item.classList.remove('active');
                    }
                });
            }
        </script>
    </body>
</html>