-- Settings are stored in the existing 'settings' table
-- No new table needed as settings are stored as key-value pairs
INSERT INTO ph_settings (setting_name, setting_value, type) VALUES 
('ethereum_node_url', '', 'app'),
('wallet_address', '', 'app'),
('gas_limit', '2000000', 'app'),
('smart_contract_address', '', 'app');