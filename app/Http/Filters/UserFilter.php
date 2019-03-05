<?php
namespace App\Http\Filters;

class UserFilter extends QueryFilter
{
    /**
     * @param array $params
     */
    public function age(array $params)
    {
        if (isset($params['from']))  {
            $this->builder->whereRaw(" date_part('year',age((data->>'date_of_birth'::text)::date)) >= ?", $params['from']);
        }
        if (isset($params['to'])) {
            $this->builder->whereRaw(" date_part('year',age((data->>'date_of_birth'::text)::date)) <= ?", $params['to']);
        }
    }

    /**
     * @param array $params
     */
    public function hobby(array $params)
    {
        foreach($params as $param){
            $this->builder->orWhereJsonContains('data->hobby', $param);
        }
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