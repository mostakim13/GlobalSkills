@extends('admin.admin_master')


@section('admin_dashboard_content')

<div class="container-fluid">
  <div class="db-breadcrumb">
    <h4 class="breadcrumb-title">Course Details</h4>
    <ul class="db-breadcrumb-list">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
      
      <li>{{$sections->section_name}} </li>
    </ul>
  </div>

  </div>
  <br/>






@endsection
