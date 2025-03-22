<?php

namespace App\Repository;

use App\Http\Requests\TypeRequest;
use Illuminate\Http\Request;

interface IHomeRepository{
 public function index();

 public function destinations();

 public function packages();

 public function destinationDetail($name);

 public function packageDetail($id);

 public function searchPackage(Request $request);

 public function searchPackagev2(Request $request);
}

?>