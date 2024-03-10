<?php
function array_null_filter(array $data): array
{
    return array_filter($data, function ($value) {
        return $value !== null;
    });
}
