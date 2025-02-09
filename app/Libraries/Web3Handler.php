<?php

namespace App\Libraries;

use Web3\Web3;
use Web3\Contract;
use Web3\Providers\HttpProvider;
use Web3\RequestManagers\HttpRequestManager;

class Web3Handler {
    private $web3;
    private $contract;
    private $contractAddress;
    private $contractABI;
    
    public function __construct() {
        // Initialize Web3 with your Ethereum node URL (e.g., Infura)
        $provider = new HttpProvider(new HttpRequestManager(get_setting('ethereum_node_url')));
        $this->web3 = new Web3($provider);
        
        // Load smart contract ABI and address
        $this->contractABI = json_decode(file_get_contents(APPPATH . 'Config/contract_abi.json'), true);
        $this->contractAddress = get_setting('smart_contract_address');
        
        // Initialize contract instance
        $this->contract = new Contract($this->web3->provider, $this->contractABI);
    }
    
    public function createContractOnBlockchain($contractData) {
        try {
            // Prepare contract data for blockchain
            $data = [
                'contractId' => $contractData['id'],
                'clientId' => $contractData['client_id'],
                'hash' => hash('sha256', json_encode($contractData)),
                'timestamp' => time()
            ];
            
            // Call smart contract method to store contract
            $this->contract->at($this->contractAddress)->send('storeContract', $data, [
                'from' => 'YOUR_ETHEREUM_WALLET_ADDRESS',
                'gas' => '0x200000'
            ]);
            
            return true;
        } catch (\Exception $e) {
            log_message('error', 'Blockchain contract creation failed: ' . $e->getMessage());
            return false;
        }
    }
    
    public function verifyContract($contractId, $hash) {
        try {
            // Call smart contract method to verify contract
            $result = $this->contract->at($this->contractAddress)->call('verifyContract', [
                $contractId,
                $hash
            ]);
            
            return $result[0];
        } catch (\Exception $e) {
            log_message('error', 'Blockchain contract verification failed: ' . $e->getMessage());
            return false;
        }
    }
    
    public function updateContractStatus($contractId, $status) {
        try {
            // Call smart contract method to update status
            $this->contract->at($this->contractAddress)->send('updateContractStatus', [
                $contractId,
                $status
            ], [
                'from' => 'YOUR_ETHEREUM_WALLET_ADDRESS',
                'gas' => '0x200000'
            ]);
            
            return true;
        } catch (\Exception $e) {
            log_message('error', 'Blockchain contract status update failed: ' . $e->getMessage());
            return false;
        }
    }
}