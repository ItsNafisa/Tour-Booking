<?php

namespace App\Repository;

use App\Http\Requests\PackageRequest;
use Illuminate\Http\Request;
use App\Http\Requests\DayRequest;

interface IPackageRepository{
 public function index();

 public function create(Request $request);

 public function getState(Request $request);

 public function getcities(Request $request);

 public function store(PackageRequest $request);

 public function addOneDay(DayRequest $request);

 public function show(Request $request);

 public function deleteDay(Request $request);

 public function updateDay(Request $request);

 public function deleteOnePackage(Request $request);

 public function editOnePackage(Request $request);

 public function updateOnePackage(Request $request);

 public function filter(Request $request);
}

?>