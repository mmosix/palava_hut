<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Web3 extends BaseConfig {
    /**
     * Ethereum Node URL (e.g., Infura endpoint)
     */
    public $nodeUrl = '';

    /**
     * Smart Contract Address
     */
    public $contractAddress = '';

    /**
     * Wallet Address for Transactions
     */
    public $walletAddress = 'YOUR_ETHEREUM_WALLET_ADDRESS';

    /**
     * Gas Limit for Transactions
     */
    public $gasLimit = '0x200000';
}