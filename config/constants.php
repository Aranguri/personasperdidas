<?php
return [
  'status' => [
    'missing_to_validate',
    'found_to_validate',
    'missing',
    'found',
    'missing_found_with_life',
    'missing_found_without_life',
    'found_refound',
    'closed'
  ],
  'possible_status_from_status' => [
    'missing_to_validate' => ['missing', 'missing_found_with_life', 'missing_found_without_life', 'closed'],
    'found_to_validate' => ['found', 'found_refound', 'closed'],
    'missing' => ['missing_to_validate', 'missing_found_with_life', 'missing_found_without_life', 'closed'],
    'found' => ['found_to_validate', 'found_refound', 'closed'],
    'missing_found_with_life' => ['missing_to_validate', 'missing', 'missing_found_without_life', 'closed'],
    'missing_found_without_life' => ['missing_to_validate', 'missing', 'missing_found_with_life', 'closed'],
    'found_refound' => ['found_to_validate', 'found', 'closed'],
    'closed' => ['missing_to_validate', 'found_to_validate', 'missing', 'found', 'missing_found_with_life', 'missing_found_without_life', 'found_refound']
  ],
  'button_data_from_status' => [
    'missing_to_validate' => 'info',
    'found_to_validate' => 'info',
    'missing' => 'primary',
    'found' => 'primary',
    'missing_found_with_life' => 'success',
    'missing_found_without_life' => 'default',
    'found_refound' => 'success',
    'closed' => 'default'
  ],
];
?>