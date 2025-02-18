<div class="clearfix">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php if ($show_overview) { ?>
                    <div class="col-md-6 col-sm-12">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <?php echo view("projects/project_progress_chart_info"); ?>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <?php echo view("projects/project_task_pie_chart"); ?>
                            </div>

                            <?php if ($show_timesheet_info) { ?>
                                <div class="col-md-12 col-sm-12">
                                    <?php echo view("projects/widgets/total_hours_worked_widget"); ?>
                                </div>
                            <?php } ?>

                            <?php if ($show_activity) { ?>
                                <div class="col-md-12 col-sm-12">
                                    <?php echo view('projects/custom_fields_list', array("custom_fields_list" => $custom_fields_list)); ?>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <?php echo view("projects/project_description"); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <?php if (!$show_activity) { ?>
                        <div class="col-md-6 col-sm-12">
                            <?php echo view('projects/custom_fields_list', array("custom_fields_list" => $custom_fields_list)); ?>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <?php echo view("projects/project_description"); ?>
                        </div>
                    <?php } ?>

                    <?php if ($show_activity) { ?>
                        <div class="col-md-6 col-sm-12">
                            <div class="card">
                                <div class="tab-title clearfix">
                                    <h4><?php echo app_lang('activity'); ?></h4>
                                </div>
                                <?php echo view("projects/history/index"); ?>
                            </div>
                        </div>
                    <?php } ?>

                <?php } else { ?>
                    <div class="col-md-12">
                        <?php echo view('projects/custom_fields_list', array("custom_fields_list" => $custom_fields_list)); ?>
                    </div>

                <?php if ($project_info->location) { ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4><?php echo app_lang('location'); ?></h4>
                            </div>
                            <div class="card-body">
                                <div id="map" style="height: 400px;"></div>
                            </div>
                        </div>
                        <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo get_setting('google_maps_api_key'); ?>"></script>
                        <script>
                            $(document).ready(function () {
                                var location = {
                                    lat: <?php echo $project_info->latitude; ?>,
                                    lng: <?php echo $project_info->longitude; ?>
                                };
                                var map = new google.maps.Map(document.getElementById('map'), {
                                    zoom: 15,
                                    center: location
                                });
                                var marker = new google.maps.Marker({
                                    position: location,
                                    map: map,
                                    title: '<?php echo $project_info->location; ?>'
                                });
                            });
                        </script>
                    </div>
                <?php } ?>

                    <div class="col-md-12">
                        <?php echo view("projects/project_description"); ?>
                    </div>

                    <?php if ($show_timesheet_info) { ?>
                        <div class="col-md-12 col-sm-12">
                            <?php echo view("projects/widgets/total_hours_worked_widget"); ?>
                        </div>
                    <?php } ?>

                <?php } ?>

            </div>
        </div>
    </div>
</div>