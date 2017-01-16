<?php 
class LogoutController extends Zend_Controller_Action
{
function logoutAction(){
    $userNamespace = new Zend_Session_Namespace('user');
    /* $userNamespace->unsetAll() unset the value of namespace but lock remains on namespace so need to unlock namespace for second time to create session again for other user*/
    $userNamespace->unsetAll();
    $this->_redirect('/authentication');
}
}
?>
