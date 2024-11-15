<?php 

function redirect(string $locationName): void 
{
    header('Location: ' . $locationName);
    exit;
}
