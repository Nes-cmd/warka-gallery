<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\CustomClases\ImageFilter;
use App\CustomClases\DefaultSettings;

use ZipArchive;

class Photo extends Component
{
    // wire model public variables
    public $new_categogy;
    public $name;
    public $url = [];
    //Default setting variables
    public $category_id, $order_by;
    public $default_large_size, $default_small_size;

    public $checked_photo = [];
    public $allPhotos;

    public function mount()
    {
        $default = new DefaultSettings();
        $this->category_id = $default->DEFAULT_CATEGORY;
        $this->default_large_size = $default->DEFAULT_LARGE_SIZE;
        $this->default_small_size = $default->DEFAULT_SMALL_SIZE;
        $this->order_by = $default->DEFAULT_ORDERING;
    }
   
    public function selectAll()
    {
        if ($this->allPhotos->count() == sizeof($this->checked_photo)) {
            $this->checked_photo = [];// Un select all 
        }
        else{
            $this->checked_photo = [];
            foreach($this->allPhotos as $photoId){
               array_push($this->checked_photo, (string)$photoId['id']); 
            }
       }
    }
    public function addCategory()
    {
        $category = \Auth::user()->categories()->create(['name' => $this->new_categogy]);
        $this->selected_category = $category->id;
        $this->new_categogy = "";
        $this->checked_photo = [];
        \Session::flash('success' , 'Category added succesfully');
    }
    public function download()
    {
        if (!$this->checked_photo) {return;}
        $files = \Auth::user()->photos()->whereIn('id', $this->checked_photo)->get();
        if(sizeof($files) == 1){
            return \Storage::download($files[0]->url, $files[0]->name);
        }
        if(sizeof($files) > 1){
            $zip = new ZipArchive();
            $zip->open('WarkaGallery.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
            foreach($files as $file){
                $zip->addFile(str_replace('\\', '/', storage_path()) .'/app/public/'.$file->url, $file->url);
            }
            $zip->close();
            $this->checked_photo = [];
            return response()->download('WarkaGallery.zip');
        }
    }
   public function deleteSelected()
    {
        if (!$this->checked_photo) {return;}
       \Auth::user()->photos()->whereIn('id', $this->checked_photo)->delete();
       $this->checked_photo = [];
       \Session::flash('success' , 'File deleted succesfully');
    }
    
    use WithFileUploads;
    public function addPhoto()
    {
        $validated = $this->validate([
            'name' => ['sometimes','max:30'],
            'category_id' => ['required','numeric'],
            'url.*' => ['required', 'image','mimes:jpg,png,jpeg,gif,bmp', 'max:3072'],
        ]);
        foreach($this->url as $key => $path){
            $img = \Image::make($path)->encode('jpeg');
            $img = $img->filter(new ImageFilter(400));
            $name = 'Photos/'.$path->getClientOriginalName().\Carbon\Carbon::now()->format('Y-m-d-h-i-s').'.jpeg';
            \Storage::put($name, $img);
            $validated['url'] = $name;
            \Auth::user()->photos()->create($validated);
            $this->url = [];
            $name = '';
        }
        $this->name = "";
        // cache()->forget('allPhotos');
        \Session::flash('success' ,'Photo uploaded succesfully');
    }
    public function render()
    {   
        $categories = \Auth::user()->categories()->get();
        $selected_category = $categories->filter(function($cat){
            return $cat->id == $this->category_id;
        });
        $x = $this->order_by[0] == '1' ? 'desc':'asc';
                $order = $this->order_by[0] == '1' ? substr($this->order_by, 1):$this->order_by;
        if($selected_category->first()->name == 'All'){
            
            //$photos = cache()->remember('allPhotos', 24*60*60, function(){
                // $photos = \Auth::user()->photos()->orderBy($order, $x)->get(); //Eloquent
                $photos = \DB::table('photos')->where('user_id', auth()->user()->id)->orderBy($order, $x)->get(); // Queary builder
            //});
        }
        else{
            // $photos = \Auth::user()->photos()->where('category_id', $this->category_id)->orderBy($order, $x)->get(); // Eloquent
            $photos = \DB::table('photos')//->where('user_id', $this->user_id)
                                ->where('category_id', $this->category_id)
                                ->orderBy($order, $x)->get();//Query Builder
        }
        $this->allPhotos = $photos;
        $sortings = \App\Models\Sortings::all();
        return view('livewire.photo', compact('photos', 'categories', 'sortings'));
    }
}
