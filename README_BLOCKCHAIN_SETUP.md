# Blockchain Integration Setup Guide

This application now includes blockchain integration for contract management. Follow these steps to set up the blockchain functionality:

## Prerequisites

1. An Ethereum node URL (e.g., Infura endpoint)
2. A deployed smart contract address
3. An Ethereum wallet address for sending transactions
4. Composer package for web3.php: `web3p/web3.php`

## Configuration

1. Update the configuration in `app/Config/Web3.php`:
   - Set `$nodeUrl` to your Ethereum node URL
   - Set `$contractAddress` to your deployed smart contract address
   - Set `$walletAddress` to your Ethereum wallet address
   - Adjust `$gasLimit` if needed (default: 0x200000)

2. Install the required dependency:
   ```bash
   composer require web3p/web3.php
   ```

## Features

The blockchain integration provides:
- Contract storage on the blockchain
- Contract verification
- Status updates tracking
- Immutable audit trail

## Smart Contract Requirements

Ensure your deployed smart contract implements these functions:
- `storeContract(uint256 _contractId, uint256 _clientId, string _hash, uint256 _timestamp)`
- `verifyContract(uint256 _contractId, string _hash)`
- `updateContractStatus(uint256 _contractId, string _status)`

## Testing

1. Create a test contract to verify blockchain storage
2. Check transaction status in your Ethereum network explorer
3. Verify contract data using the verifyContract function

## Security Considerations

- Keep your wallet private keys secure
- Use environment variables for sensitive configuration
- Implement proper access controls
- Monitor gas costs and transaction fees