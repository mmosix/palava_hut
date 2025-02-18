<?php

namespace App\Libraries;

use Config\Mapping;

class MappingHandler {
    private $config;
    private $cache;
    
    public function __construct() {
        $this->config = new Mapping();
        $this->cache = \Config\Services::cache();
    }
    
    /**
     * Map data according to configured mappings
     */
    public function mapData($sourceData, $context = null) {
        if (!$this->config->defaultMap['enabled']) {
            return $sourceData;
        }

        $result = [];
        
        // Apply field mappings
        foreach ($this->config->fieldMappings as $source => $target) {
            if (isset($sourceData[$source])) {
                $result[$target] = $this->transformField(
                    $sourceData[$source],
                    $source
                );
            }
        }
        
        return $result;
    }
    
    /**
     * Apply transformation rules to a field
     */
    private function transformField($value, $fieldName) {
        if (!isset($this->config->transformationRules[$fieldName])) {
            return $value;
        }
        
        $rules = $this->config->transformationRules[$fieldName];
        
        foreach ($rules as $rule => $params) {
            switch ($rule) {
                case 'uppercase':
                    $value = strtoupper($value);
                    break;
                case 'lowercase':
                    $value = strtolower($value);
                    break;
                case 'trim':
                    $value = trim($value);
                    break;
            }
        }
        
        return $value;
    }
    
    /**
     * Validate mapped data
     */
    public function validateMapping($mappedData) {
        if (!$this->config->defaultMap['validateInput']) {
            return true;
        }
        
        // Add validation logic here
        return true;
    }
}