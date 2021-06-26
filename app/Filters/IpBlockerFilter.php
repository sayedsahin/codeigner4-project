<?php 
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;

class IpBlockerFilter implements FilterInterface
{
    public function before(RequestInterface $request, $argument=null)
    {
		$throttler = Services::throttler();
		//$check = $throttler->check($request->getIPAddress(), 3, MINUTE); //This working in server
		$check = $throttler->check('login', 3, MINUTE);
		if ($check === false) {
			return Services::response()->setStatusCode(429)->setBody('Too Many Hit');
		}
    }

    public function after(RequestInterface $request, ResponseInterface $response, $argument=null)
    {
        
    }
}