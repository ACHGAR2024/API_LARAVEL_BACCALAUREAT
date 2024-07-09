<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'pseudo',
        'image',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rules($id = null)
    {
        return [
            'pseudo' => [
                'required',
                'string',
                'max:191',
                Rule::unique('users')->ignore($id),
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($id),
            ],
            'password' => [
                $id ? 'nullable' : 'required',
                'string',
                'min:8',
                'confirmed',
            ],
            'image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif',
                'max:2048', // Adjust file size limit as needed
            ],
        ];
    }

    public function updateProfile(array $data)
    {
        $this->fill($data);

        $rules = $this->rules($this->id);
        $validator = validator($data, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $this->save();

        if (isset($data['image'])) {
            $this->updateImage($data['image']);
        }

        return true;
    }

    private function updateImage($image)
    {
        // Store image with random filename
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = Storage::disk('public')->put('photos', $image, $filename);

        // Update image path in database
        $this->image = $path;
        $this->save();

        // Delete old image (optional, consider alternative storage strategies)
        if ($this->getOriginal('image')) {
            Storage::disk('public')->delete($this->getOriginal('image'));
        }
    }
}