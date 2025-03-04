<div id="page-content" class="page-wrapper clearfix">
    <div class="card">
        <div class="page-title clearfix">
            <h1><?php echo app_lang('project_inquiries'); ?></h1>
            <div class="title-button-group">
                <?php echo modal_anchor(get_uri("project_inquiry/client_modal_form"), "<i data-feather='plus-circle' class='icon-16'></i> " . app_lang('add_project_inquiry'), array("class" => "btn btn-default", "title" => app_lang('add_project_inquiry'))); ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="project-inquiry-table" class="display" cellspacing="0" width="100%"></table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#project-inquiry-table").appTable({
            source: '<?php echo get_uri("project_inquiry/client_list_data") ?>',
            columns: [
                {title: 'ID', "class": "w50"},
                {title: '<?php echo app_lang("inquiry_type"); ?>'},
                {title: '<?php echo app_lang("property_type"); ?>'},
                {title: '<?php echo app_lang("property_purpose"); ?>'},
                {title: '<?php echo app_lang("created_date"); ?>'},
                {title: '<?php echo app_lang("status"); ?>'}
            ],
            rowCallback: function(row, data) {
                $(row).click(function() {
                    window.location = "<?php echo get_uri('project_inquiry/client_view/'); ?>" + data[0];
                }).css("cursor", "pointer");
            },
            order: [[0, "desc"]]
        });
    });
</script>