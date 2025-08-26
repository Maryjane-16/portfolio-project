<?php

function render(string $viewPath, array $data = []): void
{
    extract($data);
    require_once dirname(__DIR__) . '/templates/' . $viewPath;
}