<?php

return [
    'forbidden_words' => [
        'spam',
        'test'
    ],

    'model' => [
        'detectionMethods' => [
            empyrean\spam_detection\detections\ForbiddenWords::class,
            empyrean\spam_detection\detections\KeyHeldDown::class,
            empyrean\spam_detection\detections\RemoveUrls::class,
            empyrean\spam_detection\detections\DoublePosts::class,
            empyrean\spam_detection\detections\FrequentPosting::class
        ],
        'model_body' => 'body',
        'frequent_posting' => 30
    ],
    'text' => [
        'detectionMethods' => [
            empyrean\spam_detection\detections\ForbiddenWords::class,
            empyrean\spam_detection\detections\KeyHeldDown::class,
            empyrean\spam_detection\detections\RemoveUrls::class,
        ]
    ]
];