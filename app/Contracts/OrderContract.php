<?php

namespace App\Contracts;
use App\Http\Controllers\Admin\OrderController;
interface OrderContract
{
    public function storeOrderDetails($params);

    public function listOrders(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function findOrderByNumber($orderNumber);
}