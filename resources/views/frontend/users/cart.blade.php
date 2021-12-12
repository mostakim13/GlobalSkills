@extends('frontend.layouts.master')

@section('content')

    <div class="page-banner ovbl-dark" style="background-image:url({{ asset('images/banner/banner2.jpg')}});">
        <div class="container">
            <div class="page-banner-entry">
                <br/>
                <br/>
            </div>
        </div>
    </div>

    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{route('course_details')}}">Home</a></li>
                <li><a href="#">Cart</a></li>

            </ul>
        </div>
    </div>
    <br>
    <br>

    <div class="container">
        @if(Session::has('cart_deleted'))
            <div class="alert alert-danger" role="alert">
                <div class="alert-body">
                    {{Session::get('cart_deleted')}}
                </div>
            </div>
        @endif

        <div class="row" id="table-hover-animation">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h4 class="card-title" style="color:#ca2128; text-transform:uppercase;">Cart <i
                                        class="fa fa-cart-arrow-down fa-2x"></i></h4>
                            </div>
                            <div class="color">

                            </div>
                        </div>
                    </div>

                    <div class="table table-responsive">
                        <table id="tableContent" class="table table-hover-animation">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Course Name</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Regular Price</th>
                                <th>Sale Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $price = 0;
                            ?>
                            @foreach(App\Models\Cart::totalCarts() as $row)
                                <tr>
                                    <td>
                                        {{$loop->index+1}}
                                    </td>
                                    <td>
                                        <span class="font-weight-bold"><a
                                                href="home/course_details/{{$row->course->id}}">{{$row->course->course_title}}</a></span>
                                    </td>
                                    <td><img src="{{asset('storage/courses/' .$row->course->course_image)}}" alt="image"
                                             height="50"
                                             width="50"/></td>
                                    <td>{{$row->course->course_category->mcategory_title}}</td>
                                    <td>
                                        <del>{{$row->course->regular_price}}৳</del>

                                    </td>
                                    <td>{{$row->course->sale_price}}৳</td>

                                    <td>
                                        <?php
                                        if ($row->course->sale_price > 0) {
                                            $price += $row->course->sale_price;
                                         } else {
                                            $price += $row->course->regular_price;
                                        }

                                        ?>
                                        <a id="delete" href="/carts/delete/{{$row->id}}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style="color:#ca2128; text-transform:uppercase;">Total</h4>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover-animation">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th></th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span class="font-weight-bold">Course Price</span>
                                    </td>
                                    <td></td>
                                    <td>{{$price}}৳</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="font-weight-bold">Tax(10%)</span>
                                    </td>
                                    <td></td>
                                    <td>{{($price*10)/100}}৳</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="font-weight-bold">Vat(15%)</span>
                                    </td>
                                    <td></td>
                                    <td>
                                        <?php
                                        $total_price = 0;
                                        $total_price_vat = 0;
                                        $total_price = ($price + (($price * 10) / 100));
                                        $total_price_vat = ($total_price * 15) / 100;
                                        $total = $total_price + $total_price_vat;
                                        ?>
                                        {{$total_price_vat}}৳
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="font-weight-bold" style="color:#ca2128; text-transform:uppercase;">Total</span>
                                    </td>
                                    <td>=</td>
                                    <td class="font-weight-bold" style="color:#ca2128; text-transform:uppercase;">{{$total}}
                                        ৳
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
                <br>

                <form id="paymentform" class="hidden" action="{{route('payment')}}" method="post">
                    @csrf
                    <input type="hidden" name="amount" value="{{isset($total)?$total:''}}">
                    <input type="hidden" name="email" value="{{isset(Auth::user()->email)?Auth::user()->email:''}}">
                    <input type="hidden" name="name" value="{{isset(Auth::user()->name)?Auth::user()->name:''}}">
                    <input type="hidden" name="phone" value="{{isset(Auth::user()->phone)?Auth::user()->phone:''}}">

                    @if($total > 0 )
                        <button type="submit" class="text-center btn float-right">Procceed To Payment</button>
                    @else
                        <button type="submit" class="text-center btn float-right" disabled >Procceed To Payment</button>
                    @endif

                </form>
            </div>


        </div>
    </div>

    <br>
    <br>
    @push('scripts')
        <script type="text/javascript">
            //$('#tableContent td:nth-child(2)').each(function(index, tr) {
            //$(tr).find('td').each (function (index, td) {
            //  console.log(index, tr)
            //});
            //});
            $(function () {
                //use the :nth-child selector to get second element
                //iterate with .each()
                var name = [];
                $('#tableContent  td:nth-child(2)').each(function (index, element) {
                    //var name = $(element).text();
                    var arr2 = $.trim($(element).text());
                    name.push(arr2);


                });
                $('#paymentform').append('<input type="hidden" name="course_title" value=' + name + '>');

            });

        </script>
    @endpush






@endsection
