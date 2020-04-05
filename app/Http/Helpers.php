<?php

use Illuminate\Database\Eloquent\Model;

function getTableColumns(Model $table)
{
    return $table->getConnection()->getSchemaBuilder()->getColumnListing($table->getTable());
}