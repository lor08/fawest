<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Models\Option;

class CommonComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $settings = Option::All();
        foreach ($settings as $setting) {
            if ($setting->value)
                $data[$setting->slug] = $setting->value;
        }
        $settings = $data;
        $view->with( compact('settings'));
//        $contactEmail = Option::where('slug','contactEmail')->first()->value;
//        $view->with( compact('catsTop','path','contactEmail', 'contactAddress', 'contactPhone'));
    }
}