<?php echo view("includes/header", array("title" => app_lang("forms"))); ?>

<div id="page-content" class="page-wrapper clearfix">
    <div class="card">
        <div class="page-title clearfix">
            <h1><?php echo app_lang('forms'); ?></h1>
            <div class="title-button-group">
                <?php echo modal_anchor(get_uri("forms/modal_form"), "<i data-feather='plus-circle' class='icon-16'></i> " . app_lang('add_form'), array("class" => "btn btn-default", "title" => app_lang('add_form'))); ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="forms-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#forms-table").appTable({
            source: '<?php echo_uri("forms/list_data") ?>',
            columns: [
                {title: '<?php echo app_lang("id") ?>'},
                {title: '<?php echo app_lang("title") ?>'},
                {title: '<?php echo app_lang("description") ?>'},
                {title: '<?php echo app_lang("type") ?>'},
                {title: '<?php echo app_lang("status") ?>'},
                {title: '<?php echo app_lang("created_date") ?>'}
            ],
            printColumns: [0, 1, 2, 3, 4, 5],
            xlsColumns: [0, 1, 2, 3, 4, 5]
        });
    });
</script>
<?php echo view("includes/footer"); ?>