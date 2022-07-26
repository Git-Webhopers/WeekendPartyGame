<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use App\Traits\UploadMediaTrait;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class UserCreate extends Component
{
    use WithFileUploads;
    use UploadMediaTrait;

    public $name;
    public $email;
    public $mobile;
    public $password;
    public $cpassword;
    public $avatar;

    public function render()
    {
        return view('livewire.users.user-create');
    }

    public function store()
    {
        $this->validate($this->validationRules());
        $filePath = null;
        if ($this->avatar) {
            $file = $this->avatar;
            $fileName = Str::slug($file->getClientOriginalName()) . '_' . time();
            $folder = '//avatars/';
            $disk = 'public';
            $filePath = $folder . $fileName . '.' . $file->getClientOriginalExtension();
            $this->uploadOne($file, $folder, $disk, $fileName);
        }
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'password' => $this->password,
            'avatar' => $filePath,
        ]);

        return redirect()->route('users.index');
    }

    protected function validationRules()
    {
        return [
            'name' => [
                'required'
            ],
            'email' => [
                'required',
                'email'
            ],
            'password' => [
                'required'
            ],
            'cpassword' => [
                'required',
                'same' => 'password'
            ],
        ];
    }
}
