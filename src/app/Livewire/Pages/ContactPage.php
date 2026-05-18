<?php

namespace App\Livewire\Pages;

use App\Models\Contact;
use App\Models\Profile;
use Livewire\Component;

class ContactPage extends Component
{
    public string $name = '';

    public string $email = '';

    public string $subject = '';

    public string $message = '';

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ];
    }

    protected function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'subject.required' => 'Subject wajib diisi.',
            'message.required' => 'Pesan wajib diisi.',
        ];
    }

    public function submit(): void
    {
        $validated = $this->validate();

        Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'is_read' => false,
        ]);

        $this->reset([
            'name',
            'email',
            'subject',
            'message',
        ]);

        session()->flash('success', 'Pesan berhasil dikirim. Terima kasih sudah menghubungi saya.');
    }

    public function render()
    {
        $profile = Profile::query()
            ->where('is_active', true)
            ->first();

        return view('livewire.pages.contact-page', [
            'profile' => $profile,
        ]);
    }
}