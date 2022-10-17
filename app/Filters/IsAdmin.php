<?php

namespace App\Filters;

use App\Models\UserModel;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class IsAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!UserModel::isAdmin()) {
            return redirect()->to('/home')->with('fail', 'You not have access to do it');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}