<?php

namespace App\Models\Forms;

interface FormInterface
{

    /**
     * @return array
     */
    public function getDynamicForm(): array;


}
