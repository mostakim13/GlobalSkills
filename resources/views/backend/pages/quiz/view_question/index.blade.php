@extends('admin.admin_master')
@section('view-questions')
active 
@endsection

@section('admin_dashboard_content')
<div class="sl-pagebody">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Question Category</th>>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Multiple Question</td>
      <td>
       <a type="submit" href="{{ route('view-multiple-questions') }}" class="btn btn-sm">View</a>
      </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Description Question</td>
      <td>
       <a type="submit" href="{{ route('view-description-questions') }}" class="btn btn-sm">View</a>
      </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Picture Question</td>
      <td>
       <a type="submit" href="{{ route('view-picture-questions') }}" class="btn btn-sm">View</a>
      </td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>True False Question</td>
      <td>
       <a type="submit" href="{{ route('view-trueFalse-questions') }}" class="btn btn-sm">View</a>
      </td>
    </tr>
  </tbody>
</table>
</div>
@endsection