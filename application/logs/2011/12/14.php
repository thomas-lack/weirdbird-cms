<?php defined('SYSPATH') or die('No direct script access.'); ?>

2011-12-14 00:54:55 --- ERROR: ErrorException [ 2048 ]: Creating default object from empty value ~ APPPATH\classes\controller\cms\main.php [ 23 ]
2011-12-14 00:54:55 --- STRACE: ErrorException [ 2048 ]: Creating default object from empty value ~ APPPATH\classes\controller\cms\main.php [ 23 ]
--
#0 E:\DEV\web\cms\application\classes\controller\cms\main.php(23): Kohana_Core::error_handler(2048, 'Creating defaul...', 'E:\DEV\web\cms\...', 23, Array)
#1 [internal function]: Controller_CMS_Main->action_index()
#2 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#3 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#6 {main}
2011-12-14 00:55:23 --- ERROR: ErrorException [ 2048 ]: Creating default object from empty value ~ APPPATH\classes\controller\cms\main.php [ 23 ]
2011-12-14 00:55:23 --- STRACE: ErrorException [ 2048 ]: Creating default object from empty value ~ APPPATH\classes\controller\cms\main.php [ 23 ]
--
#0 E:\DEV\web\cms\application\classes\controller\cms\main.php(23): Kohana_Core::error_handler(2048, 'Creating defaul...', 'E:\DEV\web\cms\...', 23, Array)
#1 [internal function]: Controller_CMS_Main->action_index()
#2 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#3 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#6 {main}
2011-12-14 00:56:42 --- ERROR: ErrorException [ 2048 ]: Creating default object from empty value ~ APPPATH\classes\controller\cms\main.php [ 23 ]
2011-12-14 00:56:42 --- STRACE: ErrorException [ 2048 ]: Creating default object from empty value ~ APPPATH\classes\controller\cms\main.php [ 23 ]
--
#0 E:\DEV\web\cms\application\classes\controller\cms\main.php(23): Kohana_Core::error_handler(2048, 'Creating defaul...', 'E:\DEV\web\cms\...', 23, Array)
#1 [internal function]: Controller_CMS_Main->action_index()
#2 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#3 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#6 {main}
2011-12-14 01:03:19 --- ERROR: ErrorException [ 2048 ]: Creating default object from empty value ~ APPPATH\classes\controller\cms\main.php [ 23 ]
2011-12-14 01:03:19 --- STRACE: ErrorException [ 2048 ]: Creating default object from empty value ~ APPPATH\classes\controller\cms\main.php [ 23 ]
--
#0 E:\DEV\web\cms\application\classes\controller\cms\main.php(23): Kohana_Core::error_handler(2048, 'Creating defaul...', 'E:\DEV\web\cms\...', 23, Array)
#1 [internal function]: Controller_CMS_Main->action_index()
#2 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#3 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#6 {main}
2011-12-14 01:12:03 --- ERROR: ErrorException [ 8 ]: Undefined variable: template ~ APPPATH\classes\controller\cms\main.php [ 61 ]
2011-12-14 01:12:03 --- STRACE: ErrorException [ 8 ]: Undefined variable: template ~ APPPATH\classes\controller\cms\main.php [ 61 ]
--
#0 E:\DEV\web\cms\application\classes\controller\cms\main.php(61): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 61, Array)
#1 [internal function]: Controller_CMS_Main->action_index()
#2 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#3 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#6 {main}
2011-12-14 01:12:20 --- ERROR: ErrorException [ 8 ]: Use of undefined constant title - assumed 'title' ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 01:12:20 --- STRACE: ErrorException [ 8 ]: Use of undefined constant title - assumed 'title' ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Use of undefine...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\system\classes\kohana\core.php(631): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(250): Kohana_Core::find_file('views', Object(View))
#6 E:\DEV\web\cms\system\classes\kohana\view.php(137): Kohana_View->set_filename(Object(View))
#7 E:\DEV\web\cms\system\classes\kohana\view.php(30): Kohana_View->__construct(Object(View), NULL)
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(61): Kohana_View::factory(Object(View))
#9 [internal function]: Controller_CMS_Main->action_index()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 01:14:05 --- ERROR: ErrorException [ 8 ]: Use of undefined constant title - assumed 'title' ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 01:14:05 --- STRACE: ErrorException [ 8 ]: Use of undefined constant title - assumed 'title' ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Use of undefine...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\system\classes\kohana\core.php(631): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(250): Kohana_Core::find_file('views', Object(View))
#6 E:\DEV\web\cms\system\classes\kohana\view.php(137): Kohana_View->set_filename(Object(View))
#7 E:\DEV\web\cms\system\classes\kohana\view.php(30): Kohana_View->__construct(Object(View), NULL)
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(62): Kohana_View::factory(Object(View))
#9 [internal function]: Controller_CMS_Main->action_index()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 01:16:37 --- ERROR: View_Exception [ 0 ]: The requested view 

	
		WeirdBird cms	
	
	

	WeirdBird cms
	
	
	
		Templates
		Structure
		Articles
		File Manager
		User
	
	
	
		
	
	

 could not be found ~ SYSPATH\classes\kohana\view.php [ 252 ]
2011-12-14 01:16:37 --- STRACE: View_Exception [ 0 ]: The requested view 

	
		WeirdBird cms	
	
	

	WeirdBird cms
	
	
	
		Templates
		Structure
		Articles
		File Manager
		User
	
	
	
		
	
	

 could not be found ~ SYSPATH\classes\kohana\view.php [ 252 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\view.php(137): Kohana_View->set_filename(Object(View))
#1 E:\DEV\web\cms\system\classes\kohana\view.php(30): Kohana_View->__construct(Object(View), NULL)
#2 E:\DEV\web\cms\application\classes\controller\cms\main.php(62): Kohana_View::factory(Object(View))
#3 [internal function]: Controller_CMS_Main->action_index()
#4 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#5 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#8 {main}
2011-12-14 01:17:00 --- ERROR: View_Exception [ 0 ]: The requested view 

	
		WeirdBird cms	
	
	

	WeirdBird cms
	
	
	
		Templates
		Structure
		Articles
		File Manager
		User
	
	
	
		
	
	

 could not be found ~ SYSPATH\classes\kohana\view.php [ 252 ]
2011-12-14 01:17:00 --- STRACE: View_Exception [ 0 ]: The requested view 

	
		WeirdBird cms	
	
	

	WeirdBird cms
	
	
	
		Templates
		Structure
		Articles
		File Manager
		User
	
	
	
		
	
	

 could not be found ~ SYSPATH\classes\kohana\view.php [ 252 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\view.php(137): Kohana_View->set_filename(Object(View))
#1 E:\DEV\web\cms\system\classes\kohana\view.php(30): Kohana_View->__construct(Object(View), NULL)
#2 E:\DEV\web\cms\application\classes\controller\cms\main.php(62): Kohana_View::factory(Object(View))
#3 [internal function]: Controller_CMS_Main->action_index()
#4 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#5 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#8 {main}
2011-12-14 01:17:49 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 01:17:49 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(27): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 01:18:17 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 01:18:17 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(27): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 01:21:42 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 01:21:42 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(27): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 01:23:02 --- ERROR: ErrorException [ 8 ]: Undefined variable: styles ~ APPPATH\views\cms\pages\mainlayout.php [ 8 ]
2011-12-14 01:23:02 --- STRACE: ErrorException [ 8 ]: Undefined variable: styles ~ APPPATH\views\cms\pages\mainlayout.php [ 8 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(8): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 8, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(27): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 01:23:41 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 01:23:41 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(27): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 01:26:39 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 01:26:39 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(27): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 01:27:15 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 01:27:15 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(27): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 01:34:52 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 01:34:52 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(27): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 01:35:14 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 01:35:14 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(27): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 01:37:09 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 01:37:09 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(28): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 01:38:04 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 01:38:04 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(28): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 01:40:02 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 01:40:02 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(28): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 01:40:49 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 01:40:49 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(28): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 01:41:02 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 01:41:02 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(28): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 01:47:43 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 01:47:43 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(28): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 01:47:44 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/templates was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-12-14 01:47:44 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/templates was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-12-14 01:49:41 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 01:49:41 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(29): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 01:49:44 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/dashboard was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-12-14 01:49:44 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/dashboard was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-12-14 01:49:50 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/dashboard was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-12-14 01:49:50 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/dashboard was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-12-14 01:51:13 --- ERROR: Kohana_Exception [ 0 ]: View variable is not set: data ~ SYSPATH\classes\kohana\view.php [ 171 ]
2011-12-14 01:51:13 --- STRACE: Kohana_Exception [ 0 ]: View variable is not set: data ~ SYSPATH\classes\kohana\view.php [ 171 ]
--
#0 E:\DEV\web\cms\application\classes\controller\cms\main.php(24): Kohana_View->__get('data')
#1 [internal function]: Controller_CMS_Main->before()
#2 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(103): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#3 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#6 {main}
2011-12-14 01:51:33 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 01:51:33 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(29): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 01:52:04 --- ERROR: ErrorException [ 8 ]: Undefined variable: styles ~ APPPATH\views\cms\pages\mainlayout.php [ 8 ]
2011-12-14 01:52:04 --- STRACE: ErrorException [ 8 ]: Undefined variable: styles ~ APPPATH\views\cms\pages\mainlayout.php [ 8 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(8): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 8, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(29): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 01:52:15 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 17 ]
2011-12-14 01:52:15 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 17 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(17): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 17, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(31): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 01:52:28 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 01:52:28 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(29): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 01:55:21 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 01:55:21 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(30): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 02:00:41 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 02:00:41 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(29): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 02:05:10 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 02:05:10 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(29): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 02:10:09 --- ERROR: ErrorException [ 1 ]: Using $this when not in object context ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 02:10:09 --- STRACE: ErrorException [ 1 ]: Using $this when not in object context ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2011-12-14 02:10:29 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 02:10:29 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(29): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 02:21:17 --- ERROR: View_Exception [ 0 ]: The requested view cms/pages/mainlayout2 could not be found ~ SYSPATH\classes\kohana\view.php [ 252 ]
2011-12-14 02:21:17 --- STRACE: View_Exception [ 0 ]: The requested view cms/pages/mainlayout2 could not be found ~ SYSPATH\classes\kohana\view.php [ 252 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\view.php(137): Kohana_View->set_filename('cms/pages/mainl...')
#1 E:\DEV\web\cms\system\classes\kohana\view.php(30): Kohana_View->__construct('cms/pages/mainl...', NULL)
#2 E:\DEV\web\cms\system\classes\kohana\controller\template.php(33): Kohana_View::factory('cms/pages/mainl...')
#3 E:\DEV\web\cms\application\classes\controller\cms\main.php(19): Kohana_Controller_Template->before()
#4 [internal function]: Controller_CMS_Main->before()
#5 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(103): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#6 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#8 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#9 {main}
2011-12-14 02:21:35 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 02:21:35 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(29): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 02:22:00 --- ERROR: ErrorException [ 8 ]: Undefined variable: styles ~ APPPATH\views\cms\pages\mainlayout.php [ 8 ]
2011-12-14 02:22:00 --- STRACE: ErrorException [ 8 ]: Undefined variable: styles ~ APPPATH\views\cms\pages\mainlayout.php [ 8 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(8): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 8, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(29): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 02:22:52 --- ERROR: ErrorException [ 8 ]: Undefined variable: styles ~ APPPATH\views\cms\pages\mainlayout.php [ 8 ]
2011-12-14 02:22:52 --- STRACE: ErrorException [ 8 ]: Undefined variable: styles ~ APPPATH\views\cms\pages\mainlayout.php [ 8 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(8): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 8, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(29): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 02:31:05 --- ERROR: ErrorException [ 8 ]: Undefined variable: styles ~ APPPATH\views\cms\pages\mainlayout.php [ 8 ]
2011-12-14 02:31:05 --- STRACE: ErrorException [ 8 ]: Undefined variable: styles ~ APPPATH\views\cms\pages\mainlayout.php [ 8 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(8): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 8, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(29): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 02:32:03 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\cms\main.php [ 49 ]
2011-12-14 02:32:03 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\cms\main.php [ 49 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2011-12-14 02:32:27 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\cms\main.php [ 49 ]
2011-12-14 02:32:27 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\controller\cms\main.php [ 49 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2011-12-14 02:32:36 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 02:32:36 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(29): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 02:33:06 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 02:33:06 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\application\classes\controller\cms\main.php(48): Kohana_View->render()
#4 [internal function]: Controller_CMS_Main->action_index()
#5 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#6 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#8 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#9 {main}
2011-12-14 02:33:20 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 02:33:20 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(29): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(43): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 02:45:42 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/dashboard was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-12-14 02:45:42 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/dashboard was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-12-14 02:45:44 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/templates was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-12-14 02:45:44 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/templates was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-12-14 02:45:46 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/structure was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-12-14 02:45:46 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/structure was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-12-14 02:46:08 --- ERROR: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
2011-12-14 02:46:08 --- STRACE: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH\views\cms\pages\mainlayout.php [ 4 ]
--
#0 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', 'E:\DEV\web\cms\...', 4, Array)
#1 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#2 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#3 E:\DEV\web\cms\system\classes\kohana\view.php(228): Kohana_View->render()
#4 E:\DEV\web\cms\application\views\cms\pages\mainlayout.php(29): Kohana_View->__toString()
#5 E:\DEV\web\cms\system\classes\kohana\view.php(61): include('E:\DEV\web\cms\...')
#6 E:\DEV\web\cms\system\classes\kohana\view.php(343): Kohana_View::capture('E:\DEV\web\cms\...', Array)
#7 E:\DEV\web\cms\system\classes\kohana\controller\template.php(44): Kohana_View->render()
#8 E:\DEV\web\cms\application\classes\controller\cms\main.php(44): Kohana_Controller_Template->after()
#9 [internal function]: Controller_CMS_Main->after()
#10 E:\DEV\web\cms\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_CMS_Main))
#11 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#12 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#13 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#14 {main}
2011-12-14 02:58:45 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/templates was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-12-14 02:58:45 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/templates was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-12-14 02:58:47 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/dashboard was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-12-14 02:58:47 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/dashboard was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-12-14 02:59:29 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/1 was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-12-14 02:59:29 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/1 was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-12-14 03:07:03 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/cms/dashboard was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-12-14 03:07:03 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/cms/dashboard was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-12-14 03:07:07 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/cms/structure was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-12-14 03:07:07 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/cms/structure was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-12-14 03:07:09 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/cms/templates was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-12-14 03:07:09 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/cms/templates was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-12-14 14:59:59 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-12-14 14:59:59 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2011-12-14 14:59:59 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-12-14 14:59:59 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2011-12-14 14:59:59 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2011-12-14 14:59:59 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#1 {main}
2011-12-14 15:00:02 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/structure was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-12-14 15:00:02 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/structure was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-12-14 15:00:04 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/dashboard was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-12-14 15:00:04 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/dashboard was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-12-14 15:00:07 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/file_manager was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-12-14 15:00:07 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/file_manager was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-12-14 15:01:41 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/dashboard was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-12-14 15:01:41 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/dashboard was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}
2011-12-14 15:01:50 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL cms/structure was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2011-12-14 15:01:50 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL cms/structure was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 E:\DEV\web\cms\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 E:\DEV\web\cms\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 E:\DEV\web\cms\index.php(109): Kohana_Request->execute()
#3 {main}