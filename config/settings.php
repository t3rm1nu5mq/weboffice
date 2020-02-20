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
        ],

        'error_codes' => [
            'has_invoice_delete_exception' => [
                'message' => 'A fizetési tranzakcióhoz számla tartozik, törléséhez sztornózza a számlát.',
                'code' => 418
            ],
            'not_found_exception' => [
                'message' => 'A keresett adat nem található a rendszerben',
                'code' => 419
            ]
        ]

    ];
