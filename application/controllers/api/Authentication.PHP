<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class Authentication extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('ApiAction');
        $this->load->model('user');
    }

    public function account_put()
    {
        $data['verify'] = 1;
        $id = intval(strip_tags($this->put('id')));
        $this->user->get_user($id);
        $result = $this->user->update_user($id, $data);
        if ($result == 1) {
            $this->response(['status' => TRUE, 'message' => 'User active successful', 'data' => $result], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => FALSE, 'message' => 'Something is wrong', 'data' => $result], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function login_post()
    {
        // Get the post data
        $email = $this->post('email');
        $password = $this->post('password');

        // Validate the post data
        if (!empty($email) && !empty($password)) {
            $hash = $this->user->userLogin($email)->password;
            $result = password_verify($password, $hash);
            if ($result) {
                $this->response(['status' => TRUE, 'message' => 'User login successful.', 'data' => $email], REST_Controller::HTTP_OK);
            } else {
                $this->response(['status' => FALSE, 'message' => 'Email or password wrong', 'data' => $email], REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            $this->response(['status' => FALSE, 'message' => 'Please provide both email and password'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function signup_post()
    {
        $empty_data = 0;
        $user_data = array(
            'email' => strip_tags($this->post('email')),
            'username' => strip_tags($this->post('name')),
            'title' => strip_tags($this->post('title')),
            'password' => password_hash($this->post('password'), PASSWORD_BCRYPT),
            'tel_phone' => strip_tags($this->post('tel_phone')),
            'mob_phone' => strip_tags($this->post('mob_phone')),
            'bsn_name' => strip_tags($this->post('bsn_name')),
            'bsn_type' => strip_tags($this->post('bsn_type')),
            'abn' => strip_tags($this->post('abn')),
            'address' => strip_tags($this->post('address')),
            'state' => strip_tags($this->post('state')),
            'city' => strip_tags($this->post('city')),
            'postcode' => strip_tags($this->post('postcode')),
        );

        foreach ($user_data as $key => $value) {
            if (empty($value)) {
                $empty_data++;
            }
        }
        // Check if the user inputted all information
        if ($empty_data == 0) {
            // Check if the given email already exists
            $con['returnType'] = 'count';
            $con['conditions'] = array(
                'email' => $user_data['email'],
            );

            $user_count = $this->ApiAction->getRows($con);

            if ($user_count > 0) {
                $this->response("The given email already exists.", REST_Controller::HTTP_BAD_REQUEST);
            } else {
                // Insert user data
                $insert = $this->ApiAction->insert($user_data);
                // Check if the user data is inserted
                if ($insert) {
                    $this->response([
                        'status' => TRUE,
                        'message' => 'The user has been added successfully.',
                        'data' => password_hash($this->post('password'), PASSWORD_BCRYPT)
                    ], REST_Controller::HTTP_OK);
                } else {
                    $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        } else {
            $this->response("Provide complete user info to add.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function user_get($id = 0)
    {
        // Returns all the users data if the id not specified,
        // Otherwise, a single user will be returned.
        $con = $id ? array('id' => $id) : '';
        $users = $this->ApiAction->getRows($con);

        // Check if the user data exists
        if (!empty($users)) {
            // Set the response and exit
            //OK (200) being the HTTP response code
            $this->response($users, REST_Controller::HTTP_OK);
        } else {
            // Set the response and exit
            //NOT_FOUND (404) being the HTTP response code
            $this->response([
                'status' => FALSE,
                'message' => 'No user was found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function user_put()
    {
        $id = $this->put('id');

        // Get the post data
        $first_name = strip_tags($this->put('first_name'));
        $last_name = strip_tags($this->put('last_name'));
        $email = strip_tags($this->put('email'));
        $password = $this->put('password');
        $phone = strip_tags($this->put('phone'));

        // Validate the post data
        if (!empty($id) && (!empty($first_name) || !empty($last_name) || !empty($email) || !empty($password) || !empty($phone))) {
            // Update user's account data
            $userData = array();
            if (!empty($first_name)) {
                $userData['first_name'] = $first_name;
            }
            if (!empty($last_name)) {
                $userData['last_name'] = $last_name;
            }
            if (!empty($email)) {
                $userData['email'] = $email;
            }
            if (!empty($password)) {
                $userData['password'] = md5($password);
            }
            if (!empty($phone)) {
                $userData['phone'] = $phone;
            }
            $update = $this->ApiAction->update($userData, $id);

            // Check if the user data is updated
            if ($update) {
                // Set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'The user info has been updated successfully.'
                ], REST_Controller::HTTP_OK);
            } else {
                // Set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            // Set the response and exit
            $this->response("Provide at least one user info to update.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}