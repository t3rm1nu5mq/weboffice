<?php

    return [
        'payment_methods' => [
            'credit_card' => 0,
            'cash' => 1,
            'transfer' => 2
        ],

        'issue_statuses' => [
            'open' => [
                'id' => 0,
                'name' => 'nyitva'
            ],
            'success' => [
                'id' => 1,
                'name' => 'megoldva'
            ],
            'closed' => [
                'id' => 2,
                'name' => 'lezárva'
            ]
        ],

        'issue_types' => [
            'bug' => [
                'id' => 1,
                'title' => 'Hiba'
            ],
            'feature' => [
                'id' => 2,
                'title' => 'Új szolgáltatás'
            ]
        ]

    ];
