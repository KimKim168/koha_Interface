<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;
use Livewire\WithFileUploads;
use Image;

class ContactEdit extends Component
{
    use WithFileUploads;
    public $contact; // Variable to hold the contact record for editing
    public $name;
    public $name_kh;
    public $description;
    public $email;
    public $phone_number;
    public $location_first;
    public $location_second;
    public $link_location_first;
    public $link_location_second;
    public $image_first;
    public $image_second;
    public $description_kh;
    public $contact_info;
    public $contact_info_kh;
    

    public function mount(Contact $contact)
    {
        $this->contact = $contact;
        $this->name = $contact->name;
        $this->name_kh = $contact->name_kh;
        $this->email = $contact->email;
        $this->phone_number = $contact->phone_number;
        $this->location_first = $contact->location_first;
        $this->location_second = $contact->location_second;
        $this->description = $contact->description;
        $this->description_kh = $contact->description_kh; 
        $this->contact_info = $contact->contact_info;
        $this->contact_info_kh = $contact->contact_info_kh;
       
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:2048', // 2MB Max
        ]);

        session()->flash('success', 'Image successfully uploaded!');
    }

    public function save()
    {
        $this->dispatch('livewire:updated');
        $validated = $this->validate([
            'name' => 'nullable|string|max:255',
            'name_kh' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'location_first' => 'nullable|string|max:255',
            'link_location_first' => 'nullable|string|max:255',
            'location_second' => 'nullable|string|max:255',
            'link_location_second' => 'nullable|string|max:255',
            'image_first' => 'nullable|file|max:2048',
            'image_second' => 'nullable|file|max:2048',
            'description' => 'nullable',
            'description_kh' => 'nullable',
            'contact_info' => 'nullable',
            'contact_info_kh' => 'nullable|string|max:255',
        ]);

        // dd($validated);

        if (!empty($this->image_first)) {
            $filename_first = time() . str()->random(10) . '.' . $this->image_first->getClientOriginalExtension();
    
            // Save first full-sized image
            $image_path_first = public_path('assets/images/contacts/' . $filename_first);
            $image_thumb_path_first = public_path('assets/images/contacts/thumb/' . $filename_first);
    
            // Use intervention Image to save original and thumbnail versions for image_first
            $imageUploadFirst = Image::make($this->image_first->getRealPath())->save($image_path_first);
            $imageUploadFirst->resize(1280, null, function ($resize) {
                $resize->aspectRatio();
            })->save($image_thumb_path_first);
    
            // Add the first image filename to validated data
            $validated['image_first'] = $filename_first;
        }
    
        // Check if image_second is uploaded
        if (!empty($this->image_second)) {
            $filename_second = time() . str()->random(10) . '.' . $this->image_second->getClientOriginalExtension();
    
            // Save second full-sized image
            $image_path_second = public_path('assets/images/contacts/' . $filename_second);
            $image_thumb_path_second = public_path('assets/images/contacts/thumb/' . $filename_second);
    
            // Use intervention Image to save original and thumbnail versions for image_second
            $imageUploadSecond = Image::make($this->image_second->getRealPath())->save($image_path_second);
            $imageUploadSecond->resize(1280, null, function ($resize) {
                $resize->aspectRatio();
            })->save($image_thumb_path_second);
    
            // Add the second image filename to validated data
            $validated['image_second'] = $filename_second;
        }
    

        // Update the existing contact record
        $this->contact->update($validated);

        session()->flash('success', 'Updated successfully!');
    }

    public function render()
    {
        
        return view('livewire.contact-edit');
    }
}