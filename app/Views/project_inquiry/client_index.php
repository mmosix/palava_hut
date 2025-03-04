<div id="page-content" class="page-wrapper clearfix">
    <div class="card">
        <div class="page-title clearfix">
            <h1><?php echo app_lang('project_inquiries'); ?></h1>
            <div class="title-button-group">
                <?php echo modal_anchor(get_uri("project_inquiry/modal_form"), "<i class='fa fa-plus-circle'></i> " . app_lang('add_project_inquiry'), array("class" => "btn btn-default", "title" => app_lang('add_project_inquiry'))); ?>
            </div>
        </div>
        <div class="table-responsive">
        <table id="inquiry-table" class="display" cellspacing="0" width="100%"></table>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $("#inquiry-table").appTable({
        source: '<?php echo_uri("project_inquiry/client_list_data") ?>',
            columns: [
                {title: 'ID', "class": "w50"},
                {title: '<?php echo app_lang("full_name"); ?>', "class": "all"},
                {title: '<?php echo app_lang("email"); ?>'},
                {title: '<?php echo app_lang("phone"); ?>'},
                {title: '<?php echo app_lang("inquiry_type"); ?>'},
                {title: '<?php echo app_lang("country"); ?>'},
                {title: '<?php echo app_lang("preferred_location"); ?>'},
                {title: '<?php echo app_lang("created_date"); ?>'},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            rowCallback: function(row, data) {
                $(row).find("td:not(:last-child)").click(function() {
                    window.location = "<?php echo get_uri('project_inquiry/view/'); ?>" + data[0];
                }).css("cursor", "pointer");
            },
            order: [[3, "desc"]]
    });
});
</script>