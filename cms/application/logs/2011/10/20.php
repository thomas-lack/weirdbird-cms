<?php defined('SYSPATH') or die('No direct script access.'); ?>

2011-10-20 18:01:47 --- ERROR: ErrorException [ 8 ]: Undefined variable: template ~ APPPATH\classes\controller\frontend\main.php [ 11 ]
2011-10-20 18:01:47 --- STRACE: ErrorException [ 8 ]: Undefined variable: template ~ APPPATH\classes\controller\frontend\main.php [ 11 ]
--
#0 E:\DEV\web\cms\application\classes\controller\frontend\main.php(11): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 11, Array)
#1 [internal function]: Controller_Frontend_Main->action_index()
#2 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Frontend_Main))
#3 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#6 {main}
2011-10-20 18:02:02 --- ERROR: ErrorException [ 8 ]: Undefined variable: template ~ APPPATH\classes\controller\frontend\main.php [ 11 ]
2011-10-20 18:02:02 --- STRACE: ErrorException [ 8 ]: Undefined variable: template ~ APPPATH\classes\controller\frontend\main.php [ 11 ]
--
#0 E:\DEV\web\cms\application\classes\controller\frontend\main.php(11): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 11, Array)
#1 [internal function]: Controller_Frontend_Main->action_index()
#2 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Frontend_Main))
#3 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#6 {main}
2011-10-20 18:02:08 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected T_OBJECT_OPERATOR ~ APPPATH\classes\controller\frontend\main.php [ 11 ]
2011-10-20 18:02:08 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected T_OBJECT_OPERATOR ~ APPPATH\classes\controller\frontend\main.php [ 11 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2011-10-20 18:03:32 --- ERROR: ErrorException [ 8 ]: Undefined variable: template ~ APPPATH\classes\controller\frontend\main.php [ 11 ]
2011-10-20 18:03:32 --- STRACE: ErrorException [ 8 ]: Undefined variable: template ~ APPPATH\classes\controller\frontend\main.php [ 11 ]
--
#0 E:\DEV\web\cms\application\classes\controller\frontend\main.php(11): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 11, Array)
#1 [internal function]: Controller_Frontend_Main->action_index()
#2 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Frontend_Main))
#3 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#6 {main}
2011-10-20 18:27:30 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI:  ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-10-20 18:27:30 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI:  ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2011-10-20 18:28:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI:  ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-10-20 18:28:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI:  ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2011-10-20 19:28:58 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/cms was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 19:28:58 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/cms was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 19:29:12 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/cms was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 19:29:12 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/cms was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 19:29:21 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/test was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 19:29:21 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/test was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 19:29:30 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/cms was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 19:29:30 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/cms was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 19:30:20 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/cms/main was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 19:30:20 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/cms/main was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 19:30:35 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/cms was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 19:30:35 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/cms was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 19:35:10 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/cms was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 19:35:10 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/cms was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 19:36:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI:  ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-10-20 19:36:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI:  ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2011-10-20 19:36:19 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/blub was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 19:36:19 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/blub was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 19:36:44 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/blub was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 19:36:44 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/blub was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 19:36:53 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/cms was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 19:36:53 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/cms was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 19:37:05 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/cms was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 19:37:05 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/cms was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 19:37:09 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/MAAAN was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 19:37:09 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/MAAAN was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 19:37:41 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/MAAAN was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 19:37:41 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/MAAAN was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 22:06:23 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/user was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 22:06:23 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/user was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 22:06:47 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/user/create was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 22:06:47 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/user/create was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 22:15:08 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/user/create was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 22:15:08 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/user/create was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 22:15:12 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/user/create was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 22:15:12 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/user/create was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 22:15:14 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/user was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 22:15:14 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/user was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 22:15:20 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/users was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 22:15:20 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/users was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 22:19:41 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL user was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 22:19:41 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL user was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 22:23:05 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/user was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 22:23:05 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/user was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 22:23:23 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/user was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 22:23:23 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/user was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 22:24:34 --- ERROR: View_Exception [ 0 ]: The requested view user/info could not be found ~ SYSPATH\classes\kohana\view.php [ 252 ]
2011-10-20 22:24:34 --- STRACE: View_Exception [ 0 ]: The requested view user/info could not be found ~ SYSPATH\classes\kohana\view.php [ 252 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\view.php(137): Kohana_View->set_filename('user/info')
#1 E:\DEV\web\cms\system\classes\kohana\view.php(30): Kohana_View->__construct('user/info', NULL)
#2 E:\DEV\web\cms\application\classes\controller\cms\user.php(7): Kohana_View::factory('user/info')
#3 [internal function]: Controller_CMS_User->action_index()
#4 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_User))
#5 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#8 {main}
2011-10-20 22:26:47 --- ERROR: Kohana_Exception [ 0 ]: No configuration sources attached ~ SYSPATH\classes\kohana\config.php [ 87 ]
2011-10-20 22:26:47 --- STRACE: Kohana_Exception [ 0 ]: No configuration sources attached ~ SYSPATH\classes\kohana\config.php [ 87 ]
--
#0 E:\DEV\web\cms\modules\auth\classes\kohana\auth.php(26): Kohana_Config->load('auth')
#1 E:\DEV\web\cms\application\classes\controller\cms\user.php(11): Kohana_Auth::instance()
#2 [internal function]: Controller_CMS_User->action_index()
#3 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_User))
#4 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#7 {main}
2011-10-20 22:29:53 --- ERROR: Kohana_Exception [ 0 ]: No configuration sources attached ~ SYSPATH\classes\kohana\config.php [ 87 ]
2011-10-20 22:29:53 --- STRACE: Kohana_Exception [ 0 ]: No configuration sources attached ~ SYSPATH\classes\kohana\config.php [ 87 ]
--
#0 E:\DEV\web\cms\modules\auth\classes\kohana\auth.php(26): Kohana_Config->load('auth')
#1 E:\DEV\web\cms\application\classes\controller\cms\user.php(11): Kohana_Auth::instance()
#2 [internal function]: Controller_CMS_User->action_index()
#3 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_User))
#4 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#7 {main}
2011-10-20 22:30:00 --- ERROR: Kohana_Exception [ 0 ]: No configuration sources attached ~ SYSPATH\classes\kohana\config.php [ 87 ]
2011-10-20 22:30:00 --- STRACE: Kohana_Exception [ 0 ]: No configuration sources attached ~ SYSPATH\classes\kohana\config.php [ 87 ]
--
#0 E:\DEV\web\cms\modules\auth\classes\kohana\auth.php(26): Kohana_Config->load('auth')
#1 E:\DEV\web\cms\application\classes\controller\cms\user.php(11): Kohana_Auth::instance()
#2 [internal function]: Controller_CMS_User->action_index()
#3 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_User))
#4 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#7 {main}
2011-10-20 22:37:16 --- ERROR: Kohana_Exception [ 0 ]: No configuration sources attached ~ SYSPATH\classes\kohana\config.php [ 87 ]
2011-10-20 22:37:16 --- STRACE: Kohana_Exception [ 0 ]: No configuration sources attached ~ SYSPATH\classes\kohana\config.php [ 87 ]
--
#0 E:\DEV\web\cms\modules\auth\classes\kohana\auth.php(26): Kohana_Config->load('auth')
#1 E:\DEV\web\cms\application\classes\controller\cms\user.php(11): Kohana_Auth::instance()
#2 [internal function]: Controller_CMS_User->action_index()
#3 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_User))
#4 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#7 {main}
2011-10-20 22:39:26 --- ERROR: Kohana_Exception [ 0 ]: No configuration sources attached ~ SYSPATH\classes\kohana\config.php [ 87 ]
2011-10-20 22:39:26 --- STRACE: Kohana_Exception [ 0 ]: No configuration sources attached ~ SYSPATH\classes\kohana\config.php [ 87 ]
--
#0 E:\DEV\web\cms\modules\auth\classes\kohana\auth.php(26): Kohana_Config->load('auth')
#1 E:\DEV\web\cms\application\classes\controller\cms\user.php(11): Kohana_Auth::instance()
#2 [internal function]: Controller_CMS_User->action_index()
#3 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_User))
#4 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#7 {main}
2011-10-20 22:42:49 --- ERROR: Kohana_Exception [ 0 ]: No configuration sources attached ~ SYSPATH\classes\kohana\config.php [ 87 ]
2011-10-20 22:42:49 --- STRACE: Kohana_Exception [ 0 ]: No configuration sources attached ~ SYSPATH\classes\kohana\config.php [ 87 ]
--
#0 E:\DEV\web\cms\modules\auth\classes\kohana\auth.php(26): Kohana_Config->load('auth')
#1 E:\DEV\web\cms\application\classes\controller\cms\user.php(11): Kohana_Auth::instance()
#2 [internal function]: Controller_CMS_User->action_index()
#3 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_User))
#4 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#7 {main}
2011-10-20 22:45:11 --- ERROR: Kohana_Exception [ 0 ]: No configuration sources attached ~ SYSPATH\classes\kohana\config.php [ 87 ]
2011-10-20 22:45:11 --- STRACE: Kohana_Exception [ 0 ]: No configuration sources attached ~ SYSPATH\classes\kohana\config.php [ 87 ]
--
#0 E:\DEV\web\cms\modules\auth\classes\kohana\auth.php(26): Kohana_Config->load('auth')
#1 E:\DEV\web\cms\application\classes\controller\cms\user.php(11): Kohana_Auth::instance()
#2 [internal function]: Controller_CMS_User->action_index()
#3 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_User))
#4 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#7 {main}
2011-10-20 22:56:15 --- ERROR: Kohana_Exception [ 0 ]: No configuration sources attached ~ SYSPATH\classes\kohana\config.php [ 87 ]
2011-10-20 22:56:15 --- STRACE: Kohana_Exception [ 0 ]: No configuration sources attached ~ SYSPATH\classes\kohana\config.php [ 87 ]
--
#0 E:\DEV\web\cms\modules\auth\classes\kohana\auth.php(26): Kohana_Config->load('auth')
#1 E:\DEV\web\cms\application\classes\controller\cms\user.php(11): Kohana_Auth::instance()
#2 [internal function]: Controller_CMS_User->action_index()
#3 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_User))
#4 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#7 {main}
2011-10-20 22:57:44 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL user/login was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 22:57:44 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL user/login was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 22:58:07 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL user/login was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 22:58:07 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL user/login was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 22:59:00 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL user/create was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 22:59:00 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL user/create was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 22:59:35 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL user/login was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 22:59:35 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL user/login was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 23:04:18 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL user/create was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-10-20 23:04:18 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL user/create was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-10-20 23:08:43 --- ERROR: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt. ~ SYSPATH\classes\kohana\cookie.php [ 152 ]
2011-10-20 23:08:43 --- STRACE: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt. ~ SYSPATH\classes\kohana\cookie.php [ 152 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\cookie.php(115): Kohana_Cookie::salt('authautologin', 'e108ebd26d09127...')
#1 E:\DEV\web\cms\modules\orm\classes\kohana\auth\orm.php(103): Kohana_Cookie::set('authautologin', 'e108ebd26d09127...', 1209600)
#2 E:\DEV\web\cms\modules\auth\classes\kohana\auth.php(90): Kohana_Auth_ORM->_login('thomas.lack@web...', '741852a963', true)
#3 E:\DEV\web\cms\application\classes\controller\cms\user.php(66): Kohana_Auth->login('thomas.lack@web...', '741852a963', true)
#4 [internal function]: Controller_CMS_User->action_login()
#5 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_User))
#6 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#8 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#9 {main}
2011-10-20 23:13:13 --- ERROR: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt. ~ SYSPATH\classes\kohana\cookie.php [ 152 ]
2011-10-20 23:13:13 --- STRACE: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt. ~ SYSPATH\classes\kohana\cookie.php [ 152 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\cookie.php(115): Kohana_Cookie::salt('authautologin', '16cf95903d2c3c9...')
#1 E:\DEV\web\cms\modules\orm\classes\kohana\auth\orm.php(103): Kohana_Cookie::set('authautologin', '16cf95903d2c3c9...', 1209600)
#2 E:\DEV\web\cms\modules\auth\classes\kohana\auth.php(90): Kohana_Auth_ORM->_login('thomas.lack@web...', '741852a963', true)
#3 E:\DEV\web\cms\application\classes\controller\cms\user.php(66): Kohana_Auth->login('thomas.lack@web...', '741852a963', true)
#4 [internal function]: Controller_CMS_User->action_login()
#5 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_User))
#6 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#8 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#9 {main}
2011-10-20 23:32:53 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected T_STRING, expecting T_VARIABLE ~ APPPATH\classes\controller\cms\user.php [ 5 ]
2011-10-20 23:32:53 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected T_STRING, expecting T_VARIABLE ~ APPPATH\classes\controller\cms\user.php [ 5 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2011-10-20 23:32:59 --- ERROR: View_Exception [ 0 ]: The requested view cms/user/templates could not be found ~ SYSPATH\classes\kohana\view.php [ 252 ]
2011-10-20 23:32:59 --- STRACE: View_Exception [ 0 ]: The requested view cms/user/templates could not be found ~ SYSPATH\classes\kohana\view.php [ 252 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\view.php(137): Kohana_View->set_filename('cms/user/templa...')
#1 E:\DEV\web\cms\system\classes\kohana\view.php(30): Kohana_View->__construct('cms/user/templa...', NULL)
#2 E:\DEV\web\cms\system\classes\kohana\controller\template.php(33): Kohana_View::factory('cms/user/templa...')
#3 [internal function]: Kohana_Controller_Template->before()
#4 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(103): ReflectionMethod->invoke(Object(Controller_CMS_User))
#5 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#8 {main}
2011-10-20 23:38:30 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/user/logou was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 113 ]
2011-10-20 23:38:30 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/user/logou was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 113 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}