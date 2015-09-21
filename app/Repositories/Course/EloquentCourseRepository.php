<?php

namespace studyhub\Repositories\Course;

use studyhub\Entities\Courses\Course;
use studyhub\Repositories\EloquentRepository;

class EloquentCourseRepository extends EloquentRepository implements CourseRepositoryInterface
{
    protected $model;

    public function __construct(Course $model)
    {
        $this->model = $model;
    }

    public function create(array $credentials)
    {
        return $this->model->create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'activation_code' => str_random(100),
        ]);
    }

    public function updateProfile(array $credentials, $slug)
    {
        $Course = $this->findBySlug($slug);
        $Course->profile()->update($credentials);
    }

    public function update(array $data, $id)
    {
        $Course = $this->findById($id);
        $Course->update($data);

        return $Course;
    }

    public function restore($slug)
    {
        $Course = $this->findDisabledCourseBySlug($slug);
        $Course->restore();
    }

    public function softDelete($id)
    {
        $Course = $this->findById($id);
        $Course->delete();
    }

    public function forceDelete($slug)
    {
        $Course = $this->findDisabledCourseBySlug($slug);
        $Course->tasks()->withTrashed()->forceDelete();
        $Course->profile()->withTrashed()->forceDelete();
        $Course->forceDelete();
    }

    public function fetchDisabledCourses($limit)
    {
        return $this->model
            ->onlyTrashed()
            ->latest('deleted_at')
            ->paginate($limit);
    }

    public function findDisabledCourseBySlug($slug)
    {
        return $this->model
            ->onlyTrashed()
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function findOrCreateNew(array $CourseData, $authProvider)
    {
        $Course = $this->model
            ->where('auth_provider_id', $CourseData['auth_provider_id'])
            ->first();
        $CourseExisted = $this->model
            ->where('email', $CourseData['email'])
            ->first();
        if (!$Course && $CourseExisted) {
            return false;
        }
        if (!$Course) {
            $Course = $this->model->create($CourseData);
            $Course->update([
                'auth_provider' => $authProvider,
                'active' => true,
                'activation_code' => '',
            ]);
        }

        return $Course;
    }
}
