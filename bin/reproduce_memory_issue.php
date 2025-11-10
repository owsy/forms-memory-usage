<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Form\Type\RootType;
use Symfony\Component\Form\Forms;

echo "=== Symfony Forms Memory Reproduction ===" . PHP_EOL . PHP_EOL;

$initialMemory = memory_get_usage();
$initialPeakMemory = memory_get_peak_usage(true);

echo "Initial memory usage: " . number_format($initialMemory / 1024 / 1024, 2) . " MB" . PHP_EOL;
echo "Initial peak memory: " . number_format($initialPeakMemory / 1024 / 1024, 2) . " MB" . PHP_EOL . PHP_EOL;

$formFactory = Forms::createFormFactory();

echo "Form factory created" . PHP_EOL;

$preFormMemory = memory_get_usage();
$preFormPeakMemory = memory_get_peak_usage(true);

echo "Pre-form memory usage: " . number_format($preFormMemory / 1024 / 1024, 2) . " MB" . PHP_EOL;
echo "Pre-form peak memory: " . number_format($preFormPeakMemory / 1024 / 1024, 2) . " MB" . PHP_EOL . PHP_EOL;

echo "Creating data structure: 1 location → 20 sublocations → 20 buildings each" . PHP_EOL;

$data = [
    'locations' => [
        [
            'subLocations' => array_fill(0, 20, [
                'buildings' => array_fill(0, 20, [])
            ]),
        ],
    ],
];

echo "Data structure created: " . (1 * 20 * 20) . " buildings total" . PHP_EOL;
echo "Expected fields: ~" . number_format(1 * 20 * 20 * 101) . " (each building has 101 fields)" . PHP_EOL . PHP_EOL;

echo "Creating form..." . PHP_EOL;
$startTime = microtime(true);

$form = $formFactory->create(RootType::class, $data);

$endTime = microtime(true);
$duration = ($endTime - $startTime) * 1000;

echo "Form created in " . number_format($duration, 2) . " ms" . PHP_EOL . PHP_EOL;

$postFormMemory = memory_get_usage();
$postFormPeakMemory = memory_get_peak_usage(true);

echo "Post-form memory usage: " . number_format($postFormMemory / 1024 / 1024, 2) . " MB" . PHP_EOL;
echo "Post-form peak memory: " . number_format($postFormPeakMemory / 1024 / 1024, 2) . " MB" . PHP_EOL . PHP_EOL;

$memoryIncrease = $postFormMemory - $preFormMemory;
$peakMemoryIncrease = $postFormPeakMemory - $preFormPeakMemory;

echo "=== Summary ===" . PHP_EOL;
echo "Memory increase: " . number_format($memoryIncrease / 1024 / 1024, 2) . " MB" . PHP_EOL;
echo "Peak memory increase: " . number_format($peakMemoryIncrease / 1024 / 1024, 2) . " MB" . PHP_EOL;
echo "Total peak memory: " . number_format($postFormPeakMemory / 1024 / 1024, 2) . " MB" . PHP_EOL;