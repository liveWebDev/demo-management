<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Auth;
use App\Models\Car;

/**
 * Class OwnerCriteriaCriteria
 * @package namespace App\Criteria;
 */
class OwnerCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
      $carIds = Car::where('user_id', Auth::user()->id)->pluck('id')->toArray();
      $model = $model->where('car_id', $carIds );
      return $model;
    }
}
