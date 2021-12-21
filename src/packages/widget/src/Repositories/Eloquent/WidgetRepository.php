<?php

namespace Haitech\Widget\Repositories\Eloquent;

use Haitech\Support\Repositories\Eloquent\RepositoriesAbstract;
use Haitech\Widget\Repositories\Interfaces\WidgetInterface;

class WidgetRepository extends RepositoriesAbstract implements WidgetInterface
{
    /**
     * {@inheritDoc}
     */
    public function getByTheme($theme)
    {
        $data = $this->model->where('theme', $theme)->get();
        $this->resetModel();

        return $data;
    }
}
