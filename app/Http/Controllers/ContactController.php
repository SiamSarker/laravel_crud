<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function index()
    {
        $contacts = $this->contactRepository->getAll();
//        dd($contacts);
        return view('contacts.index')->with('contacts', $contacts);
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $this->contactRepository->create($input);
        return redirect('contact')->with('flash_message', 'Contact Added!');
    }

    public function show($id)
    {
        $contact = $this->contactRepository->getById($id);
        return view('contacts.show')->with('contacts', $contact);
    }

    public function edit($id)
    {
        $contact = $this->contactRepository->getById($id);
        return view('contacts.edit')->with('contacts', $contact);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $this->contactRepository->update($id, $input);
        return redirect('contact')->with('flash_message', 'Contact Updated!');
    }

    public function destroy($id)
    {
        $this->contactRepository->delete($id);
        return redirect('contact')->with('flash_message', 'Contact deleted!');
    }
}
