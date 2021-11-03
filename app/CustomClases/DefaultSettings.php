<?php
namespace App\CustomClases;

use App\Models\DefaultSetting;
use App\Models\Sortings;
use App\Models\DefaultSize;

class DefaultSettings{
	public const DEFAULT_LARGE_SIZE = 2;
    public const DEFAULT_SMALL_SIZE = 4;
    public const DEFAULT_ORDERING = 'created_at';
    public const DEFAULT_CATEGORY = null; 
    public $defaults_ids = [];
    public function __construct()
    {
        $id =  auth()->user()->id;
        $this->DEFAULT_CATEGORY = DefaultSetting::where('user_id', $id)->where('table_name', 'categories')->first()->table_id;
        $order = DefaultSetting::where('user_id', $id)->where('table_name', 'sortings')->first();
        $largeSize = DefaultSetting::where('user_id', $id)->where('table_name', 'default_large_sizes')->first();
        $smallSize = DefaultSetting::where('user_id', $id)->where('table_name', 'default_small_sizes')->first();
        $this->DEFAULT_LARGE_SIZE = DefaultSize::where('id', $largeSize->table_id)->first()->size;
        $this->DEFAULT_SMALL_SIZE = DefaultSize::where('id', $smallSize->table_id)->first()->size;
        $this->DEFAULT_ORDERING = Sortings::where('id', $order->table_id)->first()->code;
        
        $defaults_ids['category_id'] = $this->DEFAULT_CATEGORY;
        $defaults_ids['sorting_id'] = $order->table_id;
        $defaults_ids['small_size_id'] = $smallSize->table_id;
        $defaults_ids['large_size_id'] = $largeSize->table_id;
        $this->defaults_ids = $defaults_ids;
    }
    public function getSettings()
    {
    	return [
    		'category_id' => $this->DEFAULT_CATEGORY,
    		'order_by' => $this->DEFAULT_ORDERING,
    		'default_small_size' => $this->DEFAULT_SMALL_SIZE,
    		'default_large_size' => $this->DEFAULT_LARGE_SIZE,
    	];
    }
} 
?>