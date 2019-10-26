
       @extends('layouts.master')
       @section('content')
        <div class="shop_sidebar_area">

            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Catagories</h6>

                <!--  Catagories  -->
                <div class="catagories-menu">
                    <ul>
                    <!-- App\Category::where('status',1)->get() -->
                        @foreach(App\Category::all() as $cats)
                       @if(count(App\Product::where('category_id',$cats->id)->get())>0) 
                    <li class="{{Request::is('shop/'.$cats->id) ? 'active' : ''}}"><a href={{$cats->id}}>{{$cats->name}}</a></li>
                        @endif
                       @endforeach
                      
                        {{-- <li class="{{Request::is('shop/2') ? 'active' : ''}}"><a href="2">Beds</a></li>
                        <li class="{{Request::is('shop/3') ? 'active' : ''}}"><a  href="3">Accesories</a></li>
                        <li class="{{Request::is('shop/4') ? 'active' : ''}}"><a  href="4">Furniture</a></li>
                        <li class="{{Request::is('shop/5') ? 'active' : ''}}"><a  href="5">Home Deco</a></li>
                        <li class="{{Request::is('shop/6') ? 'active' : ''}}"><a  href="6">Dressings</a></li>
                        <li class="{{Request::is('shop/7') ? 'act ive' : ''}}"><a  href="7">Tables</a></li>
                        <li class="{{Request::is('shop/8') ? 'active' : ''}}"><a  href="8">Night Stands</a></li> --}}
                    </ul>
                </div>
            </div>



            <!-- ##### Single Widget ##### -->
            <div class="widget color mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Color</h6>

                <div class="widget-desc">
                    <ul class="d-flex">
                        <li><a href="#" id="white" class="color1"></a></li>
                        <li><a href="#" class="color2"></a></li>
                        <li><a href="#" class="color3"></a></li>
                        <li><a href="#" class="color4"></a></li>
                        <li><a href="#" class="color5"></a></li>
                        <li><a href="#" class="color6"></a></li>
                        <li><a href="#" class="color7"></a></li>
                        <li><a href="#" class="color8"></a></li>
                    </ul>
                </div>
            </div>

            <!-- ##### Single Widget ##### -->
            <div class="widget price mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Price</h6>

                <div class="widget-desc">
                    <div class="slider-range">
                        <input type="hidden" id="hidden_minimum_price" value="10">
                        <input type="hidden" id="hidden_maximum_price" value="1000">
                        <div data-min="10" data-max="1000" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="10" data-value-max="1000" data-label-result="">
                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                        </div>
                        <div class="range-price">$10 - $1000</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                            <!-- Total Products -->
                            <div class="total-products">
                            <p>Showing 1-{{@$value}} 0f {{count($products)}}</p>
                                <div class="view d-flex">
                                    <a href="#" class="active" id="gridBtn"><i class="fa fa-th-large " aria-hidden="true"></i></a>
                                    <a href="#" id="listBtn"><i class="fa fa-bars" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- Sorting -->
                            <div class="product-sorting d-flex">
                                    <div class="sort-by-date d-flex align-items-center mr-15">
                                        <p>Sort by</p>
                                        <form action="{{route('sortCategory' ,$id)}}" method="get">
                                            @csrf
                                            <select name="sortSelect" id="sortBydate" >
                                                <option value="Date"    @if( $SortedValue == "Date")    selected= "selected" @endif>Date</option>
                                                <option value="Newest"  @if( $SortedValue == "Newest")  selected= "selected" @endif>Newest</option>
                                                <option value="Popular" @if( $SortedValue == "Popular") selected= "selected" @endif>Popular</option>
                                            </select>

                                    </div>
                                <div class="view-product d-flex align-items-center">
                                    <p>View</p>

                                        <select name="select" id="viewProduct">
                                            <option value="12" @if( @$value == 12) selected="selected" @endif >12</option>
                                            <option value="24" @if( @$value == 24) selected="selected" @endif>24</option>
                                            <option value="48" @if( @$value == 48) selected="selected" @endif>48</option>
                                            <option value="96" @if( @$value == 96) selected="selected" @endif>96</option>
                                        </select>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    
    {{-- this the beginnig of the products which display with ajax  --}}

                    <!-- Single Product Area -->
                @if(count($products) > 0)
                    @foreach($products as $product)
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6 full" >
                        <div class="single-product-wrapper list" >
                            <!-- Product Image -->
                            <div class="product-img">
                            <img src="{{$product ->image1}}" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img zoom" src="{{$product -> image2}}" alt="">
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">${{$product -> price}}</p>
                                <a href="..\product\{{$product->id}}">
                                        <h6>{{$product -> name}}</h6>
                                    </a>
                                </div>
                                <!-- Ratings & Cart -->
                                <div class="ratings-cart text-right">
                                    <div class="ratings">
                                    <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $product->averageRating }}" data-size="xs" disabled="">

                                    </div>
                                    <div class="cart">
                                        <a href="cart.html" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="/img/core-img/cart.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper">
                            <p>Adding Products Soon</p>
                        </div>
                    </div>
                    @endif



                    <div class="col-12">
                        <!-- Pagination -->
                        <nav aria-label="navigation">
                            <ul class="pagination justify-content-end mt-50">
                                {{$products->links()}}
                            </ul>
                        </nav>
                    </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
    @endsection
    @section('script')

<script>
    var select = document.getElementById('viewProduct');
    var sort = document.getElementById('sortBydate');
    select.onchange = function(){
    this.form.submit()
        };

    sort.onchange = function(){
    this.form.submit()
        };


    $(function() {
        $('#gridBtn').click(function() {
            $('.list').removeClass('list-view').addClass('single-product-wrapper');
            $('.full').removeClass('full-view');
            $('#listBtn').removeClass('active');
            $(this).addClass('active');
        });

        $('#listBtn').click(function() {
            $('.list').removeClass('single-product-wrapper').addClass('list-view');
            $('.full').addClass('full-view');
            $('#gridBtn').removeClass('active');
            $(this).addClass('active');
        });

        

    })

</script>





@endsection
