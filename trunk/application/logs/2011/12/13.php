<?php defined('SYSPATH') or die('No direct script access.'); ?>

2011-12-13 19:30:34 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-12-13 19:30:34 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2011-12-13 19:30:36 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-12-13 19:30:36 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2011-12-13 19:30:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-12-13 19:30:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2011-12-13 19:42:06 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/templates was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-12-13 19:42:06 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/templates was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-12-13 19:59:21 --- ERROR: ErrorException [ 8 ]: Undefined variable: header ~ APPPATH\views\cms\pages\mainlayout.php [ 7 ]
2011-12-13 19:59:21 --- STRACE: ErrorException [ 8 ]: Undefined variable: header ~ APPPATH\views\cms\pages\mainlayout.php [ 7 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(7): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 7, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\application\classes\controller\cms\main.php(21): Kohana_View->render()
#4 [internal function]: Controller_CMS_Main->action_index()
#5 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#6 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#8 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#9 {main}