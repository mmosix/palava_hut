# Mapping Implementation Guide

Following the Web3 implementation pattern, we have created a structured mapping system with the following components:

1. **Config/Mapping.php**
   - Contains all mapping configurations
   - Defines field mappings and transformation rules
   - Controls global mapping behavior

2. **Libraries/MappingHandler.php**
   - Handles all mapping operations
   - Implements transformation logic
   - Provides validation capabilities

## Usage Example

```php
$mappingHandler = new \App\Libraries\MappingHandler();

// Data to be mapped
$sourceData = [
    'first_name' => 'John',
    'last_name' => 'DOE',
];

// Perform mapping
$mappedData = $mappingHandler->mapData($sourceData);
```

## Configuration

Define your mappings in `Config/Mapping.php`:

```php
public $fieldMappings = [
    'first_name' => 'firstName',
    'last_name' => 'lastName'
];

public $transformationRules = [
    'firstName' => ['transform' => 'trim'],
    'lastName' => ['transform' => 'uppercase']
];
```

The implementation follows the same pattern as Web3Handler:
- Dedicated configuration file
- Handler class in Libraries
- Clear separation of concerns
- Configurable behavior