<div class="table-responsive">
    <table id="attendance-summary-table" class="display" cellspacing="0" width="100%">            
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var dynamicDates = getDynamicDates();

        $("#attendance-summary-table").appTable({
            source: '<?php echo_uri("attendance/summary_list_data/"); ?>',
            order: [[0, "desc"]],
            filterDropdown: [{name: "user_id", class: "w200", options: <?php echo $team_members_dropdown; ?>}],
            rangeDatepicker: [{startDate: {name: "start_date", value: dynamicDates.start_of_month}, endDate: {name: "end_date", value: dynamicDates.end_of_month}, label: "<?php echo app_lang('date'); ?>", ranges: ['this_month', 'last_month', 'this_year', 'last_year', 'last_30_days', 'last_7_days']}],
            columns: [
                {title: "<?php echo app_lang("team_member"); ?>"},
                {title: "<?php echo app_lang("duration"); ?>", "class": "w20p text-right"},
                {title: "<?php echo app_lang("hours"); ?>", "class": "w20p text-right"}
            ],
            printColumns: [0, 1, 2],
            xlsColumns: [0, 1, 2],
            summation: [{column: 1, dataType: 'time'}, {column: 2, dataType: 'number'}]
        });
    });
</script>