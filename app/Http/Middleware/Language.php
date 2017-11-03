<?php 

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;

class Language {

	public function __construct(Application $app, Redirector $redirector, Request $request) {
		$this->app = $app;
		$this->redirector = $redirector;
		$this->request = $request;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$localeQuery = $request->input('locale');
        // Make sure current locale exists.
		$locale = $request->segment(1);

		if ( ! array_key_exists($locale, $this->app->config->get('app.locales'))) {
			$segments = $request->segments();

			$locale = $localeQuery ? $localeQuery : $this->app->config->get('app.fallback_locale');
            array_unshift($segments, $locale);

			return $this->redirector->to(implode('/', $segments));
		} else if ($locale != $localeQuery && array_key_exists($localeQuery, $this->app->config->get('app.locales'))) {
            $segments = $request->segments();
            $segments[0] = $localeQuery;
            return $this->redirector->to(implode('/', $segments));
        }

		$this->app->setLocale($locale);

		return $next($request);
	}

}