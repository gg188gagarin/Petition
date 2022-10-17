<?php


namespace App\Controllers;

use App\Models\ImageModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\I18n\Time;
use App\Models\PetitionModel;
use Config\Services as Services;
use ReflectionException;


class Home extends BaseController
{
    private UserModel $user;
    private $validation;
    private PetitionModel $petition;

    protected $helpers = ['form'];


    public function __construct()
    {
        $this->user = new UserModel();
        $this->petition = new PetitionModel();
        $this->validation = Services::validation();
    }

    public function register()
    {
        return view('home/register');
    }

    public function edit(int $id)
    {
        if (!session()->get('user')['is_admin']) {
            $id = session()->get('user')['id'];
        }
        $user = $this->user->find($id);
        if (session()->get('user')['is_admin']) {
            $petitions = $this->petition->where('user_id', $id)->findAll();
            return view('home/users_list/admin_panel', compact('user', 'petitions'));
        } else {
            return view('home/users_list/update_my_ac_info', compact('user'));
        }
    }

    /**
     * Register
     * @return RedirectResponse|string
     * @throws ReflectionException
     */
    public function save()
    {
        $request = $this->request->getPost();
        $this->validation->setRules(UserModel::itemAlias('validation', 'register'));
        if (!$this->validation->run($request)) {
            return view('home/register', ['errors' => $this->validation->getErrors(), 'data' => $request]);
        }
        $query = $this->user->save($request);
        if (!$query) {
            return redirect()->back()->withInput();
        } else {
            $user = $this->user->where('id', $this->user->getInsertID())->first();
            session()->set('user', $user);
            return redirect()->to('/home');
        }
    }

    /**
     * @param int $id
     * @return RedirectResponse|string
     * @throws ReflectionException
     */
    public function update(int $id)
    {
        if (!session()->get('user')['is_admin']) {
            $id = session()->get('user')['id'];
        }
        $request = $this->request->getPost();
        unset($request['id']);
        $this->validation->setRules(UserModel::itemAlias('validation', 'update'));
        if (!$this->validation->run($request)) {
            return view('home/users_list/update', ['errors' => $this->validation->getErrors(), 'data' => $request]);
        }
        $query = $this->user->update($id, $request);
        if ($id == session()->get('user')['id']) {
            $user = $this->user->find($id);
            session()->remove('user');
            session()->set('user', $user);
        }
        if (session()->get('user')['is_admin']) {
            return redirect()->back();
        } else {
            return redirect()->to('/home');
        }

    }

    public function login()
    {
        return view('home/login');
    }

    public function checkOnLogin()
    {
        $request = $this->request->getPost();
        $this->validation->setRules(UserModel::itemAlias('validation', 'login'));
        if (!$this->validation->run($request)) {
            return view('home/login', ['errors' => $this->validation->getErrors(), 'data' => $request]);
        }

        $user = $this->user->where('email', $request['email'])->first();
        if (!password_verify($request['password'], $user['password'])) {
            session()->setFlashdata('fail', "You password doesn't matches, please check it");
            return redirect()->to('/login')->withInput();
        } else {
            session()->set('user', $user);
            $image = new ImageModel();
            if (!empty($image->where('user_id', $user['id'])->first()["img_path"])) {
                $avatar = 'uploads/' . $image->where('user_id', $user['id'])->first()["img_path"];
                session()->set('avatar', $avatar);
            }
            return redirect()->to('/home');
        }
    }

    public function checkSecurityCode()
    {
        $securityCode = $this->request->getPost();
        $userCode = $this->user->where('id', $this->userId)->first()['hash_key'];
        if ($securityCode === $userCode) {
            $currentTime = time();
            $userCodeTime = $this->user->where('email', $_REQUEST['email'])->first()['hash_expire'];
            if ($currentTime <= $userCodeTime) {
                $step = 3;
                return view('home/forgot', compact('step'));
            } else {
                return redirect()->with('fail', "You code time expired, try again later");
            }
        } else {
            return redirect()->with('fail', "You security code doesn't match, try again later");
        }
    }

    public function logout()
    {
        if (session()->has('user')) {
            session()->remove('user');
            session()->remove('avatar');
            return redirect()->to('/login')->with('fail', 'You are logged out!');
        }
    }

    public function dashboard()
    {
        $user = session()->get('user');
        return view('dashboard/welcome_page', ['user' => $user]);
    }

    public function avatar()
    {
        $user = session()->get('user');
        return view('home/avatar', ['user' => $user]);
    }

    function check()
    {
        $validation = $this->validate(UserModel::itemAlias('validation', 'login'));

        if (!$validation) {
            return view('user/login', ['validation' => $this->validator]);
        } else {
            return redirect()->to('/home');
        }
    }

    public function index()
    {
        if ($q = $this->request->getVar('q')) {
            $this->user->like('lastname', $q, 'both');
        }
        $users = $this->user
            ->select('*')
            ->paginate(UserModel::PER_PAGE);
        $pager = $this->user->pager;
        if ($this->request->isAJAX()) {
            return view('home/users_list/indexContent', compact('users', 'pager'));
        } else {
            return view('home/users_list/index', compact('users', 'pager'));
        }
    }

    public function getUserByName()
    {
        if ($this->request->getVar('q')) {
            $q = $this->request->getVar('q');
            $users = $this->user
                ->like('lastname', $q)
                ->orLike('firstname', $q)
                ->select('*')
                ->paginate(UserModel::PER_PAGE);

            $pager = $this->user->pager;
            if ($this->request->isAJAX()) {
                $data = [
                    'cardWrapper' => view('home/users_list/indexContentAjax', compact('users')),
                    'pages' => view('Pager/pagerAjax', compact('pager')),
                ];
                return json_encode($data);
            } else {
                return view('home/users_list/indexContent', compact('users', 'pager'));
            }
        } else {
            return redirect()->back()->with('fail', "You should insert something");
        }
    }

    public function all()
    {
        return $this->index();
    }

    public function upload_user_photo($user_id)
    {
        $image = new ImageModel();
        if ($this->request->getMethod() === "get") {
            return view('upload/upload_form', compact('user_id'));
        } elseif ($this->request->getMethod() === "post") {
            $validationRule = ImageModel::itemAlias('validation', 'user_avatar');
            if (!$this->validate($validationRule)) {
                $errors = $this->validator->getErrors();
                return view('upload/upload_form', compact('errors', 'user_id'));
            }
            $deleted = $image->deleteFile($user_id);
            $img = $this->request->getFile('userfile');
            if ($img) {
                $insert_id = (new ImageModel())->updateFile($user_id, $img);
                $savedImage = $image->find($insert_id);
                if (session()->get('user')['id'] == $user_id) {
                    session()->remove('avatar');
                    session()->set('avatar', 'uploads/' . $savedImage['img_path']);
                }
                return view('upload/upload_success', compact('savedImage', 'user_id'));
            }
        }
    }


}



