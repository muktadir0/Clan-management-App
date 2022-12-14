<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected function getContacts(){
        return [
            1 => ['name' => 'Name 1', 'phone' => '1234567890'],
            2 => ['name' => 'Name 2', 'phone' => '2345678901'],
            3 => ['name' => 'Name 3', 'phone' => '3456789012'],
        ];
    }

    public function index()
    {
        $contacts =$this->getContacts();
        $companies = [
            1 => ['name' => 'Company One', 'contacts' => 3],
            2 => ['name' => 'Company Two', 'contacts' => 5],
        ];
        //return view('contacts.index',['contacts'=>$contacts]);
        return view('contacts.index',compact('contacts','companies')); //same thing as above just less keywords
    }

    public function create()
    {
        return view('contacts.create');
    }
    public function show($id)
    {
        $contacts =$this->getContacts();
        abort_if(!isset($contacts[$id]),404);
        $contact = $contacts[$id];
        return view('contacts.show')->with('contact',$contact);
    }

}
