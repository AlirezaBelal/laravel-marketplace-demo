<?php

declare(strict_types=1);

$root = dirname(__DIR__);
$failures = [];

$docPath = $root.'/DOC';
if (is_dir($docPath)) {
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($docPath, FilesystemIterator::SKIP_DOTS)
    );
    foreach ($iterator as $file) {
        if ($file->isFile() && strtolower($file->getExtension()) === 'sql') {
            $failures[] = 'Database dump is tracked: '.$file->getPathname();
        }
    }
}

$envExample = (string) file_get_contents($root.'/.env.example');
if (! preg_match('/^PAYMENT_METHOD=local$/m', $envExample)) {
    $failures[] = '.env.example must default to the local payment driver';
}
if (! preg_match('/^APP_DEBUG=false$/m', $envExample)) {
    $failures[] = '.env.example must keep APP_DEBUG disabled by default';
}

$paymentController = (string) file_get_contents($root.'/app/Http/Controllers/PayController.php');
if (! str_contains($paymentController, '->verify()')) {
    $failures[] = 'Payment callback must verify the gateway transaction';
}
if (str_contains($paymentController, '69a09ffa-8521-11ea-8c16-000c295eb8fc')) {
    $failures[] = 'Legacy hard-coded merchant identifier is still present';
}

$scanRoots = ['app', 'config', 'routes'];
foreach ($scanRoots as $scanRoot) {
    $directory = $root.'/'.$scanRoot;
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($directory, FilesystemIterator::SKIP_DOTS)
    );
    foreach ($iterator as $file) {
        if (! $file->isFile() || strtolower($file->getExtension()) !== 'php') {
            continue;
        }
        $content = (string) file_get_contents($file->getPathname());
        if (preg_match('/CURLOPT_SSL_VERIFYPEER\s*,\s*false/i', $content)) {
            $failures[] = 'TLS peer verification is disabled in '.$file->getPathname();
        }
    }
}

$composer = json_decode((string) file_get_contents($root.'/composer.json'), true);
if (! is_array($composer) || ($composer['license'] ?? null) !== 'Apache-2.0') {
    $failures[] = 'composer.json license must match LICENSE.md (Apache-2.0)';
}

if ($failures !== []) {
    fwrite(STDERR, "Repository safety contract failed:\n- ".implode("\n- ", $failures)."\n");
    exit(1);
}

fwrite(STDOUT, "Repository safety contract passed.\n");
