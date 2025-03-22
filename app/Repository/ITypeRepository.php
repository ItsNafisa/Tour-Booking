<?php

namespace App\Repository;

use App\Http\Requests\TypeRequest;
use Illuminate\Http\Request;

interface ITypeRepository{
 public function index();

 public function store(TypeRequest $request);

 public function update(Request $request);

 public function delete(Request $request);

 public function search(Request $request);
}

?>