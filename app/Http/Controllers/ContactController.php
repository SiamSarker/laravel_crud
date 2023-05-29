<?php

namespace App\Http\Controllers;
use App\Services\ContactServiceImp;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contactService;

    public function __construct(ContactServiceImp $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        $contacts = $this->contactService->getAll();
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
        $this->contactService->create($input);
        return redirect('contact')->with('flash_message', 'Contact Added!');
    }

    public function show($id)
    {
        $contact = $this->contactService->getById($id);
        return view('contacts.show')->with('contacts', $contact);
    }

    public function edit($id)
    {
        $contact = $this->contactService->getById($id);
        return view('contacts.edit')->with('contacts', $contact);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $this->contactService->update($id, $input);
        return redirect('contact')->with('flash_message', 'Contact Updated!');
    }

    public function destroy($id)
    {
        $this->contactService->delete($id);
        return redirect('contact')->with('flash_message', 'Contact deleted!');
    }
}
