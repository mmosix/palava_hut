<div id="page-content" class="page-wrapper clearfix">
    <div class="card">
        <div class="page-title clearfix">
            <h1><?php echo app_lang('project_inquiries'); ?></h1>
        </div>
        <div class="table-responsive">
            <table id="project-inquiry-table" class="display" cellspacing="0" width="100%">
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#project-inquiry-table").appTable({
            source: '<?php echo get_uri("project_inquiry/list_data") ?>',
            columns: [
                {title: 'ID'},
                {title: '<?php echo app_lang("full_name"); ?>'},
                {title: '<?php echo app_lang("email"); ?>'},
                {title: '<?php echo app_lang("phone"); ?>'},
                {title: '<?php echo app_lang("inquiry_type"); ?>'},
                {title: '<?php echo app_lang("country"); ?>'},
                {title: '<?php echo app_lang("preferred_location"); ?>'},
                {title: '<?php echo app_lang("created_date"); ?>'},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            order: [[2, "desc"]]
        });
    });
</script>
