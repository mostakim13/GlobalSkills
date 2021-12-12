@extends('admin.admin_master')
@section('view-questions')
active 
@endsection

@section('admin_dashboard_content')
<div class="sl-pagebody">
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Question</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($truefalses as $truefalse)
    <tr>
        <td>{{ $truefalse->question }}</td>
        <td>
          <a href="{{ url('edit/trueFalse/questions/'.$truefalse->id) }}" class="btn btn-info btn-sm" title="edit data"><i class="fa fa-pencil"></i></a>
          <a href="{{ url('trueFalse-delete/'.$truefalse->id) }}" class="btn btn-sm btn-danger" id="delete" title="delete data"><i class="fa fa-trash"></i></a>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection