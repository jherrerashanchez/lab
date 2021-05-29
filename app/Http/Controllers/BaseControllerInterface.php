<?php
/**
 * Created by PhpStorm.
 * User: yo
 * Date: 16/10/2018
 * Time: 04:42 PM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;


interface BaseControllerInterface
{

    public function index();

    public function create();

    public function store(Request $request);

    public function show($id);

    public function edit($id);

  //  public function update(Request $request, $id);

    public function destroy($id);

}
