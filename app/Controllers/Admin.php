<?php


namespace App\Controllers;

use App\Entities\User;
use App\Models\ProductModel;
use App\Models\UserModel;

/**
 * The Admin controller gets the request form the browser and
 * returns one or more views from one or more models where required.
 *
 */

class Admin extends BaseController
{
    /**
     * The default method of this controller
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function index()
    {
        if ($this->session->get('loggedIn')) {
            return redirect()->to('/admin/dashboard');
        } else {
            return redirect()->to('/admin/login');
        }
    }

    public function loginGet()
    {
        if ($this->session->get('loggedIn')) {
            return redirect()->to('/admin/dashboard');
        }
        return view('admin/login');
    }

    /** Checks whether the users is logged in. If so they are straight redirected
     * to the dash bord if not, they are successfully logged in upon submitting the correct
     * login info.
     *
     *
     *
     * @return \CodeIgniter\HTTP\RedirectResponse|string
     *
     */

    public function loginPost()
    {
        if ($this->request->getMethod() == 'post') {

            if ($this->session->get('loggedIn')) {
                return redirect()->to('/admin/dashboard');
            }

            $user = new User($this->request->getPost());
            $userModel = new UserModel();

            $userLogin = $userModel->login($user);

            if ($userLogin) {
                $this->session->set('loggedIn', true);
                return redirect()->to('/admin/dashboard');

            } else {
                return redirect()->back()->with('error', 'Incorrect credentials')->withInput();
            }

        }
        return view('admin/login');
    }

    /**
     * Destroys the session and redirects to the home page
     * @return \CodeIgniter\HTTP\RedirectResponse (redirect to home page)
     */
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }

    /**
     * First checks wether the admin is already logged in, if not requires the account credentials
     * @return \CodeIgniter\HTTP\RedirectResponse (redirects to the admin page)
     */
    public function dashboard()
    {
        if (!$this->session->get('loggedIn')) {
            return redirect()->to('/admin/login');
        }

        echo view('templates/header',['title'=>'Dashboard']);
        echo view('admin/dashboard');

    }


}