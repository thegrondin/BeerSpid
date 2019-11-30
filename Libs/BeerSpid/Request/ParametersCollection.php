<?php


namespace Website\Libs\BeerSpid\Request;


use Website\Libs\BeerSpid\Request\Contracts\IParameter;
use Website\Libs\BeerSpid\Request\Contracts\IParametersCollection;

class ParametersCollection implements IParametersCollection
{

	protected $rawGet = [];
	protected $rawPost = [];

    public function get(string $name)
    {
        if (isset($this->rawGet[$name])) {
            return $this->rawGet[$name];
        }
    }

    public function post(string $name)
    {
        if (isset($this->rawPost[$name])) {
            return $this->rawPost[$name];
        }
    }

    public function __construct(array $rawGetParams, array $rawPostParams)
    {
    	$this->rawGet = $rawGetParams;
    	$this->rawPost = $rawPostParams;
    }

    public function all(string $filter = HttpMethodTypes::ALL): array
    {
        switch ($filter) {
            case HttpMethodTypes::GET:
                return $this->rawGet;
            case HttpMethodTypes::POST:
                return $this->rawPost;
            case HttpMethodTypes::ALL:
                return [
                    "gets" => $this->rawGet,
                    "posts" => $this->rawPost
                ];
        }
    }

}

class HttpMethodTypes {
    const GET = "GET";
    const POST = "POST";
    const ALL = "ALL";
}
