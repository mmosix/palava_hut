<?php echo view("includes/header", array("title" => app_lang("project_inquiries"))); ?>

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
                {title: '<?php echo app_lang("title"); ?>'},
                {title: '<?php echo app_lang("status"); ?>'},
                {title: '<?php echo app_lang("created_date"); ?>'},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            order: [[2, "desc"]]
        });
    });
</script>

<?php echo view("includes/footer"); ?>