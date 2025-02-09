<div id="page-content" class="page-wrapper clearfix">
    <div class="row">
        <div class="col-sm-3 col-lg-2">
            <?php
            $tab_view['active_tab'] = "web3_settings";
            echo view("settings/tabs", $tab_view);
            ?>
        </div>

        <div class="col-sm-9 col-lg-10">
            <div class="card">
                <?php echo form_open(get_uri("settings/save_web3_settings"), array("id" => "web3-settings-form", "class" => "general-form dashed-row", "role" => "form")); ?>
                <div class="card-header">
                    <h4><?php echo app_lang("web3_settings"); ?></h4>
                </div>
    <div class="card-body">
        <div class="form-group">
            <div class="row">
                <label for="ethereum_node_url" class=" col-md-2"><?php echo app_lang('ethereum_node_url'); ?></label>
                <div class=" col-md-10">
                    <?php
                    echo form_input(array(
                        "id" => "ethereum_node_url",
                        "name" => "ethereum_node_url",
                        "value" => get_setting("ethereum_node_url"),
                        "class" => "form-control",
                        "placeholder" => "https://mainnet.infura.io/v3/your-project-id",
                        "data-rule-required" => true,
                        "data-msg-required" => app_lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <div class="row">
                <label for="wallet_address" class="col-md-2"><?php echo app_lang('wallet_address'); ?></label>
                <div class="col-md-10">
                    <?php
                    echo form_input(array(
                        "id" => "wallet_address",
                        "name" => "wallet_address",
                        "value" => get_setting("wallet_address"),
                        "class" => "form-control",
                        "placeholder" => "0x...",
                        "data-rule-required" => true,
                        "data-msg-required" => app_lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label for="gas_limit" class="col-md-2"><?php echo app_lang('gas_limit'); ?></label>
                <div class="col-md-10">
                    <?php
                    echo form_input(array(
                        "id" => "gas_limit",
                        "name" => "gas_limit",
                        "value" => get_setting("gas_limit"),
                        "class" => "form-control",
                        "placeholder" => "2000000",
                        "type" => "number",
                        "data-rule-required" => true,
                        "data-msg-required" => app_lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="smart_contract_address" class=" col-md-2"><?php echo app_lang('smart_contract_address'); ?></label>
                <div class=" col-md-10">
                    <?php
                    echo form_input(array(
                        "id" => "smart_contract_address",
                        "name" => "smart_contract_address",
                        "value" => get_setting("smart_contract_address"),
                        "class" => "form-control",
                        "placeholder" => "0x...",
                        "data-rule-required" => true,
                        "data-msg-required" => app_lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary"><span data-feather="check-circle" class="icon-16"></span> <?php echo app_lang('save'); ?></button>
    </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>