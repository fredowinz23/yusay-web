<?php
function category_interface($row){
  $item = array();
  $item["id"] = $row->Id;
  $item["name"] = $row->name;
  $item["description"] = $row->description;
  return $item;
}

function program_interface($row){
  $BASE_URL = "http://" . $_SERVER['SERVER_NAME'];

  $category = category()->get("Id=$row->categoryId");
  $categoryObj = category_interface($category);
  $totalJoiner = joiner()->count("programId=$row->Id");

  $item = array();
  $item["id"] = $row->Id;
  $item["title"] = $row->title;
  $item["date"] = format_date($row->date);
  $item["time"] = format_time_to_12($row->time);
  $item["image"] = $BASE_URL . "/yusay/media/" . $row->image;
  $item["description"] = $row->description;
  $item["category"] = $categoryObj;
  $item["address"] = $row->address;
  $item["notes"] = $row->notes;
  $item["maxVolunteer"] = $row->maxVolunteer;
  $item["amountSpent"] = $row->amountSpent;
  $item["status"] = $row->status;
  $item["totalJoiner"] = $totalJoiner;
  return $item;
}

function joiner_interface($row){

  $program = program()->get("Id=$row->programId");
  $programObj = program_interface($program);

  $item = array();
  $item["id"] = $row->Id;
  $item["program"] = $programObj;
  return $item;
}


function user_interface($row){
  $item = array();
  $item["id"] = $row->Id;
  $item["firstName"] = $row->firstName;
  $item["lastName"] = $row->lastName;
  $item["phone"] = $row->phone;
  $item["email"] = $row->email;
  return $item;
}

function volunteer_interface($row){
  $item = array();
  $item["id"] = $row->Id;
  $item["firstName"] = $row->firstName;
  $item["lastName"] = $row->lastName;
  $item["phone"] = $row->mobileNumber;
  $item["email"] = $row->email;
  return $item;
}



?>
