<?php

namespace App\Http\Middleware;

use App\Models\Catagory;
use App\Models\Page;
use App\Models\SiteSetting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SiteSettingMidlleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $allPages = Page::select('PageTitle', 'Status', 'IsMenu', 'Slug')->get();
        //$siteSetting = SiteSetting::pluck('data','name')->toArray();
        $menuCategory = Catagory::where('status', "0")->get();
        view()->share(['menuCategory' => $menuCategory ,'allPages' => $allPages]);
        return $next($request);
    }
}
