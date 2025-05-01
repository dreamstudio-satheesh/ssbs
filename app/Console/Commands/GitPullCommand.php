<?php

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class GitPullCommand extends Command
{
    protected $signature = 'git:pull {--branch= : The branch to pull from}';
    protected $description = 'Execute git pull on the project';

    public function handle()
    {
        $branch = $this->option('branch') ?? config('app.git_branch', 'master');
        
        $process = new Process(['git', 'pull', 'origin', $branch]);
        $process->setWorkingDirectory(base_path());
        
        try {
            $process->mustRun();
            $this->info('Git pull successful: '.$process->getOutput());
            return 0;
        } catch (ProcessFailedException $exception) {
            $this->error('Git pull failed: '.$exception->getMessage());
            return 1;
        }
    }
}