<div id="page-content" class="page-wrapper clearfix">
    <div class="card">
        <div class="page-title clearfix">
            <h1><?php echo app_lang('project_inquiry_details'); ?></h1>
            <div class="title-button-group">
                <?php echo anchor(get_uri("project_inquiry"), app_lang("back_to_list"), array("class" => "btn btn-default")); ?>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label><?php echo app_lang('inquiry_type'); ?></label>
                        <div><?php echo $model_info->inquiry_type; ?></div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label><?php echo app_lang('created_date'); ?></label>
                        <div><?php echo format_to_date($model_info->created_at, false); ?></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label><?php echo app_lang('created_by'); ?></label>
                        <div class="avatar-with-name">
                            <span class="avatar"><img src="<?php echo get_avatar($model_info->created_by_avatar); ?>" alt="..."></span>
                            <?php echo $model_info->created_by_name; ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label><?php echo app_lang('email'); ?></label>
                        <div><?php echo $model_info->email; ?></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label><?php echo app_lang('full_name'); ?></label>
                        <div><?php echo $model_info->full_name; ?></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label><?php echo app_lang('phone'); ?></label>
                        <div><?php echo $model_info->phone; ?></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label><?php echo app_lang('preferred_contact'); ?></label>
                        <div><?php echo $model_info->preferred_contact; ?></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label><?php echo app_lang('country'); ?></label>
                        <div><?php echo $model_info->country; ?></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label><?php echo app_lang('preferred_location'); ?></label>
                        <div><?php echo $model_info->preferred_location; ?></div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label><?php echo app_lang('property_purpose'); ?></label>
                        <div><?php echo $model_info->property_purpose; ?></div>
                    </div>
                </div>
                
                <?php if (isset($model_info->preferred_development) && $model_info->preferred_development) { ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo app_lang('preferred_development'); ?></label>
                            <div><?php echo $model_info->preferred_development; ?></div>
                        </div>
                    </div>
                <?php } ?>
                
                <?php if (isset($model_info->property_type) && $model_info->property_type) { ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo app_lang('property_type'); ?></label>
                            <div><?php echo $model_info->property_type; ?></div>
                        </div>
                    </div>
                <?php } ?>
                
                <?php if (isset($model_info->bedrooms) && $model_info->bedrooms) { ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo app_lang('bedrooms'); ?></label>
                            <div><?php echo $model_info->bedrooms; ?></div>
                        </div>
                    </div>
                <?php } ?>
                
                <?php if (isset($model_info->bathrooms) && $model_info->bathrooms) { ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo app_lang('bathrooms'); ?></label>
                            <div><?php echo $model_info->bathrooms; ?></div>
                        </div>
                    </div>
                <?php } ?>
                
                <?php if (isset($model_info->plot_size) && $model_info->plot_size) { ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo app_lang('plot_size'); ?></label>
                            <div><?php echo $model_info->plot_size; ?></div>
                        </div>
                    </div>
                <?php } ?>
                
                <?php if (isset($model_info->property_style) && $model_info->property_style) { ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo app_lang('property_style'); ?></label>
                            <div><?php echo $model_info->property_style; ?></div>
                        </div>
                    </div>
                <?php } ?>
                
                <?php if (isset($model_info->budget_range) && $model_info->budget_range) { ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo app_lang('budget_range'); ?></label>
                            <div><?php echo $model_info->budget_range; ?></div>
                        </div>
                    </div>
                <?php } ?>
                
                <?php if (isset($model_info->expected_timeline) && $model_info->expected_timeline) { ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo app_lang('expected_timeline'); ?></label>
                            <div><?php echo $model_info->expected_timeline; ?></div>
                        </div>
                    </div>
                <?php } ?>
                
                <?php if (isset($model_info->financing_interest) && $model_info->financing_interest) { ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo app_lang('financing_interest'); ?></label>
                            <div><?php echo $model_info->financing_interest; ?></div>
                        </div>
                    </div>
                <?php } ?>
                
                <?php if (isset($model_info->additional_features) && $model_info->additional_features) { ?>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label><?php echo app_lang('additional_features'); ?></label>
                            <div><?php echo nl2br($model_info->additional_features); ?></div>
                        </div>
                    </div>
                <?php } ?>
                
                <?php if (isset($model_info->specific_requirements) && $model_info->specific_requirements) { ?>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label><?php echo app_lang('specific_requirements'); ?></label>
                            <div><?php echo nl2br($model_info->specific_requirements); ?></div>
                        </div>
                    </div>
                <?php } ?>
                
                <?php if (isset($model_info->additional_notes) && $model_info->additional_notes) { ?>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label><?php echo app_lang('description'); ?></label>
                            <div><?php echo nl2br($model_info->additional_notes); ?></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
