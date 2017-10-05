<?php
/**
 * Created by PhpStorm.
 * User: blinddog
 * Date: 15/09/2017
 * Time: 23:08
 */

namespace Sysproject\Repositories;


use Sysproject\Entities\Client;
use Prettus\Repository\Eloquent\BaseRepository;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{

    public function model()
    {
        return Client::class;
    }
}
