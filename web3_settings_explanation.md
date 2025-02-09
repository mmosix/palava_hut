# Web3 Settings Storage and Retrieval

## Database Structure
The Web3 settings are stored in the existing `settings` table. This table uses a key-value pair structure with the following columns:
- `setting_name` (string): The key/identifier for the setting
- `setting_value` (string): The value of the setting
- `type` (string): The type of setting (in this case, 'app')

## Settings Being Stored
The following Web3-related settings are stored:
1. `ethereum_node_url` - The URL of the Ethereum node (e.g., Infura endpoint)
2. `wallet_address` - The wallet address used for transactions
3. `gas_limit` - The gas limit for transactions (default: 2000000)
4. `smart_contract_address` - The address of the smart contract

## Storage and Retrieval
- Settings are stored using the `settings` table's key-value structure
- Values can be retrieved using the `get_setting()` function (e.g., `get_setting("wallet_address")`)
- Values can be updated through the web interface in the Web3 settings page

No additional tables need to be created as the existing `settings` table structure is sufficient for storing these configuration values.