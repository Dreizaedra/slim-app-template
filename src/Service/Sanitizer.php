<?php

namespace App\Service;

class Sanitizer {
    /**
     * Sanitize user input based on its type
     * @param string $value Input value to sanitize
     * @param string $type filter_list() type : https://www.php.net/manual/en/function.filter-list.php
     * @return mixed
     */
    public static function sanitizeUserInput(mixed $value, string $type): mixed 
    {
        return filter_var(
            stripcslashes(htmlspecialchars($value)), 
            filter_id($type)
        );
    }
}