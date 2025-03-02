<div id="page-content" class="page-wrapper clearfix">
    <div class="card">
        <div class="page-title clearfix">
            <h1><?php echo app_lang('project_inquiries'); ?></h1>
            <div class="title-button-group">
                <?php echo anchor(get_uri("project_inquiry/client_form"), "<i class='fa fa-plus-circle'></i> " . app_lang('add_project_inquiry'), array("class" => "btn btn-default", "title" => app_lang('add_project_inquiry'))); ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="inquiry-table" class="display" cellspacing="0" width="100%">            
                <thead>
                    <tr>
                        <th><?php echo app_lang("title"); ?></th>
                        <th><?php echo app_lang("property_purpose"); ?></th>
                        <th><?php echo app_lang("status"); ?></th>
                        <th><?php echo app_lang("created_date"); ?></th>
                        <th class="text-center"><?php echo app_lang("actions"); ?></th>
                    </tr>
                </thead>            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $("#inquiry-table").appTable({
        source: '<?php echo_uri("project_inquiry/client_list_data") ?>',
        order: [[3, "desc"]],
        columns: [
            {title: '<?php echo app_lang("title"); ?>'},
            {title: '<?php echo app_lang("property_purpose"); ?>'},
            {title: '<?php echo app_lang("status"); ?>'},
            {title: '<?php echo app_lang("created_date"); ?>'},
            {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
        ]
    });
});
</script>