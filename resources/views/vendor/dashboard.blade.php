@extends('layout.vendor.index')

@section('title')
{{__('admin/dashboard.dashboard')}}
@endsection
@section('content')

            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url(route('vendor-dashboard'))}}"><i data-feather="home"></i></a></li>
                                    <li class="breadcrumb-item">{{__('admin/dashboard.dashboard')}}</li>
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

                        <div class="col-xl-4 xl-50 appointment-sec box-col-6">
                            <div class="row"> 
                                <div class="col-xl-12 appointment">
                                    <div class="card">
                                        <div class="card-header card-no-border">
                                            <div class="header-top">
                                            <h5 class="m-0">{{__('admin/dashboard.pending_title')}}</h5>
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
                                                            <td><img class="img-fluid img-40 rounded-circle mb-3" src="{{asset('files/admin/images/icons/appointment/app-ent.jpg')}}" alt="Image description">
                                                                <div class="status-circle bg-primary"></div>
                                                            </td>
                                                            <td class="img-content-box">
                                                                <span class="d-block">Venter Loren</span><span class="font-roboto">Now</span>
                                                            </td>
                                                            <td>
                                                                <p class="m-0 font-primary">28 Sept</p>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="button btn btn-primary">{{__('admin/dashboard.pending_state')}}<i class="fa fa-check-circle ml-2"></i></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><img class="img-fluid img-40 rounded-circle mb-3" src="{{asset('files/admin/images/icons/appointment/app-ent.jpg')}}" alt="Image description">
                                                                <div class="status-circle bg-primary"></div>
                                                            </td>
                                                            <td class="img-content-box">
                                                                <span class="d-block">John Loren</span><span class="font-roboto">11:00</span>
                                                            </td>
                                                            <td>
                                                                <p class="m-0 font-primary">22 Sept</p>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="button btn btn-danger">{{__('admin/dashboard.pending_state')}}<i class="fa fa-check-circle ml-2"></i></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><img class="img-fluid img-40 rounded-circle mb-3" src="{{asset('files/admin/images/icons/appointment/app-ent.jpg')}}" alt="Image description">
                                                                <div class="status-circle bg-primary"></div>
                                                            </td>
                                                            <td class="img-content-box">
                                                                <span class="d-block">John Loren</span><span class="font-roboto">11:00</span>
                                                            </td>
                                                            <td>
                                                                <p class="m-0 font-primary">22 Sept</p>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="button btn btn-danger">{{__('admin/dashboard.pending_state')}}<i class="fa fa-check-circle ml-2"></i></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><img class="img-fluid img-40 rounded-circle mb-3" src="{{asset('files/admin/images/icons/appointment/app-ent.jpg')}}" alt="Image description">
                                                                <div class="status-circle bg-primary"></div>
                                                            </td>
                                                            <td class="img-content-box">
                                                                <span class="d-block">John Loren</span><span class="font-roboto">11:00</span>
                                                            </td>
                                                            <td>
                                                                <p class="m-0 font-primary">22 Sept</p>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="button btn btn-danger">{{__('admin/dashboard.pending_state')}}<i class="fa fa-check-circle ml-2"></i></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><img class="img-fluid img-40 rounded-circle mb-3" src="{{asset('files/admin/images/icons/appointment/app-ent.jpg')}}" alt="Image description">
                                                                <div class="status-circle bg-primary"></div>
                                                            </td>
                                                            <td class="img-content-box">
                                                                <span class="d-block">John Loren</span><span class="font-roboto">11:00</span>
                                                            </td>
                                                            <td>
                                                                <p class="m-0 font-primary">22 Sept</p>{{__('admin/sidebar.tags_list')}}
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="button btn btn-danger">{{__('admin/dashboard.pending_state')}}<i class="fa fa-check-circle ml-2"></i></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><img class="img-fluid img-40 rounded-circle mb-2" src="{{asset('files/admin/images/icons/appointment/app-ent.jpg')}}" alt="Image description">
                                                                <div class="status-circle bg-primary"></div>
                                                            </td>
                                                            <td class="img-content-box">
                                                                <span class="d-block">John Loren</span><span class="font-roboto">11:00</span>
                                                            </td>
                                                            <td>
                                                                <p class="m-0 font-primary">22 Sept</p>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="button btn btn-danger">{{__('admin/dashboard.pending_state')}}<i class="fa fa-check-circle ml-2"></i></div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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

                    </div>
                </div>
                <!-- Container-fluid Ends-->
            </div>

@endsection