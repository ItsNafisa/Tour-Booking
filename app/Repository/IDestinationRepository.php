<?php

namespace App\Repository;

use App\Http\Requests\DestinationRequest;
use Illuminate\Http\Request;

interface IDestinationRepository{
 public function index();

 public function create();

 public function store(DestinationRequest $request);

 public function edit($id);

 public function update(Request $request);

 public function delete(Request $request);

 public function search(Request $request);
}

?>