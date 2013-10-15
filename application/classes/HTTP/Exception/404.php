<?php defined('SYSPATH') or die('No direct script access.');

class HTTP_Exception_404 extends Kohana_HTTP_Exception_404 {
 
    /**
     * Generate a Response for the 404 Exception.
     *
     * The user should be shown a nice 404 page.
     * 
     * @return Response
     */
    public function get_response()
    {
        // get the current user theme and have a look if the theme provides
        // its own error page
        $template = ORM::factory('Template')->where('active','=','1')->find();
        $stdErrorPagePath = '/views/error/404';

        if ($template->loaded() && file_exists($template->folder . $stdErrorPagePath . '.php'))
        {
            $view = View::factory('../../' . $template->folder . $stdErrorPagePath);
            $view->templatePath = 'http://' . $_SERVER['HTTP_HOST'] . '/'. $template->folder;
        }
        // otherwise show the standard wb cms error page
        else
        {
            $view = View::factory('frontend/error');
        }
         
        // Remembering that `$this` is an instance of HTTP_Exception_404
        $view->error = $this->getMessage();
        $view->errorCode = 404;

        $response = Response::factory()
            ->status(404)
            ->body($view->render());
 
        return $response;
    }
}