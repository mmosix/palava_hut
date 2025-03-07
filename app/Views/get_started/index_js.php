<script type="text/javascript">
    $(document).ready(function () {
        $("#get-started-form").appForm({
            onSuccess: function (result) {
                if (result.success) {
                    appAlert.success(result.message, {duration: 2000});
                    setTimeout(function() {
                        window.location = "<?php echo get_uri('signup'); ?>?email=" + encodeURIComponent($("#email").val());
                    }, 2000);
                }
            }
        });

        $("#inquiry_type").on("change", function () {
            var selectedType = $(this).val();
            if (selectedType === "planned") {
                $(".planned-development-fields").removeClass("hide");
                $(".custom-development-fields").addClass("hide");
            } else if (selectedType === "custom") {
                $(".planned-development-fields").addClass("hide");
                $(".custom-development-fields").removeClass("hide");
            } else {
                $(".planned-development-fields").addClass("hide");
                $(".custom-development-fields").addClass("hide");
            }
        });
    });
</script>