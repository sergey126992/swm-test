<?php
namespace App\Http\Filters;

use Carbon\Carbon;

class UserFilter extends QueryFilter
{
    /**
     * @param array $params
     */
    public function age(array $params)
    {
        if (isset($params['from']))  {
            $this->builder->where('data->date_of_birth', '<', Carbon::now()->subYear($params['from']));
        }
        if (isset($params['to'])) {
            $this->builder->where('data->date_of_birth', '>', Carbon::now()->subYear($params['to']));
        }
    }

    /**
     * @param array $params
     */
    public function hobby(array $params)
    {
        $this->builder->whereJsonContains('data->hobby', $params);
    }

    /**
     * @param string $param
     */
    public function gender(string $param)
    {
        $this->builder->where('data->gender', $param);
    }

    /**
     * @param array $params
     */
    public function geoLocation(array $params)
    {
        if (isset($params['se']['lat']) && isset($params['nw']['lat']) && isset($params['se']['lng']) && isset($params['nw']['lng']))
        {
            $this->builder->whereBetween('geo_location->lat', [$params['se']['lat'],  $params['nw']['lat']]);
            $this->builder->whereBetween('geo_location->lng', [$params['se']['lng'],  $params['nw']['lng']]);
        }
    }
}