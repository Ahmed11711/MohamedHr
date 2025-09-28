<?php

use Illuminate\Support\Facades\Route;
use Modules\Recruitment\Http\Controllers\CandidateSkill\CandidateSkillController;
use Modules\Recruitment\Http\Controllers\CandidateAttachment\CandidateAttachmentController;
use Modules\Recruitment\Http\Controllers\OnboardingTask\OnboardingTaskController;
use Modules\Recruitment\Http\Controllers\InterviewAttachment\InterviewAttachmentController;
use Modules\Recruitment\Http\Controllers\ApplicationPreviousExperience\ApplicationPreviousExperienceController;
use Modules\Recruitment\Http\Controllers\JobVacancyAttachment\JobVacancyAttachmentController;
use Modules\Recruitment\Http\Controllers\JobVacancyLanguage\JobVacancyLanguageController;
use Modules\Recruitment\Http\Controllers\JobVacancySkill\JobVacancySkillController;
use Modules\Recruitment\Http\Controllers\EmploymentContract\EmploymentContractController;
use Modules\Recruitment\Http\Controllers\JobOffer\JobOfferController;
use Modules\Recruitment\Http\Controllers\RecruitmentAgency\RecruitmentAgencyController;
use Modules\Recruitment\Http\Controllers\EmployeeReferral\EmployeeReferralController;
use Modules\Recruitment\Http\Controllers\Onboarding\OnboardingController;
use Modules\Recruitment\Http\Controllers\Interview\InterviewController;
use Modules\Recruitment\Http\Controllers\Application\ApplicationController;
use Modules\Recruitment\Http\Controllers\JobVacancy\JobVacancyController;
use Modules\Recruitment\Http\Controllers\RecruitmentController;

Route::prefix('v1')->group(function () {
    Route::apiResource('candidate_skills', CandidateSkillController::class)->names('candidate_skill');
    Route::apiResource('candidate_attachments', CandidateAttachmentController::class)->names('candidate_attachment');
    Route::apiResource('onboarding_tasks', OnboardingTaskController::class)->names('onboarding_task');
    Route::apiResource('interview_attachments', InterviewAttachmentController::class)->names('interview_attachment');
    Route::apiResource('application_previous_experiences', ApplicationPreviousExperienceController::class)->names('application_previous_experience');
    Route::apiResource('job_vacancy_attachments', JobVacancyAttachmentController::class)->names('job_vacancy_attachment');
    Route::apiResource('job_vacancy_languages', JobVacancyLanguageController::class)->names('job_vacancy_language');
    Route::apiResource('job_vacancy_skills', JobVacancySkillController::class)->names('job_vacancy_skill');
    Route::apiResource('employment_contracts', EmploymentContractController::class)->names('employment_contract');
    Route::apiResource('job_offers', JobOfferController::class)->names('job_offer');
    Route::apiResource('recruitment_agencies', RecruitmentAgencyController::class)->names('recruitment_agency');
    Route::apiResource('employee_referrals', EmployeeReferralController::class)->names('employee_referral');
    Route::apiResource('onboardings', OnboardingController::class)->names('onboarding');
    Route::apiResource('interviews', InterviewController::class)->names('interview');
    Route::apiResource('applications', ApplicationController::class)->names('application');
    Route::apiResource('job_vacancies', JobVacancyController::class)->names('job_vacancy');
    Route::apiResource('recruitments', RecruitmentController::class)->names('recruitment');
});
