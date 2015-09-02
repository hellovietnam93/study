<?php

namespace studyhub\Entities\Presenters;

class UserPresenter extends Presenter
{
    /**
     * Get user gravatar picture.
     *
     * @param int $size
     * @return string
     */
    public function gravatar($size = 35)
    {
        return trans('presenter.gravatar_link', [
            'email' => md5($this->email),
            'size'  => $size
        ]);
    }
}
