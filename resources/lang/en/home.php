<?php

return [
  // sections
  'missing' => 'Missing people',
  'looking_for_their_families' => 'Looking for their families',
  'reencounter' => 'Reencounter',
  'report' => 'Report a person',

  // footer.titles
  'social_networks' => 'Social networks',
  'contact_details' => 'Contact details',
  'subscribe_for_alerts_of_missing_people' => 'Subscribe for alerts of missing people',

  // footer.links
  'collaborators' => 'Collaborators',
  'send_feedback' => 'Send feedback',
  'developers' => 'Developers',
  'privacy' => 'Privacy',
  'terms' => 'Terms',

  // social networks
  'share' => 'Share',
  'facebook' => 'Facebook',
  'twitter' => 'Twitter',
  'instagram' => 'Instagram',
  'tweet' => [
    'title' => 'Twittear',
    'missing' => [
      'hashtag' => 'LookingFor:name',
      'looking_for' => 'We are looking for :name :surname.',
      'location' => 'Last seen in :area_province.',
    ],
    'found' => [
      'hashtag' => 'LookingForFamiliarsOf:name',
      'looking_for' => 'We are looking for relatives of :name :surname.',
      'location' => 'Found in :area_province.',
    ],
    'help_diffusion' => 'Help in the diffusion!',
  ],

  // developers
  'developers_title' => 'Developers',
  'developers_subtitle' => 'If you want to help in the develop of the platform, or run missing people in your country, please leave your E-Mail.',

  // people.index
  'missing_people' => 'Missing people',
  'more_details' => 'More details',
  'previous' => 'Previous',
  'next' => 'Next',

  // people.show
  'send_contribution' => 'I know something about :name',
  'person' => [
    'seen' => 'seen',
    'seen_man' => 'seen',
    'seen_other' => 'seen',
    'seen_woman' => 'seen',

    'found' => 'found',
    'found_man' => 'found',
    'found_other' => 'found',
    'found_woman' => 'found',

    'title_missing' => 'We are looking for :name :surname',
    'description_missing' => ':name :surname get lost. The last time :article was :seen was in :address, at :date. We need your help to spread!',
    'title_found' => 'We are looking for the family of :name :surname',
    'description_found' => ':name :surname was :found in :address, at :date. We need your help to spread!',
    'title_reencounter' => ':name :surname returned with his family!',
    'description_reencounter' => 'Thanks to the help of everyone of us, :name :surname returned with his family.',
  ],

  'description' => [
    'article_man' => 'He',
    'article_other' => 'He',
    'article_woman' => 'She',

    'name_surname_missing' => ':name :surname is missing. ',
    'name_surname_found' => 'We are looking for relatives of :name :surname. ',
    'name_missing' => ':name is missing. ',
    'name_found' => 'We are looking for relatives of :name. ',
    'surname_missing' => ':surname is missing. ',
    'surname_found' => 'We are looking for relatives of :surname. ',

    'date_location_missing' => ':article was seen for last time at :date, in :location. ',
    'date_location_found' => ':article was found at :date, in :location. ',
    'date_missing' => ':article was seen for last time at :date. ',
    'date_found' => ':article was found at :date. ',
    'location_missing' => ':article was seen for last time in :location. ',
    'location_found' => ':article was found in :location. ',

    'age' => ':article is :age years old.',

    'diseases' => 'He is under medical treatment.'
  ],

  // people.showForPrint
  'print' => [
    'title' => 'Print',
    'name_surname_missing' => 'We are looking for :name :surname',
    'name_surname_found' => 'We are looking for relatives of :name :surname',
    'name_missing' => 'We are looking for :name',
    'name_found' => 'We are looking for relatives of :name',
    'surname_missing' => 'We are looking for :surname',
    'surname_found' => 'We are looking for relatives of :surname',
    'more_information' => 'More information on our website or social networks',
    'organization_title' => 'Personas Perdidas - Red Solidaria',
  ],

  // people.create
  'status_title' => 'The person that you are reporting is:',
  'step' => 'Step :step',
  'steps' => [
    '1' => 'Fill the fields you know about the person that you are reporting as :status',
    '2' => 'Attach an image of the :status person that you are reporting',
    '3' => 'Fill the fields with the approximate or exact location of where the :status person was seen for last time',
    '4' => 'Fill the fields with the approximate or exact date of when the :status person was seen for last time',
    '5' => 'More details about the :status person',
    '6' => 'Contact information about you',
  ],
  'here' => 'here',
  'successful_report' => 'Successful report',
  'successful_report_messages' => [
    '1' => 'The form has been submitted successfully.',
    '2' => 'Soon, a person of our network, will contact you to continue the process.',
    '3' => 'Meanwhile, we suggest to read our recommendations',
  ],

  // people.contributions
  'contributions' => 'Contribution',
  'contributions_title' => 'Fill the fields with what you know about :name',
  'successful_contribution' => 'Successful contribution',
  'successful_contribution_messages' => [
    '1' => 'The contribution has been submitted successfully.',
    '2' => 'Thanks for the contribution, it will be revised soon.',
    '3' => 'Continue seeing information about :name',
  ],
  'details' => 'Details',
  'location' => 'Where?',
  'date' => 'When?',
  'contact_data' => 'Contact data',

  // others
  'months' => [
    '1' => 'January',
    '2' => 'February',
    '3' => 'March',
    '4' => 'April',
    '5' => 'May',
    '6' => 'June',
    '7' => 'July',
    '8' => 'August',
    '9' => 'September',
    '10' => 'October',
    '11' => 'November',
    '12' => 'December',
  ],

  // suggestions
  'suggestion_title' => 'Send us your opinion and suggestions about the site',
  'successful_suggestion' => 'Successful feedback',
  'successful_suggestion_message' => 'Your feedback has been received successfully and it will be revised soon. Thanks!',

  // subscribers
  'subscribe_title' => 'Subscribe to receive announcements of missing people',
  'successful_subscribe' => 'Successful subscribe',
  'successful_subscribe_message' => [
    '1' => 'Your E-Mail has been saved successfuly.',
    '2' => 'Hereinafter you will receive announcements about missing and found people',
  ],

  'unsubscribe_title' => 'Write your E-Mail in order to unsubscribe',
  'successful_unsubscribe' => 'Successful unsubscribe',
  'successful_unsubscribe_message' => [
    '1' => 'Your E-Mail has been removed successfuly.',
    '2' => 'If you want to subscribe again click',
  ],

  // recommendations
  'recommendations' => 'Recommendations',
];