<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-02-20 02:35:30 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/dashboard was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-02-20 02:35:30 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/dashboard was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2012-02-20 11:09:34 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-02-20 11:09:34 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2012-02-20 11:09:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-02-20 11:09:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2012-02-20 11:09:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-02-20 11:09:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2012-02-20 12:15:55 --- ERROR: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH\views\cms\dashboard\template.php [ 7 ]
2012-02-20 12:15:55 --- STRACE: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH\views\cms\dashboard\template.php [ 7 ]
--
#0 E:\DEV\web\cms\application\views\cms\dashboard\template.php(7): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 7, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\mainlayout.php(33): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(45): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2012-02-20 12:24:32 --- ERROR: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH\views\cms\dashboard\template.php [ 7 ]
2012-02-20 12:24:32 --- STRACE: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH\views\cms\dashboard\template.php [ 7 ]
--
#0 E:\DEV\web\cms\application\views\cms\dashboard\template.php(7): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 7, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\mainlayout.php(33): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(45): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2012-02-20 12:25:59 --- ERROR: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH\views\cms\dashboard\template.php [ 7 ]
2012-02-20 12:25:59 --- STRACE: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH\views\cms\dashboard\template.php [ 7 ]
--
#0 E:\DEV\web\cms\application\views\cms\dashboard\template.php(7): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 7, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\mainlayout.php(33): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(45): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2012-02-20 12:32:24 --- ERROR: ErrorException [ 8 ]: Undefined variable: username ~ APPPATH\views\cms\dashboard\template.php [ 9 ]
2012-02-20 12:32:24 --- STRACE: ErrorException [ 8 ]: Undefined variable: username ~ APPPATH\views\cms\dashboard\template.php [ 9 ]
--
#0 E:\DEV\web\cms\application\views\cms\dashboard\template.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 9, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\mainlayout.php(33): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(45): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2012-02-20 12:32:49 --- ERROR: ErrorException [ 8 ]: Undefined variable: username ~ APPPATH\views\cms\dashboard\template.php [ 9 ]
2012-02-20 12:32:49 --- STRACE: ErrorException [ 8 ]: Undefined variable: username ~ APPPATH\views\cms\dashboard\template.php [ 9 ]
--
#0 E:\DEV\web\cms\application\views\cms\dashboard\template.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 9, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\mainlayout.php(33): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(45): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2012-02-20 12:32:56 --- ERROR: ErrorException [ 8 ]: Undefined property: Controller_CMS_Dashboard::$user ~ APPPATH\classes\controller\cms\dashboard.php [ 9 ]
2012-02-20 12:32:56 --- STRACE: ErrorException [ 8 ]: Undefined property: Controller_CMS_Dashboard::$user ~ APPPATH\classes\controller\cms\dashboard.php [ 9 ]
--
#0 E:\DEV\web\cms\application\classes\controller\cms\dashboard.php(9): Kohana_Core::error_handler(8, 'Undefined prope...', 'E:\DEV\web\cms\...', 9, Array)
#1 [internal function]: Controller_CMS_Dashboard->action_index()
#2 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_Dashboard))
#3 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#6 {main}
2012-02-20 12:33:02 --- ERROR: ErrorException [ 8 ]: Undefined property: Controller_CMS_Dashboard::$user ~ APPPATH\classes\controller\cms\dashboard.php [ 9 ]
2012-02-20 12:33:02 --- STRACE: ErrorException [ 8 ]: Undefined property: Controller_CMS_Dashboard::$user ~ APPPATH\classes\controller\cms\dashboard.php [ 9 ]
--
#0 E:\DEV\web\cms\application\classes\controller\cms\dashboard.php(9): Kohana_Core::error_handler(8, 'Undefined prope...', 'E:\DEV\web\cms\...', 9, Array)
#1 [internal function]: Controller_CMS_Dashboard->action_index()
#2 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_Dashboard))
#3 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#6 {main}
2012-02-20 12:33:07 --- ERROR: ErrorException [ 8 ]: Undefined property: Controller_CMS_Dashboard::$user ~ APPPATH\classes\controller\cms\dashboard.php [ 9 ]
2012-02-20 12:33:07 --- STRACE: ErrorException [ 8 ]: Undefined property: Controller_CMS_Dashboard::$user ~ APPPATH\classes\controller\cms\dashboard.php [ 9 ]
--
#0 E:\DEV\web\cms\application\classes\controller\cms\dashboard.php(9): Kohana_Core::error_handler(8, 'Undefined prope...', 'E:\DEV\web\cms\...', 9, Array)
#1 [internal function]: Controller_CMS_Dashboard->action_index()
#2 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_Dashboard))
#3 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#6 {main}
2012-02-20 12:35:07 --- ERROR: ErrorException [ 8 ]: Undefined variable: username ~ APPPATH\views\cms\dashboard\template.php [ 9 ]
2012-02-20 12:35:07 --- STRACE: ErrorException [ 8 ]: Undefined variable: username ~ APPPATH\views\cms\dashboard\template.php [ 9 ]
--
#0 E:\DEV\web\cms\application\views\cms\dashboard\template.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 9, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\mainlayout.php(33): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(45): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2012-02-20 12:37:13 --- ERROR: ErrorException [ 8 ]: Undefined variable: username ~ APPPATH\views\cms\dashboard\template.php [ 9 ]
2012-02-20 12:37:13 --- STRACE: ErrorException [ 8 ]: Undefined variable: username ~ APPPATH\views\cms\dashboard\template.php [ 9 ]
--
#0 E:\DEV\web\cms\application\views\cms\dashboard\template.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 9, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\mainlayout.php(33): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(45): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2012-02-20 12:38:20 --- ERROR: ErrorException [ 8 ]: Undefined variable: username ~ APPPATH\views\cms\dashboard\template.php [ 9 ]
2012-02-20 12:38:20 --- STRACE: ErrorException [ 8 ]: Undefined variable: username ~ APPPATH\views\cms\dashboard\template.php [ 9 ]
--
#0 E:\DEV\web\cms\application\views\cms\dashboard\template.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 9, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\mainlayout.php(33): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(45): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2012-02-20 12:38:59 --- ERROR: ErrorException [ 4096 ]: Argument 2 passed to Kohana_View::factory() must be an array, string given, called in E:\DEV\web\cms\application\classes\controller\cms\main.php on line 52 and defined ~ SYSPATH\classes\kohana\view.php [ 28 ]
2012-02-20 12:38:59 --- STRACE: ErrorException [ 4096 ]: Argument 2 passed to Kohana_View::factory() must be an array, string given, called in E:\DEV\web\cms\application\classes\controller\cms\main.php on line 52 and defined ~ SYSPATH\classes\kohana\view.php [ 28 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\view.php(28): Kohana_Core::error_handler(4096, 'Argument 2 pass...', 'E:\DEV\web\cms\...', 28, Array)
#1 E:\DEV\web\cms\application\classes\controller\cms\main.php(52): Kohana_View::factory('cms/dashboard/t...', 'Administrator')
#2 [internal function]: Controller_CMS_Main->action_index()
#3 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#4 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#7 {main}
2012-02-20 12:39:11 --- ERROR: ErrorException [ 8 ]: Undefined variable: username ~ APPPATH\views\cms\dashboard\template.php [ 9 ]
2012-02-20 12:39:11 --- STRACE: ErrorException [ 8 ]: Undefined variable: username ~ APPPATH\views\cms\dashboard\template.php [ 9 ]
--
#0 E:\DEV\web\cms\application\views\cms\dashboard\template.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 9, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\mainlayout.php(33): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(45): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2012-02-20 12:40:05 --- ERROR: ErrorException [ 8 ]: Undefined variable: username ~ APPPATH\views\cms\dashboard\template.php [ 9 ]
2012-02-20 12:40:05 --- STRACE: ErrorException [ 8 ]: Undefined variable: username ~ APPPATH\views\cms\dashboard\template.php [ 9 ]
--
#0 E:\DEV\web\cms\application\views\cms\dashboard\template.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 9, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\mainlayout.php(33): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(45): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2012-02-20 13:24:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/assets/images/icons_32x32/star.png ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-02-20 13:24:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/assets/images/icons_32x32/star.png ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2012-02-20 13:25:10 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/assets/images/icons_32x32/star.png ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-02-20 13:25:10 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/assets/images/icons_32x32/star.png ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2012-02-20 13:25:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/assets/images/icons_32x32/star.png ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-02-20 13:25:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/assets/images/icons_32x32/star.png ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2012-02-20 13:25:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/assets/images/icons_32x32/star.png ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-02-20 13:25:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/assets/images/icons_32x32/star.png ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2012-02-20 13:25:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/assets/images/icons_32x32/star.png ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-02-20 13:25:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/assets/images/icons_32x32/star.png ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2012-02-20 13:25:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/assets/images/icons_32x32/star.png ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-02-20 13:25:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: assets/css/assets/images/icons_32x32/star.png ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2012-02-20 14:13:42 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/structure was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-02-20 14:13:42 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/structure was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2012-02-20 14:15:12 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/articles was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-02-20 14:15:12 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/articles was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2012-02-20 14:19:55 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/structure was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-02-20 14:19:55 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/structure was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2012-02-20 14:23:07 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/articles was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-02-20 14:23:07 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/articles was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2012-02-20 14:23:11 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/structure was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-02-20 14:23:11 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/structure was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2012-02-20 16:31:31 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-02-20 16:31:31 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2012-02-20 16:31:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-02-20 16:31:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2012-02-20 16:48:08 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/undefined was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-02-20 16:48:08 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/undefined was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2012-02-20 16:48:08 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL articles was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-02-20 16:48:08 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL articles was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2012-02-20 16:49:22 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL templates was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-02-20 16:49:22 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL templates was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2012-02-20 16:49:29 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL templates was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-02-20 16:49:29 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL templates was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2012-02-20 16:49:35 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL templates was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-02-20 16:49:35 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL templates was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2012-02-20 16:57:27 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-02-20 16:57:27 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2012-02-20 16:57:33 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-02-20 16:57:33 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2012-02-20 17:26:34 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/structure was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-02-20 17:26:34 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/structure was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2012-02-20 17:26:36 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/structure was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-02-20 17:26:36 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/structure was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2012-02-20 17:26:43 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/file_manager was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-02-20 17:26:43 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/file_manager was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2012-02-20 23:12:09 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/articles was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-02-20 23:12:09 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/articles was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2012-02-20 23:12:15 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/system was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-02-20 23:12:15 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/system was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}