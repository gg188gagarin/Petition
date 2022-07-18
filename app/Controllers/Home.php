<?php


namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\I18n\Time;
use Config\Services as Services;

class Home extends BaseController
{
    private UserModel $user;
    private $validation;

    public function __construct()
    {
        $this->user = new UserModel();
        $this->validation = Services::validation();
    }

    public function register()
    {
        return view('home/register');
    }

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
            return redirect()->to('/dashboard');
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
            return redirect()->to('/dashboard');
        }
    }

    public function forgotPassword()
    {
        $step = 1;
        return view('home/forgot', compact('step'));
    }

    public function sendForgotPassword()
    {
        if ($_REQUEST['email']) {//todo do not use native variables
            $this->validation->setRules(UserModel::itemAlias('validation', 'forgot'));
            if (!$this->validation->run($_REQUEST)) {//todo do not use native variables
                return view('home/forgot', ['errors' => $this->validation->getErrors(), 'email' => $_REQUEST['email']]);
            }
            $id = $this->user->where('email', $_REQUEST['email'])->first()['id'];
            $this->setUserId($id);
            $hashString = md5(time() . $id . $_REQUEST['email']);
            $currentTime = time();
            $hashExpiry = $currentTime + 1800;
            $data = array(
                'hash_key' => $hashString,
                'hash_expire' => $hashExpiry
            );
            $this->user->update($this->userId, $data);

            $email = \Config\Services::email();

            $email->setTo('gg.188.gagarin@gmail.com');
            $email->setSubject('Security Code');
            $email->setMessage($hashString);

            if ($email->send()) {
                $step = 2;
                return view('home/forgot', compact('step'));
            } else {
                $data = $email->printDebugger(['headers']);
                print_r($data);
            }


        } else {
            return redirect()->back()->with('fail', "Something went wrong, try again few minutes later");
        }
    }

    public function checkSecurityCode()
    {
        $securityCode = $this->request->getPost();
        $id = $this->getUserId();
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
            return redirect()->to('/login')->with('fail', 'You are logged out!');
        }
    }

    public function dashboard()
    {
        $user = session()->get('user');
        return view('dashboard/welcome_page', ['user' => $user]);
    }
 }



