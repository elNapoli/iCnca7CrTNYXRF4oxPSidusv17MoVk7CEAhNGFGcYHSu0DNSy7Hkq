<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8" />
      <meta name="robots" content="noindex,nofollow" />
      <style>
         /* Copyright (c) 2010, Yahoo! Inc. All rights reserved. Code licensed under the BSD License: http://developer.yahoo.com/yui/license.html */
         html{color:#000;background:#FFF;}body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,code,form,fieldset,legend,input,textarea,p,blockquote,th,td{margin:0;padding:0;}table{border-collapse:collapse;border-spacing:0;}fieldset,img{border:0;}address,caption,cite,code,dfn,em,strong,th,var{font-style:normal;font-weight:normal;}li{list-style:none;}caption,th{text-align:left;}h1,h2,h3,h4,h5,h6{font-size:100%;font-weight:normal;}q:before,q:after{content:'';}abbr,acronym{border:0;font-variant:normal;}sup{vertical-align:text-top;}sub{vertical-align:text-bottom;}input,textarea,select{font-family:inherit;font-size:inherit;font-weight:inherit;}input,textarea,select{*font-size:100%;}legend{color:#000;}
         html { background: #eee; padding: 10px }
         img { border: 0; }
         #sf-resetcontent { width:970px; margin:0 auto; }
         .sf-reset { font: 11px Verdana, Arial, sans-serif; color: #333 }
         .sf-reset .clear { clear:both; height:0; font-size:0; line-height:0; }
         .sf-reset .clear_fix:after { display:block; height:0; clear:both; visibility:hidden; }
         .sf-reset .clear_fix { display:inline-block; }
         .sf-reset * html .clear_fix { height:1%; }
         .sf-reset .clear_fix { display:block; }
         .sf-reset, .sf-reset .block { margin: auto }
         .sf-reset abbr { border-bottom: 1px dotted #000; cursor: help; }
         .sf-reset p { font-size:14px; line-height:20px; color:#868686; padding-bottom:20px }
         .sf-reset strong { font-weight:bold; }
         .sf-reset a { color:#6c6159; cursor: default; }
         .sf-reset a img { border:none; }
         .sf-reset a:hover { text-decoration:underline; }
         .sf-reset em { font-style:italic; }
         .sf-reset h1, .sf-reset h2 { font: 20px Georgia, "Times New Roman", Times, serif }
         .sf-reset .exception_counter { background-color: #fff; color: #333; padding: 6px; float: left; margin-right: 10px; float: left; display: block; }
         .sf-reset .exception_title { margin-left: 3em; margin-bottom: 0.7em; display: block; }
         .sf-reset .exception_message { margin-left: 3em; display: block; }
         .sf-reset .traces li { font-size:12px; padding: 2px 4px; list-style-type:decimal; margin-left:20px; }
         .sf-reset .block { background-color:#FFFFFF; padding:10px 28px; margin-bottom:20px;
         -webkit-border-bottom-right-radius: 16px;
         -webkit-border-bottom-left-radius: 16px;
         -moz-border-radius-bottomright: 16px;
         -moz-border-radius-bottomleft: 16px;
         border-bottom-right-radius: 16px;
         border-bottom-left-radius: 16px;
         border-bottom:1px solid #ccc;
         border-right:1px solid #ccc;
         border-left:1px solid #ccc;
         }
         .sf-reset .block_exception { background-color:#ddd; color: #333; padding:20px;
         -webkit-border-top-left-radius: 16px;
         -webkit-border-top-right-radius: 16px;
         -moz-border-radius-topleft: 16px;
         -moz-border-radius-topright: 16px;
         border-top-left-radius: 16px;
         border-top-right-radius: 16px;
         border-top:1px solid #ccc;
         border-right:1px solid #ccc;
         border-left:1px solid #ccc;
         overflow: hidden;
         word-wrap: break-word;
         }
         .sf-reset a { background:none; color:#868686; text-decoration:none; }
         .sf-reset a:hover { background:none; color:#313131; text-decoration:underline; }
         .sf-reset ol { padding: 10px 0; }
         .sf-reset h1 { background-color:#FFFFFF; padding: 15px 28px; margin-bottom: 20px;
         -webkit-border-radius: 10px;
         -moz-border-radius: 10px;
         border-radius: 10px;
         border: 1px solid #ccc;
         }
      </style>
   </head>
   <body>
      <div id="sf-resetcontent" class="sf-reset">
         <h1>Whoops, looks like something went wrong.</h1>
         <h2 class="block_exception clear_fix">
            <span class="exception_title"><abbr title="fileTypeException">TypeException</abbr> in <a title="{{ $error->getFile()}} line {{ $error->getLine()}}">{{  basename($error->getFile())}} line {{ $error->getLine()}}</a>:</span>
            <span class="exception_message">{{ $error->getMessage()}}</span>
         </h2>
         <div class="block">
            <ol class="traces list_exception">
            <li> in <a title="{{  $error->getFile()}} line {{ $error->getLine()}}"> {{  basename($error->getFile())}} line {{ $error->getLine()}}</a></li>
               @foreach ($traces as  $value)
               		<li>at <abbr title="{{ array_key_exists('class', $value)? $value['class']:''}}">{{ array_key_exists('class', $value)? basename($value['class']):''}}</abbr>{{  array_key_exists('type', $value)?$value['type']:''}}{{  $value['function']}}('select * from `noticias` where `caroussel` = ?', <em>array</em>('si'), <em>object</em>(<abbr title="Closure">Closure</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Database/Connection.php line 611" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Connection.php line 611</a></li>
				@endforeach

            </ol>
         </div>
         <div class="block">
            <ol class="traces list_exception">
               <li> in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Database/Connection.php line 655" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Connection.php line 655</a></li>

               <li>at <abbr title="Illuminate\Database\Connection">Connection</abbr>->runQueryCallback('select * from `noticias` where `caroussel` = ?', <em>array</em>('si'), <em>object</em>(<abbr title="Closure">Closure</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Database/Connection.php line 611" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Connection.php line 611</a></li>

               <li>at <abbr title="Illuminate\Database\Connection">Connection</abbr>->run('select * from `noticias` where `caroussel` = ?', <em>array</em>('si'), <em>object</em>(<abbr title="Closure">Closure</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Database/Connection.php line 324" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Connection.php line 324</a></li>

               <li>at <abbr title="Illuminate\Database\Connection">Connection</abbr>->select('select * from `noticias` where `caroussel` = ?', <em>array</em>('si'), <em>true</em>) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Database/Query/Builder.php line 1431" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Builder.php line 1431</a></li>

               <li>at <abbr title="Illuminate\Database\Query\Builder">Builder</abbr>->runSelect() in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Database/Query/Builder.php line 1408" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Builder.php line 1408</a></li>

               <li>at <abbr title="Illuminate\Database\Query\Builder">Builder</abbr>->get(<em>array</em>('*')) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php line 477" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Builder.php line 477</a></li>

               <li>at <abbr title="Illuminate\Database\Eloquent\Builder">Builder</abbr>->getModels(<em>array</em>('*')) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php line 234" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Builder.php line 234</a></li>

               <li>at <abbr title="Illuminate\Database\Eloquent\Builder">Builder</abbr>->get() in <a title="/home/vagrant/www/OME/app/Http/Controllers/WelcomeController.php line 44" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">WelcomeController.php line 44</a></li>
               <li>at <abbr title="App\Http\Controllers\WelcomeController">WelcomeController</abbr>->index()</li>

               <li>at <abbr title=""></abbr>call_user_func_array(<em>array</em>(<em>object</em>(<abbr title="App\Http\Controllers\WelcomeController">WelcomeController</abbr>), 'index'), <em>array</em>()) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Routing/Controller.php line 256" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Controller.php line 256</a></li>
               <li>at <abbr title="Illuminate\Routing\Controller">Controller</abbr>->callAction('index', <em>array</em>()) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Routing/ControllerDispatcher.php line 164" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">ControllerDispatcher.php line 164</a></li>

               <li>at <abbr title="Illuminate\Routing\ControllerDispatcher">ControllerDispatcher</abbr>->call(<em>object</em>(<abbr title="App\Http\Controllers\WelcomeController">WelcomeController</abbr>), <em>object</em>(<abbr title="Illuminate\Routing\Route">Route</abbr>), 'index') in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Routing/ControllerDispatcher.php line 112" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">ControllerDispatcher.php line 112</a></li>
               <li>at <abbr title="Illuminate\Routing\ControllerDispatcher">ControllerDispatcher</abbr>->Illuminate\Routing\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>))</li>

               <li>at <abbr title=""></abbr>call_user_func(<em>object</em>(<abbr title="Closure">Closure</abbr>), <em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php line 139" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 139</a></li>

               <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/vagrant/www/OME/app/Http/Middleware/RedirectIfAuthenticated.php line 41" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">RedirectIfAuthenticated.php line 41</a></li>

               <li>at <abbr title="App\Http\Middleware\RedirectIfAuthenticated">RedirectIfAuthenticated</abbr>->handle(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), <em>object</em>(<abbr title="Closure">Closure</abbr>))</li>
               <li>at <abbr title=""></abbr>call_user_func_array(<em>array</em>(<em>object</em>(<abbr title="App\Http\Middleware\RedirectIfAuthenticated">RedirectIfAuthenticated</abbr>), 'handle'), <em>array</em>(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), <em>object</em>(<abbr title="Closure">Closure</abbr>))) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php line 124" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 124</a></li>
               <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>))</li>
               <li>at <abbr title=""></abbr>call_user_func(<em>object</em>(<abbr title="Closure">Closure</abbr>), <em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php line 102" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 102</a></li>
               <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->then(<em>object</em>(<abbr title="Closure">Closure</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Routing/ControllerDispatcher.php line 114" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">ControllerDispatcher.php line 114</a></li>
               <li>at <abbr title="Illuminate\Routing\ControllerDispatcher">ControllerDispatcher</abbr>->callWithinStack(<em>object</em>(<abbr title="App\Http\Controllers\WelcomeController">WelcomeController</abbr>), <em>object</em>(<abbr title="Illuminate\Routing\Route">Route</abbr>), <em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), 'index') in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Routing/ControllerDispatcher.php line 68" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">ControllerDispatcher.php line 68</a></li>
               <li>at <abbr title="Illuminate\Routing\ControllerDispatcher">ControllerDispatcher</abbr>->dispatch(<em>object</em>(<abbr title="Illuminate\Routing\Route">Route</abbr>), <em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), 'App\Http\Controllers\WelcomeController', 'index') in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Routing/Route.php line 203" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Route.php line 203</a></li>
               <li>at <abbr title="Illuminate\Routing\Route">Route</abbr>->runWithCustomDispatcher(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Routing/Route.php line 134" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Route.php line 134</a></li>
               <li>at <abbr title="Illuminate\Routing\Route">Route</abbr>->run(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Routing/Router.php line 708" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Router.php line 708</a></li>
               <li>at <abbr title="Illuminate\Routing\Router">Router</abbr>->Illuminate\Routing\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>))</li>
               <li>at <abbr title=""></abbr>call_user_func(<em>object</em>(<abbr title="Closure">Closure</abbr>), <em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php line 139" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 139</a></li>
               <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>))</li>
               <li>at <abbr title=""></abbr>call_user_func(<em>object</em>(<abbr title="Closure">Closure</abbr>), <em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php line 102" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 102</a></li>
               <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->then(<em>object</em>(<abbr title="Closure">Closure</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Routing/Router.php line 710" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Router.php line 710</a></li>
               <li>at <abbr title="Illuminate\Routing\Router">Router</abbr>->runRouteWithinStack(<em>object</em>(<abbr title="Illuminate\Routing\Route">Route</abbr>), <em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Routing/Router.php line 674" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Router.php line 674</a></li>
               <li>at <abbr title="Illuminate\Routing\Router">Router</abbr>->dispatchToRoute(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Routing/Router.php line 635" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Router.php line 635</a></li>
               <li>at <abbr title="Illuminate\Routing\Router">Router</abbr>->dispatch(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php line 236" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Kernel.php line 236</a></li>
               <li>at <abbr title="Illuminate\Foundation\Http\Kernel">Kernel</abbr>->Illuminate\Foundation\Http\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>))</li>
               <li>at <abbr title=""></abbr>call_user_func(<em>object</em>(<abbr title="Closure">Closure</abbr>), <em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php line 139" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 139</a></li>
               <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/VerifyCsrfToken.php line 50" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">VerifyCsrfToken.php line 50</a></li>
               <li>at <abbr title="Illuminate\Foundation\Http\Middleware\VerifyCsrfToken">VerifyCsrfToken</abbr>->handle(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), <em>object</em>(<abbr title="Closure">Closure</abbr>)) in <a title="/home/vagrant/www/OME/app/Http/Middleware/VerifyCsrfToken.php line 17" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">VerifyCsrfToken.php line 17</a></li>
               <li>at <abbr title="App\Http\Middleware\VerifyCsrfToken">VerifyCsrfToken</abbr>->handle(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), <em>object</em>(<abbr title="Closure">Closure</abbr>))</li>
               <li>at <abbr title=""></abbr>call_user_func_array(<em>array</em>(<em>object</em>(<abbr title="App\Http\Middleware\VerifyCsrfToken">VerifyCsrfToken</abbr>), 'handle'), <em>array</em>(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), <em>object</em>(<abbr title="Closure">Closure</abbr>))) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php line 124" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 124</a></li>
               <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/View/Middleware/ShareErrorsFromSession.php line 49" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">ShareErrorsFromSession.php line 49</a></li>
               <li>at <abbr title="Illuminate\View\Middleware\ShareErrorsFromSession">ShareErrorsFromSession</abbr>->handle(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), <em>object</em>(<abbr title="Closure">Closure</abbr>))</li>
               <li>at <abbr title=""></abbr>call_user_func_array(<em>array</em>(<em>object</em>(<abbr title="Illuminate\View\Middleware\ShareErrorsFromSession">ShareErrorsFromSession</abbr>), 'handle'), <em>array</em>(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), <em>object</em>(<abbr title="Closure">Closure</abbr>))) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php line 124" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 124</a></li>
               <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Session/Middleware/StartSession.php line 62" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">StartSession.php line 62</a></li>
               <li>at <abbr title="Illuminate\Session\Middleware\StartSession">StartSession</abbr>->handle(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), <em>object</em>(<abbr title="Closure">Closure</abbr>))</li>
               <li>at <abbr title=""></abbr>call_user_func_array(<em>array</em>(<em>object</em>(<abbr title="Illuminate\Session\Middleware\StartSession">StartSession</abbr>), 'handle'), <em>array</em>(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), <em>object</em>(<abbr title="Closure">Closure</abbr>))) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php line 124" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 124</a></li>
               <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Cookie/Middleware/AddQueuedCookiesToResponse.php line 37" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">AddQueuedCookiesToResponse.php line 37</a></li>
               <li>at <abbr title="Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse">AddQueuedCookiesToResponse</abbr>->handle(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), <em>object</em>(<abbr title="Closure">Closure</abbr>))</li>
               <li>at <abbr title=""></abbr>call_user_func_array(<em>array</em>(<em>object</em>(<abbr title="Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse">AddQueuedCookiesToResponse</abbr>), 'handle'), <em>array</em>(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), <em>object</em>(<abbr title="Closure">Closure</abbr>))) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php line 124" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 124</a></li>
               <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Cookie/Middleware/EncryptCookies.php line 59" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">EncryptCookies.php line 59</a></li>
               <li>at <abbr title="Illuminate\Cookie\Middleware\EncryptCookies">EncryptCookies</abbr>->handle(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), <em>object</em>(<abbr title="Closure">Closure</abbr>))</li>
               <li>at <abbr title=""></abbr>call_user_func_array(<em>array</em>(<em>object</em>(<abbr title="Illuminate\Cookie\Middleware\EncryptCookies">EncryptCookies</abbr>), 'handle'), <em>array</em>(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), <em>object</em>(<abbr title="Closure">Closure</abbr>))) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php line 124" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 124</a></li>
               <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/CheckForMaintenanceMode.php line 44" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">CheckForMaintenanceMode.php line 44</a></li>
               <li>at <abbr title="Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode">CheckForMaintenanceMode</abbr>->handle(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), <em>object</em>(<abbr title="Closure">Closure</abbr>))</li>
               <li>at <abbr title=""></abbr>call_user_func_array(<em>array</em>(<em>object</em>(<abbr title="Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode">CheckForMaintenanceMode</abbr>), 'handle'), <em>array</em>(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), <em>object</em>(<abbr title="Closure">Closure</abbr>))) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php line 124" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 124</a></li>
               <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>))</li>
               <li>at <abbr title=""></abbr>call_user_func(<em>object</em>(<abbr title="Closure">Closure</abbr>), <em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php line 102" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Pipeline.php line 102</a></li>
               <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->then(<em>object</em>(<abbr title="Closure">Closure</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php line 122" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Kernel.php line 122</a></li>
               <li>at <abbr title="Illuminate\Foundation\Http\Kernel">Kernel</abbr>->sendRequestThroughRouter(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/vagrant/www/OME/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php line 87" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">Kernel.php line 87</a></li>
               <li>at <abbr title="Illuminate\Foundation\Http\Kernel">Kernel</abbr>->handle(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/vagrant/www/OME/public/index.php line 52" ondblclick="var f=this.innerHTML;this.innerHTML=this.title;this.title=f;">index.php line 52</a></li>
            </ol>
         </div>
      </div>
   </body>
</html>
