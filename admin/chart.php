<?php


// *************************************************************************************

          // Replace this with your PHP code to fetch data for the day chart
          $dayData = [
            'labels' => ['', 'Magazine', 'Mind Booster', 'Loops', 'Videos', 'Blog'],
            'data' => [0, 40, 20, 35, 25, 35],
            'backgroundColor' => ['rgba(75, 192, 192, 0.8)', 'rgba(255, 99, 132, 0.8)', 'rgba(255, 205, 86, 0.8)', 'rgba(54, 162, 235, 0.8)', 'rgba(153, 102, 255, 0.8)', 'rgba(255, 159, 64, 0.8)'],
            'borderColor' => ['rgba(75, 192, 192, 0.8)', 'rgba(255, 99, 132, 0.8)', 'rgba(255, 205, 86, 0.8)', 'rgba(54, 162, 235, 0.8)', 'rgba(153, 102, 255, 0.8)', 'rgba(255, 159, 64, 0.8)'],
            'borderWidth' => 1,
          ];

  // Replace this with your PHP code to fetch data for the month chart
  $monthData = [
    'labels' => ['', 'Magazine', 'Mind Booster', 'Loops', 'Videos', 'Blog'],
    'data' => [0, 30, 25, 40, 20, 30],
    'backgroundColor' => ['rgba(75, 192, 192, 0.8)', 'rgba(255, 99, 132, 0.8)', 'rgba(255, 205, 86, 0.8)', 'rgba(54, 162, 235, 0.8)', 'rgba(153, 102, 255, 0.8)', 'rgba(255, 159, 64, 0.8)'],
            'borderColor' => ['rgba(75, 192, 192, 0.8)', 'rgba(255, 99, 132, 0.8)', 'rgba(255, 205, 86, 0.8)', 'rgba(54, 162, 235, 0.8)', 'rgba(153, 102, 255, 0.8)', 'rgba(255, 159, 64, 0.8)'],
            'borderWidth' => 1,
  ];

     // Replace this with your PHP code to fetch data for the year chart
     $yearData = [
        'labels' => ['', 'Magazine', 'Mind Booster', 'Loops', 'Videos', 'Blog'],
        'data' => [0, 23, 40, 50, 30, 45],
        'backgroundColor' => ['rgba(75, 192, 192, 0.8)', 'rgba(255, 99, 132, 0.8)', 'rgba(255, 205, 86, 0.8)', 'rgba(54, 162, 235, 0.8)', 'rgba(153, 102, 255, 0.8)', 'rgba(255, 159, 64, 0.8)'],
            'borderColor' => ['rgba(75, 192, 192, 0.8)', 'rgba(255, 99, 132, 0.8)', 'rgba(255, 205, 86, 0.8)', 'rgba(54, 162, 235, 0.8)', 'rgba(153, 102, 255, 0.8)', 'rgba(255, 159, 64, 0.8)'],
            'borderWidth' => 1,
      ];

// *************************************************************************************

// Replace this with your actual data retrieval logic from the database.
// Assume you have counts for Elementary School and Middle School teachers.
$elementarySchoolTeachers = 50;
$middleSchoolTeachers = 30;

// Create a data structure for Chart.js
$teacherData = [
    'labels' => ['Elementary School', 'Middle School'],
    'datasets' => [
        [
            'data' => [$elementarySchoolTeachers, $middleSchoolTeachers],
            'backgroundColor' => ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
            'borderColor' => ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
            'borderWidth' => 1,
        ],
    ],
];

// *************************************************************************************


// Replace this with your actual data retrieval logic from the database.
// Assume you have counts for Lower School and Middle School students for each level.
$lowerSchoolCounts = [100, 120, 110, 105, 95, 90]; // Counts for Degree 1 to Darjah 6
$middleSchoolCounts = [80, 85, 90, 75, 70]; // Counts for Form 1 to Form 5

// Labels for each level.
$labels = ['Degree 1', 'Degree 2', 'Degree 3', 'Degree 4', 'Degree 5', 'Darjah 6']; // Levels for Lower School
$labelsMiddle = ['Form 1', 'Form 2', 'Form 3', 'Form 4', 'Form 5']; // Levels for Middle School

// Create a data structure for Chart.js
$studentData = [
    'labels' => $labels,
    'datasets' => [
        [
            'label' => 'Lower School',
            'data' => $lowerSchoolCounts,
            'backgroundColor' => 'rgba(75, 192, 192, 0.8)',
            'borderColor' => 'rgba(75, 192, 192, 0.8)',
            'borderWidth' => 1,
        ],
        [
            'label' => 'Middle School',
            'data' => $middleSchoolCounts,
            'backgroundColor' => 'rgba(255, 99, 132, 0.8)',
            'borderColor' => 'rgba(255, 99, 132, 0.8)',
            'borderWidth' => 1,
        ],
    ],
];

// *************************************************************************************



// Simulated data for Log In and Register page views.
$logInData = [
    'labels' => ['Day', 'Month', 'Year'],
    'datasets' => [
        [
            'label' => 'Log In',
            'data' => [100, 200, 500], // Replace with actual data for Log In page views for day, month, and year
            'backgroundColor' => [
                'rgba(75, 192, 192, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(75, 192, 192, 0.8)',
            ],
            'borderColor' => [
                'rgba(75, 192, 192, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(75, 192, 192, 0.8)',
            ],
            'borderWidth' => 1,
        ],
    ],
];

$registerData = [
    'labels' => ['Day', 'Month', 'Year'],
    'datasets' => [
        [
            'label' => 'Register',
            'data' => [80, 180, 450], // Replace with actual data for Register page views for day, month, and year
            'backgroundColor' => [
                'rgba(255, 99, 132, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(255, 99, 132, 0.8)',
            ],
            'borderColor' => [
                'rgba(255, 99, 132, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(255, 99, 132, 0.8)',
            ],
            'borderWidth' => 1,
        ],
    ],
];

// *************************************************************************************


$ctrData = [
    'Day' => [
        'CTA 1' => 50,
        'CTA 2' => 30,
        'CTA 3' => 40,
    ],
    'Month' => [
        'CTA 1' => 200,
        'CTA 2' => 150,
        'CTA 3' => 180,
    ],
    'Year' => [
        'CTA 1' => 800,
        'CTA 2' => 600,
        'CTA 3' => 720,
    ],
];

$chartData = [
    'labels' => array_keys(current($ctrData)),
    'datasets' => [],
];

// Define unique background colors and border colors for each period
$backgroundColors = [
    'Day' => 'rgba(75, 192, 192, 0.8)',
    'Month' => 'rgba(255, 145, 96, 0.8)',
    'Year' => 'rgba(255, 221, 96, 0.8)',
];

$borderColors = [
    'Day' => 'rgba(75, 192, 192, 1)',
    'Month' => 'rgba(255, 159, 96, 1)',
    'Year' => 'rgba(255, 221, 96, 1)',
];

foreach ($ctrData as $period => $ctaValues) {
    $dataset = [
        'label' => $period,
        'data' => array_values($ctaValues),
        'backgroundColor' => $backgroundColors[$period],
        'borderColor' => $borderColors[$period],
        'borderWidth' => 1,
    ];
    $chartData['datasets'][] = $dataset;
}


// *************************************************************************************


// Replace these arrays with your actual data retrieval logic from the database.

// Sample data for content creation per month.
$contentData = [
    'Magazine' => [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150, 160],
    'Mind Booster' => [30, 20, 50, 60, 70, 80, 90, 100, 110, 120, 130, 140], // Some values lowered
    'Loops' => [40, 55, 50, 45, 60, 65, 70, 75, 80, 85, 90, 95], // Some values higher, some lower
    'Videos' => [70, 25, 60, 35, 40, 45, 50, 55, 20, 65, 70, 75], // Some values higher, some lower
    'Social' => [15, 20, 25, 30, 35, 40, 10, 50, 105, 60, 25, 70],
    'Blog' => [25, 30, 35, 40, 80, 50, 55, 60, 65, 70, 75, 45], // Some values higher, some lower
];

// Create an array to store the labels for each month.
$months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

// Define an array of background colors for each content type.
$backgroundColors = [
    'Magazine' => 'rgba(75, 192, 192, 0.8)',
    'Mind Booster' => 'rgba(255, 99, 132, 0.8)',
    'Loops' => 'rgba(255, 205, 86, 0.8)',
    'Videos' => 'rgba(54, 162, 235, 0.8)',
    'Social' => 'rgba(153, 102, 255, 0.8)',
    'Blog' => 'rgba(255, 159, 64, 0.8)',
];

// Create an array for datasets, one for each content type.
$datasets = [];

foreach ($contentData as $contentType => $values) {
    $dataset = [
        'label' => $contentType,
        'data' => $values,
        'backgroundColor' => $backgroundColors[$contentType], // Use the defined background color
        'borderColor' => $backgroundColors[$contentType], // You can customize the border color
        'fill' => false,
    ];
    $datasets[] = $dataset;
}
 
// Create the data structure for Chart.js.
$chartData1 = [
    'labels' => $months,
    'datasets' => $datasets,
];

// *************************************************************************************
