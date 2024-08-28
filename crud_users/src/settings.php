<?php

declare(strict_types=1);


namespace src;

function settings(): \Slim\Container
{
    $configuration = [
        'settings' => [
            'displayErrorDetails' => getenv('DISPLAY_ERRORS_DETAILS'),
            'logError' => true,
            'logErrorDetails' => false,
        ],
    ];
    return new \Slim\Container($configuration);
}

;