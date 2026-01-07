<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\OpenSslService;

class TrustLabCdnPurge extends Command
{
    protected $signature = 'trustlab:cdn-purge {--force : Force the operation without confirmation}';
    protected $description = 'Purge all Certification Authority assets from the CDN (Cloudflare R2)';

    public function handle(OpenSslService $sslService)
    {
        if (!$this->option('force') && !$this->confirm('This will PERMANENTLY delete all CA files from the CDN. Continue?')) {
            $this->info('Operation cancelled.');
            return 0;
        }

        $this->info('Purging CDN assets...');
        
        try {
            $sslService->purgeAllCaFromCdn();
            $this->info('CDN successfully purged and local sync status reset.');
        } catch (\Exception $e) {
            $this->error('Purge failed: ' . $e->getMessage());
            return 1;
        }

        return 0;
    }
}
