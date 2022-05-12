<?php

include "auto-load.php";
// $stu1 = new Student('nmk', 20, 'male', 'WAD', 8, 42);
// print_r($stu1);

// $db = new Database();
// var_dump($db->connect());

// $t1 = new Test();
// print_r($t1->one()->two()->three());

// $str = new TextFilter("aaa<h1>Hello World</h1> world aaa");
// print_r($str->makeTrim("aaa", 'r')->makeEntity()->makeStripSlash());

$contacts = new Contact('contacts');
// print_r($contacts->where('id', '<', 50)->where('user_id', '>', 3)->get());
// print_r($contacts);
// print_r($contacts->create(['user_id' => rand(2, 5), 'name' => "ggg" . rand(1, 99), "phone" => "09123456" . rand(11, 99)]));
// print_r($contacts->delete(72));

print_r($contacts->update()->set('user_id', rand(2, 5))->set('name', "Minatozaki" . rand(1, 99))->set('phone', "088888" . rand(11, 99))->where('id', '=', '44')->save());
print_r($contacts->where('id', '>', 60)->where('id', '<', '70')->get());

// $users = new User('users');
// print_r($users->whereIn('id',[2,3,4,5])->get());

// print_r($users);
// print_r($users->all());
// update $this->table set name=$value,phone=$value 