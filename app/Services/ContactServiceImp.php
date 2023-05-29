<?php

namespace App\Services;

use App\Repositories\ContactRepository;

class ContactServiceImp implements ContactService
{
    private $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function getAll()
    {
        return $this->contactRepository->getAll();
    }

    public function create(array $data)
    {
        return $this->contactRepository->create($data);
    }

    public function getById($id)
    {
        return $this->contactRepository->getById($id);
    }

    public function update($id, array $data)
    {
        return $this->contactRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->contactRepository->delete($id);
    }
}
