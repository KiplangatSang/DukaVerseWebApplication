@extends('layouts.app')
@section('content')
        <div class="app-title">
          <div>
            <h1><i class="fa fa-edit"></i> Add an Item You Sold</h1>
            <p>Sold Items Registration</p>
          </div>
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Sales</li>
            <li class="breadcrumb-item"><a href="#">Add Sales</a></li>
          </ul>
        </div>
        <div class="row">
          <div class="col">
            <div class="tile">
              <h3 class="tile-title">Sales Items</h3>
              <div class="tile-body">
                <form class="form-horizontal">
                  <div class="form-group row">
                    <label class="control-label col-md-3">Item Name</label>
                    <div class="col-md-8">
                      <input class="form-control" type="text" placeholder="Enter full name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3">Amount</label>
                    <div class="col-md-8">
                      <input class="form-control col-md-8" type="number" placeholder="Enter email address">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3">Price</label>
                    <div class="col-md-8">
                      <input class="form-control col-md-8" type="number" placeholder="Enter email address">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3">Description</label>
                    <div class="col-md-8">
                      <input class="form-control" type="text" placeholder="Enter full name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3">Sales </label>
                    <div class="col-md-6">
                      <div class="form-check p-2">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="gender">Show on sale right away
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3">Display</label>
                    <div class="col-md-6">
                      <div class="form-check p-2">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="gender">Show on Storm5.com
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row ">
                    <label class="control-label col-md-3">Identity Proof</label>
                    <div class="col-md-8">
                      <input class="form-control" type="file">
                    </div>
                  </div>

                </form>
              </div>
              <div class="tile-footer">
                <div class="row">
                  <div class="col-md-8 col-md-offset-3">
                    <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection
