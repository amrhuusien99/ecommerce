@extends('layout.admin.index')

@section('title')

    Dashboard

@endsection
@section('content')

            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <li class=" active"></li>
                                </ol>
                            </div>
                            <div class="col-6">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="row second-chart-list third-news-update">

                        <div class="col-xl-4 col-lg-12 xl-50 morning-sec box-col-12">
                            <div class="card o-hidden profile-greeting">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="badge-groups w-100">
                                            <div class="badge f-12"><i class="mr-1" data-feather="clock"></i><span id="txt"></span></div>
                                            <div class="badge f-12"><i class="fa fa-spin fa-cog f-14"></i></div>
                                        </div>
                                    </div>
                                    <div class="greeting-user text-center">
                                        <div class="profile-vector"><img class="img-fluid" src="{{asset('files/admin/images/dashboard/welcome.png')}}" alt=""></div>
                                            <h4 class="f-w-600"><span id="greeting">Good Morning</span> <span class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                                            <p><span> Today's earrning is $405 & your sales increase rate is 3.7 over the last 24 hours</span></p>
                                            <div class="whatsnew-btn"><a class="btn btn-primary">Whats New !</a></div>
                                        <div class="left-icon"><i class="fa fa-bell"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="datepicker-inline col-xl-4 col-lg-12 xl-50 morning-sec box-col-12 mb-4">
                            <div style="width:550px; height:458px;" class="datepicker">
                                <i class="datepicker--pointer"></i>
                                <nav class="datepicker--nav">  
                                    <div class="datepicker--nav-action" data-action="prev">
                                        <svg>
                                            <path d="M 17,12 l -5,5 l 5,5"></path>
                                        </svg>
                                    </div>
                                    <div class="datepicker--nav-title">December,  <i> 2020  </i></div>
                                    <div class="datepicker--nav-action" data-action="next">
                                        <svg>
                                            <path d="M 14,12 l 5,5 l -5,5"></path>  
                                        </svg>
                                    </div>
                                </nav>
                                <div class="datepicker--content">
                                    <div class="datepicker--days datepicker--body active">  
                                        <div class="datepicker--days-names mt-3 mb-2">
                                            <div class="datepicker--day-name -weekend-">S</div>
                                            <div class="datepicker--day-name">M</div>
                                            <div class="datepicker--day-name">T</div>
                                            <div class="datepicker--day-name">W</div>
                                            <div class="datepicker--day-name">T</div>
                                            <div class="datepicker--day-name">F</div>
                                            <div class="datepicker--day-name -weekend-">S</div>
                                        </div>
                                        <div style="height:380px;" class="datepicker--cells datepicker--cells-days mt-1">
                                            <div class="datepicker--cell datepicker--cell-day -weekend- -other-month-" data-date="29" data-month="10" data-year="2020">29</div>
                                            <div class="datepicker--cell datepicker--cell-day -other-month-" data-date="30" data-month="10" data-year="2020">30</div>
                                            <div class="datepicker--cell datepicker--cell-day" data-date="1" data-month="11" data-year="2020">1</div>
                                            <div class="datepicker--cell datepicker--cell-day" data-date="2" data-month="11" data-year="2020">2</div>
                                            <div class="datepicker--cell datepicker--cell-day" data-date="3" data-month="11" data-year="2020">3</div>
                                            <div class="datepicker--cell datepicker--cell-day" data-date="4" data-month="11" data-year="2020">4</div>
                                            <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="5" data-month="11" data-year="2020">5</div>
                                            <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="6" data-month="11" data-year="2020">6</div>
                                            <div class="datepicker--cell datepicker--cell-day" data-date="7" data-month="11" data-year="2020">7</div>
                                            <div class="datepicker--cell datepicker--cell-day" data-date="8" data-month="11" data-year="2020">8</div>
                                            <div class="datepicker--cell datepicker--cell-day" data-date="9" data-month="11" data-year="2020">9</div>
                                            <div class="datepicker--cell datepicker--cell-day" data-date="10" data-month="11" data-year="2020">10</div>
                                            <div class="datepicker--cell datepicker--cell-day" data-date="11" data-month="11" data-year="2020">11</div>
                                            <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="12" data-month="11" data-year="2020">12</div>
                                            <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="13" data-month="11" data-year="2020">13</div>
                                            <div class="datepicker--cell datepicker--cell-day" data-date="14" data-month="11" data-year="2020">14</div>
                                            <div class="datepicker--cell datepicker--cell-day" data-date="15" data-month="11" data-year="2020">15</div>
                                            <div class="datepicker--cell datepicker--cell-day" data-date="16" data-month="11" data-year="2020">16</div>
                                            <div class="datepicker--cell datepicker--cell-day" data-date="17" data-month="11" data-year="2020">17</div>
                                            <div class="datepicker--cell datepicker--cell-day" data-date="18" data-month="11" data-year="2020">18</div>
                                            <div class="datepicker--cell datepicker--cell-day -weekend- -current-" data-date="19" data-month="11" data-year="2020">19</div>
                                            <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="20" data-month="11" data-year="2020">20</div>
                                            <div class="datepicker--cell datepicker--cell-day" data-date="21" data-month="11" data-year="2020">21</div>
                                            <div class="datepicker--cell datepicker--cell-day" data-date="22" data-month="11" data-year="2020">22</div>
                                            <div class="datepicker--cell datepicker--cell-day" data-date="23" data-month="11" data-year="2020">23</div>
                                            <div class="datepicker--cell datepicker--cell-day" data-date="24" data-month="11" data-year="2020">24</div>
                                            <div class="datepicker--cell datepicker--cell-day" data-date="25" data-month="11" data-year="2020">25</div>
                                            <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="26" data-month="11" data-year="2020">26</div>
                                            <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="27" data-month="11" data-year="2020">27</div>
                                            <div class="datepicker--cell datepicker--cell-day" data-date="28" data-month="11" data-year="2020">28</div>
                                            <div class="datepicker--cell datepicker--cell-day" data-date="29" data-month="11" data-year="2020">29</div>
                                            <div class="datepicker--cell datepicker--cell-day" data-date="30" data-month="11" data-year="2020">30</div>
                                            <div class="datepicker--cell datepicker--cell-day" data-date="31" data-month="11" data-year="2020">31</div>
                                            <div class="datepicker--cell datepicker--cell-day -other-month-" data-date="1" data-month="0" data-year="2021">1</div>
                                            <div class="datepicker--cell datepicker--cell-day -weekend- -other-month-" data-date="2" data-month="0" data-year="2021">2</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8 xl-100 dashboard-sec box-col-12">
                            <div class="card earning-card">
                            <div class="card-body p-0">
                                <div class="row m-0">
                                <div class="col-xl-3 earning-content p-0">
                                    <div class="row m-0 chart-left">
                                    <div class="col-xl-12 p-0 left_side_earning">
                                        <h5>Dashboard</h5>
                                        <p class="font-roboto">Overview of last month</p>
                                    </div>
                                    <div class="col-xl-12 p-0 left_side_earning">
                                        <h5>$4055.56 </h5>
                                        <p class="font-roboto">This Month Earning</p>
                                    </div>
                                    <div class="col-xl-12 p-0 left_side_earning">
                                        <h5>$1004.11</h5>
                                        <p class="font-roboto">This Month Profit</p>
                                    </div>
                                    <div class="col-xl-12 p-0 left_side_earning">
                                        <h5>90%</h5>
                                        <p class="font-roboto">This Month Sale</p>
                                    </div>
                                    <div class="col-xl-12 p-0 left-btn"><a class="btn btn-gradient">Summary</a></div>
                                    </div>
                                </div>
                                <div class="col-xl-9 p-0">
                                    <div class="chart-right">
                                    <div class="row m-0 p-tb">
                                        <div class="col-xl-8 col-md-8 col-sm-8 col-12 p-0">
                                        <div class="inner-top-left">
                                            <ul class="d-flex list-unstyled">
                                            <li>Daily</li>
                                            <li class="active">Weekly</li>
                                            <li>Monthly</li>
                                            <li>Yearly</li>
                                            </ul>
                                        </div>
                                        </div>
                                        <div class="col-xl-4 col-md-4 col-sm-4 col-12 p-0 justify-content-end">
                                        <div class="inner-top-right">
                                            <ul class="d-flex list-unstyled justify-content-end">
                                            <li>Online</li>
                                            <li>Store</li>
                                            </ul>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                        <div class="card-body p-0">
                                            <div class="current-sale-container">
                                            <div id="chart-currently"></div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row border-top m-0">
                                    <div class="col-xl-4 pl-0 col-md-6 col-sm-6">
                                        <div class="media p-0">
                                        <div class="media-left"><i class="icofont icofont-crown"></i></div>
                                        <div class="media-body">
                                            <h6>Referral Earning</h6>
                                            <p>$5,000.20</p>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-sm-6">
                                        <div class="media p-0">
                                        <div class="media-left bg-secondary"><i class="icofont icofont-heart-alt"></i></div>
                                        <div class="media-body">
                                            <h6>Cash Balance</h6>
                                            <p>$2,657.21</p>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-12 pr-0">
                                        <div class="media p-0">
                                        <div class="media-left"><i class="icofont icofont-cur-dollar"></i></div>
                                        <div class="media-body">
                                            <h6>Sales forcasting</h6>
                                            <p>$9,478.50     </p>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="col-xl-9 xl-100 chart_data_left box-col-12">
                            <div class="card">
                            <div class="card-body p-0">
                                <div class="row m-0 chart-main">
                                <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                    <div class="media align-items-center">
                                    <div class="hospital-small-chart">
                                        <div class="small-bar">
                                        <div class="small-chart flot-chart-container"></div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="right-chart-content">
                                        <h4>1001</h4><span>purchase </span>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                    <div class="media align-items-center">
                                    <div class="hospital-small-chart">
                                        <div class="small-bar">
                                        <div class="small-chart1 flot-chart-container"></div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="right-chart-content">
                                        <h4>1005</h4><span>Sales</span>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                    <div class="media align-items-center">
                                    <div class="hospital-small-chart">
                                        <div class="small-bar">
                                        <div class="small-chart2 flot-chart-container"></div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="right-chart-content">
                                        <h4>100</h4><span>Sales return</span>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                    <div class="media border-none align-items-center">
                                    <div class="hospital-small-chart">
                                        <div class="small-bar">
                                        <div class="small-chart3 flot-chart-container"></div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="right-chart-content">
                                        <h4>101</h4><span>Purchase ret</span>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="col-xl-3 xl-50 chart_data_right box-col-12">
                            <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                <div class="media-body right-chart-content">
                                    <h4>$95,900<span class="new-box">Hot</span></h4><span>Purchase Order Value</span>
                                </div>
                                <div class="knob-block text-center">
                                    <input class="knob1" data-width="10" data-height="70" data-thickness=".3" data-angleoffset="0" data-linecap="round" data-fgcolor="#7366ff" data-bgcolor="#eef5fb" value="60">
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="col-xl-3 xl-50 chart_data_right second d-none"> 
                            <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                <div class="media-body right-chart-content"> 
                                    <h4>$95,000<span class="new-box">New</span></h4><span>Product Order Value</span>
                                </div>
                                <div class="knob-block text-center">
                                    <input class="knob1" data-width="50" data-height="70" data-thickness=".3" data-fgcolor="#7366ff" data-linecap="round" data-angleoffset="0" value="60">
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="col-xl-4 xl-50 news box-col-6">
                            <div class="card">
                            <div class="card-header">
                                <div class="header-top">
                                <h5 class="m-0">News & Update</h5>
                                <div class="card-header-right-icon">
                                    <select class="button btn btn-primary">
                                    <option>Today</option>
                                    <option>Tomorrow</option>
                                    <option>Yesterday</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="news-update">
                                <h6>36% off For pixel lights Couslations Types.</h6><span>Lorem Ipsum is simply dummy...</span>
                                </div>
                                <div class="news-update">
                                <h6>We are produce new product this</h6><span> Lorem Ipsum is simply text of the printing... </span>
                                </div>
                                <div class="news-update">
                                <h6>50% off For COVID Couslations Types.</h6><span>Lorem Ipsum is simply dummy...</span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="bottom-btn"><a href="#">More...</a></div>
                            </div>
                            </div>
                        </div>

                        <div class="col-xl-4 xl-50 appointment-sec box-col-6">
                            <div class="row"> 
                            <div class="col-xl-12 appointment">
                                <div class="card">
                                <div class="card-header card-no-border">
                                    <div class="header-top">
                                    <h5 class="m-0">appointment</h5>
                                    <div class="card-header-right-icon">
                                        <select class="button btn btn-primary">
                                        <option>Today</option>
                                        <option>Tomorrow</option>
                                        <option>Yesterday</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="appointment-table table-responsive">
                                    <table class="table table-bordernone">
                                        <tbody>
                                        <tr>
                                            <td><img class="img-fluid img-40 rounded-circle mb-3" src="{{asset('files/admin/images/appointment/app-ent.jpg')}}" alt="Image description">
                                            <div class="status-circle bg-primary"></div>
                                            </td>
                                            <td class="img-content-box"><span class="d-block">Venter Loren</span><span class="font-roboto">Now</span></td>
                                            <td>
                                            <p class="m-0 font-primary">28 Sept</p>
                                            </td>
                                            <td class="text-right">
                                            <div class="button btn btn-primary">Done<i class="fa fa-check-circle ml-2"></i></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img class="img-fluid img-40 rounded-circle" src="{{asset('files/admin/images/appointment/app-ent.jpg')}}" alt="Image description">
                                            <div class="status-circle bg-primary"></div>
                                            </td>
                                            <td class="img-content-box"><span class="d-block">John Loren</span><span class="font-roboto">11:00</span></td>
                                            <td>
                                            <p class="m-0 font-primary">22 Sept</p>
                                            </td>
                                            <td class="text-right">
                                            <div class="button btn btn-danger">Pending<i class="fa fa-check-circle ml-2"></i></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-xl-12 alert-sec">
                                <div class="card bg-img">
                                <div class="card-header">
                                    <div class="header-top">
                                    <h5 class="m-0">Alert  </h5>
                                    <div class="dot-right-icon"><i class="fa fa-ellipsis-h"></i></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="body-bottom">
                                    <h6>  10% off For drama lights Couslations...</h6><span class="font-roboto">Lorem Ipsum is simply dummy...It is a long established fact that a reader will be distracted by  </span>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Container-fluid Ends-->
            </div>

@endsection