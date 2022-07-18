<?php

namespace App\Controllers;

use App\Models\PetitionModel as PetitionModel;
use App\Models\UserModel;

class Petition extends BaseController
{
    private PetitionModel $petition;
    private UserModel $user;

    public function __construct()
    {
        $this->petition = new PetitionModel();
        $this->user = new UserModel();
    }

    public function index()
    {
        $petitions = $this->petition->paginate(5);
        $pager = $this->petition->pager;
        return view('index', ['petitions' => $petitions, 'pager' => $pager]);
    }

    public function petitionsByUser()
    {
        $petitions = $this->petition->where('user_id', session()->get('user')['id'] )->paginate(5);
        $pager = $this->petition->pager;
        return view('dashboard/user_petitions', ['userPetitions' => $petitions, 'pager' => $pager]);
    }

    public function create()
    {
        return view('petition/create');
    }

    public function save()
    {
        $request = $this->request->getPost();


        $query = $this->petition->insert($request);

        if (!$query) {
            $errors = $this->petition->validation->getErrors();
            return view('petition/create', compact('errors'));
        } else {
            return redirect('dashboard/petitions');
        }
    }

    public function edit(int $id)
    {
        $petition = $this->petition->where('id', $id)->first();
        if ($petition) {
            return view('petition/create', ['petition' => $petition]);
        }
    }

    public function update(int $id)
    {
        $request = $this->request->getPost();
        $query = $this->petition->update($id, $request);

        if (!$query) {
            $errors = $this->petition->validation->getErrors();
            return view('petition/create', compact('errors'));
        } else {
            return redirect('petition');
        }
    }

    public function delete(int $id)
    {
        $this->petition->delete($id);
        return redirect('dashboard/petitions');
    }
}