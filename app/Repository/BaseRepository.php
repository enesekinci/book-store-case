<?php

namespace App\Repository;

use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    protected string $key;
    protected int $expire = 5; //minutes
    protected Model $model;
    abstract protected function rememberCallback(): Closure;

    public function __construct()
    {
        if (!$this->model || !$this->model instanceof Model) {
            throw new \Exception('Model is not defined');
        }

        if (!$this->key) {
            $this->key = strtolower(class_basename($this->model)) . '_cache';
        }
    }


    public function forget()
    {
        Cache::forget($this->key);
        return $this;
    }

    public function flush()
    {
        Cache::flush();
        return $this;
    }


    protected function remember()
    {
        return Cache::remember($this->key, now()->addMinutes($this->expire), $this->rememberCallback());
    }

    // sürekli forget ve remember işlemleri yapmak yerine, tek bir method ile tüm işlemleri için alttaki methodu kullanabiliriz.
    protected function refresh()
    {
        $this->forget()->remember();
        return $this;
    }

    public function get()
    {
        return $this->remember();
    }

    public function find(int $id)
    {
        return $this->get()->find($id);
    }

    public function findOrFail(int $id)
    {
        \abort_if(!$data = $this->find($id), 404);
        return $data;
    }
}
