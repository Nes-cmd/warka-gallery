<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\OtherFile;

class OtherFiles extends Component
{
    use WithFileUploads;

    public $url, $name;
    
    public function daleteFile($id)
    {
        $file = OtherFile::where('id', $id)->first();
        \Storage::disk('public')->delete($file->id);
        $file->delete();
        \Session::flash('success' , 'File deleted succesfully');
    }
    public function uploadFile()
    {
        $validated = $this->validate([
            'name' => ['sometimes', 'max:50'],
            'url' => ['required','mimes:txt,pdf,doc,docx,ppt,pptx,cpp,php,py,html','max:10240'],
        ]);
        $validated['url'] = \Storage::disk('public')->put('OtherFiles', $this->url);
        !$this->name?$validated['name'] = $this->url->getClientOriginalName():'';
        $x = (int)(\Storage::size($validated['url'])/1024);
        $validated['size'] = $x == 0 ? 1 : $x;
        auth()->user()->otherFiles()->create($validated); 
        $this->url = null;
        $this->name = null;
        \Session::flash('success' , 'File uploaded succesfully');
    } 
    public function render()
    {
        $files = auth()->user()->otherFiles()->get();    //Eloquent
        // $files = \DB::table('other_files')->where('user_id', auth()->user()->id)->get(); // Query Builder
        return view('livewire.other-files', compact('files'));
    }
}
