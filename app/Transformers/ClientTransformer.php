<?php
/**
 * Created by PhpStorm.
 * User: Italo
 * Date: 03/11/2015
 * Time: 14:03
 */

namespace CodeProject\Transformers;
use CodeProject\Entities\Client;
use League\Fractal\TransformerAbstract;

class ClientTransformer extends TransformerAbstract
{

	public function transform(Client $client)
	{
           return [
	           'id'=> (int)$client->id,
	           'name'=> $client->name,
	           'responsible' => $client->responsible,
	           'email'=> $client->email ,
	           'phone' => $client->phone,
	           'address' => $client->address,
	           'obs'=> $client->obs
           ];
	}

} 