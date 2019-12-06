laravel-admin grid-sortable
======
借鉴 https://github.com/laravel-admin-extensions/grid-sortable 修改，主要为了让laravel可以使用路由缓存
## Installation

```shell
composer require laravel-admin-ext/grid-sortable -vvv
```

Publish asserts

```shell
php artisan vendor:publish --provider="Encore\Admin\GridSortable\GridSortableServiceProvider"
```

## Usage

Define your model

```php
<?php

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class MyModel extends Model implements Sortable
{
    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];
}
```

Use in grid

```php
$grid = new Grid(new MyModel);

$grid->sortable();
```

This will add a column to the grid. After dragging one row, a `Save order` button will appear at the top of the grid. Click  to save order.

## Translation

The default text for the button is `Save order`. If you use an other language, such as Simplified Chinese, you can add a translation to the `resources/lang/zh-CN.json` file.

```json
{
    "Save order": "保存排序"
}
```
License
------------
Licensed under [The MIT License (MIT)](LICENSE).
