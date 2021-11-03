<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\CustomClases\DefaultSettings;
use App\Models\DefaultSetting;
use App\Models\Sortings;
class Settings extends Component
{
    public $defaults = [];
    
    public function mount()
    {
        $default = new DefaultSettings();
        $this->defaults = $default->defaults_ids;
    }
    public function selectCategory()
    {
        DefaultSetting::updateOrCreate(
            ['user_id' => \Auth::user()->id,'table_name' => 'categories'],
            ['table_id' => $this->defaults['category_id']]);
        DefaultSetting::updateOrCreate(
            ['user_id' => \Auth::user()->id,'table_name' => 'sortings'],
            ['table_id' => $this->defaults['sorting_id']]);
        DefaultSetting::updateOrCreate(
            ['user_id' => \Auth::user()->id,'table_name' => 'default_large_sizes'],
            ['table_id' => $this->defaults['large_size_id']]);
         DefaultSetting::updateOrCreate(
            ['user_id' => \Auth::user()->id,'table_name' => 'default_small_sizes'],
            ['table_id' => $this->defaults['small_size_id']]);
        \Session::flash('success' , 'Default setted succesfully!');
        return redirect('files/photo/index');
    }
    public function render()
    {
        $sortings = Sortings::all();
        $categories = \Auth::user()->categories()->get();
        $largeSizes = \App\Models\DefaultSize::where('type', 'md')->get();
        $smallSizes = \App\Models\DefaultSize::where('type', 'sm')->get();
        return view('livewire.settings', compact('categories', 'sortings', 'largeSizes', 'smallSizes'));
    }
}
