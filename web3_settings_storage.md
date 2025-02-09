## Web3 Settings Storage

The web3 settings in this application are stored in the database through the following process:

1. The web3 settings form is defined in `app/Views/settings/web3.php` and submits to the URI "settings/save_web3_settings"

2. The `save_web3_settings` method in `app/Controllers/Settings.php` processes two settings:
   - ethereum_node_url
   - smart_contract_address

3. These settings are stored in the database through the `Settings_model` class (`app/Models/Settings_model.php`). The model:
   - Uses the `save_setting()` method to store each setting
   - Checks if the setting already exists
   - If it exists, updates the value
   - If it doesn't exist, creates a new record
   - Settings are stored with:
     - setting_name (the key)
     - setting_value (the actual value)
     - type (defaults to "app" for application settings)

The settings can later be retrieved using the `get_setting()` method of the Settings_model.