<?php
namespace App\Interfaces;

interface Sortable {
    function sortBy (string $field): mixed;
}