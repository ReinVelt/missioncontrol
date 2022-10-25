<?php
namespace App\Models;

class IonAuthModel extends \IonAuth\Models\IonAuthModel
{

  // admittedly, this will only work if $identity is email
  // it needs a little tweaking so that the query below searches not for identity (which could be email or username), but
  // for email proper, as Google will return email; will fix that in the future
  // function is a heavily modified version of the login() function
  public function login_google(string $identity): bool
  {
    $this->triggerEvents('pre_login');

    if (empty($identity)) {
      $this->setError('IonAuth.login_unsuccessful');
      return false;
    }

    $this->triggerEvents('extra_where');
    $query = $this->db->table($this->tables['users'])
      ->select($this->identityColumn . ', email, id, password, active, last_login')
      ->where($this->identityColumn, $identity)
      ->limit(1)
      ->orderBy('id', 'desc')
      ->get();

    $user = $query->getRow();

    // if we foun the user by the email supplied by Google...
    if (isset($user)) {
      // and if the user is not inactive...
      if ($user->active == 0) {
        $this->triggerEvents('post_login_unsuccessful'); 
        $this->setError('IonAuth.login_unsuccessful_not_active');

        return false;
      }
      
      // we declare success!
      $this->setSession($user);

      $this->updateLastLogin($user->id);
      
      // hardly needed, but why not
      $this->clearLoginAttempts($identity);
      $this->clearForgottenPasswordCode($identity);

      $this->session->regenerate(false);

      $this->triggerEvents(['post_login', 'post_login_successful']);
      $this->setMessage('IonAuth.login_successful');

      return true;
    }

    $this->triggerEvents('post_login_unsuccessful');
    // could write a line here that is specific to this method
    $this->setError('IonAuth.login_unsuccessful');

    return false;
  }
} 