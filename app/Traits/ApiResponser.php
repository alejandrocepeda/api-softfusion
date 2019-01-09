<?php
/**
 * Created by PhpStorm.
 * User: mauricio
 * Date: 23/10/17
 * Time: 4:01 PM.
 */

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

/**
 * Trait ApiResponser.
 */
trait ApiResponser
{
    use FilterQuery;
	
	private $model;

    /**
     * @param $message
     * @param $code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }
    
    public function getModel(){
    	return $this->model;
	}

    /**
     * @param \Illuminate\Database\Eloquent\Collection $collection
     * @param int                                      $code
     * @param null                                     $relations
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function showAll(Collection $collection,$model = null,  $code = 200)
    {
		if (!$collection->isEmpty()){
			$this->model = $collection->first();
		}else{
			$this->model = new $model;
		}
		
		
    	
    	if (Cache::has($this->orderQueryCache())) {
            $collection = Cache::get($this->orderQueryCache());
        } else {
            $collection = $this->search_data($collection);
            $collection = $this->filterData($collection);
            $collection = $this->sortData($collection);
            $collection = $this->paginate($collection);
            $collection = $this->resource_all($collection);
            $collection = $this->cacheResponse($collection);
        }

        if (request()->has('pagination') && 'false' == request()->pagination) {
            return $this->successResponse(['data' => $collection], $code);
        } else {
            return $collection;
        }
    }

    /**
     * @param     $data
     * @param int $code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function showOne(Model $data,$code = 200)
    {
        $data = $this->loadRelationsInModel($data);
        $data = $this->resource_one($data);

        return $this->successResponse(['data' => $data], $code);
    }

    /**
     * @return string
     */
    public function orderQueryCache()
    {
        $url             = request()->url();
        $queryParameters = request()->query();
        $queryString     = http_build_query($queryParameters);

        return $fullUrl = "{$url}?{$queryString}";
    }

    /**
     * @param \Illuminate\Database\Eloquent\Collection $collection
     *
     * @return \Illuminate\Database\Eloquent\Collection|static
     */
    public function filterData(Collection $collection)
    {
        $collection = $this->filter_query($collection);

        return $collection;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Collection $collection
     * @param                                          $relations
     *
     * @return \Illuminate\Database\Eloquent\Collection|static
     */
    public function loadRelationsInCollection(Collection $collection)
    {
        if (!$collection->isEmpty()) {
            $relations = $collection->first()->relationships ?: null;

            if ($relations && !request()->relationships) {
                return $collection->load($relations)->values();
            }
        }

        return $collection;
    }

    public function loadRelationsInModel(Model $data)
    {
        $relations = $data->relationships ?: null;

        if ($relations && !request()->relationships) {
            return $data->load($relations);
        }

        return $data;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Collection $collection
     *
     * @return \Illuminate\Database\Eloquent\Collection|static
     */
    protected function sortData(Collection $collection)
    {
        $collection = $this->sort_data($collection);

        return $collection;
    }

    /**
     * @param Collection $collection
     *
     * @return Collection
     */
    protected function paginate(Collection $collection)
    {
        if (request()->has('pagination') && 'false' == request()->pagination) {
            if (request()->has('relationships') && 'false' == request()->relationships) {
                return $collection;
            }

            return $this->loadRelationsInCollection($collection);
        }

        $rules = ['per_page' => 'integer|min:2|max:100'];
        Validator::validate(request()->all(), $rules);
        $page    = LengthAwarePaginator::resolveCurrentPage();
        $perPage = request()->has('per_page') ? request()->per_page : 15;

        $results = $collection->slice(($page - 1) * $perPage, $perPage)->values();

        if (!request()->has('relationships') or 'false' != request()->relationships) {
            $results = $this->loadRelationsInCollection($results);
        }

        $paginated = new LengthAwarePaginator($results, $collection->count(), $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath()]);
        $paginated->appends(request()->all());

        return $paginated;
    }

    public function resource_all($collection)
    {
	
   
    	if($this->model){
			
    		$resource = $this->model->resourceCollection;
			
			
		
			if ($resource) {
				$collection = new $resource($collection);
			}
		}
        
       

        return $collection;
    }

    public function resource_one($data)
    {
        $resource = $data->resource;
        if ($resource) {
            return new $resource($data);
        }

        return $data;
    }

    /**
     * @param $data
     *
     * @return mixed
     */
    public function cacheResponse($data)
    {
        $fullUrl = $this->orderQueryCache();

        return Cache::remember($fullUrl, 1 / 5, function () use ($data) {
            return $data;
        });
    }

    /**
     * @param $data
     * @param $code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($data, $code = 200)
    {
        return response()->json($data, $code);
    }

    /**
     * @param     $message
     * @param int $code
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function showMessage($message, $code = 200)
    {
        return $this->successResponse(['data' => $message], $code);
    }
}
