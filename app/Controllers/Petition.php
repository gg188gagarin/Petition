<?php

namespace App\Controllers;

use App\Models\PetitionModel as PetitionModel;
use App\Models\UserModel as UserModel;
use App\Models\UserPetitionModel as UserPetitionModel;

class Petition extends BaseController
{
    private PetitionModel $petition;
    private UserModel $user;
    private UserPetitionModel $userPetition;

    public function __construct()
    {
        $this->petition = new PetitionModel();
        $this->user = new UserModel();
        $this->userPetition = new UserPetitionModel();
    }

    public function index($status = false)
    {
        if ($q = $this->request->getVar('q')) {
            $this->petition->like('name', $q, 'both');
        }
        if ($status) {
            $this->petition->where('status', $status);
        }
        if ($mult = $this->request->getVar('mult')) {
            $statuses = explode(',', $mult);
            $this->petition
                ->whereIn('status', $statuses);
        }
        $petitions = $this->petition
            ->select('petition.*, user.firstname, user.lastname')
            ->join('user', 'petition.user_id = user.id')
            ->paginate(PetitionModel::PER_PAGE);
        $pager = $this->petition->pager;
        if ($this->request->isAJAX()) {
            return view('petition/indexContent',  compact('petitions', 'pager', 'status'));
        } else {
            return view('petition/index', compact('petitions', 'pager', 'status'));
        }
    }

    public function all($status = false)
    {
        $this->petition->where('status !=', PetitionModel::STATUS_DRAFT);
        if (!UserModel::isAdmin()) {
            $this->petition->where('status !=', PetitionModel::STATUS_PREMODERATING);
        };
        return $this->index($status);
    }

    public function my($status = false)
    {
        $this->petition->where('user_id', session()->get('user')['id']);
        return $this->index($status);
    }

    public function mySubs($status = false)
    {
        $this->petition
            ->join('user_petition', 'user_petition.petition_id = petition.id')
            ->where('user_petition.user_id', session()->get('user')['id']);
        return $this->index($status);
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