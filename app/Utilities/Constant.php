<?php

namespace App\Utilities;

class Constant
{
  //Order
  const order_status_Cancel = 0;
  const order_status_ReceiveOrders = 1;
  const order_status_Unconfirmed = 2;
  const order_status_Confirmed = 3;
  const order_status_Paid = 4;
  const order_status_Processing = 5;
  const order_status_Shipping = 6;
  const order_status_Finish = 7;
  
  public static $order_status = [
    self::order_status_Cancel => 'Đơn hàng bị hủy',
    self::order_status_ReceiveOrders => 'Nhận đơn đặt hàng',
    self::order_status_Unconfirmed => 'Chưa xác nhận đơn hàng',
    self::order_status_Confirmed => 'Đã xác nhận đơn hàng',
    self::order_status_Paid => 'Đã thanh toán',
    self::order_status_Processing => 'Đơn hàng đang được xử lý',
    self::order_status_Shipping => 'Đang giao hàng',
    self::order_status_Finish => 'Đã hoàn thành',
  ];

  //User
  const user_level_host = 0;
  const user_level_admin = 1;
  const user_level_client = 2;
  public static $user_level = [
    self::user_level_host => 'host',
    self::user_level_admin => 'admin',
    self::user_level_client => 'client',
  ];
}
