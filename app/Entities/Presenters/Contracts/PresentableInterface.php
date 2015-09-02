<?php

namespace studyhub\Entities\Presenters\Contracts;

interface PresentableInterface
{
    /**
     * Prepare a new or retrieve old presenter instance.
     *
     * @return mixed
     */
    public function present();
}
