<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class TrustLabMagicLink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trustlab:magic-link {email=owner@trustlab.com} {--ttl=15}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a temporary magic link for AI testing/debugging (bypasses Turnstile)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $ttl = (int) $this->option('ttl');

        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("User with email {$email} not found.");
            return 1;
        }

        $token = Str::random(64);
        // Store in cache for 15 minutes (default)
        Cache::put("magic_link_{$token}", $user->id, now()->addMinutes($ttl));

        $baseUrl = config('app.url');
        // The route will be defined in web.php
        $magicUrl = "{$baseUrl}/auth/magic?token={$token}";

        $this->info("Magic Link generated for {$user->first_name} ({$user->role})");
        $this->info("URL: {$magicUrl}");
        $this->info("Expires in: {$ttl} minutes");
        $this->warn("CAUTION: This bypasses Turnstile and establishes a session. Use only for autonomous testing.");

        return 0;
    }
}
