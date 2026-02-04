<?php

echo "🚀 Starting DDEV Starter Setup...\n";

$targetDir = '.ddev/commands/web';
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0755, true);
}

// Copy commands and fix line endings
$commands = ['dev', 'build', 'install'];
foreach ($commands as $cmd) {
    echo "📦 Installing 'ddev $cmd'...\n";
    $source = "ddev-setup/commands/web/$cmd";
    $dest = "$targetDir/$cmd";

    if (file_exists($source)) {
        $content = file_get_contents($source);
        $content = str_replace("\r\n", "\n", $content); // Force LF
        file_put_contents($dest, $content);
        // Note: chmod doesn't always work on Windows host, 
        // but DDEV handles it inside the container if it's LF.
    }
}

// Copy extra config
echo "⚙️  Installing HMR port configuration...\n";
copy('ddev-setup/config.vite.yaml', '.ddev/config.vite.yaml');

echo "🔄 Restarting DDEV to apply changes...\n";
passthru('ddev restart');

echo "✅ Setup complete! You can now run 'ddev install' to get your dependencies.\n";
