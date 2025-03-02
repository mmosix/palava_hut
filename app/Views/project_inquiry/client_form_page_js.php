<script type="text/javascript">
    $(document).ready(function () {
        // Show/hide fields based on inquiry type selection
        $("#inquiry_type").on("change", function () {
            var selectedType = $(this).val();
            
            // Hide all conditional fields first
            $("#planned-fields").hide();
            $("#custom-fields").hide();
            
            // Show the relevant fields based on selection
            if (selectedType === "planned") {
                $("#planned-fields").show();
            } else if (selectedType === "custom") {
                $("#custom-fields").show();
            }
        });
        
        // Initialize the form on page load
        // Hide both sections by default
        $("#planned-fields").hide();
        $("#custom-fields").hide();
        
        // Only show relevant section if a type is already selected
        var selectedType = $("#inquiry_type").val();
        if (selectedType === "planned") {
            $("#planned-fields").show();
        } else if (selectedType === "custom") {
            $("#custom-fields").show();
        }
    });
</script>