<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Mapping extends BaseConfig {
    /**
     * Default mapping configurations
     */
    public $defaultMap = [
        'enabled' => true,
        'cacheEnabled' => true,
        'cacheExpiration' => 3600, // 1 hour
        'validateInput' => true,
    ];

    /**
     * Custom field mappings
     */
    public $fieldMappings = [
        // Define your field mappings here
        // 'sourceField' => 'targetField'
    ];

    /**
     * Transformation rules
     */
    public $transformationRules = [
        // Define transformation rules here
        // 'fieldName' => ['transform' => 'uppercase|lowercase|trim']
    ];
}