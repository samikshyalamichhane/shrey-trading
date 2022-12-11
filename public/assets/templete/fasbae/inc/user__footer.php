<script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
    $(document).ready(function() {
        $(".user__title").click(function() {
            $(".options").slideToggle();
        });
        $('.cart__dismiss').click(function() {
            $(this).closest('tr').remove();
        });
    })
    </script>
</body>

</html>