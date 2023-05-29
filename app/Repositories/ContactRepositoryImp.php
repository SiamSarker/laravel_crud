<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepositoryImp implements ContactRepository
{
    public function getAll()
    {
        return Contact::all();
    }

    public function create(array $data)
    {
        return Contact::create($data);
    }

    public function getById($id)
    {
        return Contact::find($id);
    }

    public function update($id, array $data)
    {
        $contact = Contact::find($id);
        $contact->update($data);
        return $contact;
    }

    public function delete($id)
    {
        return Contact::destroy($id);
    }
}
