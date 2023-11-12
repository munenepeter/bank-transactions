<?php

namespace Chungu\Core\Mantle;

class Config
{
    protected static $envFilePath;
    protected static $cacheKey = 'config_cache';


    public function load()
    {
        // Check if cached config exists
        $cachedConfig = Cache::get($this->cacheKey);
        if ($cachedConfig !== null) {
            return $cachedConfig;
        }

        // If not, load and parse the configuration file
        $config = $this->parseFile();

        // Cache the config for future use
        Cache::put($this->cacheKey, $config);

        return $config;
    }

    private static function checkEnvFile(){
        //check if the file exists & is readable
        if(!is_readable($env_file)){
            //log that the env does not exist

            //if not available, copy the ENV.EXAMPLE
            if(!copy(from: $env_example_file, to: $env_file)){

            } //log that the copy operation failed
        }
    }

    protected function parseFile()
    {
        $config = [];

        // Check if the file exists and is readable
        if (!is_readable($this->envFilePath)) {
          
        }

        $envLines = file($this->envFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($envLines as $line) {
            // Check if the line contains an underscore
            if (strpos($line, '_') !== false) {
                [$parent, $childWithValue] = explode('_', $line, 2);

                // Check if the second part contains an equal sign
                if (strpos($childWithValue, '=') !== false) {
                    [$child, $value] = explode('=', $childWithValue, 2);

                    // Assign the value to the config array
                    $config[strtolower($parent)][strtolower($child)] = $value;
                }
            }
        }

        foreach ($config as $parent => $childArray) {
            foreach ($childArray as $child => $value) {
                $config[$parent][$child] = $this->replaceVariables($value, $config);
            }
        }

        return $config;
    }

    protected function replaceVariables($value, $config) {

        return preg_replace_callback(
            '/\${(.*?)}/',
            function ($matches) use ($config) {
                $variablePath = strtolower($matches[1]); 
                $variablePathParts = explode('_', $variablePath);

                $currentValue = $config;

                foreach ($variablePathParts as $part) {
                    $part = strtolower($part);
                    if (isset($currentValue[$part])) {
                        $currentValue = $currentValue[$part];
                    } else {
                        return ''; 
                    }
                }

                return $currentValue;
            },
            $value
        );
    }
}
