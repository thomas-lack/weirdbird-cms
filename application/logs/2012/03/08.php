<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-03-08 10:58:24 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-03-08 10:58:24 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-08 10:58:24 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-03-08 10:58:24 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-08 10:58:24 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2012-03-08 10:58:24 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2012-03-08 11:23:45 --- ERROR: ErrorException [ 1 ]: Call to undefined function getTemplateFolders() ~ APPPATH\classes\controller\cms\templates.php [ 11 ]
2012-03-08 11:23:45 --- STRACE: ErrorException [ 1 ]: Call to undefined function getTemplateFolders() ~ APPPATH\classes\controller\cms\templates.php [ 11 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-03-08 11:24:17 --- ERROR: ErrorException [ 8 ]: Undefined variable: somePath ~ APPPATH\classes\controller\cms\templates.php [ 17 ]
2012-03-08 11:24:17 --- STRACE: ErrorException [ 8 ]: Undefined variable: somePath ~ APPPATH\classes\controller\cms\templates.php [ 17 ]
--
#0 E:\DEV\web\cms\application\classes\controller\cms\templates.php(17): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 17, Array)
#1 E:\DEV\web\cms\application\classes\controller\cms\templates.php(11): Controller_CMS_Templates->getTemplateFolders()
#2 [internal function]: Controller_CMS_Templates->action_index()
#3 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_Templates))
#4 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#7 {main}
2012-03-08 11:38:24 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected T_ARRAY ~ APPPATH\classes\controller\cms\templates.php [ 24 ]
2012-03-08 11:38:24 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected T_ARRAY ~ APPPATH\classes\controller\cms\templates.php [ 24 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-03-08 11:38:50 --- ERROR: ErrorException [ 2 ]: file_get_contents(site-templates/karmeliterschuleconfig.xml) [function.file-get-contents]: failed to open stream: No such file or directory ~ APPPATH\classes\controller\cms\templates.php [ 27 ]
2012-03-08 11:38:50 --- STRACE: ErrorException [ 2 ]: file_get_contents(site-templates/karmeliterschuleconfig.xml) [function.file-get-contents]: failed to open stream: No such file or directory ~ APPPATH\classes\controller\cms\templates.php [ 27 ]
--
#0 [internal function]: Kohana_Core::error_handler(2, 'file_get_conten...', 'E:\DEV\web\cms\...', 27, Array)
#1 E:\DEV\web\cms\application\classes\controller\cms\templates.php(27): file_get_contents('site-templates/...')
#2 E:\DEV\web\cms\application\classes\controller\cms\templates.php(13): Controller_CMS_Templates->getTemplateConfigs(Array)
#3 [internal function]: Controller_CMS_Templates->action_index()
#4 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_Templates))
#5 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#8 {main}
2012-03-08 11:39:16 --- ERROR: ErrorException [ 2 ]: simplexml_load_string() [function.simplexml-load-string]: Entity: line 3: parser error : Extra content at the end of the document ~ APPPATH\classes\controller\cms\templates.php [ 28 ]
2012-03-08 11:39:16 --- STRACE: ErrorException [ 2 ]: simplexml_load_string() [function.simplexml-load-string]: Entity: line 3: parser error : Extra content at the end of the document ~ APPPATH\classes\controller\cms\templates.php [ 28 ]
--
#0 [internal function]: Kohana_Core::error_handler(2, 'simplexml_load_...', 'E:\DEV\web\cms\...', 28, Array)
#1 E:\DEV\web\cms\application\classes\controller\cms\templates.php(28): simplexml_load_string('<?xml version="...')
#2 E:\DEV\web\cms\application\classes\controller\cms\templates.php(13): Controller_CMS_Templates->getTemplateConfigs(Array)
#3 [internal function]: Controller_CMS_Templates->action_index()
#4 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_Templates))
#5 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#8 {main}
2012-03-08 11:42:08 --- ERROR: ErrorException [ 2 ]: simplexml_load_string() [function.simplexml-load-string]: Entity: line 3: parser error : Extra content at the end of the document ~ APPPATH\classes\controller\cms\templates.php [ 29 ]
2012-03-08 11:42:08 --- STRACE: ErrorException [ 2 ]: simplexml_load_string() [function.simplexml-load-string]: Entity: line 3: parser error : Extra content at the end of the document ~ APPPATH\classes\controller\cms\templates.php [ 29 ]
--
#0 [internal function]: Kohana_Core::error_handler(2, 'simplexml_load_...', 'E:\DEV\web\cms\...', 29, Array)
#1 E:\DEV\web\cms\application\classes\controller\cms\templates.php(29): simplexml_load_string('<?xml version="...')
#2 E:\DEV\web\cms\application\classes\controller\cms\templates.php(13): Controller_CMS_Templates->getTemplateConfigs(Array)
#3 [internal function]: Controller_CMS_Templates->action_index()
#4 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_Templates))
#5 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#8 {main}
2012-03-08 11:51:03 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH\views\cms\templates\template.php [ 11 ]
2012-03-08 11:51:03 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH\views\cms\templates\template.php [ 11 ]
--
#0 E:\DEV\web\cms\application\views\cms\templates\template.php(11): Kohana_Core::error_handler(8, 'Trying to get p...', 'E:\DEV\web\cms\...', 11, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#4 E:\DEV\web\cms\application\classes\controller\cms\main.php(47): Kohana_Controller_Template->after()
#5 [internal function]: Controller_CMS_Main->after()
#6 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Templates))
#7 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#10 {main}
2012-03-08 12:09:11 --- ERROR: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\views\cms\templates\template.php [ 16 ]
2012-03-08 12:09:11 --- STRACE: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\views\cms\templates\template.php [ 16 ]
--
#0 E:\DEV\web\cms\application\views\cms\templates\template.php(16): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\DEV\web\cms\...', 16, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#4 E:\DEV\web\cms\application\classes\controller\cms\main.php(47): Kohana_Controller_Template->after()
#5 [internal function]: Controller_CMS_Main->after()
#6 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Templates))
#7 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#10 {main}
2012-03-08 12:10:18 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected '{' ~ APPPATH\views\cms\templates\template.php [ 16 ]
2012-03-08 12:10:18 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected '{' ~ APPPATH\views\cms\templates\template.php [ 16 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-03-08 12:10:35 --- ERROR: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\views\cms\templates\template.php [ 18 ]
2012-03-08 12:10:35 --- STRACE: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\views\cms\templates\template.php [ 18 ]
--
#0 E:\DEV\web\cms\application\views\cms\templates\template.php(18): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\DEV\web\cms\...', 18, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#4 E:\DEV\web\cms\application\classes\controller\cms\main.php(47): Kohana_Controller_Template->after()
#5 [internal function]: Controller_CMS_Main->after()
#6 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Templates))
#7 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#10 {main}
2012-03-08 12:11:21 --- ERROR: ErrorException [ 8 ]: Undefined index: description ~ APPPATH\views\cms\templates\template.php [ 13 ]
2012-03-08 12:11:21 --- STRACE: ErrorException [ 8 ]: Undefined index: description ~ APPPATH\views\cms\templates\template.php [ 13 ]
--
#0 E:\DEV\web\cms\application\views\cms\templates\template.php(13): Kohana_Core::error_handler(8, 'Undefined index...', 'E:\DEV\web\cms\...', 13, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#4 E:\DEV\web\cms\application\classes\controller\cms\main.php(47): Kohana_Controller_Template->after()
#5 [internal function]: Controller_CMS_Main->after()
#6 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Templates))
#7 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#10 {main}
2012-03-08 12:21:13 --- ERROR: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\views\cms\templates\template.php [ 20 ]
2012-03-08 12:21:13 --- STRACE: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\views\cms\templates\template.php [ 20 ]
--
#0 E:\DEV\web\cms\application\views\cms\templates\template.php(20): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\DEV\web\cms\...', 20, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#4 E:\DEV\web\cms\application\classes\controller\cms\main.php(47): Kohana_Controller_Template->after()
#5 [internal function]: Controller_CMS_Main->after()
#6 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Templates))
#7 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#10 {main}
2012-03-08 12:22:08 --- ERROR: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\views\cms\templates\template.php [ 20 ]
2012-03-08 12:22:08 --- STRACE: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\views\cms\templates\template.php [ 20 ]
--
#0 E:\DEV\web\cms\application\views\cms\templates\template.php(20): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\DEV\web\cms\...', 20, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#4 E:\DEV\web\cms\application\classes\controller\cms\main.php(47): Kohana_Controller_Template->after()
#5 [internal function]: Controller_CMS_Main->after()
#6 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Templates))
#7 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#10 {main}
2012-03-08 12:27:34 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected T_STRING, expecting '(' ~ APPPATH\views\cms\templates\template.php [ 19 ]
2012-03-08 12:27:34 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected T_STRING, expecting '(' ~ APPPATH\views\cms\templates\template.php [ 19 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-03-08 12:28:11 --- ERROR: ErrorException [ 8 ]: Undefined variable: 2-column ~ APPPATH\views\cms\templates\template.php [ 21 ]
2012-03-08 12:28:11 --- STRACE: ErrorException [ 8 ]: Undefined variable: 2-column ~ APPPATH\views\cms\templates\template.php [ 21 ]
--
#0 E:\DEV\web\cms\application\views\cms\templates\template.php(21): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 21, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#4 E:\DEV\web\cms\application\classes\controller\cms\main.php(47): Kohana_Controller_Template->after()
#5 [internal function]: Controller_CMS_Main->after()
#6 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Templates))
#7 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#10 {main}
2012-03-08 12:30:09 --- ERROR: ErrorException [ 2 ]: count() expects at least 1 parameter, 0 given ~ APPPATH\views\cms\templates\template.php [ 19 ]
2012-03-08 12:30:09 --- STRACE: ErrorException [ 2 ]: count() expects at least 1 parameter, 0 given ~ APPPATH\views\cms\templates\template.php [ 19 ]
--
#0 [internal function]: Kohana_Core::error_handler(2, 'count() expects...', 'E:\DEV\web\cms\...', 19, Array)
#1 E:\DEV\web\cms\application\views\cms\templates\template.php(19): count()
#2 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#3 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#4 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#5 E:\DEV\web\cms\application\classes\controller\cms\main.php(47): Kohana_Controller_Template->after()
#6 [internal function]: Controller_CMS_Main->after()
#7 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Templates))
#8 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#11 {main}
2012-03-08 12:30:35 --- ERROR: ErrorException [ 8 ]: Undefined variable: layouts ~ APPPATH\views\cms\templates\template.php [ 30 ]
2012-03-08 12:30:35 --- STRACE: ErrorException [ 8 ]: Undefined variable: layouts ~ APPPATH\views\cms\templates\template.php [ 30 ]
--
#0 E:\DEV\web\cms\application\views\cms\templates\template.php(30): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 30, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#4 E:\DEV\web\cms\application\classes\controller\cms\main.php(47): Kohana_Controller_Template->after()
#5 [internal function]: Controller_CMS_Main->after()
#6 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Templates))
#7 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#10 {main}
2012-03-08 12:32:52 --- ERROR: ErrorException [ 8 ]: Undefined variable: 2-column ~ APPPATH\views\cms\templates\template.php [ 19 ]
2012-03-08 12:32:52 --- STRACE: ErrorException [ 8 ]: Undefined variable: 2-column ~ APPPATH\views\cms\templates\template.php [ 19 ]
--
#0 E:\DEV\web\cms\application\views\cms\templates\template.php(19): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 19, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#4 E:\DEV\web\cms\application\classes\controller\cms\main.php(47): Kohana_Controller_Template->after()
#5 [internal function]: Controller_CMS_Main->after()
#6 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Templates))
#7 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#10 {main}
2012-03-08 12:33:34 --- ERROR: ErrorException [ 8 ]: Array to string conversion ~ APPPATH\views\cms\templates\template.php [ 19 ]
2012-03-08 12:33:34 --- STRACE: ErrorException [ 8 ]: Array to string conversion ~ APPPATH\views\cms\templates\template.php [ 19 ]
--
#0 E:\DEV\web\cms\application\views\cms\templates\template.php(19): Kohana_Core::error_handler(8, 'Array to string...', 'E:\DEV\web\cms\...', 19, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#4 E:\DEV\web\cms\application\classes\controller\cms\main.php(47): Kohana_Controller_Template->after()
#5 [internal function]: Controller_CMS_Main->after()
#6 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Templates))
#7 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#10 {main}
2012-03-08 12:34:00 --- ERROR: ErrorException [ 8 ]: Array to string conversion ~ APPPATH\views\cms\templates\template.php [ 19 ]
2012-03-08 12:34:00 --- STRACE: ErrorException [ 8 ]: Array to string conversion ~ APPPATH\views\cms\templates\template.php [ 19 ]
--
#0 E:\DEV\web\cms\application\views\cms\templates\template.php(19): Kohana_Core::error_handler(8, 'Array to string...', 'E:\DEV\web\cms\...', 19, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#4 E:\DEV\web\cms\application\classes\controller\cms\main.php(47): Kohana_Controller_Template->after()
#5 [internal function]: Controller_CMS_Main->after()
#6 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Templates))
#7 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#10 {main}
2012-03-08 12:35:36 --- ERROR: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\views\cms\templates\template.php [ 19 ]
2012-03-08 12:35:36 --- STRACE: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH\views\cms\templates\template.php [ 19 ]
--
#0 E:\DEV\web\cms\application\views\cms\templates\template.php(19): Kohana_Core::error_handler(2, 'Invalid argumen...', 'E:\DEV\web\cms\...', 19, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#4 E:\DEV\web\cms\application\classes\controller\cms\main.php(47): Kohana_Controller_Template->after()
#5 [internal function]: Controller_CMS_Main->after()
#6 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Templates))
#7 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#10 {main}
2012-03-08 12:39:35 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected '.' ~ APPPATH\views\cms\templates\template.php [ 23 ]
2012-03-08 12:39:35 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected '.' ~ APPPATH\views\cms\templates\template.php [ 23 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-03-08 12:45:18 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected ' ~ APPPATH\views\cms\templates\template.php [ 50 ]
2012-03-08 12:45:18 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected ' ~ APPPATH\views\cms\templates\template.php [ 50 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-03-08 12:56:40 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/structure was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2012-03-08 12:56:40 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/structure was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}