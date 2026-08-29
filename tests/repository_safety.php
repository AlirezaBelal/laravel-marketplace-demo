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
if (! preg_match('/^GOOGLE_MAPS_BROWSER_KEY=$/m', $envExample)) {
    $failures[] = '.env.example must keep the optional Google Maps browser key blank';
}

$paymentController = (string) file_get_contents($root.'/app/Http/Controllers/PayController.php');
if (! str_contains($paymentController, '->verify()')) {
    $failures[] = 'Payment callback must verify the gateway transaction';
}
if (str_contains($paymentController, '69a09ffa-8521-11ea-8c16-000c295eb8fc')) {
    $failures[] = 'Legacy hard-coded merchant identifier is still present';
}

$scanRoots = ['app', 'config', 'routes', 'resources/views'];
foreach ($scanRoots as $scanRoot) {
    $directory = $root.'/'.$scanRoot;
    if (! is_dir($directory)) {
        continue;
    }

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($directory, FilesystemIterator::SKIP_DOTS)
    );
    foreach ($iterator as $file) {
        if (! $file->isFile()) {
            continue;
        }

        $extension = strtolower($file->getExtension());
        if (! in_array($extension, ['php', 'js', 'json', 'blade.php'], true)
            && ! str_ends_with($file->getFilename(), '.blade.php')) {
            continue;
        }

        $content = (string) file_get_contents($file->getPathname());

        if (preg_match('/CURLOPT_SSL_VERIFYPEER\s*,\s*false/i', $content)) {
            $failures[] = 'TLS peer verification is disabled in '.$file->getPathname();
        }
        if (preg_match('/AIza[0-9A-Za-z_-]{35}/', $content)) {
            $failures[] = 'Google API key pattern is tracked in '.$file->getPathname();
        }
        if (preg_match('/\bghp_[A-Za-z0-9]{20,}\b/', $content)
            || preg_match('/\bxox[baprs]-[A-Za-z0-9-]{10,}\b/', $content)
            || preg_match('/\bsk_live_[A-Za-z0-9]{10,}\b/', $content)
            || str_contains($content, '-----BEGIN PRIVATE KEY-----')) {
            $failures[] = 'Credential-like value is tracked in '.$file->getPathname();
        }

        if (str_starts_with($scanRoot, 'resources/views')) {
            if (preg_match('/(?<![0-9])09[0-9]{9}(?![0-9])/', $content)
                || preg_match('/۰۹[۰-۹]{9}/u', $content)) {
                $failures[] = 'Hard-coded Iranian mobile-like value is tracked in '.$file->getPathname();
            }
        }
    }
}

$composer = json_decode((string) file_get_contents($root.'/composer.json'), true);
if (! is_array($composer) || ($composer['license'] ?? null) !== 'Apache-2.0') {
    $failures[] = 'composer.json license must match LICENSE (Apache-2.0)';
}

if ($failures !== []) {
    fwrite(STDERR, "Repository safety contract failed:\n- ".implode("\n- ", $failures)."\n");
    exit(1);
}

fwrite(STDOUT, "Repository safety contract passed.\n");
