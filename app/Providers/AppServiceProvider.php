<?php

namespace App\Providers;

use App\Models\Area;
use App\Models\SubArea;
use App\Models\GeneralInfo;
use App\Models\RequirementType;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();

        $generalInfo = GeneralInfo::first();

        view()->share(['generalInfo' => $generalInfo]);
        $areas = Area::get();
        view()->share(['areas' => $areas]);
        $subareas = SubArea::get();
        view()->share(['subareas' => $subareas]);

        $requirement_types = RequirementType::whereNull('parent_id')
            ->get();
        view()->share(['requirement_types' => $requirement_types]);

        $childType = RequirementType::whereNotNull('parent_id')->get();

        view()->share(['childType' => $childType]);
    }
}
