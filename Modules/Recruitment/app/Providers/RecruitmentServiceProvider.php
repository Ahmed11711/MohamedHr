<?php

namespace Modules\Recruitment\Providers;

use Modules\Recruitment\Repositories\CandidateSkill\CandidateSkillRepositoryInterface;
use Modules\Recruitment\Repositories\CandidateSkill\CandidateSkillRepository;

use Modules\Recruitment\Repositories\CandidateAttachment\CandidateAttachmentRepositoryInterface;
use Modules\Recruitment\Repositories\CandidateAttachment\CandidateAttachmentRepository;

use Modules\Recruitment\Repositories\OnboardingTask\OnboardingTaskRepositoryInterface;
use Modules\Recruitment\Repositories\OnboardingTask\OnboardingTaskRepository;

use Modules\Recruitment\Repositories\InterviewAttachment\InterviewAttachmentRepositoryInterface;
use Modules\Recruitment\Repositories\InterviewAttachment\InterviewAttachmentRepository;

use Modules\Recruitment\Repositories\ApplicationPreviousExperience\ApplicationPreviousExperienceRepositoryInterface;
use Modules\Recruitment\Repositories\ApplicationPreviousExperience\ApplicationPreviousExperienceRepository;

use Modules\Recruitment\Repositories\JobVacancyAttachment\JobVacancyAttachmentRepositoryInterface;
use Modules\Recruitment\Repositories\JobVacancyAttachment\JobVacancyAttachmentRepository;

use Modules\Recruitment\Repositories\JobVacancyLanguage\JobVacancyLanguageRepositoryInterface;
use Modules\Recruitment\Repositories\JobVacancyLanguage\JobVacancyLanguageRepository;

use Modules\Recruitment\Repositories\JobVacancySkill\JobVacancySkillRepositoryInterface;
use Modules\Recruitment\Repositories\JobVacancySkill\JobVacancySkillRepository;

use Modules\Recruitment\Repositories\EmploymentContract\EmploymentContractRepositoryInterface;
use Modules\Recruitment\Repositories\EmploymentContract\EmploymentContractRepository;

use Modules\Recruitment\Repositories\JobOffer\JobOfferRepositoryInterface;
use Modules\Recruitment\Repositories\JobOffer\JobOfferRepository;

use Modules\Recruitment\Repositories\RecruitmentAgency\RecruitmentAgencyRepositoryInterface;
use Modules\Recruitment\Repositories\RecruitmentAgency\RecruitmentAgencyRepository;

use Modules\Recruitment\Repositories\EmployeeReferral\EmployeeReferralRepositoryInterface;
use Modules\Recruitment\Repositories\EmployeeReferral\EmployeeReferralRepository;

use Modules\Recruitment\Repositories\Onboarding\OnboardingRepositoryInterface;
use Modules\Recruitment\Repositories\Onboarding\OnboardingRepository;

use Modules\Recruitment\Repositories\Interview\InterviewRepositoryInterface;
use Modules\Recruitment\Repositories\Interview\InterviewRepository;

use Modules\Recruitment\Repositories\Application\ApplicationRepositoryInterface;
use Modules\Recruitment\Repositories\Application\ApplicationRepository;

use Modules\Recruitment\Repositories\JobVacancy\JobVacancyRepositoryInterface;
use Modules\Recruitment\Repositories\JobVacancy\JobVacancyRepository;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Nwidart\Modules\Traits\PathNamespace;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class RecruitmentServiceProvider extends ServiceProvider
{
    use PathNamespace;

    protected string $name = 'Recruitment';

    protected string $nameLower = 'recruitment';

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->registerCommands();
        $this->registerCommandSchedules();
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->name, 'database/migrations'));
    }

    /**
     * Register the service provider.
     */
    public function register(): void {
$this->app->register(EventServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
        $this->app->bind(JobVacancyRepositoryInterface::class, JobVacancyRepository::class);
        $this->app->bind(ApplicationRepositoryInterface::class, ApplicationRepository::class);
        $this->app->bind(InterviewRepositoryInterface::class, InterviewRepository::class);
        $this->app->bind(OnboardingRepositoryInterface::class, OnboardingRepository::class);
        $this->app->bind(EmployeeReferralRepositoryInterface::class, EmployeeReferralRepository::class);
        $this->app->bind(RecruitmentAgencyRepositoryInterface::class, RecruitmentAgencyRepository::class);
        $this->app->bind(JobOfferRepositoryInterface::class, JobOfferRepository::class);
        $this->app->bind(EmploymentContractRepositoryInterface::class, EmploymentContractRepository::class);
        $this->app->bind(JobVacancySkillRepositoryInterface::class, JobVacancySkillRepository::class);
        $this->app->bind(JobVacancyLanguageRepositoryInterface::class, JobVacancyLanguageRepository::class);
        $this->app->bind(JobVacancyAttachmentRepositoryInterface::class, JobVacancyAttachmentRepository::class);
        $this->app->bind(ApplicationPreviousExperienceRepositoryInterface::class, ApplicationPreviousExperienceRepository::class);
        $this->app->bind(InterviewAttachmentRepositoryInterface::class, InterviewAttachmentRepository::class);
        $this->app->bind(OnboardingTaskRepositoryInterface::class, OnboardingTaskRepository::class);
        $this->app->bind(CandidateAttachmentRepositoryInterface::class, CandidateAttachmentRepository::class);
        $this->app->bind(CandidateSkillRepositoryInterface::class, CandidateSkillRepository::class);
}

    /**
     * Register commands in the format of Command::class
     */
    protected function registerCommands(): void
    {
        // $this->commands([]);
    }

    /**
     * Register command Schedules.
     */
    protected function registerCommandSchedules(): void
    {
        // $this->app->booted(function () {
        //     $schedule = $this->app->make(Schedule::class);
        //     $schedule->command('inspire')->hourly();
        // });
    }

    /**
     * Register translations.
     */
    public function registerTranslations(): void
    {
        $langPath = resource_path('lang/modules/'.$this->nameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->nameLower);
            $this->loadJsonTranslationsFrom($langPath);
        } else {
            $this->loadTranslationsFrom(module_path($this->name, 'lang'), $this->nameLower);
            $this->loadJsonTranslationsFrom(module_path($this->name, 'lang'));
        }
    }

    /**
     * Register config.
     */
    protected function registerConfig(): void
    {
        $configPath = module_path($this->name, config('modules.paths.generator.config.path'));

        if (is_dir($configPath)) {
            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($configPath));

            foreach ($iterator as $file) {
                if ($file->isFile() && $file->getExtension() === 'php') {
                    $config = str_replace($configPath.DIRECTORY_SEPARATOR, '', $file->getPathname());
                    $config_key = str_replace([DIRECTORY_SEPARATOR, '.php'], ['.', ''], $config);
                    $segments = explode('.', $this->nameLower.'.'.$config_key);

                    // Remove duplicated adjacent segments
                    $normalized = [];
                    foreach ($segments as $segment) {
                        if (end($normalized) !== $segment) {
                            $normalized[] = $segment;
                        }
                    }

                    $key = ($config === 'config.php') ? $this->nameLower : implode('.', $normalized);

                    $this->publishes([$file->getPathname() => config_path($config)], 'config');
                    $this->merge_config_from($file->getPathname(), $key);
                }
            }
        }
    }

    /**
     * Merge config from the given path recursively.
     */
    protected function merge_config_from(string $path, string $key): void
    {
        $existing = config($key, []);
        $module_config = require $path;

        config([$key => array_replace_recursive($existing, $module_config)]);
    }

    /**
     * Register views.
     */
    public function registerViews(): void
    {
        $viewPath = resource_path('views/modules/'.$this->nameLower);
        $sourcePath = module_path($this->name, 'resources/views');

        $this->publishes([$sourcePath => $viewPath], ['views', $this->nameLower.'-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->nameLower);

        Blade::componentNamespace(config('modules.namespace').'\\' . $this->name . '\\View\\Components', $this->nameLower);
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (config('view.paths') as $path) {
            if (is_dir($path.'/modules/'.$this->nameLower)) {
                $paths[] = $path.'/modules/'.$this->nameLower;
            }
        }

        return $paths;
    }
}
