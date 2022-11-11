<?php

namespace App\Controllers;

use App\Filters\IsAdmin;
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
        if ($mult = $this->request->getGet('mult') ? $this->request->getGet('mult') : []) {
            $this->petition->whereIn('status', $mult);
        }
        if ($sort = $this->request->getVar('sort_name')) {
            $this->petition->orderBy('petition.name', $sort);
        }
        $petitions = $this->petition
            ->select('petition.*, user.firstname, user.lastname')
            ->join('user', 'petition.user_id = user.id')
            ->paginate(PetitionModel::PER_PAGE);
        $pager = $this->petition->pager;
        if ($this->request->isAJAX()) {
            return view('petition/indexContent', compact('petitions', 'pager', 'status', 'sort', 'q', 'mult'));
        } else {
            return view('petition/index', compact('petitions', 'pager', 'status', 'sort', 'q', 'mult'));
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

    public function tb_petition_user($user)
    {
        $petitions = $this->petition->where('user_id', $user)->findAll();
        return view('petition/table_petition_user', compact('petitions'));
    }

    public function create()
    {
        return view('petition/create');
    }

    public function save()
    {
        $validation = $this->validate(PetitionModel::itemAlias('validation', 'create'));
        if (!$validation) {
            return view('/petition/create', ['validation' => $this->validator]);
        } else {
            $request = $this->request->getPost();
            $request['status'] = PetitionModel::STATUS_DRAFT;
            $request['user_id'] = session()->get('user')['id'];
            $query = $this->petition->insert($request);
            if (!$query) {
                return view('petition/create');
            } else {
                return redirect()->to('/petitions/my');
            }
        }
    }

    public function edit(int $id)
    {
        $petition = $this->petition->where('id', $id)->first();
        if ($petition) {
            return view('petition/create', compact('petition'));
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
            return redirect()->to('/petitions/my');
        }
    }

    public function delete(int $id)
    {
        $petitionUser = $this->petition
            ->where('id', $id)
            ->first();
        if ($petitionUser['user_id'] === session()->get('user')['id']) {
            $this->petition->delete($id);
            return redirect()->to('/petitions/my');
        } else {
            return redirect()->to('/home');
        }
    }

    public function details($id)
    {
        $petition = $this->petition
            ->select('petition.*, user.firstname, user.lastname')
            ->join('user', 'petition.user_id = user.id')
            ->where('petition.id', $id)->first();
        $users = $this->userPetition
            ->join('user', 'user_petition.user_id = user.id')
            ->where('petition_id', $id)->findAll();
        return view('petition/details', compact('petition', 'users'));
    }

    public function setStatus($id, $status)
    {
        $petition = $this->petition->where('id', $id)->first();
        $petition['status'] = $status;
        $query = $this->petition->update($id, $petition);
        if (!$query) {
            return redirect('/dashboard/welcome_page');
        } else {
            return redirect()->to('/petitions/my');
        }
    }

    public function comment()
    {
        $request = $this->request->getPost();
        $query = $this->petition->update($request['id'], $request);
        return redirect()->to('/petitions/my');
    }


    public function subscribe($petition_id)
    {
        $values = [
            'user_id' => session()->get('user')['id'],
            'petition_id' => $petition_id,
        ];
        if ($this->userPetition->uniq(session()->get('user')['id'], $petition_id)) {
            $query = $this->userPetition->insert($values);
            if (!$query) {
                return redirect()->to('/petitions/my-subs');
            } else {
                return redirect()->to('/petitions');
            }
        } else {
            return redirect()->back();
        }
    }

    public function getPetitionByName()
    {
        if ($this->request->getVar('q')) {
            $q = $this->request->getVar('q');
            $petitions = $this->petition
                ->like('name', $q)
                ->orLike('description', $q)->select('petition.*, user.firstname, user.lastname')
                ->join('user', 'petition.user_id = user.id')
                ->paginate(PetitionModel::PER_PAGE);

            $pager = $this->petition->pager;
            if ($this->request->isAJAX()) {
                $data = [
                    'cardWrapper' => view('petition/indexContentAjax', compact('petitions')),
                    'pages' => view('Pager/pagerAjax', compact('pager')),
                ];
                return json_encode($data);
            } else {
                return view('petition/indexContent', compact('petitions', 'pager'));
            }
        } else {
            return redirect()->back()->with('fail', "You should insert something");
        }
    }


    public function topAuthorPetitions($status = false)
    {
        $this->petition->where('user_id', session()->get('user')['id']);
        return $this->index($status);
    }

}