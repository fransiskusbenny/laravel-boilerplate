<?php

namespace App\Searchables;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class BaseSearchable
{
    protected $model;
    /**
     * @var Request
     */
    protected $request;

    /**
     * BaseSearchable constructor.
     */
    public function __construct()
    {
        $this->model = app()->make($this->model());
        $this->request = app()->make($this->request());
    }

    /**
     * @return string
     */
    abstract protected function model();

    /**
     * @return array
     */
    abstract protected function searchableFields();

    /**
     * @return string
     */
    private function request()
    {
        return Request::class;
    }

    /**
     * @return mixed
     */
    protected function apply()
    {
        return $this->model;
    }

    public function search()
    {
        $fields = $this->searchableFields();
        $values = explode(' ', $this->request->get('q'));
        $model = $this->apply();

        foreach ($fields as $index => $field) {
            if ($index == 0) {
                $model->where(function ($q) use ($values, $field) {
                    foreach ($values as $value) {
                        $q->where($field, 'like', "%{$value}%");
                    }
                });
            } else {
                $model->orWhere(function ($q) use ($values, $field) {
                    foreach ($values as $value) {
                        $q->where($field, 'like', "%{$value}%");
                    }
                });
            }
        }

        return $model->fetch($this->request);
    }
}