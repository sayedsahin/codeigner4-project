<?php 
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;

class ApiBlocker implements FilterInterface
{
    public function before(RequestInterface $request, $argument=null)
    {
		$throttler = Services::throttler();
		//$check = $throttler->check($request->getIPAddress(), 3, MINUTE); //This working in server
		$check = $throttler->check('login', 10, MINUTE);
		if ($check === false) {
			$msg = json_encode(['message'=>'Too many hit to server. Please try after sometime.']);
			return Services::response()->setStatusCode(429)->setBody($msg);
		}
    }

    public function after(RequestInterface $request, ResponseInterface $response, $argument=null)
    {
        
    }
}